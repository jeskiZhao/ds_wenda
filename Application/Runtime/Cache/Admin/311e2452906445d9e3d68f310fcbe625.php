<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="/Application/Admin/Public/css/public.css" />
	<script type="text/javascript" src="/Application/Admin/Public/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/Application/Admin/Public/js/public.js"></script>	
        <style type="text/css">
            .an{
                border: none;
            }
        </style>
</head>

<body>
	<table class="table">
		<tr>
			<td class="th" colspan="20"><a href="/go/index.php/Admin/Shop/order">订单列表</a>|<a href="/go/index.php/Admin/Shop/unsend">未发货订单</a></td>
		</tr>
		<tr class="tableTop">
			<td class="tdLittle1">序号</td>
			<td>用户姓名</td>
			<td>礼品名称</td>
			<td>用户地址</td>
			<td>用户电话</td>
			<td>兑换时间</td>			
			<td>收货状态</td>			
			<td>发货状态</td>			
			<td>操作</td>
		</tr>
            <?php if(is_array($order)): $i = 0; $__LIST__ = $order;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
			<td><?php echo ($key+1); ?></td>
			<td><?php echo ($v["realname"]); ?></td>
			<td><?php echo ($v["gname"]); ?></td>
			<td><?php echo ($v["address"]); ?></td>
			<td><?php echo ($v["phone"]); ?></td>
			<td><?php echo (date("Y-m-d H:i:s",$v["time"])); ?></td>
                        <?php if($v["sure"] == 0 ): ?><td>未收货</td>	
                        <?php else: ?>
                          <td>已收货</td><?php endif; ?>
                        <?php if($v["send"] == 0 ): ?><td>未发货</td>	
                        <?php else: ?>
                        <td>已发货</td><?php endif; ?>
			<td>
                            <a href="/go/index.php/Admin/Shop/gai/id/<?php echo ($v["id"]); ?>" class="" >
                                   <?php if($v["send"] == 0 ): ?><input type="button" value="改变状态" class="an" >
                                       <?php else: ?>
                                       <input type="button" value="已修改" disabled="disabled" class="an" ><?php endif; ?>
                                  </a>			
			</td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
	<div class="page">
		<?php echo ($page); ?>
	</div>

</body>
</html>