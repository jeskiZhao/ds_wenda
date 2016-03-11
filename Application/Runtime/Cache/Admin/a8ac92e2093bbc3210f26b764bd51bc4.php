<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
      <head>
            <title>后台主页</title>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
             <link rel="stylesheet" href="/Application/Admin/Public/css/bootstrap.min.css" />
            <link rel="stylesheet" href="/Application/Admin/Public/css/matrix-style_pt.css" />           
      </head>
<body>
<!--main-container-part-->
<div id="content">
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon">  <i class="icon-ok"></i>  </span>
            <h5>我的个人信息</h5>
          </div>
          <div class="widget-content nopadding">
            <ul class="recent-posts">
				<li>
					<div style="border-bottom:1px dashed #CDCDCD;">
						<p style="margin-top:4px">您好,<?php echo ($info["account"]); ?></p>
						<p style="margin-top:4px">所属角色：<?php echo ($rolename["role_name"]); ?></p>
					</div>
					<div style="margin-top:10px;padding:5px">
						<p style="margin-top:4px">上次登录时间：<?php echo (date("Y-m-d H:i:s",$info["logintime"])); ?></p>
						<p style="margin-top:4px">上次登录IP：<td><?php echo ($info["loginip"]); ?></td></p>
					</div>
				</li>
			</ul>
          </div>
        </div>

<div class="widget-box">
          <div class="widget-title"> <span class="icon">  <i class="icon-ok"></i>  </span>
            <h5>得声校园问答系统信息</h5>
          </div>
          <div class="widget-content nopadding">
            <ul class="recent-posts">
				<li>				
					<p style="margin-top:4px">版权所有：Zhao</p>
					<p style="margin-top:4px">开发者:赵顺杰</p>
					<p style="margin-top:4px">联系方式：18330107990 </p>
				        <p style="margin-top:4px">&nbsp;</p>
				</li>
			</ul>
          </div>
</div>
      </div>
<div class="span6">
      <div class="widget-box">
          <div class="widget-title"> <span class="icon">  <i class="icon-ok"></i>  </span>
            <h5>基本信息</h5>
          </div>
          <div class="widget-content nopadding">
           <ul class="recent-posts">
				<li>				
					<p style="margin-top:4px">版本：1.0 [查看最新版本]</p>
					<p style="margin-top:4px">操作系统：<?php echo ($win); ?> </p>
					<p style="margin-top:4px">服务器软件：<?php echo ($apache); ?> </p>
					<p style="margin-top:4px">MySQL 版本：<?php echo ($mysql); ?></p>
                                        <p style="margin-top:-7px">&nbsp;</p>
				</li>
			</ul>
          </div>
</div>
</div>
   <div class="span6" id="gan">
         <div class="widget-box">
          <div class="widget-title"> <span class="icon">  <i class="icon-ok"></i>  </span>
            <h5>系统介绍</h5>
          </div>
          <div class="widget-content nopadding">
            <ul class="recent-posts">
        <li>
          <div style="border-bottom:1px dashed #CDCDCD;">
            <p style="margin-top:4px;">※本系统为得声校园问答系统</p>
            <p style="margin-top:4px;">※校内交流问答平台</p>
          </div>
          <div style="margin-top:10px;padding:5px">
            <p style="margin-top:4px;">※ 谢谢您的使用</p>
     
          </div>
        </li>
      </ul>
          </div>
        </div>
      </div>
</div>
</div>
</body>
</html>