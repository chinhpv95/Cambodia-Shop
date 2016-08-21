<?php
/**
 * Created by PhpStorm.
 * User: tajse
 * Date: 8/12/2016
 * Time: 1:23 PM
 */

    class  Customer_info extends MY_Controller{
        function __construct()
        {
            parent::__construct();
            //load ra file model
            ///xxxxx
            //   $this->load->model('product_model');
            $this->load->library('cart');
            $this->load->model('customers_model');
            $this->load->library("session");

        }
        function index(){
            $this->load->model('customers_model');
            $id = $this->session->userdata("id");
            $input = array();
            $input['where']['username'] = $id;
            $list = $this->customers_model->get_list($input);
            $this->data['list'] = $list;
            
            $carts = $this->cart->contents();
            $total_items = $this->cart->total_items();
            $this->data['carts'] = $carts;
            $this->data['total_items']  =$total_items;

            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;
            $this->data['temp'] = 'site/user/show_infor';
            $this->load->view('site/layout', $this->data);
        }
        function edit_infor(){
            $this->load->model('customers_model');
            $this->load->library('form_validation');
            $this->load->helper('form');
            //get list
            $id = $this->session->userdata("id");
            $input = array();
            $input['where']['username'] = $id;
            $list = $this->customers_model->get_list($input);
            $this->data['list'] = $list;

            //sua thong tin
            $this->form_validation->set_rules('name', 'Họ và tên', 'required|min_length[8]');
            $this->form_validation->set_rules('address', 'Địa chỉ', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('tel', 'Số điện thoại', 'required|min_length[8]|numeric');
            $this->form_validation->set_rules('identityCard', 'Mật khẩu', 'required|min_length[6]');

            if($this->form_validation->run()) {
                $customerName = $this->input->post('name');
                $data = array(
                    'customerName' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    //'id' => $this->input->post('customer_username'),
                    //'password' => $this->input->post('passwd'),
                    'phone' => $this->input->post('tel'),
                    'address' => $this->input->post('address'),
                    'identityCard'=> $this->input->post('identityCard')
                );

                $this->db->where('username',$id);
                $this->db->update('customers',$data);

//                $info = $this->session->userdata("login");
//                $info['customerName'] =

                $data = $this->session->userdata('login');
                $data['customerName'] = $customerName;
                $this->session->set_userdata('login', $data);

                $this->session->set_flashdata('message', 'Sửa thông tin thành công');
                redirect(base_url('customer_info/'));
            }

            $carts = $this->cart->contents();
            $total_items = $this->cart->total_items();
            $this->data['carts'] = $carts;
            $this->data['total_items']  =$total_items;

            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;
            $this->data['temp'] = 'site/user/edit_infor';
            $this->load->view('site/layout', $this->data);
        }

        function edit_password(){
            $this->load->model('customers_model');
            $this->load->library('form_validation');
            $this->load->helper('form');
            //get list
            $id = $this->session->userdata("id");
            $input = array();
            $input['where']['username'] = $id;
            $list = $this->customers_model->get_list($input);
            $this->data['list'] = $list;

            $this->form_validation->set_rules('password_recent', 'Mật khẩu', 'required|min_length[6]');
            $this->form_validation->set_rules('password_new', 'Mật khẩu', 'required|min_length[6]');
            $this->form_validation->set_rules('password_confirm', 'Nhập lại mật khẩu', 'required|matches[password_new]');
            $data_update = $list[0];
//            pre($data_update);
            if($this->form_validation->run()) {
                $password = $this->input->post('password_new');
                if($this->check_pass($id) == true){

//                    $this->db->where('username',$id);
//                    $this->db->where('password',$this->input->post('password_recent'));
//                   $data_update = array(
//                       'customerName' =>$list[0]->customerName,
//                       'phone' => $list[0]->phone,
//                       'address' => $list[0]->address,
//                       'email'  => $list[0] ->email,
//                       'username' =>$list[0] ->username,
//                       'password'=> $password,
//
//                   );
                    $data_update->password = substr(sha1($password),0,32);
                    $this->customers_model->update($list[0]->customerNumber,$data_update);
                    $this->session->set_flashdata('message', 'Mật khẩu đã được đổi');
                    redirect(base_url('customer_info'));
                }
                else{
                    redirect(base_url('customer_info/edit_password'));
                }
            }
            
            $carts = $this->cart->contents();
            $total_items = $this->cart->total_items();
            $this->data['carts'] = $carts;
            $this->data['total_items']  =$total_items;

            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;
            $this->data['temp'] = 'site/user/edit_password';
            $this->load->view('site/layout', $this->data);
        }
        
        function check_pass($user)
        {
            $password = $this->input->post('password_recent');
            $where = array('username' => $user, 'password' => substr(sha1($password),0,32));
            if ($this->customers_model->check_exists($where) == null) {

                //$this->form_validation->set_message(__FUNCTION__, 'Password hiện tại không đúng');
                $this->session->set_flashdata('message', 'Mật khẩu hiện tại không đúng');
                return FALSE;
            }
            return TRUE;
        }
    }
?>