<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AskController
 *
 * @author jeski
 */
namespace Home\Controller;
use Think\Controller;
class AskController extends CommonController{
    //put your code here
    public function index(){
         $result=M('category')->where('pid=0')->select();
        //p($result)      
       if($uid=session('user_id')){
           $coin=M('user')->where('id='.$uid)->field('coin')->select();
           $this->assign('coin',$coin);
           $this->assign('uid',$uid);
       }
        $this->assign('cate',$result);
       
        $this->display();
       
    }
    public function add(){
        //处理分词结果      
         $fen=fenci(I('content'));
         $arr=array();
         foreach($fen as $v){
              $arr[]=$v['word'];
         }
        $key= implode(",", $arr);
        //p($key);
        $data['kword']=$key;
        $data['content']=I('content'); 
        $data['reward']=I('reward');
        $data['cid']=I('cid');
        $data['uid']=I('uid');
        $data['time']=time();
       $result=M('ask')->add($data);
        if($result){
            M('user')->where('id='.session('user_id'))->setInc('coin',C('ASK'));     
            M('user')->where('id='.session('user_id'))->setInc('experince',C('LV_ASK'));
            M('user')->where('id='.session('user_id'))->setInc('ask',1);
            //减去提问悬赏值
            M('user')->where('id='.session('user_id'))->setDec('coin',$data['reward']);
           $this->success('提问成功!',U('Index/index'));
        }else{
            $this->error('提问失败!',U('Ask/index'));
        }
    }
    //返回分类
    function getCate(){
       if(!IS_AJAX) halt("请求错误");
       $pid=$_GET['pid'];
       //p($pid);
       $result=M('category')->where('pid='.$pid)->select();
       if($result){
           echo json_encode($result);
       }
       else{
           echo 0;
       }
    }
     function tui(){
        $ask=$_POST['info'];
         //$ask="石家庄铁道大学";
         $fen=tui($ask);
         foreach($fen as $v){
             $kone=$v['word'];
             $where=array("content like '%$kone%'");
             $rone=M('tui')->where($where)->select(); 
             if($rone){
                 break;
             }        
         }
         if($rone){
           echo json_encode($rone);
         }else{
            echo "1";
         }               
     }


}

?>

