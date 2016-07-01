<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>患者注册</title>
	<link rel="stylesheet" type="text/css" href="/MyDemo/Public/css/login3_style.css" />
	<link rel="stylesheet" type="text/css" href="/MyDemo/Public/css/back.css" />
<body>

<div class="register-container">
	<h1>用 户 注 册</h1>
	
	<div class="connect">
		<p style="color: #ac2925">珍惜生命 关爱健康</p>
	</div>
	<div id="div1"><img src="/MyDemo/Public/images/background/2.jpg" /></div>
	<form action="user3Add" method="post" id="registerForm">
		<div>
			<input type="text" name="username" class="username" placeholder="您的用户名" autocomplete="off"/>
		</div>
		<div>
			<input type="text" name="nickname" class="nickname" placeholder="输入您的昵称" autocomplete="off" />
		</div>
		<div>
			<input type="password" name="password" class="password" placeholder="输入密码" oncontextmenu="return false" onpaste="return false" />
		</div>
		<div>
			<input type="password" name="confirm_password" class="confirm_password" placeholder="再次输入密码" oncontextmenu="return false" onpaste="return false" />
		</div>
		<div>
			<input type="text" name="phonenum" class="phone_number" placeholder="输入手机号码" autocomplete="off" id="number"/>
		</div>
		<div>
			<input type="email" name="email" class="email" placeholder="输入邮箱地址" oncontextmenu="return false" onpaste="return false" />
		</div>

		<button id="submit" type="submit">注 册</button>
	</form>
	<a href="login3">
		<button type="button" class="register-tis">已经有账号？</button>
	</a>

</div>


<script src="/MyDemo/Public/js/jquery.min.js"></script>
<script src="/MyDemo/Public/js/login3.js"></script>
<script src="/MyDemo/Public/js/jquery.validate.min.js?var1.14.0"></script>
<script src="/MyDemo/Public/js/CONST.js"></script>
</body>
</html>