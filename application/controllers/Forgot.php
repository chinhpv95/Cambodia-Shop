<?php
Class Forgot extends MY_controller
{

    function index()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');


        if ($this->input->post()){
            $this->form_validation->set_rules('username', 'Tên đăng nhập', 'required');
            $this->form_validation->set_rules('email', 'Email xác nhận', 'required');
            $this->form_validation->set_rules('login', 'login', 'callback_check_username');
            if ($this->form_validation->run()){

                $username = $this->input->post('username');
                $email = $this->input->post('email');
                $input =array(
                    'username' => $username,
                    'email'    => $email
                );
                $this->load->model('admin_model');
                $input['where'] = array('username' => $username);
                $info = $this->admin_model->get_list($input);
                 if($this->sendmail($email,$info[0]->name,$info[0]->newpass)){
                    $this->session->set_userdata('forgot', $info[0]);
                    redirect(base_url('forgot/confirm'));
                 }


            }

        }
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->view('admin/forgot/index');
    }

    function check_username(){
        $this->load->model('admin_model');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $where = array('username'=>$username, 'email'    => $email);
        if ($this->admin_model->check_exists($where)){
            return true;
        }else
            $this->form_validation->set_message(__FUNCTION__,'Tài khoản đã tồn tại');

        return false;
    }

    function sendmail($to_mail,$username,$newpass){

        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_port'] = 465;
        $config['smtp_user'] = 'tranhuytiep95@gmail.com';
        $config['smtp_pass'] = 'huytiep2521995';

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        $this->email->from('tranhuytiep95@gmail.com', 'Admin');
        $this->email->to($to_mail);

        $this->email->subject('Mã xác nhận.');
        $this->email->message('
        Hi,'.$username.',
        Mã xác nhận thay đổi mật khẩu:
        '.$newpass.'');

        if ( ! $this->email->send())
        {
            // Generate error
            return false;
        }else{
            return true;
        }

    }

    function confirm(){

        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->view('admin/forgot/confirm');
    }





}