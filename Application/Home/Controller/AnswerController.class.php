<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AnswerController
 *
 * @author jeski
 */
namespace Home\Controller;
use Think\Controller;
class AnswerController extends Controller{
    //put your code here
    public function answer(){
        //p($_POST);
        $data['content']=$_POST['content'];
        $data['aid']=$_POST['aid'];
        $data['uid']=session('user_id');
        $data['time']=time();
        $result=M('answer')->add($data);
        if($result){
            M('user')->where('id='.session('user_id'))->setInc('coin',C('ANSWER'));
            M('user')->where('id='.session('user_id'))->setInc('experince',C('LV_ANSWER'));
            M('user')->where('id='.session('user_id'))->setInc('answer',1);
            M('ask')->where('id='.$data['aid'])->setInc('answer',1);

            $this->success("回答成功!",$_SERVER['HTTP_REFERER']);
        }else{
            $this->error("回答失败!");
        }
    }
}

?>
