<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RecommendViewModel
 *
 * @author jeski
 */
namespace Home\Model;
use Think\Model\ViewModel;
class RecommendViewModel extends ViewModel{
    //put your code here
      public $viewFields = array(    
        'recommend'=>array('id','name','_type'=>'RIGHT'),    
        'goods'=>array('id','name','pic','simintroduce','cid', '_on'=>'recommend.gcid=goods.cid'),  
        );
}

?>
