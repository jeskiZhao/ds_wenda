<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="/Application/Admin/Public/css/goodsadd.css" />
	<title></title>
</head>
<body>
    <form action="/go/index.php/Admin/Shop/edit" method="post" enctype="multipart/form-data">
		<table class="table">
			<tr >
                         <td class="th" colspan="20"><a href="/go/index.php/Admin/Shop/notice">公告列表</a> | <a href="/go/index.php/Admin/Shop/addnotice">添加公告</a></td>			</tr>
			<tr>
				<td>公告标题</td>
				<td><input type="text" name="name" value="<?php echo ($n["title"]); ?>"/></td>				
			</tr>			
			<tr>
				<td>时间</td>
				<td><input type="text" name="time" value="<?php echo (date('Y-m-d',$n["time"])); ?>"/></td>				
			</tr>			
			<tr>
				<td>公告内容</td>
				<td><textarea name="introduce" class="introduce" ><?php echo ($n["content"]); ?></textarea></td>
				
			</tr>
			
			<tr>
				<td colspan="2">
                                       <input type="hidden" name="id" value="<?php echo ($n["id"]); ?>">
					<input type="submit" value="添加" class="input_button"/>
					<input type="reset" class="input_button"/>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>