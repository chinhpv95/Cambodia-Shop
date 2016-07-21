
<style type="text/css">
    @font-face {
        font-family: myFirstFont;
        src: url('public/fonts/custom.ttf');
    }

    div {
        font-family: myFirstFont;
    }
</style>


<?php
Class Home extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //load ra file model
        $this->load->model('product_model');
    }
    function index()
    {
        $total_rows = $this->product_model->get_total();
        $this->data['total_rows'] = $total_rows;
        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
        $config['base_url']   = 'http://localhost:8088/Project/home/index/'; //link hien thi ra danh sach san pham
        $config['per_page']   = 8;//so luong san pham hien thi tren 1 trang
        $config['uri_segment'] = 4;//phan doan hien thi ra so trang tren url
        $config['next_link']   = 'Trang kế tiếp';
        $config['prev_link']   = 'Trang trước';
        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);

        $segment = $this->uri->segment(3);
        $segment = intval($segment);

        $input = array();
        $input['limit'] = array($config['per_page'], $segment);
        $list = $this->product_model->get_list($input);
        $this->data['list'] = $list;
//        pre($list);

        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $this->data['temp'] = 'site/home/index';
        $this->load->view('site/layout', $this->data);
    }

    function information() {
        
        $this->data['temp'] = 'site/view-product';
        $this->load->view('site/layout', $this->data);
        
    }
    function product() {
        $this->data['temp'] = 'site/product/index';
       $this->load->view('site/layout', $this->data);
        
        
    }
}