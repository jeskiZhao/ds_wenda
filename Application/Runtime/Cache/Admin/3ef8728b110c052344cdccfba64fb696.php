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
			<td class="th" colspan="20"><a href="/go/index.php/Admin/Auth/index">权限列表</a> | <a href="/go/index.php/Admin/Auth/add">添加权限</a></td>
		</tr>
		<tr class="tableTop">
			<td>序号</td>
<!--			<td class="tdLittle1">ID</td>-->
			<td>权限名</td>
			<td>级别</td>
			<td>父id</td>
			<td>模块</td>
			<td>方法</td>
			<td>全路径</td>
		</tr>
		<?php if(is_array($auth)): foreach($auth as $k=>$v): ?><tr>
			<td><?php echo ($k); ?></td>
			<!--<td><?php echo ($v["auth_id"]); ?></td>-->
			<td><?php echo ($v["auth_name"]); ?></td>
			<td><?php echo ($v["auth_level"]); ?></td>
			<td><?php echo ($v["auth_pid"]); ?></td>
			<td><?php echo ($v["auth_c"]); ?></td>
			<td><?php echo ($v["auth_a"]); ?></td>
			<td><?php echo ($v["auth_path"]); ?></td>
		</tr><?php endforeach; endif; ?>
	</table>

</body>
</html>