<?php
/**
 * Created by PhpStorm.
 * User: Trần Huy Tiệp
 * Date: 07/08/16
 * Time: 10:43 AM
 */
class  Product_model extends MY_Model{
    var $table = 'products';
    var $key = 'productCode';
    function querry($xxx){
        $this->db->where("categoryID",$xxx);
        
    }
}