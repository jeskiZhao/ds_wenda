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
namespace Admin\Controller;
use Think\Controller;
class ShopController extends CommonController{
    //put your code here
    //轮播的设置
    function lun(){  
         $a=M('daohang');
       // $result=$a->select();
        $count=$a->count();
        $Page = new \Think\Page($count,4);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        $list = $a->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('result',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        
        //$result=M('daohang')->select();
        //$this->assign('result',$result);
        $this->display();
    }
    //开关轮播图
    public function kailun(){
           $id=$_GET['id'];
           $kai=M('daohang')->where('id='.$id)->field('kai')->select();
           if($kai[0]['kai']=="1"){
               M('daohang')->where('id='.$id)->setField('kai',0);
           }else{
                M('daohang')->where('id='.$id)->setField('kai',1);
           }
            $this->redirect('Shop/lun');
    }
    //添加轮播图片
    function addlun(){
        if(IS_POST){
             $upload = new \Think\Upload();// 实例化上传类   
             $upload->maxSize   =     3145728 ;// 设置附件上传大小  
             $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型   
             $upload->rootPath  = './'; // 设置附件上传目录    // 上传文件  
             $upload->savePath  = './Upload/'; // 设置附件上传目录    // 上传文件  
             $info   =   $upload->upload();   
            if(!$info) {// 上传错误提示错误信息     
              $this->error($upload->getError());   
              }
             else{// 上传成功      
                            $path=__ROOT__."/".$info['pic']['savepath'].$info['pic']['savename'];
                            $data['pic']=$path;
                            $data['content']=$_POST['content'];
                            $data['lian']=$_POST['lian'];
                            $data['kai']=$_POST['kai'];
                            $result=M('daohang')->add($data);
                             if($result){
                                    $this->success('添加成功！', U('Shop/lun'));
                                  } else {
                                      $this->error('添加失败！');
                                  }
                 }
             }
          else{
              $this->display();
            }
    }
   //删除轮播
     function dellun(){
         $id=$_GET['id'];
         $result=M('daohang')->delete($id);
         if($result){
            $this->success('删除成功！', U('Shop/lun'));
            }else {
              $this->error('删除失败！');
          }
     }
     
    //公告的显示
    public function notice(){
          $a=M('notice');
       // $result=$a->select();
        $count=$a->count();
        $Page = new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        $list = $a->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('good',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        
        //$result=M('notice')->select();
        //$this->assign('good',$result);
        $this->display();
    }
    public function addnotice(){
        if(IS_POST){
            $data['title']=$_POST['name'];
            $data['content']=$_POST['introduce'];
            $data['time']=time();
            $result=M('notice')->add($data);
            if($result){
                $this->success("添加成功！",U('Shop/notice'));
            }else{
                 $this->error("添加失败！",U('Shop/addnotice'));
            }
        }else{
            $this->display();
        }
    }
    //推荐的设置
    function recommend(){
        //推荐分类的信息
        $rem=M('Recommend')->select();
        $this->assign('rem',$rem);
        $this->display();
    }
    //修改推荐
    function editrecommend(){
        if(IS_POST){
           $id=$_POST['rid'];
           $gcid=$_POST['lei'];
           $name=M('gcategory')->where('id='.$gcid)->field('name')->select();
           M('recommend')->where('id='.$id)->setField('name',$name[0]['name']);
           $result=M('recommend')->where('id='.$id)->setField('gcid',$gcid);
           if($result){
                $this->success("修改成功！",U('Shop/recommend'));
            }else{
                 $this->error("修改失败！",U('Shop/recommend'));
            }
        }else{
           $rid=$_GET['rid'];         
           $gcate=M('gcategory')->select();
           $this->assign('rid',$rid);
           $this->assign('gcate',$gcate);
           $this->display();
        }
    }
    //订单
    function order(){
         $a=M('order');
       // $result=$a->select();
        $count=$a->count();
        $Page = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        $list = $a->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('order',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
    }
    //未发货订单
    function unsend(){
        $a=M('order');
       // $result=$a->select();
        $count=$a->where('send=0')->count();
        $Page = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        $list = $a->where('send=0')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('order',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
    }
    //改变发货状态阿
    function gai(){
        $id=$_GET['id'];
        $result=M('order')->where('id='.$id)->setField('send',1);
        if($result){
            $this->success('修改成功',U('Shop/order'));
        }else{
             $this->error('修改失败',U('Shop/order'));
        }
    }
    //删除公告
    function del(){
        $id=$_GET['id'];
        $result=M('notice')->where("id=".$id)->delete();
        if($result){
            $this->success('删除成功',U('Shop/notice'));
        }else{
             $this->error('删除失败',U('Shop/notice'));
        }
    }
    //修改公告
    function edit(){
        if(IS_POST){
            $id=$_POST['id'];
            $data['time']=  strtotime($_POST['time']);
           $data['title']=$_POST['name'];
           $data['content']=$_POST['introduce'];
          $result=M('notice')->where("id=".$id)->save($data);
           if($result){
            $this->success('修改成功',U('Shop/notice'));
          }else{
             $this->error('修改失败',U('Shop/notice'));
        }
        }else{
            $id=$_GET['id'];
            $n=M('notice')->where('id='.$id)->select();
            $this->assign('n',$n[0]);
            $this->display();
        }
    }
}

?>

