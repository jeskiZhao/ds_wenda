<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title><?php echo (C("webname")); ?></title>
	<meta name="keywords" content="<?php echo (C("keywords")); ?>"/>
	<meta name="description" content="<?php echo (C("description")); ?>"/>
	<link rel="stylesheet" href="/go/Public/css/common.css" />
	<script type="text/javascript" src='/go/Public/js/jquery-1.7.2.min.js'></script>
	<script type="text/javascript" src='/go/Public/js/top-bar.js'></script>
	<script type="text/javascript" src='/go/Public/js/register.js'></script>
	<link rel="stylesheet" href="/go/Public/css/index.css" />
        <link rel="stylesheet" href="/go/Public/css/search.css" /> 
        <script type="text/javascript" src='/go/Public/js/cha.js'></script>
</head>
<body>
	<!-- 搜索顶部 -->
        <div id="ding">
	<div class="search_top">
		<div class="sealeft">
			<a href=""><img src="" alt="" /></a>
			<a href="/go/index.php">得声首页</a>
			<a href=""></a>
		</div>            
	</div>
           <div class="biao">
                    得声校园问答搜索系统
           </div>
            <div class="sou">
                <ul class='list'>
		<li class='nav-sel'><a href="/go/index.php/Home/Cha/index" class='home'>得声搜索</a></li>
<!--                <li class='nav-sel'><a href="/go/index.php/Home/Cha/phpanalysis" class='home'>Phpanalysis搜索</a></li>
                <li class='nav-sel'><a href="/go/index.php/Home/Cha/tpfenci" class='home'>tp搜索</a></li>
                <li class='nav-sel'><a href="/go/index.php/Home/Cha/self" class='home'>二元搜索</a></li>-->
               
	        </ul>
            </div>
         </div>
	<!-- 搜索顶部结束 -->
	<!-- 搜索顶部结束 -->
	<!-- 搜索框 -->
        <div id="zhong">
	<div class="search_box">
            <form action="/go/index.php/Home/Cha/index" method="post">
		<input type="text" name="wen" class="searchInput" value="<?php echo ($wen); ?>" />
		<input type="submit" value="搜索答案" class="sub"/>
            </form>
		<a href="/go/index.php/Home/Ask/index">我要提问</a>
	</div>
	<!-- 搜索框结束 -->
	<!-- 搜索内容 -->
	<div class="searcont" id="di">
		<ul>
			<li class="title">抱歉，暂时没有找到与<?php echo ($wen); ?>相关的问题，您可以： </li>
			<li><a href="/go/index.php/Home/Ask/index">到得声校园问答提问</a></li>
			<li>换一种方式提问</li>
		</ul>

	</div>
	<!-- 搜索内容结束 -->
        </div>

<!-- 底部 -->
	<div id='bottom'>
		<p><?php echo (C("copy")); ?></p>
		<p><?php echo (C("record")); ?></p>
	</div>
<!--[if IE 6]>
    <script type="text/javascript" src="/go/Public/Js/iepng.js"></script>
    <script type="text/javascript">
    	DD_belatedPNG.fix('.logo','background');
        DD_belatedPNG.fix('.nav-sel a','background');
        DD_belatedPNG.fix('.ask-cate i','background');
    </script>
<![endif]-->
</body>
</html>