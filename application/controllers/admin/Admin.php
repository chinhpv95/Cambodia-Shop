<?php
/**
 * Created by PhpStorm.
 * User: Trần Huy Tiệp
 * Date: 07/08/16
 * Time: 10:47 AM
 */
class Admin extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }
    function index()
    {
        $input['order'] = array('id','AESC');
        $list = $this->admin_model->get_list($input);
        $this->data['list'] = $list;

        $total = $this->admin_model->get_total();
        $this->data['total'] = $total;

        $message = $this->session->flashdata('message');
        $this->data['message'] =$message;

        $this->data['temp'] = 'admin/admin/index';
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
    function add(){
        //pre(radom(32,true));
        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Tên', 'required');
            $this->form_validation->set_rules('email', 'Tên', 'required');
            $this->form_validation->set_rules('username', 'Tài khoản đăng nhập', 'required|min_length[4]|callback_check_username');
            $this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[8]');
            $this->form_validation->set_rules('re_password', 'Nhập lại mật khẩu', 'required|matches[password]');
            if ($this->form_validation->run()){
                $name = $this->input->post('name');
                $email = $this->input->post('email');
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $newpass = radom(32,true);
                $data = array(
                    'name'       => $name,
                    'username'   => $username,
                    'email'      => $email,
                    'password'   => sha1($password),
                    'newpass'    =>$newpass
                );
               
                if ($this->admin_model->create($data)){
                    //echo ("<script type='text/javascript'>alert('Thêm mới thành công!.')</scrip>");
                    //echo 'thêm moi hnah cog';
                    $this->session->set_flashdata('message','Thêm mới thành công');
                }else {
                    $this->session->set_flashdata('message','Thất bại');
                }
                redirect(admin_url('admin'));
                
            }

        }
        $this->data['temp'] = 'admin/admin/add';
        $this->load->view('admin/main', $this->data);

    }

    function edit(){

        $id = $this->uri->rsegment(3);
        $id = intval($id);

        $this->load->library('form_validation');
        $this->load->helper('form');

        $info  = $this->admin_model->get_info($id);
        if (!$info){
            $this->session->set_flashdata('message','Không tồn tại quản trị viên!.');
            redirect(admin_url('admin'));
        }
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Tên', 'required');
            $this->form_validation->set_rules('email', 'Tên', 'required');
            $this->form_validation->set_rules('username', 'Tài khoản đăng nhập', 'required|min_length[5]');
            $password = $this->input->post('password');
            if ($password){
                $this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[8]');
                $this->form_validation->set_rules('re_password', 'Nhập lại mật khẩu', 'required|matches[password]');
            }
            if ($this->form_validation->run()){
                $name = $this->input->post('name');
                $email = $this->input->post('email');
                $username = $this->input->post('username');

                $data = array(
                    'name' => $name,
                    'username' => $username,
                    'email' => $email

                );
                if ($password){
                    $data['$password'] = sha1($password);
                }

                if ($this->admin_model->update($id,$data)){
                    //echo ("<script type='text/javascript'>alert('Thêm mới thành công!.')</scrip>");
                    //echo 'thêm moi hnah cog';
                    $this->session->set_flashdata('message','Cập nhập thành công');
                }else {
                    $this->session->set_flashdata('message','Thất bại');
                }
                redirect(admin_url('admin'));
            }
        }
        $this->data['info'] = $info;
        $this->data['temp'] = 'admin/admin/edit';
        $this->load->view('admin/main', $this->data);

    }
    
    function delete(){
        $id = $this->uri->rsegment(3);
        $id = intval($id);

        $this->load->library('form_validation');
        $this->load->helper('form');

        $info  = $this->admin_model->get_info($id);
        if (!$info){
            $this->session->set_flashdata('message','Không tồn tại quản trị viên!.');
            redirect(admin_url('admin'));
        }

        if ($this->admin_model->delete($id)){
            $this->session->set_flashdata('message','Xóa tài khoản thành công!.');
        }else $this->session->set_flashdata('message','Xóa tài khoản thất bại');
        redirect(admin_url('admin'));
    }
    
    function logout(){
        if($this->session->userdata('login_admin')){
//            $this->session->sess_destroy();
            $this->session->unset_userdata('login_admin');
        }
        redirect(admin_url('login'));
    }
}