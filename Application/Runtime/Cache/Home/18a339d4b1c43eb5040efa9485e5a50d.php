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
	<link rel="stylesheet" href="/go/Public/css/member.css" />
	
</head>
<body>
	<!-- top -->
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
<!--------------------中部-------------------->
	<div id='center'>
<!-- 左侧 -->
<div id='left'>
		<div class='userinfo'>
			<dl>
                            <?php $userid=session('user_id'); $user=M('user')->where('id='.$userid)->select(); ?>
				<dt>
					<a href=""><img src="<?php echo ($user[0]['face']); ?>" width='48' height='48' alt="占位符"/></a>
				</dt>
				<dd class='username'>
					<a href=""><b><?php echo ($user[0]['account']); ?></b>
					</a>
					<a href="">
						<i class='level lv1' title='Level 1'></i>
					</a>
				</dd>
				<dd>金币：<a href="" style="color: #888888;"><b class='point'><?php echo ($user[0]['coin']); ?></b></a></dd>
				<dd>经验值：<?php echo ($user[0]['experince']); ?></dd>
			</dl>
			<table>
				<tr>
					<td>回答数</td>
					<td>采纳率</td>
					<td class='last'>提问数</td>
				</tr>
				<tr>
					<td><a href=""><?php echo ($user[0]['answer']); ?></a></td>
					<td><a href=""><?php echo floor($user[0]['adopt']/$user[0]['answer']*100) ?>%</a></td>
					<td class='last'><a href=""><?php echo ($user[0]['ask']); ?></a></td>
				</tr>
			</table>
		</div>

	<ul>
            <li class='myhome <?php if(ACTION_NAME == index ): ?>cur<?php endif; ?>'>
			<a href="/go/index.php/Home/Member/index">我的首页</a>
		</li>
		<li class='myask <?php if(ACTION_NAME == myask ): ?>cur<?php endif; ?>'>
			<a href="/go/index.php/Home/Member/myask">我的提问</a>
		</li>
		<li class='myanswer <?php if(ACTION_NAME == myanswer ): ?>cur<?php endif; ?>'>
			<a href="/go/index.php/Home/Member/myanswer">我的回答</a>
		</li>
		<li class='mylevel <?php if(ACTION_NAME == mylevel ): ?>cur<?php endif; ?>'>
			<a href="/go/index.php/Home/Member/mylevel">我的等级</a>
		</li>
		<li class='mygold <?php if(ACTION_NAME == mycoin ): ?>cur<?php endif; ?>'>
			<a href="/go/index.php/Home/Member/mycoin">我的金币</a>
		</li>
                <li class='mygood  <?php if(ACTION_NAME == mygood ): ?>cur<?php endif; ?>'>
			<a href="/go/index.php/Home/Member/mygood">我的兑换</a>
		</li>
		<li class='myface <?php if(ACTION_NAME == myface ): ?>cur<?php endif; ?>'>
			<a href="/go/index.php/Home/Member/myface">上传头像</a>
		</li>
		

		<li style="background:none"></li>
	</ul>
</div>
<!-- 左侧结束 -->
		<div id='right'>
			<p class='title'>我的金币</p>
			<p class='lv-info'>
                            <?php if($coin): ?>您现有金币<span><?php echo ($coin); ?></span>
                                        <?php else: ?>					
                                        您还没有金币，赶紧向着高富帅去奋斗吧！<?php endif; ?>
			</p>
			<div class='lv-rule'>
				<p><span>金币获取</span></p>
				<table class='lv-exp'>
					<tr>
						<th>操作</th>
						<th>获得金币</th>
					</tr>
					<tr>
						<td>回答</td>
						<td>+<?php echo (C("ANSWER")); ?>金币</td>
					</tr>
					<tr>
						<td>回答被采纳</td>
						<td>+<?php echo (C("ACCEPT")); ?>金币</td>
					</tr>
					<tr>
						<td>回答被删除：</td>
						<td>-<?php echo (C("DEL_ANSWER")); ?>金币</td>
					</tr>
					<tr>
						<td>提问被删除：</td>
						<td>-<?php echo (C("DEL_ASK")); ?>金币</td>
					</tr>
					<tr>
						<td>采纳回答被删除</td>
						<td>提问者：-<?php echo (C("DEL_ACCEPT_ANSWER")); ?>金币&nbsp;&nbsp;回答者：-<?php echo (C("DEL_ACCEPT_ANSWER")); ?>金币</td>
					</tr>
				</table>
			</div>
		</div>
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
<!-- 底部结束 -->