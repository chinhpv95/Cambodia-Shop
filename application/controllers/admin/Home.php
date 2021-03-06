<?php
/**
 * Created by PhpStorm.
 * User: Trần Huy Tiệp
 * Date: 07/14/16
 * Time: 08:55 AM
 */
class Home extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        //load ra file model
        $this->load->model('order_model');
        $this->load->model('product_model');
    }
    function index(){
        $total_rows = $this->order_model->get_total();
        $this->data['total_rows'] = $total_rows;

        $total_rows_product = $this->product_model->get_total();
        $this->data['total_rows_product'] = $total_rows_product;

        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
        $config['base_url']   = admin_url('product/index'); //link hien thi ra danh sach san pham
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

        $query=$this->db->query("SELECT *,SUM(orderdetails.quantityOrdered*orderdetails.priceEach)
                                FROM orders,orderdetails  
                                WHERE  orderdetails.orderNumber = orders.orderNumber 
                                GROUP BY orders.orderNumber 
                                ORDER BY orders.orderNumber DESC 
                                LIMIT 10");
        $list=$query->result_array();
        $this->data['list'] = $list;

        $query1=$this->db->query("SELECT SUM(orderdetails.quantityOrdered*orderdetails.priceEach) FROM orderdetails");
        $list1=$query1->result_array();
        $this->data['tongso'] = $list1;


        $this->data['temp']='admin/home/index';
        $this->load->view('/admin/main',$this->data);
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
}
