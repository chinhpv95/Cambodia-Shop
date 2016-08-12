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

        }
        function index(){
            $carts = $this->cart->contents();
            $total_items = $this->cart->total_items();
            $this->data['carts'] = $carts;
            $this->data['total_items']  =$total_items;

            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;
            $this->data['temp'] = 'site/user/customer-info';
            $this->load->view('site/layout', $this->data);
        }
    }
?>