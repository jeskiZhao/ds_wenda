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
			<td class="th" colspan="20"><a href="/go/index.php/Admin/Goods/gcate">推荐分类</a></td>
		</tr>
		<tr class="tableTop">
			<td class="tdLittle1">序号</td>
			<td>分类名称</td>
			<td class="tdLtitle7">操作</td>
		</tr>
            <?php if(is_array($rem)): $i = 0; $__LIST__ = $rem;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>			
			<td><?php echo ($key+1); ?></td>
			<td><?php echo ($v["name"]); ?></td>
			
			<td>
				[<a href="/go/index.php/Admin/Shop/editrecommend/rid/<?php echo ($v["id"]); ?>">修改</a>]				
			</td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		
	</table>

</body>
</html>