<?php
	Class Product extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //load ra file model
        $this->load->model('product_model');
        $this->load->library('cart');
        
    }

    function index($id)
    {
        $input = array();
        $input['where']['categoryId'] = $id;
        $total_rows =  $this->product_model -> get_total($input);

        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
        $config['base_url']   = 'http://localhost:8088/Project/product/index/'.$id."/"; //link hien thi ra danh sach san pham
        $config['per_page']   = 12;//so luong san pham hien thi tren 1 trang
        $config['uri_segment'] = 4;//phan doan hien thi ra so trang tren url

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        $config['first_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['prev_link']   = '<';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';

        $config['next_link']   = '>';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';

        $config['last_link'] = false;
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $segment = $this->uri->segment(4);
        $segment = intval($segment);

        $input['limit'] = array($config['per_page'], $segment);
        $input['where'] = array();
        $input['where']['categoryId'] = $id;

        $list = $this->product_model->get_list($input);
        $this->data['list'] = $list;

        $carts = $this->cart->contents();
        $total_items = $this->cart->total_items();
        $this->data['carts'] = $carts;
        $this->data['total_items']  =$total_items;

        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $this->data['temp'] = 'site/product/index';
        $this->load->view('site/layout', $this->data);
    }
}
?>
