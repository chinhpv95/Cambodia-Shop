<?php
function public_url($url = '')
{
	return base_url('application/views'.$url);
}

function pre($list, $exit = true)
{
    echo "<pre>";
    print_r($list);
    if($exit)
    {
        die();
    }
}

function content_url($url = '')
{
	return base_url('upload/content/'.$url);
}

function body_url($url = '')
{
	return base_url('upload/product/'.$url);
}