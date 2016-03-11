<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="/Application/Admin/Public/css/add_category.css" />
	<title></title>
</head>
<body>
	<form action="/go/index.php/Admin/Shop/editrecommend" method="post">
		<table class="table">
			<tr >
				<td class="th" colspan="2">修改推荐分类</td>
			</tr>
                    <tr><input type="hidden" value="<?php echo ($rid); ?>" name="rid" /></tr>
			<tr>
                              
				<td>分类名称</td>
				<td>
                                    <select name="lei">
                                    <?php if(is_array($gcate)): $i = 0; $__LIST__ = $gcate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if($v["id"] != 1 ): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                   </select>
                                </td>
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