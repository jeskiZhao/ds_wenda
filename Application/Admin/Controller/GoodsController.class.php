<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GoodsController
 *
 * @author jeski
 */
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends CommonController{
    //put your code here
    function add(){
        if(IS_POST){
            //上传图片
            $upload = new \Think\Upload();       //// 实例化上传类   
            $upload->maxSize   =     3145728 ;           //// 设置附件上传大小   
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');           //// 设置附件上传类型   
            $upload->rootPath  = './';
            $upload->savePath  = 'Upload/';         // 设置附件上传目录      // 上传文件    
            $info=$upload->upload();  
          if(!$info) {               // 上传错误提示错误信息      
              $this->error($upload->getError()); 
              }
            else{// 上传成功      
               $path=__ROOT__."/".$info['pic']['savepath'].$info['pic']['savename'];                   
            //添加信息
          $data['name']=$_POST['name'];
          $data['cid']=$_POST['cid'];
          $data['num']=$_POST['num'];
          $data['cost']=$_POST['cost'];
          $data['simintroduce']=$_POST['simintroduce'];
          $data['introduce']=$_POST['introduce'];
          $data['pic']=$path;
          $result=M('goods')->add($data);
          if($result){
                  $this->success('添加成功！',U('Goods/add'));
          }
          else{
                $this->success('添加失败！');
          }
          
            }
        }
      else{
             $cate=M('gcategory')->select();
             $this->assign('cate',$cate);
             $this->display();
    }
    }
    
    //商品分类
    function gcate(){
        $info=M('gcategory')->select();
        $this->assign('info',$info);
        $this->display();
    }
    //添加商品分类
    function addcate(){
        if(IS_POST){
        $data['name']=$_POST['name'];
        $result=M('gcategory')->add($data);
        if($result){
            $this->success('添加成功！',U('Goods/gcate'));
        }else{
             $this->error('添加失败！',U('Goods/gcate'));
        }
        }else{
            $this->display();
        }
    }
    //删除商品分类
    function delcate(){
        $id=$_GET['id'];
       $result=M('gcategory')->delete($id);
         if($result){
            $this->success('删除成功！',U('Goods/gcate'));
        }else{
             $this->error('删除失败！',U('Goods/gcate'));
        }
    }
    //修改分类
    function edit(){       
          if(IS_POST){
              $id=$_POST['id'];
               $result=M('gcategory')->where('id='.$id)->setField('name',$_POST['name']); 
                if($result){
                   $this->success('修改成功！',U('Goods/gcate'));
            }else{
               $this->error('修改失败！',U('Goods/gcate'));
             }
          }
          else{  
             $id=$_GET['id'];
             $result=M('gcategory')->where('id='.$id)->select();
             $this->assign('result',$result[0]);          
             $this->display();
          }
    }
    //商品列表
     function showlist(){
         $m=M('goods');
         $count=$m->count();
         $Page = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
         $show = $Page->show();// 分页显示输出
         $list = $m->limit($Page->firstRow.','.$Page->listRows)->select();
         $this->assign('list',$list);// 赋值数据集
         $this->assign('page',$show);// 赋值分页输出
        // $this->assign("good",$good);
         $this->display();
     }
     //修改商品
     function editgood(){
         if(IS_POST){
             $id=$_POST['id'];
             $data['name']=$_POST['name'];
             $data['cid']=$_POST['cid'];
             $data['num']=$_POST['num'];
             $data['cost']=$_POST['cost'];
             $data['simintroduce']=$_POST['simintroduce'];
             $data['introduce']=$_POST['introduce'];
             $result=M('goods')->where('id='.$id)->save($data);
              if($result){
              $this->success("修改成功",U('Goods/showlist'));
              }else{
               $this->error("修改失败",U('Goods/showlist'));
          }
         }else{
            $id=$_GET['id'];
            //商品信息
            $g=M('goods')->where("id=".$id)->select();
            $cate=M('gcategory')->select();
            $this->assign('cate',$cate);
            $this->assign('g',$g[0]);
            $this->display();
         }
     }
     //删除商品
     function del(){
          $id=$_GET['id'];
          $result=M('goods')->where("id=".$id)->delete();
          if($result){
              $this->success("删除成功",U('Goods/showlist'));
          }else{
               $this->error("删除失败",U('Goods/showlist'));
          }
     }
}

?>
