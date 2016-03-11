<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
 	<link rel="stylesheet" href="/Application/Admin/Public/css/public.css" />
	<script type="text/javascript" src="/Application/Admin/Public/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/Application/Admin/Public/js/public.js"></script>
</head>
<body>
<form action="/go/index.php/Admin/Role/distribute/roleid/1" method="post">
<input type="hidden" name="id" value="<?php echo ($roleid); ?>" />
<table class="table">
    <tr>
			<td class="th" colspan="20"><a href="/go/index.php/Admin/Role/index">角色列表</a> | <a href="/go/index.php/Admin/Role/distribute">分配权限</a></td>
   </tr>
    <tr>
        <td class="tableleft" width="80px">权限</td>
        <td>
            <ul>
                <?php if(is_array($auth)): $i = 0; $__LIST__ = $auth;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                    <label class='checkbox inline'><input type='checkbox' name='group[]' value='<?php echo ($vo["auth_id"]); ?>' 
                                                         <?php if(in_array($vo['auth_id'],$ids)): ?>checked<?php endif; ?>
                                                          
                                                          /><?php echo ($vo["auth_name"]); ?></label>
                   
                    <ul>
                      
                        <?php if(is_array($sonauth)): $i = 0; $__LIST__ = $sonauth;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if($vo["auth_id"] == $v["auth_pid"] ): ?><li>
                                 <label class='checkbox inline'><?php echo str_repeat("&nbsp;&nbsp;&nbsp",2); ?><input type='checkbox' name='group[]' value='<?php echo ($v["auth_id"]); ?>'
                                                                                                                       <?php if(in_array($v['auth_id'],$ids)): ?>checked<?php endif; ?>
                                                                                                                       /><?php echo ($v["auth_name"]); ?></label>
                            </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <button type="submit" class="btn btn-primary" type="button">保存</button> &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
        </td>
    </tr>
</table>
</form>
</body>
</html>