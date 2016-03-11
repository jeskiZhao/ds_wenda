<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IndexModel
 *
 * @author jeski
 */
namespace Admin\Model;
use Think\Model;
class RoleModel extends Model{
    //put your code here
    //查询最高级模块
    function father(){
        $roleid=session(admin_role_id);
        //p($roleid);
        $sql="select role_auth_ids from ds_role where role_id=".$roleid;
        //权限id结果集
        $result=$this->query($sql);
        $ids=$result[0]['role_auth_ids'];
        $sql="select * from ds_auth where auth_level=0";
        if($roleid!=1){
            $sql.=" and auth_id in ($ids);";
        }
        $father=$this->query($sql);
        //p($father);
        return $father;
    }
        function child(){
        $roleid=session(admin_role_id);
        $sql="select role_auth_ids from ds_role where role_id=".$roleid;
        //权限id结果集
        $result=$this->query($sql);
        $ids=$result[0]['role_auth_ids'];
        $sql="select * from ds_auth where auth_level=1";
        if($roleid!=1){
            $sql.=" and auth_id in ($ids);";
        }
        $child=$this->query($sql);
        //p($father);
        return $child;
    }
}

?>
