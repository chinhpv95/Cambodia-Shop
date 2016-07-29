

<?php
Class Home extends MY_Controller
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
        $total_rows = $this->product_model->get_total();
        $this->data['total_rows'] = $total_rows;
    //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
        $config['base_url']   = 'http://localhost:8088/Project/home/index/'; //link hien thi ra danh sach san pham
        $config['per_page']   = 12;//so luong san pham hien thi tren 1 trang
        $config['uri_segment'] = 3;//phan doan hien thi ra so trang tren url

    //bootstrap
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        $config['first_link'] = 'Đầu';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['prev_link']   = '<';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';

        $config['next_link']   = '>';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';

        $config['last_link'] = 'Cuối';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

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

        $carts = $this->cart->contents();
        $total_items = $this->cart->total_items();
        $this->data['carts'] = $carts;
        $this->data['total_items']  =$total_items;
        //pre($config['per_page']);
        $this->data['temp'] = 'site/home/index';
        $this->load->view('site/layout', $this->data);
        }



        function information($id) {
            $input = array();
            $input['where']['productCode'] = $id;
            $infor = $this->product_model->get_list($input);
            $this->data['infor'] = $infor;

            $carts = $this->cart->contents();
            $total_items = $this->cart->total_items();
            $this->data['carts'] = $carts;
            $this->data['total_items']  =$total_items;

            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;
            $this->data['temp'] = 'site/view-product';
            $this->load->view('site/layout', $this->data);


        }
        
    
    
    

}