<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommonController
 *
 * @author jeski
 */
namespace Admin\Controller;
use Think\Controller;
//公共控制器
class CommonController extends Controller{
    //put your code here
    public function _initialize(){
      $id=session('id');
      $account=session('account');
      if(!isset($id)||!isset($account)){
          $this->redirect('Login/index');
      }
    }
    
}

?>
