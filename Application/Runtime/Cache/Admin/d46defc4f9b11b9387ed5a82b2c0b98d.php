<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="/Application/Admin/Public/css/goodsadd.css" />
	<title></title>
</head>
<body>
    <form action="/go/index.php/Admin/Goods/add" method="post" enctype="multipart/form-data">
		<table class="table">
			<tr >
				<td class="th" colspan="2">添加商品信息</td>
			</tr>
			<tr>
				<td>商品名称</td>
				<td><input type="text" name="name"/></td>				
			</tr>
			<tr>
				<td>商品分类</td>
				<td>
                                    <select name="cid">
                                        <?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if($v["id"] > 1 ): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </td>				
			</tr>
			<tr>
				<td>商品数量</td>
				<td><input type="text" name="num"/></td>				
			</tr>
			<tr>
				<td>商品金币值</td>
				<td><input type="text" name="cost"/></td>			
			</tr>
			</tr>
			<tr>
				<td>商品简介</td>
				<td><input type="text" name="simintroduce" class="sim"/></td>	
			</tr>
			<tr>
				<td>商品图片</td>
				<td><input type="file" name="pic"/></td>				
			</tr>
			<tr>
				<td>商品详情</td>
				<td><textarea name="introduce" class="introduce"></textarea></td>
				
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