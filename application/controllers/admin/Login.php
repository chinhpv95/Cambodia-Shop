<?php
Class Login extends MY_controller{

    function index()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
        if($this->input->post())
        {
            $username = $this->input->post('username');
            $this->form_validation->set_rules('login' ,'login', 'callback_check_login');
            if($this->form_validation->run())
            {
                $query=$this->db->query("SELECT name FROM admin WHERE username = '$username'");
                $data=$query->result_array();
                $this->session->set_userdata('login_admin', $data[0]);
                redirect(admin_url('home'));

            }
        }

        $this->load->view('admin/login/index');
    }

    /*
     * Kiem tra username va password co chinh xac khong
     */
    function check_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');


        $this->load->model('admin_model');
        $where = array('username' => $username , 'password' => substr(sha1($password),0,32));
        if($this->admin_model->check_exists($where))
        {
            return true;
        }
        $this->form_validation->set_message(__FUNCTION__, 'Không đăng nhập thành công');
        return false;
    }
}