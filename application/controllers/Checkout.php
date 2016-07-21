

<style type="text/css">
    @font-face {
        font-family: myFirstFont;
        src: url('public/fonts/custom.ttf');
    }

    div {
        font-family: myFirstFont;
    }
</style>

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
    }
    function index()
    {

        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $this->data['temp'] = 'site/checkout/index';
        $this->load->view('site/layout', $this->data);
    }

}