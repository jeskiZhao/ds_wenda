<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
        $model=D('Role');
        $father=$model->father();
        //p($father);
        $child=$model->child();
        $admin=session(account);
        $this->assign('admin',$admin);
        $this->assign('father',$father);
        $this->assign('child',$child);
        $this->assign('time',time());
        $this->display();
    }
}