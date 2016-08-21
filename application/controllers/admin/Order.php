<?php
/**
 * Created by PhpStorm.
 * User: Trần Huy Tiệp
 * Date: 07/14/16
 * Time: 08:55 AM
 */
class Order extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        //load ra file model
        $this->load->model('order_model');
        $this->load->library('cart');
    }
    function index(){
        $total_rows = $this->order_model->get_total();
        $this->data['total_rows'] = $total_rows;


        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
        $config['base_url']   = admin_url('order/index/'); //link hien thi ra danh sach san pham
        $config['per_page']   = 10;//so luong san pham hien thi tren 1 trang
        $config['uri_segment'] = 4;//phan doan hien thi ra so trang tren url
        $config['next_link']   = '>';
        $config['prev_link']   = '<';
        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);

        $segment = $this->uri->segment(4);
        $segment = intval($segment);

        $input = array();
        $input['limit'] = array($config['per_page'], $segment);


        $list = $this->order_model->get_list($input);
       // $this->data['list'] = $list;

        $query=$this->db->query("SELECT *,SUM(orderdetails.quantityOrdered*orderdetails.priceEach) FROM orders,orderdetails  
                                WHERE orderdetails.orderNumber = orders.orderNumber 
                                GROUP BY orders.orderNumber
                                ORDER BY orders.orderNumber DESC 
                                LIMIT $segment , 10
                                ");

        $list=$query->result_array();
        $this->data['list'] = $list;
        //pre($this->data);
        $this->data['temp'] = 'admin/order/index';
        $this->load->view('admin/main', $this->data);
    }


    function detail(){
        $id = $this->uri->rsegment(3);
        $query=$this->db->query("SELECT orders.customerName,orders.phone,orders.address,orders.createDate,orders.updateDate,orders.status,
                                SUM(orderdetails.quantityOrdered*orderdetails.priceEach) 
                                FROM orders,orderdetails
                                WHERE orderdetails.orderNumber = orders.orderNumber AND orders.orderNumber = '$id'
                                GROUP BY orders.orderNumber");
        $list=$query->result_array();
      //  pre($list);
        $this->data['list'] = $list;

        $query1=$this->db->query("SELECT orderdetails.productCode,orderdetails.productName,orderdetails.priceEach,orderdetails.quantityOrdered,orderdetails.quantityOrdered*orderdetails.priceEach
                                FROM orders,orderdetails  
                                WHERE orderdetails.orderNumber = orders.orderNumber AND orders.orderNumber = '$id'
                                
                                ");
        $product=$query1->result_array();
//        pre($product);
        $this->data['product'] = $product;
        //pre($this->data);
        if($this->input->post())
        {
            $this->load->helper('date');
            date_default_timezone_set('Asia/Bangkok');
            $status  = $this->input->post('status');
            $data = array(
                'updateDate' => date('Y-m-d H:i:s'),
                'status'       => $status
             );
            $this->order_model->update($id, $data);
            redirect(admin_url('order'));
        }
        $this->data['temp'] = 'admin/order/detail';
        $this->load->view('admin/main', $this->data);

    }
    
    function add(){
        $this->load->model('product_model');
        $total_rows = $this->order_model->get_total();
        $id = $this->uri->rsegment(3);
        $input = array();
        $name = $this->input->get('name');
        $input['like'] = array('productName', $name);

        $total_rows = $this->product_model->get_total($input);
        $this->data['total_rows'] = $total_rows;
        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
        $config['base_url']   = admin_url('order/add/'); //link hien thi ra danh sach san pham
        $config['per_page']   = 6;//so luong san pham hien thi tren 1 trang
        $config['uri_segment'] = 4;//phan doan hien thi ra so trang tren url
        $config['next_link']   = '>';
        $config['prev_link']   = '<';
        //khoi tao cac cau hinh phan trang
        if ( $name != null){
            goto a;
        }

        $this->pagination->initialize($config);
        $segment = $this->uri->segment(4);
        $cate = $this->uri->segment(4);
        $segment = intval($segment);
        $input['limit'] = array($config['per_page'], $segment);
        a:

        $list = $this->product_model->get_list($input);
        $this->data['list'] = $list;

        $carts = $this->cart->contents();
        //tong so san pham co trong gio hang
        $this->data['carts'] = $carts;
        $this->data['temp'] = 'admin/order/add';
        $this->load->view('admin/main', $this->data);
    }

    function addproduct(){
        $id = $this->input->post('productCode');
        $this->load->model('product_model');
        //$id = $this->uri->rsegment(3);
        $product = $this->product_model->get_info($id);
        $carts = $this->cart->contents();
        $data = array();
        $a = 0;
        if(!$product)
        {
            redirect(admin_url('order/add'));
        }
        $qty = 1;
        $price = $product->price;
        //thong tin them vao gio hang
        $data['id'] = $product->productCode;
        $data['qty'] = $qty;
        $data['name'] = $product->productName;
        $data['image_link']  = $product->image_link;
        $data['price'] = $price;

        foreach ($carts as $key =>$value){
            if ($value['id'] == $id){
               $a = $value['qty'];
            }
        }
        if ($a ==0){
            $this->cart->insert($data);
            $data['tang'] = 1;
        }else{
            $data['tang'] = 2;
        }
        //tong so san pham
        $carts = $this->cart->contents();
        foreach ($carts as $key => $value)
        {
            //Kiểm tra nếu id của sản phẩm trong giỏ hàng = id sản phẩm muốn cập nhật
            if($value['id'] == $id)
            {
                $data['rowid'] = $key;
                $data['qty'] = $value['qty'];
            }
        }

        echo json_encode($data);

        //chuyen sang trang danh sach san pham trong gio hang
        //redirect(admin_url('order/add'));
    }

    function addorder(){
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('cart');
        $carts = $this->cart->contents();
        //tong so san pham co trong gio hang
        $total_items = $this->cart->total_items();
        if ($total_items !=0){
            if($this->input->post()){
                $this->form_validation->set_rules('name', 'Tên', 'required');
                $this->form_validation->set_rules('phone', 'Số điện thoại', 'required|min_length[10]|max_length[11]');
                $this->form_validation->set_rules('address', 'Địa chỉ', 'required');
                // $this->form_validation->set_rules('identityCard', 'Số CMND', 'required');
                if($this-> form_validation ->run()) {
                    $name = $this->input ->post('name');
                    $phone = $this->input ->post('phone');
                    $address = $this->input ->post('address');

                    $customers = array(
                        'customerName' => $name,
                        'phone' => $phone,
                        'address' => $address,
                    );
                    $this->load->model('customers_model');
                    $where = array('phone' => $phone,
                    );
                    if ($this->customers_model->check_exists($where) == false) {
                        $this->customers_model->create($customers);
                    }
                    $query = $this->db->query("SELECT customerNumber
                                FROM customers
                                WHERE customers.phone = '$phone' AND customers.customerName =
                                 '$name'
                                ORDER BY customerNumber DESC 
                               ");
                    $id = $query->result_array();
                    $customerNumber = $id[0]['customerNumber'];
//                $this->customers_model->update($customerNumber, $customers);
                    $this->load->helper('date');
                    date_default_timezone_set('Asia/Bangkok');
                    $orders = array(
                        'createDate' => date('Y-m-d H:i:s'),
                        'updateDate' => date('Y-m-d H:i:s'),
                        'status'     => 'In Process',
                        'customerNumber' => $customerNumber,
                        'customerName' => $name,
                        'phone'      => $phone,
                        'address'      =>$address,
                    );

                    $this->load->model('order_model');
                    $this->order_model->create($orders);

                    $carts = $this->cart->contents();
                    $query = $this->db->query("SELECT  orderNumber
                                FROM orders
                                WHERE orders.customerNumber = '$customerNumber'
                                ORDER BY orderNumber DESC 
                               ");
                    $orderNumber_id = $query->result_array();
                    $orderNumber = $orderNumber_id[0]['orderNumber'];
                    foreach ($carts as $row) {
                        $data = array(
                            'orderNumber' => $orderNumber,
                            'productCode' => $row['id'],
                            'quantityOrdered' => $row['qty'],
                            'priceEach' => $row['price'],
                            'productName'=>$row['name']
                        );
                        $this->load->model('orderdetails_model');
                        if ($this->orderdetails_model->create($data)) {
                            sleep(1);
                            $this->cart->destroy();
                            $data1 = array(
                                'true'=> true
                            );

                        } else {
                            $data1 = array(
                            'true'=> false
                            );
                        };
                    }
                }
                else{
                    $data1 = array(
                        'nameerro' => form_error('name'),
                        'phoneerro' => form_error('phone'),
                        'addresserro' => form_error('address'),
                    );
                }
            }
        }else{
            $data1 = array(
                'total_items'=> $total_items
            );
        }
        echo json_encode($data1);
    }
    
    
    
    function deleteorder()
    {
//      $id = $this->uri->rsegment(3);
        $id = $this->input->post('id');
       // pre($id);
        // $id = intval($id);
        // pre($id);
        //trường hợp xóa 1 sản phẩm nào đó trong giỏ hàng
        if($id != null)
        {
            $data = array();
            $data['rowid'] = $id;
            $data['qty'] = 0;
            $this->cart->update($data);
        }else{
            $this->cart->destroy();
        }
        $carts = $this->cart->contents();
        echo json_encode($carts);
    }

    
    
    function updateordoer()
    {
        //thong gio hang
        $carts = $this->cart->contents();
//        foreach ($carts as $key => $row)
//        {
            //tong so luong san pham
            $total_qty = $this->input->post('id');
            $rowid = $this->input->post('rowid');
            $data = array();
            $data['rowid'] = $rowid;
            $data['qty'] = $total_qty;
            $this->cart->update($data);
//        }
        $carts = $this->cart->contents();
        echo json_encode($carts);
    }





    function delete()
    {
        //lay id danh mục
        $id = $this->uri->rsegment(3);
        $this->_del($id);

        //tạo ra nội dung thông báo
        $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
        redirect(admin_url('order'));
    }

    /*
     * Xoa nhieu danh muc san pham
     */
    function delete_all()
    {
        $ids = $this->input->post('ids');
        foreach ($ids as $id)
        {
            $this->_del($id , false);
        }
    }

    /*
     * Thuc hien xoa
     */
    private function _del($id, $rediect = true)
    {
        $info = $this->order_model->get_info($id);

        if(!$info)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại danh mục này');
            if($rediect)
            {
                redirect(admin_url('order'));
            }else{
                return false;
            }
        }

        //kiem tra xem danh muc nay co san pham khong
        $this->load->model('Orderdetails_model');
        $query=$this->db->query("SELECT * FROM orderdetails WHERE orderNumber = '$id'");
        $product=$query->result_array();
        if($product)
        {
            //tạo ra nội dung thông báo

            if($rediect)
            {
                $query=$this->db->query("DELETE FROM orderdetails WHERE orderNumber = '$id'");
            }else{
                return false;
            }
        }

        //xoa du lieu
        $this->order_model->delete($id);

    }
    
    function timkiem(){
        $this->load->model('customers_model');
        $phone= $this->input ->post('phone');
        $query = $this->db->query("SELECT *
                                FROM customers
                                WHERE customers.phone = '$phone'
                               ");
        $customers = $query->result_array();
        if ($customers){
            echo json_encode($customers[0]);
        }else{
            echo false;
        }
    }
}
