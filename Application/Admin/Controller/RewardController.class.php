<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of RewardController
 *
 * @author jeski
 */
namespace Admin\Controller;
use Think\Controller;
class RewardController extends CommonController{
    //put your code here
    public function coin(){
        if(IS_POST){ 
            //路径是相对于入口文件的
            $file= include '../Application/Common/Conf/config.php'; 
            $path= '../Application/Common/Conf/config.php'; 
            $config=array_merge($file,array_change_key_case($_POST,CASE_UPPER));
            //切记是路径，上次我错把文件给写这了 
           if(write_file($path, $config)){
                $this->success("设置成功！",$_SERVER['HTTP_REFERER'],1);
                }
           else{
               $this->error("设置失败！",U('Reward/coin'),1);
            }

        }         
        else{
        $this->display();
        }
   
       }
 //经验等级
      public function exp(){
          $this->display();
      }
}
?>
