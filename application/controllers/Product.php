

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
	Class Cart extends MY_Controller
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
        $this->data['temp'] = 'site/product/index';
        $this->load->view('site/layout', $this->data);
    }
    
}
?>
