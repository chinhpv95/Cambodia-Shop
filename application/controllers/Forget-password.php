<?php

    class  Forget_password extends CI_Controller{
        function __construct()
        {
            parent::__construct();
            //load ra file model
            ///xxxxx
            $this->load->model('product_model');
            $this->load->library('cart');

        }
        function index(){
            $carts = $this->cart->contents();
            $total_items = $this->cart->total_items();
            $this->data['carts'] = $carts;
            $this->data['total_items']  =$total_items;

            $this->data['temp'] = 'site/user/forget-password';
            $this->load->view('site/layout', $this->data);
        }
    }
?>