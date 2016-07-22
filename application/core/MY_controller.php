<?php
/**
 * Created by PhpStorm.
 * User: Trần Huy Tiệp
 * Date: 07/08/16
 * Time: 08:32 AM
 */
class  MY_Controller extends CI_Controller{
    public $data = array();
    function  __construct()
    {
        parent:: __construct();
        $controller = $this->uri->segment(1);
        switch ($controller){
            case 'admin':
          {
              $this->load->helper('admin');
              $this->_check_login();
              break;
          }
          default:
          {
              $this->load->model('category_model');
              $category_list = $this->category_model->get_list();
              $this->data['category_list'] = $category_list;
             // pre($category_list);
          }
      }
    }

    private  function _check_login(){
    $controller = $this->uri->rsegment('1');
    $controller = strtolower($controller);
    $login = $this->session->userdata('login');;
        if (!$login && $controller != 'login'){
            redirect(admin_url('login'));
        }
        if($login && $controller == 'login')
        {
            redirect(admin_url('home'));
        }
    }
}