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
            ///
            parent::__construct();
            //load ra file model
            $this->load->model('customers_model');


        }

        function index(){

            //load thu vien validation
            $this->load->library('form_validation');
            $this->load->helper('form');
            $this->load->library('cart');
            //tao cac tap luat

            $this->form_validation->set_rules('customer_fullname', 'Họ và tên', 'required|min_length[8]');
            $this->form_validation->set_rules('customer_username', 'Tên đăng nhập', 'required|min_length[5]|callback_check_user');
            //$this->form_validation->set_rules('customer_dateofbirth', 'Họ và tên', 'required|min_length[5]|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('customer_phone', 'Số điện thoại', 'required|min_length[8]|numeric');
            $this->form_validation->set_rules('passwd', 'Mật khẩu', 'required|min_length[6]');
            $this->form_validation->set_rules('passwd_confirm', 'Nhập lại mật khẩu', 'required|matches[passwd]');
            $this->form_validation->set_rules('customer_address', 'Địa chỉ', 'required');

            //chạy phương thức kiểm tra dữ liệu
            //if($this->form_validation->run())
            if($this->form_validation->run()) {
                //code here
                $data = array(
                    'customerName' => $this->input->post('customer_fullname'),
                    'email' => $this->input->post('email'),
                    'id' => $this->input->post('customer_username'),
                    'password' => $this->input->post('passwd'),
                    'phone' => $this->input->post('customer_phone'),
                    'address' => $this->input->post('customer_address')
                );
                //them thanh vien vao trong csdl
                if($this->customers_model->create($data))
                {
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
            }
            $carts = $this->cart->contents();
            $total_items = $this->cart->total_items();
            $this->data['carts'] = $carts;
            $this->data['total_items']  =$total_items;

            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;
            
            $this->data['temp'] = 'site/user/register';
            $this->load->view('site/layout', $this->data);
        }
        function check_user()
        {

            $user = $this->input->post('customer_username');
            $where = array();
            $where['id'] = $user;
            //kiểm tra điều kiện email có tồn tại trong csdl hay không
            if($this->customers_model->check_exists($where))
            {
                //trả về thông báo lỗi nếu đã tồn tại email này
                $this->form_validation->set_message(__FUNCTION__, 'Tên tài khoản đã có trong hệ thống');
                return FALSE;
            }
            return TRUE;
        }
    }
?>