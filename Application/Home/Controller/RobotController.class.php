<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RobotController
 *
 * @author jeski
 */
namespace Home\Controller;
use Think\Controller;
class RobotController extends Controller{
    //put your code here
    public function index(){
        $this->display();
    }
    //以前从库里找答案的，现在引用图灵换了
//    function tu(){
//        $wen=$_POST['info'];
//        //$wen="怎样智能问答";
//          $one=fenci($wen,1);
//          $k=$one[0]['word'];
//        //p($one[0]['word']);
//        $asked=M('ask')->where("content like '%".$wen."%'")->select();
//        if($asked){
//           $qid=$asked[0]['id'];
//           $answered=M('answer')->where("aid=".$qid)->limit(1)->select(); 
//           if($answered){
//                echo $answered[0]['content'];
//           }else{
//                $str="对不起，我还不知道，请到系统提问吧！";
//                echo $str;
//        }
//        }else{
//            $str="对不起，我还不知道，请到系统提问吧！";
//            echo $str;
//        }
//       
//    }
    //图灵机器人
    function tuling(){
         $info=isset($_POST['info'])?$_POST['info']:'';
         $apikey="1ef15c307b2cd08bac16fa35880ac3aa";
         $apiurl="http://www.tuling123.com/openapi/api?key=KEY&info=INFO";
         $url=str_replace("INFO","$info",str_replace("KEY","$apikey",$apiurl));
         $str=file_get_contents($url);
         echo $str;
    }
}

?>
