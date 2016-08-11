<?php
/**
 * Created by PhpStorm.
 * User: dell-pc
 * Date: 8/11/2016
 * Time: 9:32 AM
 */
    class Signup extends CI_Controller{
        function __construct()
        {
            ///
            parent::__construct();
            //load ra file model
            $this->load->model('product_model');
            $this->load->library('cart');

        }
        function index(){
            $carts = $this->cart->contents();
            $total_items = $this->cart->total_items();
            $this->data['carts'] = $carts;
            $this->data['total_items']  =$total_items;

            $this->data['temp'] = 'site/register';
            $this->load->view('site/layout', $this->data);
        }
    }
?>