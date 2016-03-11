<?php
namespace Admin\Controller;
use Think\Controller;
class SearchController extends Controller{
   public function set(){
       $s=M('search')->select();
      $this->assign('s',$s);
      $this->display();
   }
   function change(){
       $ids=$_POST['group'];
       $s=M('search')->select();
       foreach($s as $v){
           if(in_array($v['id'],$ids)){
                M('search')->where('id='.$v['id'])->setField('kai',0);
           }else{
                M('search')->where('id='.$v['id'])->setField('kai',1);
           }
           }
            $this->redirect('Search/set');
       }
      
   }

?>