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
			<td class="th" colspan="20">问题列表</td>
		</tr>
		<tr class="tableTop">
			<td class="tdLittle1">ID</td>
			<td>问题内容</td>
			<td>提问时间</td>
			<td>回答人数</td>
			<td>悬赏金币</td>
			<td>操作</td>
		</tr>
           <?php if(is_array($ask)): $i = 0; $__LIST__ = $ask;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
			<td><?php echo ($key+1); ?></td>
			<td><?php echo ($v["content"]); ?></td>
			<td><?php echo (date("Y-M-D H:i:s",$v["time"])); ?></td>
			<td><?php echo ($v["answer"]); ?></td>
			<td><?php echo ($v["reward"]); ?></td>
			<td>
				<a href="/go/index.php/Admin/Ask/del/id/<?php echo ($v["id"]); ?>" class="del">删除</a>
			</td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		
	</table>
	<div class="page">
	<?php echo ($page); ?>
	</div>

</body>
</html>