<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Admin\Controller;
use Think\Controller;
class UserController extends CommonController{
    //put your code here
    public function index(){
        $result=M('user')->select();
        //p($result);
        $this->assign('result',$result);
        $this->display();
    }
    //锁定与解锁用户用户
    public function lock(){    
        $id=$_GET['id'];
        $lock=$_GET['suo'];
        if($lock==0){
           M('user')->where('id='.$id)->setField("suo",1);
           $this->redirect("User/index");
       }else{
           M('user')->where('id='.$id)->setField("suo",0);
           $this->redirect("User/index");

       }
    }
    //添加用户
    function  add(){
        if(IS_POST){
            $data['account']=$_POST['username'];
            $data['pwd']=md5($_POST['passwordF']);
            $result=M('user')->add($data);
               if($result){
                 $this->success('添加成功!',U('User/index'),1);
               }else{
                 $this->error('添加失败!',U('User/index'),1);
              }
          }else{
               $this->display();
           }
       
        }
    //已锁定用户
     public function locked(){
           $result=M('user')->where("suo=1")->select();
            $this->assign('result',$result);
            $this->display();
        }
        
}

?>
