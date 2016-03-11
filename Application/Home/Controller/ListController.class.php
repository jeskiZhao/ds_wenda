<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ListController
 *
 * @author jeski
 */
namespace Home\Controller;
use Think\Controller;
class ListController extends CommonController{
    //put your code here
    public function index(){
        $cid=$_GET['cid'];
        //面包屑
        $cinfo=M('category')->select();
        $bread=get_father($cinfo,$cid);
       // p(array_reverse($bread));
        //父分类下的子分类
        $info=M('category')->where("pid=".$cid)->select();
        $ids=get_ids($info,id); 
        $ids[]=$cid;
        //p($info);
         //p($ids);
        //不存在子类
        if(!$info){              
              $pid=M('category')->where("id=".$cid)->getField('pid');
              //本身不存在
              if(!$pid){
                  $info=M('category')->where("pid=0")->select();
                  $ids=get_ids($info,id); 
              
             }else{
                 //本身存在
                  $info=M('category')->where("pid=".$pid)->select();  
              }
            
        }
       $ask=D('AskView');
       $where=array('cid'=>array('IN',$ids));
       //$result=$ask->where($where)->order('time desc')->select();
       
        $count=$ask->where($where)->count();
        $Page = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        $list =$ask->where($where)->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('ask',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('info',$info);
        $this->assign('bread',  array_reverse($bread));
       // $this->assign('ask',$result);
        $this->display();
    }
}

?>
