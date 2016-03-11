<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="/Application/Admin/Public/css/goodsadd.css" />
	<title></title>
</head>
<body>
    <form action="/go/index.php/Admin/Shop/addlun" method="post" enctype="multipart/form-data">
		<table class="table">
			<tr >
				<td class="th" colspan="2">添加轮播信息</td>
			</tr>
			<tr>
				<td>标题</td>
				<td><input type="text" name="content" class="sim"/></td>				
			</tr>
			<tr>
				<td>链接</td>
				<td><input type="text" name="lian" class="sim"/></td>				
			</tr>	
                       <tr>
				<td>是否开放轮播：</td>
				<td>
					<input type="radio" name="kai" value="1"  checked="checked"/>开启
					<input type="radio" name="kai" value="0" />关闭
				</td>
			</tr>
			<tr>
				<td>轮播图片</td>
				<td><input type="file" name="pic"/></td>				
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