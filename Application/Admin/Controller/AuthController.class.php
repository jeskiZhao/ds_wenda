<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AuthController
 *
 * @author jeski
 */
namespace Admin\Controller;
use Think\Controller;
class AuthController extends Controller{
    //put your code here
    //权限列表
    public function index(){
        $auth=M('auth')->order('auth_path')->select();
       // p($auth);
        $this->assign('auth',$auth);
        $this->display();
    }
    //添加权限
    function add(){
        if(IS_POST){
           // p($_POST);
            $data['auth_name']=I('authname');
            $data['auth_pid']=I('authpid');
            $data['auth_c']=I('auth_c');
            $data['auth_a']=I('auth_a');
            $authpath=M('auth')->where("auth_id=".$data['auth_pid'])->field('auth_path')->select();
            //p($authpath[0][auth_paht]);        
            $result=M('auth')->add($data);   
            if($result){
               $str=$authpath[0]['auth_path']."-".$result;
               //全路径
               $path=ltrim($str,"-");
               //权限等级
               $level=count(explode("-",$path))-1;
               M('auth')->where('auth_id='.$result)->setField('auth_path',$path);
               M('auth')->where('auth_id='.$result)->setField('auth_level',$level);
               $this->success('添加成功！',U('Auth/index'));
              
            }else{
                $this->error('添加失败,请重新添加！',U('Auth/add'));
            }
        }else{
            $info=M('Auth')->where("auth_level<2")->select();
            //$two=M('Auth')->where("auth_level=1")->select();
          
        foreach($info as  &$v){
            $v['auth_name']=str_repeat("--/", $v['auth_level']). $v['auth_name'];
        }            
            $this->assign('one',$info);     
              //p($info);
            $this->display();
        }
    }
}

?>
