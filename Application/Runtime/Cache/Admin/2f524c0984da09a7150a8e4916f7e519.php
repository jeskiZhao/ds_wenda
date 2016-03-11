<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="/Application/Admin/Public/css/public.css" />
	<script type="text/javascript" src="/Application/Admin/Public/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/Application/Admin/Public/js/public.js"></script>	
      	<style type="text/css">
            .tu{
                height:55px;
                width:73px;
            }
        </style>

</head>

<body>
	<table class="table">
		<tr>
			<td class="th" colspan="20">商品列表</td>
		</tr>
		<tr class="tableTop">
			<td class="tdLittle1">序号</td>
			<td>商品名称</td>
			<td>商品数量</td>
			<td>商品金币值</td>
			<td>商品图片</td>
			<td>商品简介</td>
			<td>操作</td>
		</tr>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
			<td><?php echo ($key+1); ?></td>
			<td><?php echo ($v["name"]); ?></td>
			<td><?php echo ($v["num"]); ?></td>
			<td><?php echo ($v["cost"]); ?></td>
			<td><img src="<?php echo ($v["pic"]); ?>" class="tu"></td>
			<td><?php echo ($v["simintroduce"]); ?></td>
			<td>
				<a href="/go/index.php/Admin/Goods/editgood/id/<?php echo ($v["id"]); ?>" >修改</a>|
				<a href="/go/index.php/Admin/Goods/del/id/<?php echo ($v["id"]); ?>" class="del">删除</a>
			</td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
	<div class="page">
	   <?php echo ($page); ?>
	</div>

</body>
</html>