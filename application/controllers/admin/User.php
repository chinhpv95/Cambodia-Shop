<?php
/**
 * Created by PhpStorm.
 * User: Trần Huy Tiệp
 * Date: 07/08/16
 * Time: 10:47 AM
 */
class User extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }
    function index()
    {
        $input['order'] = array('customerNumber','AESC');
        $input['where']['status'] = '1';
        $list = $this->user_model->get_list($input);
        $this->data['list'] = $list;

        $total = $this->user_model->get_total();
        $this->data['total'] = $total;
//        pre($this->data);
        $message = $this->session->flashdata('message');
        $this->data['message'] =$message;
        //pre($this->data);
        $this->data['temp'] = 'admin/user/index';
        $this->load->view('admin/main', $this->data);

    }
    
    function check_username(){
        $username = $this->input->post('username');
        $where = array('username'=>$username);
        if ($this->admin_model->check_exists($where)){
            $this->form_validation->set_message(__FUNCTION__,'Tài khoản đã tồn tại');
            return false;
        }else return true;
    }

    function delete(){
        $id = $this->uri->rsegment(3);
        $id = intval($id);

        $this->load->library('form_validation');
        $this->load->helper('form');

        $info  = $this->user_model->get_info($id);
        if (!$info){
            $this->session->set_flashdata('message','Không tồn tại quản trị viên!.');
            redirect(admin_url('admin'));
        }

        if ($this->user_model->delete($id)){
            $this->session->set_flashdata('message','Xóa tài khoản thành công!.');
        }else $this->session->set_flashdata('message','Xóa tài khoản thất bại');
        redirect(admin_url('user/index'));
    }

    function logout(){
        if($this->session->userdata('login')){
            $this->session->sess_destroy();
        }
        redirect(admin_url('login'));
    }
    
    
    
}