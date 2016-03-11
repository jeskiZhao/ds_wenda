<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SearchController
 *
 * @author jeski
 */
namespace Home\Controller;
use Think\Controller;
//不再使用该控制器
class SearchController extends Controller{
    
    //scwc切词
    public function index(){
           $wen=$_POST['wen'];
           $this->assign('wen',$wen);
           $fen=fenci($wen,2);
           $kone=$fen[0]['word'];
           $ktwo=$fen[1]['word'];
           
           $where1=array("ask.kword like '%$kone%'","answer.adopt"=>"1");
           $rone=D('AnswerView')->where($where1)->select();
          // p($rone);
           $where2=array("ask.kword like '%$ktwo%'","answer.adopt"=>1);
           $rtwo=D('AnswerView')->where($where2)->select();  
           if($kone&&$rone){  
                  
                   $this->assign('rone',$rone);            
                   $this->display();                 
            }else{ 
                if($ktwo&&$rtwo){                    
                   $this->assign('rtwo',$rtwo);
                   $this->display();
                }else{                
                    $this->display("wu");
                }
                 
            }
        }
      //phpanalysis切词
        function phpanalysis(){
             $wen=$_POST['wen'];
             //p($wen);
             $this->assign('wen',$wen);
             $kone=get_keywords_str($wen);    
            // p($kone);
             $where1=array("ask.kword like '%$kone%'","answer.adopt"=>"1");
             $rone=D('AnswerView')->where($where1)->select();        
             if($kone&&$rone){                 
                   $this->assign('rone',$rone);            
                   $this->display();                 
             }else{                            
                    $this->display("awu");
                }               
            }
            //tp框架使用的分词
            function tpfenci(){
                $wen = $_POST['wen'];
                $this->assign('wen', $wen);
                $sp = new \Home\Lib\SplitWord();      
                $str =$sp->SplitRMM($wen) ;
                $k=str_replace(" ", ",", $str);
                $shuzu=explode(",", $k);
                $kone=$shuzu[1];
               // p($kone);
                //析放资源
                $sp->Clear();                   
               //打印耗时
              //echo '分词完成，耗时：'.G('run','end').'s';
                $where1 = array("ask.kword like '%$kone%'", "answer.adopt" => "1");
                $rone = D('AnswerView')->where($where1)->select();
                if ($kone && $rone) {
                    $this->assign('rone', $rone);
                    $this->display();
                } else {
                    $this->display("twu");
                }
                }
                //自己写的分词
                function self(){                       
                $wen = $_POST['wen'];
                $this->assign('wen', $wen);
                $result = spStr($wen);      
                $kone=$result[0];
               // p($kone);                         
                $where1 = array("ask.kword like '%$kone%'", "answer.adopt" => "1");
                $rone = D('AnswerView')->where($where1)->select();
                if ($kone && $rone) {
                    $this->assign('rone', $rone);
                    $this->display();
                } else {
                    $this->display("swu");
                }
            
                }
                   
        public function cha(){
              //$wen=$_POST['wen'];
              $wen="铁道大学";
              $this->assign('wen',$wen);
              $s=M('search')->select();             
              //执行swcs分词
              if(!$s[0]['kai']&&$wen){
                         $fen=fenci($wen,2);
                         $kone=$fen[0]['word'];                     
                         $where1=array("ask.kword like '%$kone%'","answer.adopt"=>"1");
                         $rone=D('AnswerView')->where($where1)->select();
                        // p($rone);
                        
              }
              //执行phpanalysis分词
              if(!$s[1]['kai']&&$wen){
                       $kone=get_keywords_str($wen);
                       $where1=array("ask.kword like '%$kone%'","answer.adopt"=>"1");
                       $rtwo=D('AnswerView')->where($where1)->select();   
                      // p($rtwo);
              }
              //执行dede分词
              if(!$s[2]['kai']&&$wen){
                $sp = new \Home\Lib\SplitWord();      
                $str =$sp->SplitRMM($wen) ;
                $k=str_replace(" ", ",", $str);
                $shuzu=explode(",", $k);
                $kone=$shuzu[1];
                $sp->Clear();                   
                $where1 = array("ask.kword like '%$kone%'", "answer.adopt" => "1");
                $rthree = D('AnswerView')->where($where1)->select();
                 //p($rthree);
              }
              //执行二元分词
              if(!$s[3]['kai']&&$wen){
                  $result = spStr($wen);      
                  $kone=$result[0];                      
                  $where1 = array("ask.kword like '%$kone%'", "answer.adopt" => "1");
                  $rfour = D('AnswerView')->where($where1)->select();
                  //p($rfour);
              }
              //合并所有搜索结果
              $re=array_merge($rone,$rtwo,$rthree,$rfour);    
              //p($re);
               //去除结果中的相同项
              $sou=my_array_unique($re);
              //p($sou);
              if($sou){
                  $this->assign('rone', $rone);
                  $this->display();
              }else{
                  $this->display("wu");
              }
        }        
           
    }
 
?>
