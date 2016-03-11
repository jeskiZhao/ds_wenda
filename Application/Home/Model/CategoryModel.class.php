<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Home\Model;
use Think\Model;
class CategoryModel extends Model {
    function father(){
        $fatherinfo=$this->where(array('pid'=>0))->select();
        return $fatherinfo;
    }
    function child($id){
        $info=$this->where(array('pid'=>$id))->select();
        return $info;
    }
}
?>
