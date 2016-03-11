<?php
$config=array (
  'TMPL_PARSE_STRING' =>array (
    '__PUBLIC__' => '/Application/Admin/Public',
  ),

);
return array_merge(include '../Application/Common/Conf/config.php',$config);