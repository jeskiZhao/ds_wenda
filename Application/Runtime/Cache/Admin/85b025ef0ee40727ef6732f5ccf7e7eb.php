<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="/Application/Admin/Public/css/public.css" />
	<link rel="stylesheet" href="/Application/Admin/Public/css/lun.css" />
	<script type="text/javascript" src="/Application/Admin/Public/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/Application/Admin/Public/js/public.js"></script>	
</head>

<body>
	<table class="table">
		<tr>
			<td class="th" colspan="20"><a href="/go/index.php/Admin/Shop/lun">轮播列表</a> | <a href="/go/index.php/Admin/Shop/addlun">添加信息</a></td>
		</tr>
		<tr class="tableTop">
			<td class="tdLittle1">序号</td>
			<td>标题</td>
			<td>商品图片</td>	
			<td>链接</td>	
			<td>当前状态</td>	
			<td>操作</td>
		</tr>
            <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
			<td><?php echo ($key+1); ?></td>
			<td><?php echo ($v["content"]); ?></td>
			<td><img src="<?php echo ($v["pic"]); ?>" class="tu" /></td>
			<td></td>
			<td>
                             <?php if($v["kai"] == 1): ?>播放中
                                <?php else: ?>
                                  关闭中<?php endif; ?>
                            
                        </td>
			
			<td>
                                <?php if($v["kai"] == 1): ?><a href="/go/index.php/Admin/Shop/kailun/id/<?php echo ($v["id"]); ?>">关闭</a>
                                <?php else: ?>
                                <a href="/go/index.php/Admin/Shop/kailun/id/<?php echo ($v["id"]); ?>" >打开</a><?php endif; ?>
                                |
				<a href="/go/index.php/Admin/Shop/dellun/id/<?php echo ($v["id"]); ?>" class="del">删除</a>
			</td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
	<div class="page">
		<?php echo ($page); ?>
	</div>

</body>
</html>