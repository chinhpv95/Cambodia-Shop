
<?php
/**
 * Created by PhpStorm.
 * User: Trần Huy Tiệp
 * Date: 07/20/16
 * Time: 11:23 AM
 */
Class Cart extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //load ra file model
        $this->load->model('product_model');
        $this->load->library('cart');
       

    }
    function index()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');

        $this->load->library('cart');
        $this->load->library('form_validation');
        $this->load->helper('form');

        $name = $this->input ->post('name');
        $phone = $this->input ->post('phone');
        $address = $this->input ->post('address');
        $email = $this->input ->post('email');
        $identityCard = $this->input ->post('identityCard');

        $this->form_validation->set_rules('name', 'Tên', 'required');
        $this->form_validation->set_rules('phone', 'Số điện thoại', 'required');
        $this->form_validation->set_rules('address', 'Địa chỉ', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
       // $this->form_validation->set_rules('identityCard', 'Số CMND', 'required');
        if($this-> form_validation ->run()){
            $customers = array(
                'customerName'           => $name,
                'phone'          =>$phone,
                'address'        => $address,
                'email'          =>$email,
                'identityCard'   =>$identityCard
            );
            $this->load->model('customers_model');
            $where = array('phone'=>$phone,
                'customerName' => $name,
                'address' => $address);
            if ($this->customers_model->check_exists($where)== false){
                $this->customers_model->create($customers);
            }
                $query=$this->db->query("SELECT customerNumber
                                FROM customers
                                WHERE customers.phone = '$phone' AND customers.customerName =
                                 '$name'
                                ORDER BY customerNumber DESC 
                               ");
                $id=$query->result_array();
                $customerNumber = $id[0]['customerNumber'];
                $this->load->helper('date');
                date_default_timezone_set('Asia/Bangkok');
                $orders = array(
                    'createDate' => date('Y-m-d H:i:s'),
                    'status' => 'In Process',
                    'customerNumber' => $customerNumber,
                );

                $this->load->model('order_model');
                $this->order_model->create($orders);

                $carts = $this->cart->contents();
                $query=$this->db->query("SELECT  orderNumber
                                FROM orders
                                WHERE orders.customerNumber = '$customerNumber'
                                ORDER BY orderNumber DESC 
                               ");
                $orderNumber_id=$query->result_array();
                $orderNumber = $orderNumber_id[0]['orderNumber'];
//                 pre($orderNumber);
                foreach ($carts as $row)
                    {
                        $data = array(
                            'orderNumber'                => $orderNumber,
                            'productCode'                => $row['id'],
                            'quantityOrdered'            => $row['qty'],
                            'priceEach'                  => $row['price'],
                        );
                        $this->load->model('orderdetails_model');
                        if (  $this->orderdetails_model->create($data)){
                            sleep(1);
                            $this->cart->destroy();

                        } else   ;

                    }
            }


        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $carts = $this->cart->contents();
        //tong so san pham co trong gio hang
        $total_items = $this->cart->total_items();

        $this->data['carts'] = $carts;
        $this->data['total_items']  =$total_items;
        $this->data['temp'] = 'site/cart/index';
        $this->load->view('site/layout', $this->data);
    }

    function add()
    {
        //lay ra san pham muon them vao gio hang
        $this->load->model('product_model');
        $id = $this->uri->rsegment(4);
        if ($id != null){
            $catagory_ID = $this->uri->rsegment(3);
            $product = $this->product_model->get_info($id);
            //pre($product);
            if(!$product)
            {
                redirect();
            }
            //tong so san pham
            $qty = 1;
            $price = $product->price;

            $data = array();
            $data['id'] = $product->productCode;
            $data['qty'] = $qty;
            $data['name'] = $product->productName;
            $data['image_link']  = $product->image_link;
            $data['price'] = $price;
            $this->cart->insert($data);
            //chuyen sang trang danh sach san pham trong gio hang

            redirect(base_url('product/index/'.$catagory_ID));
        }else{
            $id = $this->uri->rsegment(3);
            $product = $this->product_model->get_info($id);
            //pre($product);
            if(!$product)
            {
                redirect();
            }
            //tong so san pham
            $qty = 1;
            $price = $product->price;

            $data = array();
            $data['id'] = $product->productCode;
            $data['qty'] = $qty;
            $data['name'] = $product->productName;
            $data['image_link']  = $product->image_link;
            $data['price'] = $price;
            $this->cart->insert($data);
            //chuyen sang trang danh sach san pham trong gio hang

            redirect(base_url());

        }
    }

    function update()
    {
        //thong gio hang
        $carts = $this->cart->contents();
        foreach ($carts as $key => $row)
        {
            //tong so luong san pham
            $total_qty = $this->input->post('qty_'.$row['id']);
            $data = array();
            $data['rowid'] = $key;
            $data['qty'] = $total_qty;
            $this->cart->update($data);
        }

        //chuyen sang trang danh sach san pham trong gio hang
        redirect(base_url('cart'));

        //chuyen sang trang danh sach san pham trong gio hang
       // redirect(base_url('cart'));
    }

    /*
     * Xoa sản phẩm trong gio hang
     */

    function delete()
    {
        $id = $this->uri->rsegment(3);
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
        redirect(base_url('cart'));
    }


    function check_phone(){
        $this->load->model('customers_model');
        $phone = $this->input ->post('phone');
        $where = array('phone'=>$phone);
        if ($this->customers_model->check_exists($where)){
            $this->form_validation->set_message(__FUNCTION__,'Khách hang đã tồn tại');
            return false;
        }else return true;
    }

//    function oder(){
//        $this->load->library('cart');
//        $this->load->library('form_validation');
//        $this->load->helper('form');
//
//        $name = $this->input ->post('name');
//        $phone = $this->input ->post('phone');
//        $address = $this->input ->post('address');
//        $email = $this->input ->post('email');
//        $identityCard = $this->input ->post('identityCard');
//
//        $this->form_validation->set_rules('name', 'Tên', 'required');
//        $this->form_validation->set_rules('phone', 'Số điện thoại', 'required|callback_check_phone');
//        $this->form_validation->set_rules('address', 'Địa chỉ', 'required');
//        $this->form_validation->set_rules('email', 'Email', 'required');
//        $this->form_validation->set_rules('identityCard', 'Số CMND', 'required');
//        if($this-> form_validation ->run()){
//            $customers = array(
//                'customerName'           => $name,
//                'phone'          =>$phone,
//                'address'        => $address,
//                'email'          =>$email,
//                'identityCard'   =>$identityCard
//            );
//            $this->load->model('customers_model');
//            $this->customers_model->create($customers);
//                $query=$this->db->query("SELECT customerNumber
//                                FROM customers
//                                WHERE customers.phone = '$phone'
//                               ");
//                $id=$query->result_array();
//                $customerNumber = $id[0]['customerNumber'];
//                $this->load->helper('date');
//                $orders = array(
//                    'createDate' => date('Y-m-d '),
//                    'status' => 'In Process',
//                    'customerNumber' => $customerNumber,
//                );
//
//                $this->load->model('order_model');
//                $this->order_model->create($orders);
//
//                $carts = $this->cart->contents();
//                $query=$this->db->query("SELECT orderNumber
//                                FROM orders
//                                WHERE orders.customerNumber = '$customerNumber'
//                               ");
//                $orderNumber_id=$query->result_array();
//                $orderNumber = $orderNumber_id[0]['orderNumber'];
//                foreach ($carts as $row)
//                    {
//                        $data = array(
//                            'orderNumber'                => $orderNumber,
//                            'productCode'                => $row['id'],
//                            'quantityOrdered'            => $row['qty'],
//                            'priceEach'                  => $row['price'],
//                        );
//                        $this->load->model('orderdetails_model');
//                        if (  $this->orderdetails_model->create($data)){
//
//                            $this->cart->destroy();
//                        }else   ;
//
//                    }
//            }
//
//        //pre(form_error('name')) ;
//
//
//        $total_items = $this->cart->total_items();
//        $this->data['total_items']  =$total_items;
//        $this->data['temp'] = 'site/cart/index';
//        redirect(base_url('cart'));
//       //
//    }
    
}