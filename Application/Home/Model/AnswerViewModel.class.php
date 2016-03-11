<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AnswerViewModel
 *
 * @author jeski
 */
namespace Home\Model;
use Think\Model\ViewModel;
class AnswerViewModel extends ViewModel{
    //put your code here
       public $viewFields = array(
        'answer'=>array('id'=>'da_id','content'=>'hui','adopt','_type'=>'right'),
        'ask'=>array('id','content','solve','answer','reward','time','dian','_on'=>'ask.id=answer.aid'),    
        );
}

?>
