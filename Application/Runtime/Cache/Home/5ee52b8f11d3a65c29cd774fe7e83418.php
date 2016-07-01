<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/MyDemo/Public/css/login3_style.css" />
    <link rel="stylesheet" type="text/css" href="/MyDemo/Public/css/back.css" />
    <title>患者登陆</title>
</head>

<body>
<div class="login-container">
    <h1 style="color: #ffffff">患者登陆</h1>

    <div class="connect">
        <p style="color: #ff862f">珍惜生命，关爱健康</p>
    </div>
    <div id="div1"><img src="/MyDemo/Public/images/background/1.jpg" /></div>
    <form id="loginForm" action="login3judge" method="POST">
        <div>
            <input  type="text" name="username" class="username" placeholder="用户名" autocomplete="off"/>
        </div>
        <div>
            <input type="password" name="password" class="password" placeholder="密码" oncontextmenu="return false" onpaste="return false" />
        </div>
        <button id="submit" type="submit">登 陆</button>
    </form>

    <a href="register">
        <button type="button" class="register-tis">还有没有账号？</button>
    </a>

</div>
<script src="/MyDemo/Public/js/jquery.min.js"></script>
<script src="/MyDemo/Public/js/login3.js"></script>
<script src="/MyDemo/Public/js/supersized.3.2.7.min.js"></script>
<script src="/MyDemo/Public/js/jquery.validate.min.js"></script>
<script src="/MyDemo/Public/js/jquery.md5.js"></script>
<script src="/MyDemo/Public/js/CONST.js"></script>

</body>

</html>