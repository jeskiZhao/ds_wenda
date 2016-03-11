<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ShopController
 *
 * @author jeski
 */
namespace Home\Controller;
use Think\Controller;
class ShopController extends Controller{
    //put your code here
    public function index(){
        $lun=M('daohang')->where('kai=1')->select();
        $notice=M('notice')->order('time desc')->limit('3')->select();
        $tuibiao=M('recommend')->select();
        $this->assign("biao1",$tuibiao[0]);
        $this->assign("biao2",$tuibiao[1]);
        $this->assign("biao3",$tuibiao[2]);
        $b1=D('RecommendView')->where('cid='.$tuibiao[0]['gcid'])->select();
        $b2=D('RecommendView')->where('cid='.$tuibiao[1]['gcid'])->select();
        $b3=D('RecommendView')->where('cid='.$tuibiao[2]['gcid'])->select();
        $this->assign('b1',$b1);
        $this->assign('b2',$b2);
        $this->assign('b3',$b3);
        $this->assign('notice',$notice);
        $this->assign('lun',$lun);
        $this->display();
    }
    //礼品馆
    function hall(){
            $id=$_GET['id'];
            $u=M('goods');
            if($id!=1){
             // $goods=$u->where("cid=".$id)->select();
              $count=$u->where("cid=".$id)->count();
              $Page = new \Think\Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数(25)
              $show = $Page->show();// 分页显示输出
              $list = $u->where("cid=".$id)->limit($Page->firstRow.','.$Page->listRows)->select();
            }else{
                //$goods=$u->select();   
              $count=$u->count();
              $Page = new \Think\Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数(25)
              $show = $Page->show();// 分页显示输出
              $list = $u->limit($Page->firstRow.','.$Page->listRows)->select();
            }     
        $this->assign('goods',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出 
            
         $result=M('gcategory')->select(); 
         $this->assign('result',$result);      
        // $this->assign('goods',$goods);
         $this->display();
    }
    //礼品
    function thing(){
        $uid=session('user_id');
        if($uid){
            $coin=M('user')->where('id='.$uid)->field('coin')->select();
            $this->assign('coin',$coin[0]['coin']);
        }
        $result=M('gcategory')->select(); 
        $this->assign('result',$result); 
        $gid=$_GET['gid'];
        $ginfo=M('goods')->where("id=".$gid)->select();
        $this->assign("ginfo",$ginfo[0]);
        $this->display();
    }
    //公告
    public function notice(){
        $id=$_GET['id'];
        $result=M('notice')->where("id=".$id)->select();
        $this->assign('result',$result[0]);
        $this->display();
    }
    //个人信息
    public function address(){
         if(IS_POST){
            $id=session('user_id');
            $uinfo=M('user')->where('id='.$id)->select();
            //p(uinfo);
        }else{
            $gid=$_GET['gid'];
            $id=session('user_id');
            $uinfo=M('user')->where('id='.$id)->select();
            $ginfo=M('goods')->where('id='.$gid)->select();
            $this->assign('uinfo',$uinfo[0]);
            $this->assign('ginfo',$ginfo[0]);
            $this->display();
        }
    }
    //订单
    public function order(){
            $data['gid']=$_POST['gid'];
            $data['gname']=$_POST['gname'];
            $data['address']=$_POST['address'];
            $data['realname']=$_POST['realname'];
            $data['phone']=$_POST['phone'];           
            $data['uid']=session('user_id');
            $data['time']=time();     
            $result=M('order')->add($data);
            if($result){
                 $gcost=$_POST['gcost'];
                 //p($gcost);
                 M('goods')->where('id='.$data['gid'])->setDec('num',1);
                 M('user')->where('id='.$data['uid'])->setDec('coin',$gcost);
                $this->success('提交成功！请等待发货',U('Shop/index'));
            }else{
                 $this->error('提交失败');
            }
           
     
    }
    //个人信息填写
    function person(){
        if(IS_POST){
           $id=session('user_id');
           $gid=$_POST['gid'];
           $data['realname']=$_POST['realname'];
           $data['address']=$_POST['address'];
           $data['phone']=$_POST['phone'];
           $result=M('user')->where('id='.$id)->save($data);
        if($result){
             $this->success('添加成功','address/gid/'.$gid);
        }else{
            $this->error("添加失败");
        }
        }else{
             $gid=$_GET['gid'];
             $id=session('user_id');
             $result=M('user')->where('id='.$id)->select();
             $this->assign('info',$result[0]);
             $this->assign('gid',$gid);
             $this->display();
        }
    }
}

?>
