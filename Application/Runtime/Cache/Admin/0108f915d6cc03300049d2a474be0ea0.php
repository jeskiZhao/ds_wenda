<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
 	<link rel="stylesheet" href="/Application/Admin/Public/css/public.css" />
	<script type="text/javascript" src="/Application/Admin/Public/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/Application/Admin/Public/js/public.js"></script>
</head>
<body>
<form action="/go/index.php/Admin/Search/change" method="post">
<table class="table">
    <tr>
			<td class="th" colspan="20"><a href="/go/index.php/Admin/Role/index">搜索设置</a></td>
   </tr>
    <tr>
        <td class="tableleft" width="100px">切词搜索方法</td>
        <td>
            <ul>
                <?php if(is_array($s)): $i = 0; $__LIST__ = $s;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
                    <label class='checkbox inline'><input type='checkbox' name='group[]' value='<?php echo ($v["id"]); ?>' 
                                                         <?php if($v["kai"] == 0 ): ?>checked<?php endif; ?>
                                                          
                                                          /><?php echo ($v["name"]); ?></label>

                </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <button type="submit" class="btn btn-primary" type="button">保存</button> &nbsp;&nbsp;
        </td>
    </tr>
</table>
</form>
</body>
</html>