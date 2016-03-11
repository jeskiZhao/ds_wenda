<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of QuestionController
 *
 * @author jeski
 */
namespace Home\Controller;
use Think\Controller;
class QuestionController extends CommonController{
    //put your code here
    public function index(){
        $id=$_GET['qid'];
        //p($id);
        $where=array("ask.id"=>$id);
        $result=D('AskinfoView')->where($where)->select();
        //点击访问量
         M('ask')->where('id='.$id)->setInc('dian',1);
         //面包屑
        $cinfo=M('category')->select();   
        $bread=get_father($cinfo,$result[0]['cid']);
         //  p($bread);
        if(!$result){
            $this->redirect("List/index",array('cid'=>0));
        }
        $answer=M('answer')->where('aid='.$id)->order("time desc")->select();       
        $anum=M('answer')->where('aid='.$id)->count();     
      
        //相关问题以关键词
        $same=D('AskinfoView')->where("kword='".$result[0]['kword']."'")->select();
       //p($same);
        $this->assign('anum',$anum);
        $this->assign('same',$same);
        $this->assign('answer',$answer);
        $this->assign('info',$result[0]);
        $this->assign('bread',  array_reverse($bread));
       
        $this->display();
    }
    //采纳答案
    public function adopt(){
        //问题的id
        $qid=$_GET['qid'];
        //回答的id
        $aid=$_GET['aid'];
        //用户的id
        $uid=M('answer')->where('id='.$aid)->field('uid')->select();
        M('user')->where('id='.$uid[0]['uid'])->setInc('coin',C('ACCEPT'));
        M('user')->where('id='.$uid[0]['uid'])->setInc('experince',C('LV_ADOPT'));
        M('answer')->where('id='.$aid)->setField('adopt',1);
        M('ask')->where('id='.$qid)->setField('solve',1);
        $this->redirect("Question/index",array('qid'=>$qid));
    }

}

?>
