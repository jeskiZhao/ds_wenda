<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ManagerController
 *
 * @author jeski
 */
namespace Admin\Controller;
use Think\Controller;
class ManagerController extends Controller{
    //put your code here
    //管理员展示函数
    public function showlist(){  
        //管理员信息
        $info=M('admin')->select();
        //p($info);
        //角色信息
        $role=M('role')->getField('role_id,role_name');
        $this->assign('info',$info);
        $this->assign('role',$role);
        $this->display();
    }
    //修改管理员信息
 public function edit($adminid){
     if(IS_POST){
          //$data['admin_account']=$_POST['username'];
         // $data['admin_pwd']=md5($_POST['passwdF']);
         // $data['admin_role_id']=$_POST['role'];
          $data=array('admin_pwd'=>md5($_POST['passwdF']),'admin_role_id'=>$_POST['role']);
          //p($data);
          $result=M('admin')->where('admin_id='.$adminid)->setField($data);
         if($result){
               $this->success('修改成功',U('Manager/showlist'));
            }
            else{
               $this->error('修改失败',U('Manager/showlist'));
            }
     }else{
     $id=$_GET['adminid'];
    //获得管理员信息
    $info=M('admin')->getByAdmin_id($id);
    //p($info);
    //获得角色信息
    $role=M('role')->select();
   // p($role);
    $this->assign('info',$info);
    $this->assign('role',$role);
    $this->display();
     }
  }
  //添加管理员函数
  function add(){
      if(IS_POST){
          //p($_POST);
          $data['admin_account']=$_POST['username'];
          $data['admin_pwd']=md5($_POST['passwdF']);
          $data['admin_role_id']=$_POST['role'];
          $result=M('admin')->add($data);
          if($result){
                $this->success('添加成功',U('Manager/showlist'));
            }
            else{
                $this->error('添加失败',U('Manager/add'));
            }
      }else{
        $info=M('role')->field('role_id,role_name')->select();
        //p($info);
        $this->assign('info',$info);
        $this->display();
      }
  }
  //删除管理员
  function del(){
       $id=$_GET['adminid'];
       $result=M('admin')->where('admin_id='.$id)->delete();
       if($result){
                $this->success('删除成功',U('Manager/showlist'));
            }
            else{
                $this->error('删除失败',U('Manager/showlist'));
            }
  }
}

?>
