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
 <link rel="stylesheet" href="/go/Public/css/ask.css" />
<script type="text/javascript" src='/go/Public/js/ask.js'></script>
<script type="text/javascript">
    var getCate='/go/index.php/Home/Ask/getCate'; 
    <?php if(isset($_SESSION['user_id'])): ?>var coin=<?php echo ($coin[0]['coin']); ?>;
     var uid=<?php echo ($_SESSION['user_id']); ?>;<?php endif; ?>
</script>
</head>
<body>
<!-- top -->
	<div id='top-fixed'>
	<div id='top-bar'>
		<ul class="top-bar-left fl">
				<li><a href="http://www.stdu.edu.cn/" target='_blank'>铁大官网</a></li>
			<li><a href="http://zhidao.baidu.com/" target='_blank'>百度知道</a></li>
		</ul>
		 <?php if(!isset($_SESSION['user_account'])): ?><ul class='top-bar-right fr'>
<!-- 			<li class='userinfo'>
				<a href="" class='uname'></a>
			</li>
			<li style='color:#eaeaf1'>|</li>
			<li><a href="">退出</a></li> -->
	
			<li><a href="" class='login'>登录</a></li>
			<li style='color:#eaeaf1'>|</li>
			<li><a href="/go/index.php/Home/Common/logout" class='register'>注册</a></li>	
		</ul>
                 <?php else: ?>
                 <ul class='top-bar-right fr'>
			<li class='userinfo'>
				<a href="" class='uname'></a>
			</li>
			<li style='color:#eaeaf1'>|</li>
			<li><a href="/go/index.php/Home/Common/logout">退出</a></li>	
			<!-- <li><a href="" class='login'>登录</a></li>
			<li style='color:#eaeaf1'>|</li>
			<li><a href="" class='register'>注册</a></li> -->	
		</ul><?php endif; ?>
	</div>
<!-- 提问搜索框 -->
	<div id='search'>
		<div class='logo'><a href="" class='logo'></a></div>
		<form action="/go/index.php/Home/Cha/index" method='post'>
			<input type="text" name='wen' class='sech-cons'/>
			<input type="submit" class='sech-btn'/>
		</form>
		<a href="/go/index.php/Home/Ask/index" class='ask-btn'></a>
	</div>
<!-- 提问搜索框结束 -->
</div>
<div style='height:110px'></div>
<!----------导航条---------->
<div id='nav'>
	<ul class='list'>
		<li class='nav-sel'><a href="/go/index.php" class='home'>问答首页</a></li>
<!--		<li class='nav-sel ask-cate'>
			<a href="" class='ask-list'><span>问题库</span><i></i></a>
			<ul class='hidden'>
                           <?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
					<a href="/go/index.php/Home/List/index/cid/<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></a>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</li>-->
                <li class='nav-sel'><a href="/go/index.php/Home/Robot/index" class='home'>小问机器人</a></li>
                <li class='nav-sel'><a href="/go/index.php/Home/Shop/index" class='home'>兑换商城</a></li>
	</ul>
</div>

	<!----------注册框---------->
	<div id='register' class='hidden'>
		<div class='reg-title'>
			<p>欢迎注册得声问答</p>
			<a href="" title='关闭' class='close-window'></a>
		</div>
		<div id='reg-wrap'>
			<div class='reg-left'>
				<ul>
					<li><span>账号注册</span></li>
				</ul>
				<div class='reg-l-bottom'>
					已有账号，<a href="" id='login-now'>马上登录</a>
				</div>
			</div>
			<div class='reg-right'>
				<form action="/go/index.php/Home/Common/register" method='post' name='register'>
					<ul>
						
						<li>
							<label for="reg-uname">用户名</label>
							<input type="text" name='username' id='reg-uname'/>
							<span>字母、数字或中文</span>
						</li>
						<li>
							<label for="reg-pwd">密码</label>
							<input type="password" name='pwd' id='reg-pwd'/>
							<span>字母、数字或下划线 _</span>
						</li>
						<li>
							<label for="reg-pwded">确认密码</label>
							<input type="password" name='pwded' id='reg-pwded'/>
							<span>请再次输入密码</span>
						</li>						
						<li class='submit'>
							<input type="submit" value='立即注册'class='zhuce'/>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>

	<!----------登录框---------->	
	<div id='login' class='hidden'>
		<div class='login-title'>
			<p>欢迎您登录得声问答</p>
			<a href="" title='关闭' class='close-window'></a>
		</div>
		<div class='login-form'>
			<span id='login-msg'></span>
			<!-- 登录FORM -->
			<form action="/go/index.php/Home/Common/login" method='post' name='login'>
				<ul>
					<li>
						<label for="login-acc">账号</label>
						<input type="text" name='account' class='input' id='login-acc'/>
					</li>
					<li>
						<label for="login-pwd">密码</label>
						<input type="password" name='pwd' class='input' id='login-pwd'/>
					</li>
					<li class='login-auto'>
						<label for="auto-login">
							<a href="" id='regis-now'>注册新账号</a>
						</label>
						
					</li>
					<li>
						<input type="submit" value='' id='login-btn'/>
					</li>
				</ul>
			</form>
		</div>
	</div>

<!--背景遮罩--><div id='background' class='hidden'></div>
<!-- top结束 -->
<!-- top结束 -->
	<div id='location'>
		<a href="">得声问答</a>&nbsp;>&nbsp;提问
	</div>
<!--------------------中部-------------------->
	<div id='center'>
		<div class='send'>
			<div class='title'>
				<p class='left'>向博学多闻的同学们提问</p>
				<p class='right'>您还可以输入<span id='num'>50</span>个字</p>
			</div>
			<form action="/go/index.php/Home/Ask/add" method='post' name="ask">
				<div class='cons'>
					<textarea name="content"></textarea>
				</div>
				<div class='reward'>                               
					<span id='sel-cate' class='cate-btn'>选择分类</span>                                     
					<ul>
                                            
						<li>                                                  
                                                     <?php if(isset($_SESSION["user_id"])): ?>我的金币：<span><?php echo ($coin[0]['coin']); ?></span><?php endif; ?>
						</li>
                                         
						<li>
					  悬赏：<select name="reward">
								<option value="0">0</option>
								<option value="5">5</option>
								<option value="10">10</option>
								<option value="15">15</option>
								<option value="20">20</option>
								<option value="30">30</option>
								<option value="50">50</option>
								<option value="80">80</option>
								<option value="100">100</option>
					       </select>金币
						</li>
					</ul>
				</div>
				<input type='hidden' name='cid' value='1'/>
				<input type='hidden' name='uid' value='<?php echo ($uid); ?>'/>
                               <div id="tui">
                                    <p class="ti">推荐分类</p>
                                    <ul class="jian">                                                                        
                                    </ul>
                                </div>
				<input type="submit" value='提交问题' class='send-btn' />
			</form>
		</div>
	</div>
	<div id='category'>
		<p class='title'>
			<span>请选择分类</span>
			<a href="" class='close-window'></a>
		</p>
		<div class='sel'>
			<p>为您的问题选择一个合适的分类：</p>
			<select name="cate-one" size='16'>
                            <?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
			<select name="cate-one" size='16' class='hidden'></select>
			<select name="cate-one" size='16' class='hidden'></select>
		</div>
		<p class='bottom'>
			<span id='ok' class="d">确定</span>
		</p>
	</div>
<!--------------------中部结束-------------------->
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