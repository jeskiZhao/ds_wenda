<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="/Application/Admin/Public/css/public.css" />
	<script type="text/javascript" src="/Application/Admin/Public/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/Application/Admin/Public/js/public.js"></script>	
        <style type="text/css">
            .hou{
                width:88px;
            }
        </style>
</head>

<body>
	<table class="table">
		<tr>
			<td class="th" colspan="20"><a href="/go/index.php/Admin/Shop/notice">公告列表</a> | <a href="/go/index.php/Admin/Shop/addnotice">添加公告</a></td>
		</tr>
		<tr class="tableTop">
			<td class="tdLittle1">序号</td>
			<td>公告标题</td>
			<td>公告时间</td>
			<td>公告详情</td>			
			<td>操作</td>
		</tr>
            <?php if(is_array($good)): $i = 0; $__LIST__ = $good;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
			<td><?php echo ($key+1); ?></td>
			<td><?php echo ($v["title"]); ?></td>
			<td><?php echo (date("Y-m-d",$v["time"])); ?></td>
			<td><?php echo ($v["content"]); ?></td>		
			<td class="hou">
				<a href="/go/index.php/Admin/Shop/edit/id/<?php echo ($v["id"]); ?>" >修改</a>|<a href="/go/index.php/Admin/Shop/del/id/<?php echo ($v["id"]); ?>" class="del">删除</a>
				
			</td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
	<div class="page">
	<?php echo ($page); ?>
	</div>

</body>
</html>