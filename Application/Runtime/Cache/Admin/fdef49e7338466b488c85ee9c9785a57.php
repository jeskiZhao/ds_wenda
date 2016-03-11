<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="/Application/Admin/Public/css/public.css" />
	<script type="text/javascript" src="/Application/Admin/Public/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/Application/Admin/Public/js/public.js"></script>	
</head>

<body>
	<table class="table">
		<tr>
			<td class="th" colspan="20"><a href="/go/index.php/Admin/Role/index">角色列表</a> | <a href="/go/index.php/Admin/Role/add">添加角色</a></td>
		</tr>
		<tr class="tableTop">
			<td>序号</td>			
			<td>角色</td>			
			<td>操作</td>
		</tr>
		<?php if(is_array($info)): foreach($info as $k=>$v): ?><tr>
			<td><?php echo ($k); ?></td>			
			<td><?php echo ($v["role_name"]); ?></td>			
			<td><a href="/go/index.php/Admin/Role/distribute/roleid/<?php echo ($v["role_id"]); ?>">分配权限</a> |  <a href="/go/index.php/Admin/Role/del/adminid/<?php echo ($v["role_id"]); ?>">删除</a></td>
		</tr><?php endforeach; endif; ?>
	</table>

</body>
</html>