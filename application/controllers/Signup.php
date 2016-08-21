<?php
/**
 * Created by PhpStorm.
 * User: dell-pc
 * Date: 8/11/2016
 * Time: 9:32 AM
 */
    class Signup extends MY_Controller{
        function __construct()
        {
            parent::__construct();
            $this->load->model('customers_model');
        }

        function index(){

            //load thu vien validation
            $this->load->library('form_validation');
            $this->load->helper('form');
            $this->load->library('cart');

            $carts = $this->cart->contents();
            $total_items = $this->cart->total_items();
            $this->data['carts'] = $carts;
            $this->data['total_items']  =$total_items;

            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;
            
            $this->data['temp'] = 'site/user/register';
            $this->load->view('site/layout', $this->data);
        }

        function register(){
            $this->load->library('form_validation');
            $this->load->helper('form');
//            $data = array(
//                    'customerName' => $this->input->post('customerName'),
//                    'email' => $this->input->post('email'),
//                    'username' => $this->input->post('username'),
//                    'password' => $this->input->post('password'),
//                    'phone' => $this->input->post('phone'),
//                    'address' => $this->input->post('address')
//                );
            $erro = array();
            //tao cac tap luat

            $this->form_validation->set_rules('customerName', 'Họ và tên', 'required|min_length[8]');
            $this->form_validation->set_rules('username', 'Tên đăng nhập', 'required|min_length[5]');
            //$this->form_validation->set_rules('customer_dateofbirth', 'Họ và tên', 'required|min_length[5]|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('phone', 'Số điện thoại', 'required|min_length[8]|numeric');
            $this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[6]');
            $this->form_validation->set_rules('passwd_confirm', 'Nhập lại mật khẩu', 'required|matches[password]');
            $this->form_validation->set_rules('address', 'Địa chỉ', 'required');
            //chạy phương thức kiểm tra dữ liệu
            //if($this->form_validation->run())
            if($this->form_validation->run()) {
                //code here
                $password = ($this->input->post('password'));
                $data = array(
                    'customerName' => $this->input->post('customerName'),
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'password' => substr(sha1($password),0,32),
                    'phone' => $this->input->post('phone'),
                    'address' => $this->input->post('address'),
                    'status' => '1',
                );
                //them thanh vien vao trong csdl
                if($this->check_user() == true && $this->check_phone() == true) {
                    if ($this->customers_model->create($data)) {
//                        $this->session->set_flashdata('message', 'Đăng ký thành công');
//                        redirect(base_url('home/index'));
                        $erro['thong_bao'] = 'Đăng ký thành công';
                    } else {
//                        $this->session->set_flashdata('message', 'Đăng ký thất bại');
//                        $erro['thong_bao'] = 'flase';
                    }
                }
                else{
//                    $this->session->set_flashdata('message', 'Tài khoản đã tồn tại');
//                    redirect(base_url('signup/index'));
                    if ($this->check_user() == false){
                        $erro['name_ton_tai'] = 'true';
                    }else if ($this->check_phone() == false){
                        $erro['phone_ton_tai'] = 'true';
                    } else {
                        $erro['thong_bao_tt'] = 'true';
                    }

                }
            }
            else{
                $erro = array(
                    'customer_fullname_er' => form_error('customerName'),
                    'customer_username_er' => form_error('username'),
                    'email_er' => form_error('email'),
                    'customer_phone_er' => form_error('phone'),
                    'passwd_er' => form_error('password'),
                    'passwd_confirm_er' => form_error('passwd_confirm'),
                    'customer_address_er' => form_error('address'),
                );
            }
            echo json_encode($erro);

//            pre($data);
        }
        
        function check_user()
        {
            $erro = array();
            $user = $this->input->post('username');
            $where = array('username'=>$user);
            if ($this->customers_model->check_exists($where)== true){
                return FALSE;
            }
            return TRUE;


        }

        function check_phone(){
            $erro = array();
            $phone = $this->input->post('phone');
            $where = array('phone'=>$phone);
            if($this->customers_model->check_exists($where) == true)
            {
                //trả về thông báo lỗi nếu đã tồn tại email này
                return FALSE;
            }
            return TRUE;
        }
    }
?>