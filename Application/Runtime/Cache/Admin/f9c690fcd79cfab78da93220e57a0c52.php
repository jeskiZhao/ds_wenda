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
			<td class="th" colspan="20"><a href="/go/index.php/Admin/Manager/showlist">后台用户列表</a> | <a href="/go/index.php/Admin/Manager/add">添加管理员</a></td>
		
		</tr>
		<tr class="tableTop">
			<td>序号</td>
			<td class="tdLittle1">ID</td>
			<td>用户名</td>
			<td>角色</td>
			<td>最后登录时间</td>
			<td>最后登录IP</td>
			<td>帐号状态</td>
			<td>操作</td>
		</tr>
		<?php if(is_array($info)): foreach($info as $k=>$v): ?><tr>
			<td><?php echo ($k); ?></td>
			<td><?php echo ($v["admin_id"]); ?></td>
			<td><?php echo ($v["admin_account"]); ?></td>
			<td><?php echo ($role[$v['admin_role_id']]); ?></td>
			<td><?php if($v["logintime"] == 0): ?>从未登录<?php else: echo (date("Y-m-d h:i:s",$v["logintime"])); endif; ?></td>
			<td><?php echo ($v["loginip"]); ?></td>
			<td><?php if($v.lock): ?>未锁定<?php else: ?>锁定<?php endif; ?></td>
			<td><a href="/go/index.php/Admin/Manager/edit/adminid/<?php echo ($v["admin_id"]); ?>">修改</a> |  <a href="/go/index.php/Admin/Manager/del/adminid/<?php echo ($v["admin_id"]); ?>">删除</a></td>
		</tr><?php endforeach; endif; ?>
	</table>

</body>
</html>