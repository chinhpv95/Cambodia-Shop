<?php
/**
 * Created by PhpStorm.
 * User: dell-pc
 * Date: 8/11/2016
 * Time: 9:33 AM
 */
    class  Signin extends MY_Controller{
        function __construct()
        {
            parent::__construct();
            //load ra file model
            ///xxxxx
           // $this->load->model('product_model');
            $this->load->library('cart');
            $this->load->library("session");

        }

        //hàm đăng nhập
        function index(){

            $this->load->library('form_validation');
            $this->load->helper('form');
            if($this->input->post())
            {
                $this->form_validation->set_rules('name', 'Tên', 'required');
                $this->form_validation->set_rules('login' ,'login', 'callback_check_login');
                if($this->form_validation->run())
                {
                    $username = $this->input->post('name');
                    $query=$this->db->query("SELECT customerName FROM customers WHERE username = '$username'");
                    $data=$query->result_array();
                    $this->session->set_userdata('login', $data[0]);
                    $this->session->set_userdata('id', $username);
//                    pre($data);
                    redirect(base_url('home/index'));
                }
                else{
                    echo "Bạn đăng nhập không thành công";
                    //$this->session->set_flashdata('flash_message', "Bạn đăng nhập không thành công");
                    redirect(base_url('signin/index/'));
                }
            }

            $carts = $this->cart->contents();
            $total_items = $this->cart->total_items();
            $this->data['carts'] = $carts;
            $this->data['total_items']  =$total_items;

            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;
            $this->data['temp'] = 'site/user/login';
            $this->load->view('site/layout', $this->data);
        }
        function check_login()
        {
            $username = $this->input->post('name');
            $password = $this->input->post('passwd');

            $this->load->model('customers_model');
            $where = array('username' => $username , 'password' => substr(sha1($password),0,32))/*substr(sha1($password),0,32))*/;
            if($this->customers_model->check_exists($where))
            {
                return true;
            }
            $this->form_validation->set_message(__FUNCTION__, 'Không đăng nhập thành công');
            return false;
        }


        //hàm đăng xuất
        function logout()
        {

//            $this->session->sess_destroy();
            $this->session->unset_userdata('login');
            redirect(base_url('home/index'));
        }
    }
?>