<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="/Application/Admin/Public/css/public.css" />
	<script type="text/javascript" src="/Application/Admin/Public/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/Application/Admin/Public/js/public.js"></script>
        <script>
            $(function(){
                $('tr[pid!=0]').hide();
                $('td[name="fold"]').toggle(function(){
                     var index=$(this).parents('tr').attr('id');
                     $(this).children('a').removeClass('showPlus');
                     $(this).children('a').addClass('showMinus');
                     $('tr[pid='+index+']').show();
                },function(){
                    var index=$(this).parents('tr').attr('id');
                     $(this).children('a').removeClass('showMinus');
                     $(this).children('a').addClass('showPlus');
                     $('tr[pid='+index+']').hide();               
                });
            });
        </script>
        <style type="text/css">
      
        </style>
</head>

<body>
	<table class="table">
		<tr pid="0">
			<td class="th" colspan="20">分类列表</td>
		</tr>
		<tr  pid="0" class="tableTop">
			<td class="tdLittle0 center">展开</td>
			<td class="tdLittle1">ID</td>
			<td>分类名称</td>
			<td class="tdLtitle7">操作</td>
		</tr>
              <?php if(is_array($cateinfo)): $i = 0; $__LIST__ = $cateinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr id="<?php echo ($vo["id"]); ?>" pid="<?php echo ($vo["pid"]); ?>">
                      
			<td name="fold"><a href="" class="showPlus"></a></td>
			<td><?php echo (ltrim($vo["biao"],"-")); ?></td>
			<td>
                            <?php if($vo["level"] > 0): echo str_repeat("&nbsp;&nbsp;&nbsp;&nbsp",$vo['level']);?>|<?php echo str_repeat("--",$vo['level']); endif; ?>
                            <?php echo ($vo["name"]); ?></td>
			
			<td>
				[<a href="/go/index.php/Admin/Category/addchild/id/<?php echo ($vo["id"]); ?>">添加子分类</a>][
				<a href="/go/index.php/Admin/Category/edit/id/<?php echo ($vo["id"]); ?>">修改</a>][
				<a href="/go/index.php/Admin/Category/del/id/<?php echo ($vo["id"]); ?>" class="del" >删除</a>]
			</td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		
	</table>

</body>
</html>