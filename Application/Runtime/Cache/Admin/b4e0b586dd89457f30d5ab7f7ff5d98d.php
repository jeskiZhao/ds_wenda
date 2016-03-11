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
    <form action="/go/index.php/Admin/Auth/add" method="post">
		<table class="table">
			<tr >
			<td class="th" colspan="20"><a href="/go/index.php/Admin/Auth/index">权限列表</a> | <a href="/go/index.php/Admin/Auth/add">添加权限</a></td>
			</tr>
			<tr>
				<td>权限名</td>
				<td><input type="text" name="authname"/></td>
			</tr>
			<tr>
				<td>父权限</td>
<!--				<td><input type="text" name="authpid"/></td>-->
				<td>
                                    <select name="authpid" id="linkcontent">
                                         <option value="0">--请选择默认为最高0级权限--</option>
                                         <?php if(is_array($one)): $i = 0; $__LIST__ = $one;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["auth_level"] == 0 ): ?><option value="<?php echo ($vo["auth_id"]); ?>"><?php echo ($vo["auth_name"]); ?></option>
                                                    <?php if(is_array($one)): $i = 0; $__LIST__ = $one;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if($v["auth_pid"] == $vo["auth_id"] ): ?><option value="<?php echo ($v["auth_id"]); ?>"><?php echo ($v["auth_name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; ?>
                                   </select>
                                </td>
			</tr>
			<tr>
				<td>操作模块</td>
				<td><input type="text" name="auth_c"/></td>
			</tr>
			<tr>
				<td>操作方法</td>
				<td><input type="text" name="auth_a"/></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="添加" class="input_button"/>
					<input type="reset" class="input_button"/>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>