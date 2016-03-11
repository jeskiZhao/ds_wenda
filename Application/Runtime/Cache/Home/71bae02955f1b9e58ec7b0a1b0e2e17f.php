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
		<li class='nav-sel'><a href="/go/index.php/Home/Search/index" class='home'>得声搜索</a></li>
<!--                <li class='nav-sel'><a href="/go/index.php/Home/Search/phpanalysis" class='home'>Phpanalysis搜索</a></li>
                <li class='nav-sel'><a href="/go/index.php/Home/Search/tpfenci" class='home'>tp搜索</a></li>
                <li class='nav-sel'><a href="/go/index.php/Home/Search/self" class='home'>二元搜索</a></li>-->
               
	        </ul>
            </div>
         </div>
	<!-- 搜索顶部结束 -->
	<!-- 搜索顶部结束 -->
<div id="zhong">
	<!-- 搜索框 -->
	<div class="search_box">
            <form action="/go/index.php/Home/Search/index" method="post">
		<input type="text" name="wen" class="searchInput" value="<?php echo ($wen); ?>" />
		<input type="submit" value="搜索答案" class="sub"/>
                </form>
		<a href="/go/index.php/Home/Ask/index">我要提问</a>
	</div>
	<!-- 搜索框结束 -->
	<!-- 搜索内容 -->
	<div class="searcont">
            <?php if($rone): if(is_array($rone)): $i = 0; $__LIST__ = $rone;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><ul>
			<li> <a href="/go/index.php/Home/Question/index/qid/<?php echo ($v["id"]); ?>" class="title"><?php echo ($v["content"]); ?></a> </li>
			<li><?php echo ($v["hui"]); ?>,..</li>
			<li class="time"><span><a href="/go/index.php/Home/Question/index/qid/<?php echo ($v["id"]); ?>">www.wenda.com/go/Question/index/qid/<?php echo ($v["id"]); ?></span> - 提问时间: <?php echo (date("Y-m-d",$v["time"])); ?></a></li>
		</ul><?php endforeach; endif; else: echo "" ;endif; ?>
                <?php else: ?>
                  <?php if(is_array($rtwo)): $i = 0; $__LIST__ = $rtwo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><ul>
			<li> <a href="/go/index.php/Home/Question/index/qid/<?php echo ($vo["id"]); ?>" class="title"><?php echo ($vo["content"]); ?></a> </li>
			<li><?php echo ($vo["hui"]); ?>,..</li>
			<li class="time"><span><a href="/go/index.php/Home/Question/index/qid/<?php echo ($vo["id"]); ?>">www.wenda.com/go/Question/index/qid/<?php echo ($vo["id"]); ?></span> - 提问时间: <?php echo (date("Y-m-d",$vo["time"])); ?></a></li>
		  </ul><?php endforeach; endif; else: echo "" ;endif; endif; ?>          
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