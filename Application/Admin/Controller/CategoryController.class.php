<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of Category
 *
 * @author jeski
 */
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends Controller{
    //put your code here
    //分类列表
    public function showlist(){
        $cate=M('category');
        $cateinfo=$cate->select();
        //p(recursive($cateinfo));
        $cateinfo=recursive($cateinfo);
        $this->assign('cateinfo',$cateinfo);
        $this->display();
    }
    //添加顶级分类的函数
    public function addtop(){
        if(IS_POST){
            $data=array(
                'name'=>I('title'),
                'pid'=>I('pid')
            );
           $cate=M('category');
            //创建数据对象
           $cate->create($data);
           //增加到数据库
           $result=$cate->add($data);
           if($result){
               $this->success('添加分类成功！',U('Category/showlist'));
           }else{
               $this->error('添加失败',U('Category/addtop'),2);
           }
            
        }
        else{
          $this->display();
        }
    }
    //添加子分类
    public function addchild(){
            $id=I('id');
            $this->assign('id',$id);
            $this->display();       
    }
    //编辑分类
    public function edit(){
        if(IS_POST){
           M('category')->create();
           $result=M('category')->save();
           if($result){
               $this->success("修改成功",U('Category/showlist'),1);
           }else{
               $this->error("添加失败",U('Category/edit'));
           }  
        }else{
        $id=I('id');
        $result=M('category')->where('id='.$id)->getField('name');
        //p($result);
        $this->assign('result',$result);
        $this->assign('id',$id);        
        $this->display();
        }
    }
    //删除分类
    function del(){
        $id=$_GET['id'];
        $idinfo=M(category)->field('id,pid')->select();
        //p($idinfo);
        $arr=get_allid($idinfo,$id);
        $arr[]=$id;
        //p($arr);
        $where=array('id'=>array('IN',$arr));
        $result=M('category')->where($where)->delete();
        if(!$result){
            $this->error("删除失败",U('Category/showlist'));
        }
           $this->success("删除成功",U('Category/showlist'));
    }
}

?>
