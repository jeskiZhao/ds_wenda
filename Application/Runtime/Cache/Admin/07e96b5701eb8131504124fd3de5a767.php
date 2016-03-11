<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="/Application/Admin/Public/css/public.css" />
</head>
<body>
	<form action="/go/index.php/Admin/Reward/coin" method='post'>
		<table class="table">
			<tr>
				<th colspan='2'>经验级别规则设置</th>
			</tr>
			<tr>
				<td align='right'>登录：</td>
				<td>
					+ <input type="text" name='lv_login' value='<?php echo (C("LV_LOGIN")); ?>' />
				</td>
			</tr>
			<tr>
				<td align='right'>提问：</td>
				<td>
					+ <input type="text" name='lv_ask' value='<?php echo (C("LV_ASK")); ?>' />
				</td>
			</tr>
			<tr>
				<td align='right'>回答：</td>
				<td>
					+ <input type="text" name='lv_answer' value='<?php echo (C("LV_ANSWER")); ?>' />
				</td>
			</tr>
			<tr>
				<td align='right'>采纳：</td>
				<td>
					+ <input type="text" name='lv_adopt' value='<?php echo (C("LV_ADOPT")); ?>' />
				</td>
			</tr>
		</table>
		<table class='table'>
			<tr>
				<th colspan='8'>各等级所需经验</th>
			</tr>
			<tr>
				<td align="right">LV1:</td>
				<td>
					<input type="text" name='lv1' value='<?php echo (C("LV1")); ?>' />
				</td>
				<td align="right">LV2:</td>
				<td>
					<input type="text" name='lv2' value='<?php echo (C("LV2")); ?>' />
				</td>
				<td align="right">LV3:</td>
				<td>
					<input type="text" name='lv3' value='<?php echo (C("LV3")); ?>' />
				</td>
			</tr>
			<tr>
				<td align="right">LV4:</td>
				<td>
					<input type="text" name='lv4' value='<?php echo (C("LV4")); ?>' />
				</td>
			
				<td align="right">LV5:</td>
				<td>
					<input type="text" name='lv5' value='<?php echo (C("LV5")); ?>' />
				</td>
		
				<td align="right">LV6:</td>
				<td>
					<input type="text" name='lv6' value='<?php echo (C("LV6")); ?>' />
				</td>
			</tr>
			<tr>
				<td align="right">LV7:</td>
				<td>
					<input type="text" name='lv7' value='<?php echo (C("LV7")); ?>' />
				</td>
			
				<td align="right">LV8:</td>
				<td>
					<input type="text" name='lv8' value='<?php echo (C("LV8")); ?>' />
				</td>
		
				<td align="right">LV9:</td>
				<td>
					<input type="text" name='lv9' value='<?php echo (C("LV9")); ?>' />
				</td>
			</tr>
			<tr>
				<td align="right">LV10:</td>
				<td>
					<input type="text" name='lv10' value='<?php echo (C("LV10")); ?>' />
				</td>
		
				<td align="right">LV11:</td>
				<td>
					<input type="text" name='lv11' value='<?php echo (C("LV11")); ?>' />
				</td>
			
				<td align="right">LV12:</td>
				<td>
					<input type="text" name='lv12' value='<?php echo (C("LV12")); ?>' />
				</td>
			</tr>
			<tr>
				<td colspan='8' align='center' height='60'>
					<input type="submit" value='保存修改' class='input_button'/>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>