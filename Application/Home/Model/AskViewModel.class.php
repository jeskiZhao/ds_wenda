<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Home\Model;
use Think\Model\ViewModel;
class AskViewModel extends ViewModel {
    public $viewFields = array(    
        'ask'=>array('id','content','reward','time','answer','_type'=>'LEFT'),    
        'category'=>array('name', '_on'=>'ask.cid=category.id'),  
        );
        
}

?>
