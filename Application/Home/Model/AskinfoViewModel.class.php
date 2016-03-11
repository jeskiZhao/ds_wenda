<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AskinfoViewModel
 *
 * @author jeski
 */
namespace Home\Model;
use Think\Model\ViewModel;
class AskinfoViewModel extends ViewModel{
    //put your code here
    public $viewFields = array(  
        	'ask' => array(
			'id', 'content', 'reward', 'solve', 'time', 'cid', 'answer','kword',
			'_type' => 'LEFT'
			),
		'user' => array(
			'id' => 'uid', 'account', 'experince',
			'_on' => 'ask.uid = user.id'
			)
		);
}

?>
