<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        if(S('cate')){
            $info=S('cate');
        }else{
            $cate=D('Category');
            //父id为0的
            $info=$cate->father();
            //p($fatherinfo)
            //取父id为0的子类;
            foreach($info as $k=>$v){
                $info[$k]['child']=$cate->child($v['id']);
            }         
           S('cate',$info,1);
       }
        //p($info);
       $unask=M('ask')->where('solve=0')->limit(7)->order('time desc')->select();
       //高分悬赏
       $where=array("solve"=>0,"reward"=>array("GT",20));
       $gaoask=M('ask')->where($where)->limit(4)->order('time desc')->select();    
 
       $this->assign("unask",$unask);
       $this->assign("gaoask",$gaoask);
       $this->assign('cate',$info);
       $this->display();
    }
}