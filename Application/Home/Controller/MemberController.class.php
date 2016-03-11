<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MemberController
 *
 * @author jeski
 */
namespace Home\Controller;
use Think\Controller;
class MemberController extends Controller{
    //put your code here
    public function index(){
        $userid=session('user_id');
        $result=M('user')->where('id='.$userid)->select();
        $askinfo=M('ask')->where('uid='.$userid)->order('time desc')->limit(5)->select();   
        $answerinfo=M('answer')->where('uid='.$userid)->order('time desc')->limit(5)->select();
        $this->assign('user',$result[0]);
        $this->assign('askinfo',$askinfo);
        $this->assign('answerinfo',$answerinfo);
        $this->display();
    }
    
    //我的提问
    public function myask(){
        $uid=session('user_id');
        $ask=M('ask')->where('uid='.$uid)->limit(5)->order('time desc')->select();
        $this->assign('ask',$ask);
        $this->display();
    }
    //我的回答
    public function myanswer(){
        $uid=session('user_id');
        $answer=M('answer')->where('uid='.$uid)->limit(5)->order('time desc')->select();
        $this->assign('answer',$answer);
        $this->display();
    }
    //我的等级
    public function mylevel(){
        $uid=session('user_id');
        $coin=M('user')->where('id='.$uid)->field('experince')->select();
        $this->assign('exp',$coin[0]['experince']);
        $this->display();
    }
    //我的金币
    public function mycoin(){
        $uid=session('user_id');
        $coin=M('user')->where('id='.$uid)->field('coin')->select();
        $this->assign('coin',$coin[0]['coin']);
        $this->display();
    }
    //上传头像
    public function myface(){
        if(IS_POST){
          
          $upload = new \Think\Upload();
         // 实例化上传类
           $upload->maxSize   = 3145728 ;
            // 设置附件上传大小
            $upload->exts =  array('jpg', 'gif', 'png', 'jpeg');
             //设置附件上传类型
            $upload->rootPath = './';
            $upload->savePath  = 'Upload/'; 
            // 设置附件上传目录// 上传文件
             $info = $upload->upload();
            // p($info);
             if(!$info) {
             //上传错误提示错误信息   
                   $this->error($upload->getError());            
             }
             else{
             //上传成功 获取上传文件信息   
                 $path=__ROOT__."/".$info['face']['savepath'].$info['face']['savename'];
                 $userid=session('user_id');
                 M('user')->where('id='.$userid)->setField('face',$path);               
                  $this->redirect('Member/myface');
                
                 //$this->success("上传成功",U('Member/index'),1);   
              }
        }else{
            $userid=session('user_id');
            $result=M('user')->where('id='.$userid)->select();
            $this->assign("face",$result[0]['face']);
            $this->display();
        }
    }
//我的兑换
    function mygood(){
         $userid=session('user_id');
         $info=M('order')->where('uid='.$userid)->limit('5')->select();

        $this->assign("info",$info);
       
        $this->display();
    }
    //确认收货
    function gai(){
        $id=$_GET['id'];

        $result=M('order')->where('id='.$id)->setField('sure',1);
        if($result){
            $this->success('确认成功',U('Member/mygood'));
        }else{
             $this->error('确认失败',U('Member/mygood'));
        }
    }
}

?>
