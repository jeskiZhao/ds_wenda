<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="/Application/Admin/Public/css/add_category.css" />
	<title></title>
         <script type="text/javascript" src="/Application/Admin/Public/js/jquery-1.7.2.min.js">    
       </script>
        <script>
           var manager={
               passwdF:false,
               passwdS:false,
           };
           $(function(){
               //第一次密码检验
               $(":input[name='passwdF']").blur(function(){
                   var pwd=$(this).val();
                   var sp=$(this).next();
                   if(pwd==""){
                       var msg="密码不能为空";
                       sp.html(msg);
                   }                 
                   manager.passwdF=true;
               });
               //第二次密码检验
               $(":input[name='passwdS']").blur(function(){
                   var pwdS=$(this).val();
                   var sp=$(this).next();
                   if(pwdS==""){
                       var msg="请确认密码";
                       sp.html(msg);
                   }
                  if(pwdS!=( $(":input[name='passwdF']").val())){
                       var msg="两次密码不同";
                       sp.html(msg);
                  }

                    manager.passwdS=true;
               });
               
              $("form[name='manageredit']").submit(function(){
                  var shi=manager.passwdF&&manager.passwdS;
                  if(shi){
                      return true;
                  }
                  return false;
              }); 
               
           });
        </script>
</head>
<body>
	<form action="/go/index.php/Admin/Manager/edit/adminid/4" method="post" name="manageredit">
		<table class="table">
			<tr >
				<td class="th" colspan="2">添加后台用户</td>
			</tr>
			<tr>
				<td>用户名</td>
				<td><input type="text" name="username" value="<?php echo ($info["admin_account"]); ?>" readonly="readonly"/></td>
				<td><input type="hidden" name="adminid" value="<?php echo ($info["admin_id"]); ?>"/></td>
			</tr>
			<tr>
				<td>密码：</td>
				<td><input type="password" name="passwdF"/><span></span></td>
			</tr>
			<tr>
				<td>确认密码：</td>
				<td><input type="password" name="passwdS"/><span></span></td>
			</tr>
			<tr>
			<td>角色：</td>
			<td>
                           <select name="role">
                             <?php if(is_array($role)): $i = 0; $__LIST__ = $role;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["role_id"]); ?>"
                                        <?php if(($vo["role_id"]) == $info["admin_role_id"]): ?>selected="selected"<?php endif; ?>
                                   >                                
                                   <?php echo ($vo["role_name"]); ?>
                                 </option><?php endforeach; endif; else: echo "" ;endif; ?>                           
                             </select>
                            </td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="修改" class="input_button"/>
					<input type="reset" class="input_button"/>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>