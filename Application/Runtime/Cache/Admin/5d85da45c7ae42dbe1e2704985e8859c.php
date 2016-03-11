<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="/Application/Admin/Public/css/public.css" />
	<script type="text/javascript" src=/Application/Admin/Public/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/Application/Admin/Public/js/public.js"></script>	
</head>

<body>
	<table class="table">
		<tr>
			<td class="th" colspan="20">会员列表</td>
		</tr>
		<tr class="tableTop">
			<td class="tdLittle1">ID</td>
			<td>会员名</td>
			<td>回答数</td>
			<td>被采纳数</td>
			<td>提问数</td>
			<td>金币</td>
			<td>经验</td>
			<td>最后登录时间</td>
			<td>最后登录IP</td>
			<td>注册时间</td>
			<td>帐号状态</td>
			<td>操作</td>
		</tr>
<?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
			<td><?php echo ($v["id"]); ?></td>
			<td><?php echo ($v["account"]); ?></td>
			<td><?php echo ($v["answer"]); ?></td>
			<td><?php echo ($v["adopt"]); ?></td>
			<td><?php echo ($v["ask"]); ?></td>
			<td><?php echo ($v["coin"]); ?></td>
			<td><?php echo ($v["experience"]); ?></td>
			<td><?php echo ($v["logintime"]); ?></td>
			<td><?php echo ($v["loginip"]); ?></td>
			<td><?php echo ($v["register"]); ?></td>
                       
			<td> 
                            <?php if($v["suo"] == 0 ): ?>未锁定
                                <?php else: ?>
                                锁定<?php endif; ?>
                        
                        </td>
			<td>
                            <a href="/go/index.php/Admin/User/lock/id/<?php echo ($v["id"]); ?>/suo/<?php echo ($v["suo"]); ?>" >
                               <?php if($v["suo"] == 0 ): ?>锁定会员
                                <?php else: ?>
                                  解锁锁定<?php endif; ?>
                            </a>
                        </td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>

</body>
</html>