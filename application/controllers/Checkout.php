



<?php
/**
 * Created by PhpStorm.
 * User: Trần Huy Tiệp
 * Date: 07/20/16
 * Time: 11:23 AM
 */
Class Checkout extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //load ra file model
        $this->load->model('product_model');
        $this->load->library('cart');
    }
    function index()
    {

        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        $carts = $this->cart->contents();
        $total_items = $this->cart->total_items();
        $this->data['carts'] = $carts;
        $this->data['total_items']  =$total_items;

        $this->data['temp'] = 'site/checkout/index';
        $this->load->view('site/layout', $this->data);
    }

}