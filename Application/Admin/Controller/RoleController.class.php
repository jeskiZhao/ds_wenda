<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RoleController
 *
 * @author jeski
 */
namespace Admin\Controller;
use Think\Controller;
class RoleController extends Controller{
    //put your code here
    //角色列表
    function index(){
        $info=M('role')->Field('role_id,role_name')->select();
        $this->assign('info',$info);
        //p($info);
        $this->display();
    }
    //添加管理员
    function add(){
        if(IS_POST){
            $data['role_name']=$_POST['role'];
            $result=M('role')->add($data);
            if($result){
                $this->success('添加成功',U('Role/index'));
            }
            else{
                $this->error('添加失败',U('Role/add'));
            }
        }else{
           $this->display();
        }
        
        
        }
    //删除管理员
     function del(){
         $roleid=$_GET['adminid'];
         $result=M('Role')->delete($roleid);
          if($result){
                $this->success('删除成功',U('Role/index'));
            }
            else{
                $this->error('删除失败',U('Role/index'));
            }
         
     }
     //分配权限
     function distribute($roleid){
        if(IS_POST){
            //p($_POST);
            //角色id
            $r=$_POST['id'];
            ////p($r);
            $ids=$_POST['group'];
            $ids=implode(',',$ids);
            $data['role_auth_ids']=$ids;
           // p($data);
            $result=M('role')->where('role_id='.$r)->save($data);
            if($result){
               $this->success('权限分配成功',U('Role/index'),1);
            }
            else{
               $this->error('权限分配失败',U('Role/distribute',1));
            }
            
        }else{
         $auth=M('auth')->where('auth_level=0')->select();
         $sonauth=M('auth')->where('auth_level=1')->select();
         $result=M('role')->where('role_id='.$roleid)->field('role_auth_ids')->select();
         $ids=explode(',', $result[0]['role_auth_ids']);
        // p($ids);
         $this->assign('roleid',$roleid);
         $this->assign('auth',$auth);
         $this->assign('sonauth',$sonauth);
         $this->assign('ids',$ids);
         $this->display();
        }
     }
     //修改权限
        
  }

?>
