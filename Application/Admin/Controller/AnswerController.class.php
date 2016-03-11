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
namespace Admin\Controller;
use Think\Controller;
class AnswerController extends CommonController{
    //put your code here
    public function index(){
        $a=M('answer');
       // $result=$a->select();
        $count=$a->count();
        $Page = new \Think\Page($count,9);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        $list = $a->limit($Page->firstRow.','.$Page->listRows)->order('time desc')->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        //p($result);
       // $this->assign('answer',$result);
        $this->display();
    }
    //未采纳回答
    public function  unadopt(){
        
         $a=M('answer');
       // $result=$a->select();
        $count=$a->where("adopt=0")->count();
        $Page = new \Think\Page($count,9);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        $list = $a->where("adopt=0")->limit($Page->firstRow.','.$Page->listRows)->order('time desc')->select();
        $this->assign('answer',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        
        //$result=M('answer')->where("adopt=0")->select();
        //p($result);
        //$this->assign('answer',$result);
        $this->display();
    }
    //未采纳回答
    public function adopt(){
          $a=M('answer');
       // $result=$a->select();
        $count=$a->where("adopt=1")->count();
        $Page = new \Think\Page($count,9);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        $list = $a->where("adopt=1")->limit($Page->firstRow.','.$Page->listRows)->order('time desc')->select();
        $this->assign('answer',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        
       // $result=M('answer')->where("adopt=1")->select();
        //p($result);
       // $this->assign('answer',$result);
        $this->display();
    }

    //删除函数
    public function del(){
        $id=$_GET['id'];
        $result=M('answer')->delete($id);
        if($result){
            $this->success("删除成功",U('Answer/index'),1);
        }else{
              $this->error("删除失败",U('Answer/index'),1);

        }
    }
}

?>
