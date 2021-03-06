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
<link rel="stylesheet" href="/go/Public/css/shop.css" />
<script type="text/javascript" src='/go/Public/js/shop.js'></script>
 <link rel="stylesheet" type="text/css" href="/go/Public/css/style.css" />
<script type="text/javascript" src="/go/Public/js/modernizr.custom.53451.js"></script>
<link rel="stylesheet" type="text/css" href="/go/Public/css/init.css" />
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
		<form action="/go/index.php/Home/Cha/index" method=''>
			<input type="text" name='' class='sech-cons'/>
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
                <li class='nav-sel'><a href="/go/index.php/Home/Shop/index" class='home'>商城首页</a></li>
                <li class='nav-sel'><a href="/go/index.php/Home/Shop/hall/id/1" class='home'>礼品馆</a></li>  
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
				<form action="" method='post' name='register'>
					<ul>
						<li>
							<label for="reg-account">账号</label>
							<input type="text" name='account' id='reg-account'/>
							<span>7-20个字符：以字母开头的字母、数字或下划线 _</span>
						</li>
						<li>
							<label for="reg-uname">用户名</label>
							<input type="text" name='username' id='reg-uname'/>
							<span>2-14个字符：字母、数字或中文</span>
						</li>
						<li>
							<label for="reg-pwd">密码</label>
							<input type="password" name='pwd' id='reg-pwd'/>
							<span>6-20个字符:字母、数字或下划线 _</span>
						</li>
						<li>
							<label for="reg-pwded">确认密码</label>
							<input type="password" name='pwded' id='reg-pwded'/>
							<span>请再次输入密码</span>
						</li>
						<li>
							<label for="reg-verify">验证码</label>
							<input type="text" name='verify' id='reg-verify'/>
							<img src="" width='99' height='35' alt="验证码" id='verify-img'/>
							<span>请输入图中的字母或数字，不区分大小写</span>
						</li>
						<li class='submit'>
							<input type="submit" value='立即注册'/>
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
							<input type="checkbox" checked='checked' name='auto'  id='auto-login'/>&nbsp;下一次自动登录
						</label>
						<a href="" id='regis-now'>注册新账号</a>
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
<div id="center">
      <div id="container">
			<section id="dg-container" class="dg-container">
				<div class="dg-wrapper">
                                    <?php if(is_array($lun)): $i = 0; $__LIST__ = $lun;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo ($v["lian"]); ?>"><img src="<?php echo ($v["pic"]); ?>" alt="image01"><div><?php echo ($v["content"]); ?></div></a><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<nav>	
					<span class="dg-prev">&lt;</span>
					<span class="dg-next">&gt;</span>
				</nav>
			</section>
       </div>   
    
    <!--商品展示-->   
    <div>
         <div id="fenlei">
	     <div class="left">
		    <ul>
			   <li class="tui">最新推荐</li>
			   <li class="nei" onmouseover="show('huayu')"><?php echo ($biao1["name"]); ?></li>
			   <li class="nei" onmouseover="show('rihan')"><?php echo ($biao2["name"]); ?></li>
			   <li class="nei" onmouseover="show('oumei')"><?php echo ($biao3["name"]); ?></li>
                     
	           </ul>
			<hr>
			 <div id="huayu">
			    <div class="huayi">
                                <?php if(is_array($b1)): $i = 0; $__LIST__ = $b1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="hangyi"><a href="/go/index.php/Home/Shop/thing/gid/<?php echo ($v["id"]); ?>"><img src="<?php echo ($v["pic"]); ?>" /><p><?php echo ($v["simintroduce"]); ?></p></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
			 </div>
			 <div id="rihan">
			    <div class="huayi">
				   <?php if(is_array($b2)): $i = 0; $__LIST__ = $b2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="hangyi"><a href="/go/index.php/Home/Shop/thing/gid/<?php echo ($v["id"]); ?>"><img src="<?php echo ($v["pic"]); ?>" /><p><?php echo ($v["simintroduce"]); ?></p></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
			 </div>
			  <div id="oumei">
			    <div class="huayi">
				  <?php if(is_array($b3)): $i = 0; $__LIST__ = $b3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="hangyi"><a href="/go/index.php/Home/Shop/thing/gid/<?php echo ($v["id"]); ?>"><img src="<?php echo ($v["pic"]); ?>" /><p><?php echo ($v["simintroduce"]); ?></p></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
			 </div>
		 </div>
             <!--右侧开始-->
             
	     <div id="right">
                    <div id="shang">
		       <?php if(!isset($_SESSION['user_account'])): ?><div class='r-login'>
			<span class='login'><i></i>&nbsp;登录</span>
			<span class='register'><i></i>&nbsp;注册</span>
		      </div>
                <?php else: ?>
		<div class='userinfo'>
                         <?php $id=session('user_id'); $info=M('user')->where('id='.$id)->select(); ?>
			<dl>
				<dt>
					<a href="/go/index.php/Home/Member/index"><img src="<?php echo ($info[0]['face']); ?>" width='48' height='48' alt=""/></a>
				</dt>
				<dd class='username'>
					<a href="/go/index.php/Home/Member/index">
						<b><?php echo ($info[0]['account']); ?></b>
					</a>
					<a href="/go/index.php/Home/Member/index">
						<i class='level lv1' title='Level 1'></i>
					</a>
				</dd>
				<dd>金币：<a href="" style="color: #888888;"><?php echo ($info[0]['coin']); ?><b class='point'></b></a></dd>
				<dd>经验值：<?php echo ($info[0]['experince']); ?></dd>
			</dl>
			<table>
				<tr>
					<td>回答数</td>
					<td>采纳率</td>
					<td class='last'>提问数</td>
				</tr>
				<tr>
					<td><a href=""><?php echo ($info[0]['answer']); ?></a></td>
					<td><a href=""><?php echo floor($info[0]['adopt']/$info[0]['answer']*100) ?>%</a></td>
					<td class='last'><a href=""><?php echo ($info[0]['ask']); ?></a></td>
				</tr>
			</table>			
		</div><?php endif; ?>
                        </div>
                
                <!--公告-->
                <div id="gonggao">
                    <p>商城公告</p>
                    <ul>
                        <?php if(is_array($notice)): $i = 0; $__LIST__ = $notice;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="/go/index.php/Home/Shop/notice/id/<?php echo ($v["id"]); ?>"> <li><?php echo ($v["title"]); ?></li></a><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
               
	   </div>
             <!--右侧结束-->
             
	 </div>
    </div>  
</div>

<!--流程开始-->
<div id="liu">
    <div class="dui">礼品兑换流程</div>
    <img src="/go/Public/images/liucheng.jpg">
</div>
<!--流程结束-->
<!--底部-->
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
<script type="text/javascript" src="/go/Public/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/go/Public/js/jquery.gallery.js"></script>
<script type="text/javascript">
$(function() {
		$('#dg-container').gallery();
	 });
</script/>