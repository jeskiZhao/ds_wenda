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
class ChaController extends Controller{              
        public function index(){
              $wen=$_POST['wen'];
              //p($wen);
              $this->assign('wen',$wen);
              $s=M('search')->select();             
              //执行swcs分词
              if(!$s[0]['kai']&&$wen){
                         $fen=fenci($wen,2);
                         $kone=$fen[0]['word']; 
                        // p($kone);
                         if($kone){
                             $where1=array("ask.kword like '%$kone%'","answer.adopt"=>"1");
                             $rone=D('AnswerView')->where($where1)->select();                         
                         }else{
                              $rone=array();
                         }
                        //p($rone);
                        
              }
              //执行phpanalysis分词
              if(!$s[1]['kai']&&$wen){
                       $kone=get_keywords_str($wen);
                       if($kone){
                       $where1=array("ask.kword like '%$kone%'","answer.adopt"=>"1");
                       $rtwo=D('AnswerView')->where($where1)->select();  
                       }else{
                           $rtwo=array();
                       }
                     //p($rtwo);
              }
              //执行dede分词
              if(!$s[2]['kai']&&$wen){
                $sp = new \Home\Lib\SplitWord();      
                $str =$sp->SplitRMM($wen) ;
                $k=str_replace(" ", ",", $str);
                $shuzu=explode(",", $k);
                $kone=$shuzu[1];
               // p($kone);
                $sp->Clear();   
                if($kone){
                $where1 = array("ask.kword like '%$kone%'", "answer.adopt" => "1");
                $rthree = D('AnswerView')->where($where1)->select();
                }
                else{
                    $rthree=array();
                }
                //p($rthree);
              }
              //执行二元分词
              if(!$s[3]['kai']&&$wen){
                  $result = spStr($wen);      
                  $kone=$result[0];
                  //p($kone);
                  if($kone){
                  $where1 = array("ask.kword like '%$kone%'", "answer.adopt" => "1");
                  $rfour = D('AnswerView')->where($where1)->select();
                  }else{
                      $rfour[]=array( );
                  }
                  //p($rfour);
              }
              //合并所有搜索结
              if($rone){
                  if($rtwo){
                      if($rthree){
                          if($rfour){
                               $re=array_merge($rone,$rtwo,$rthree,$rfour);
                          }else{
                               $re=array_merge($rone,$rtwo,$rthree);
                          }
                      }else{
                          if($rfour){
                               $re=array_merge($rone,$rtwo,$rfour);
                          }else{
                               $re=array_merge($rone,$rtwo);
                          }
                      }
                  }else{
                             if($rthree){
                                     if($rfour){
                                         $re=array_merge($rone,$rthree,$rfour);
                                     }else{
                                       $re=array_merge($rone,$rthree);
                                   }
                          }else{
                             if($rfour){
                               $re=array_merge($rone,$rfour);
                             }else{
                               $re=array_merge($rone);
                           }
                      }
                  }
                  
              }
                  else{
                      if($rtwo){
                              if($rthree){
                                     if($rfour){
                                         $re=array_merge($rtwo,$rthree,$rfour);
                                     }else{
                                       $re=array_merge($rtwo,$rthree);
                                   }
                      }else{
                          if($rfour){
                               $re=array_merge($rtwo,$rfour);
                          }else{
                               $re=array_merge($rtwo);
                          }
                      }
                          
                  }else{
                             if($rthree){
                                     if($rfour){
                                         $re=array_merge($rthree,$rfour);
                                     }else{
                                       $re=array_merge($rthree);
                                   }
                          }else{
                             if($rfour){
                               $re=array_merge($rfour);
                             }else{
                               $re=array();
                           }
                      }
                  }
              }  
                  
              //p($re);
               //去除结果中的相同项
              $sou=my_array_unique($re);
             // p($rone);
            
             // p($sou);
              //p(time());
              foreach($sou as $k=>$v){
                  $de=0.6*$v[6]+$v['9']*0.6+($v['8']-1440000000)/1000000;
                  array_push($sou[$k], $de);
              }
              if($sou){
                  $this->assign('rone', multi_array_sort($sou,'10'));
                  $this->display();
              }else{
                  $this->display("wu");
              }
        }  
            //点赞
    function zan(){
        $id=$_POST['qid'];
        M('ask')->where('id='.$id)->setInc('dian',1);
    }
    //
       function za(){
        $id=$_POST['qid'];
        M('ask')->where('id='.$id)->setDec('dian',1);
    }
           
    }
 
?>
