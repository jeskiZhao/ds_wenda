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
  <link rel="stylesheet" href="/go/Public/css/list.css" />
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
        <!-- top 结束-->

	<div id='location'>
		<a href="/go/index.php/Home/List/index/cid/0">全部分类</a>
			<?php if(is_array($bread)): $i = 0; $__LIST__ = $bread;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>&gt;&nbsp;<a href="/go/index.php/Home/List/index/cid/<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></a>&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
	</div>

<!--------------------中部-------------------->
	<div id='center'>
		<div id='left'>
			<div id='cate-list'>
				<p class='title'>按分类查找</p>
				<ul>
                                    <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
						<a href="/go/index.php/Home/List/index/cid/<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></a>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
				
				</ul>
			</div>
			<div id='answer-list'>
				<ul class='ans-sel'>
					<li class='on'>
						<a href="">问题</a>
					</li>
			
				</ul>
				<!-- 待解决问题 -->
				<table>
					<tr>
						<th class='t1'>标题</th>
						<th>回答数</th>
						<th>时间</th>
					</tr>
                                         <?php if(is_array($ask)): $i = 0; $__LIST__ = $ask;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
							<td class='t1 cons'>
								<a href="/go/index.php/Home/Question/index/qid/<?php echo ($v["id"]); ?>">
									<b><?php echo ($v["reward"]); ?></b><?php echo ($v["content"]); ?></a>&nbsp;&nbsp;[<?php echo ($v["name"]); ?>]
							</td>
							<td><?php echo ($v["answer"]); ?></td>
							<td><?php echo (date("y-m-d h:i:s",$v["time"])); ?></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		
					<tr class='page'>
						<td>
							<?php echo ($page); ?>
						</td>
					</tr>
				</table>

			</div>
		</div>

<!-- 右侧 -->
		<!-- 右侧 -->
		<div id='right'>
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
			<ul>
				<li><a href="/go/index.php/Home/Member/myask">我提问的</a></li>
				<li><a href="/go/index.php/Home/Member/myanswer">我回答的</a></li>
			</ul>
		</div><?php endif; ?>
		<!-- <div class='r-login'>
			<span class='login'><i></i>&nbsp;登录</span>
			<span class='register'><i></i>&nbsp;注册</span>
		</div> -->
	<div class='clear'></div>
        
        <!--问答之星-->
	<div class='star'>
		<p class='title'>得声问答之星</p>
		<span class='star-name'>本日回答问题最多的人</span>
                <?php $today=strtotime(date('Y-m-d')); $sql="select account,face,answer,u.adopt,a.content from ds_user u join ds_answer a on u.id=a.uid  where a.time>".$today." order by count(a.id) desc"; $u=M('user')->query($sql); ?>
			<div class='star-info'>
				<div>
					<a href="" class='star-face'>
						<img src="<?php echo ($u[0]['face']); ?>" width='48px' height='48px' alt="头像站位"/>
					</a>
					<ul>
						<li><a href=""><?php echo ($u[0]['account']); ?></a></li>
						<i class='level lv1' title='Level 1'></i>
					</ul>
				</div>
				<ul class='star-count'>
					<li>回答数：<span><?php echo ($u[0]['answer']); ?></span></li>
					<li>采纳率：<span><?php echo floor($u[0]['adopt']/$u[0]['answer']*100) ?>%</span></li>
				</ul>
			</div>
		<span class='star-name'>历史回答问题最多的人</span>
                   <?php $sql="select account,face,answer,adopt from ds_user order by answer desc limit 1"; $m=M('user')->query($sql); ?>
		<div class='star-info'>
			<div>
				<a href="" class='star-face'>
					<img src="<?php echo ($m[0]['face']); ?>" width='48px' height='48px' alt="头像站位"/>
				</a>
				<ul>
					<li><a href=""><?php echo ($m[0]['account']); ?></a></li>
					<i class='level lv1' title='Level 1'></i>
				</ul>
			</div>
			<ul class='star-count'>
				<li>回答数：<span><?php echo ($m[0]['answer']); ?></span></li>
				<li>采纳率：<span><?php echo floor($m[0]['adopt']/$m[0]['answer']*100) ?>%</span></li>
			</ul>
		</div>
	</div>
	<div class='star-list'>
		<p class='title'>得声问答助人光荣榜</p>
                 <?php $sql="select account,face,answer,u.adopt from ds_user u join ds_answer a on u.id=a.uid  group by u.account order by answer desc limit 5"; $b=M('user')->query($sql); ?>
		<div>
			<ul class='ul-title'>
				<li>用户名</li>
				<li style='text-align:right;'>帮助过的人数</li>
			</ul>
			<ul class='ul-list'>
                           <?php foreach($b as $v){ ?>
				<li>
					<a href=""><i class='rank r1'></i><?php echo ($v["account"]); ?></a>
					<span><?php echo ($v["answer"]); ?></span>
				</li>
		            <?php } ?>	
			</ul>
		</div>
	</div>
</div>
<!-- ---右侧结束---- -->	
<!-- ---右侧结束---- -->
	</div>
<!--------------------中部结束-------------------->

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
<!-- 底部结束 -->