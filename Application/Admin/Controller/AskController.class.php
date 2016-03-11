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
namespace Admin\Controller;
use Think\Controller;
class AskController extends CommonController{
    //put your code here
    public function index(){
        $u=M('ask');
        //$result=$u->select();
        $count=$u->count();
        $Page = new \Think\Page($count,9);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        $list = $u->limit($Page->firstRow.','.$Page->listRows)->order('time desc')->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
       // $this->assign('ask',$result);
        $this->display();
    }
    //未解决问题
     public function unsolve(){        
        $u=M('ask');
        $count=$u->where('solve=0')->count();
        $Page = new \Think\Page($count,9);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        $list = $u->where('solve=0')->limit($Page->firstRow.','.$Page->listRows)->order('time desc')->select();
        $this->assign('ask',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出      
        //$this->assign('ask',$result);
        $this->display();
    }
    //已经解决问题
     public function solve(){
         
        $u=M('ask');
        $count=$u->where('solve=1')->count();
        $Page = new \Think\Page($count,9);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        $list = $u->where('solve=1')->limit($Page->firstRow.','.$Page->listRows)->order('time desc')->select();
        $this->assign('ask',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出   
        //p($result);
        //$this->assign('ask',$result);
        $this->display();
    }
    //零回答问题
     public function zero(){
        $u=M('ask');
        $count=$u->where('answer=0')->count();
        $Page = new \Think\Page($count,9);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        $list = $u->where('answer=0')->limit($Page->firstRow.','.$Page->listRows)->order('time desc')->select();
        $this->assign('ask',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出   
        //p($result);
       // $this->assign('ask',$result);
        $this->display();
    }
    //删除
    function del(){
        $id=$_GET['id'];
        $result=M('ask')->delete($id);
        if($result){
            $this->success("删除成功",U('Ask/index'),1);
        }else{
              $this->error("删除失败",U('Ask/index'),1);

        }
    }
}

?>
