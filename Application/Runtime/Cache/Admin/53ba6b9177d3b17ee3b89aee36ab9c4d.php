<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>得声问答后台首页</title>
	<link rel="stylesheet" href="/Application/Admin/Public/css/admin.css" />
	<script type="text/javascript" src="/Application/Admin/Public/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/Application/Admin/Public/js/admin.js"></script>
<!-- 默认打开目标 -->
<base target="iframe"/>
</head>
<body>
<!-- 头部 -->
	<div id="top_box">
		<div id="top">
			<p id="top_font">得声校园问答管理后台</p>
			<ul id="menu2" class="menu">
				<li>
                                    <a href="/go/index.php"  target="_blank">前台首页</a>
				</li>
				<li><a href="/go/index.php/Admin/Home/home">后台主页</a></li> 
							
			</ul>
		</div>
		<div class="top_bar">
			<p class="adm">
					<span>你好</span>
				<?php echo ($admin); ?>
				<span class="adm_pic">&nbsp&nbsp&nbsp&nbsp</span>
				<span class="adm_people">[houdunwang]</span>
			</p>
			<p class="now_time">
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;今天是：<?php echo (date("Y-m-d",$time)); ?>	
                                &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
				您的当前位置是：
				<span>首页</span>
			</p>
			<p class="out">
				<span class="out_bg">&nbsp&nbsp&nbsp&nbsp</span>&nbsp
				<a href="/go/index.php/Admin/Login/logout" target="_self">退出</a>
			</p>
		</div>
	</div>
<!-- 左侧菜单 -->
		<div id="left_box">
			<p class="use">常用菜单</p>
		       <div class="menu_box">
				<h2><a href="/go/index.php/Admin/Home/home">后台主页</a></h2>                             			
			</div>
                        <?php if(is_array($father)): $i = 0; $__LIST__ = $father;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="menu_box">
				<h2><?php echo ($vo["auth_name"]); ?></h2>                             
				 <div class="text">
                                    <?php if(is_array($child)): $i = 0; $__LIST__ = $child;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if($vo["auth_id"] == $v["auth_pid"] ): ?><ul class="con">
				        <li class="nav_u">
				        	<a href="/go/index.php/Admin/<?php echo ($v["auth_c"]); ?>/<?php echo ($v["auth_a"]); ?>" class="pos"><?php echo ($v["auth_name"]); ?></a>				        	
				        </li> 
				         </ul><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</div>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>	
			
		</div>
		<!-- 右侧 -->
		<div id="right">
			<iframe  frameboder="0" border="0" 	scrolling="yes" name="iframe" src="/go/index.php/Admin/Home/home"></iframe>
		</div>
	<!-- 底部  
	<div id="foot_box">
		<div class="foot">
			<p>@Copyright © 2013-2013 MZY.com All Rights Reserved. 京ICP备0000000号</p>
		</div>
	</div>
          --> 
<!--[if IE 6]>
    <script type="text/javascript" src="./js/iepng.js"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('.adm_pic, #left_box .pos, .span_server, .span_people', 'background');
    </script>
<![endif]-->
</body>
</html>