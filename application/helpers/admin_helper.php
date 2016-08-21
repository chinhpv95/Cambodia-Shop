<?php
//tao ra cac link trong admin
function admin_url($url = '')
{
    return base_url('admin/'.$url);
}
function radom($leng = 10,$char = false){
    if ($char ==false) $s='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefijghklmnopqrstuvwxyz0123456789!@#$%^&*()';
    else $s = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefijghklmnopqrstuvwxyz0123456789';
    mt_srand((double)microtime()*1000000);
    $salt = '';
    for ($i = 0;$i<$leng;$i++){
        $salt = $salt.substr($s,(mt_rand()%(strlen($s))),1);
    }
    return $salt;
}