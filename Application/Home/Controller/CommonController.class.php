<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginController
 *
 * @author jeski
 */
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller{
    //put your code here
    //登录
    function login(){
        if(IS_POST){           
            $name=I('account');
            $pwd=md5(I('pwd'));
            $where=array('account'=>$name,'pwd'=>$pwd);
            $result=M('user')->where($where)->select();
            //p($result);
            if($result){
                session('user_account',$result[0]['account']);
                session('user_id',$result[0]['id']);
                M('user')->where('id='.session('user_id'))->setInc('coin',2);
                M('user')->where('id='.session('user_id'))->setInc('experince',C('LV_LOGIN'));
                redirect($_SERVER['HTTP_REFERER']);
            }else{
                $this->error('登录失败',U('Index/index'));
            }
        }
    }
    //注册
    function register(){
       $user=M('user');
       $data['account']=I('username');
        $data['pwd']=md5(I('pwd'));
       $result=$user->add($data);
        if($result){
            $this->success('注册成功',U('Index/index'),2);
        }else{
           $this->success('注册失败',U('Index/index'),2);
        }
        
    }
    //退出登录
    function logout(){
        session(null); 
        $this->redirect('Index/index');
        }
}
?>
