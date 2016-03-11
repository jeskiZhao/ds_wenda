<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HomeController
 *
 * @author jeski
 */
namespace Admin\Controller;
use Think\Controller;
class HomeController extends CommonController{
    //put your code here
    public function home(){
        $info=session();
       // p($info);
        $roleid=session('admin_role_id');
        $rolename=M('role')->where('role_id='.$roleid)->field('role_name')->select();
        $win=pathinfo($_SERVER ['WINDIR']);
        mysql_connect("localhost", "root", "root");
        $my= mysql_get_server_info();
        $apache=$_SERVER['SERVER_SOFTWARE'];
        $this->assign('win',$win['basename']);
        $this->assign('mysql',$my);
        $this->assign('apache',$apache);
        $this->assign('rolename',$rolename[0]);
        $this->assign('info',$info);
        $this->display();
    }
}

?>
