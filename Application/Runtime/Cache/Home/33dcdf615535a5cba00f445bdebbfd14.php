<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/MyDemo/Public/css/login3_style.css" />
    <link rel="stylesheet" type="text/css" href="/MyDemo/Public/css/back.css" />
    <title>医师登陆</title>
</head>

<body>
<div class="login-container">
    <h1 style="color: #ffffff">医师登陆</h1>

    <div id="div1"><img src="/MyDemo/Public/images/background/6.jpg" /></div>
    <form id="loginForm" action="login2judge" method="POST">
        <div>
            <input  type="text" name="username" class="username" placeholder="工号" autocomplete="off"/>
        </div>
        <div>
            <input type="password" name="password" class="password" placeholder="密码" oncontextmenu="return false" onpaste="return false" />
        </div>
        <button type="submit">登 陆</button>
    </form>

</div>
<script src="/MyDemo/Public/js/jquery.min.js"></script>
<script src="/MyDemo/Public/js/supersized.3.2.7.min.js"></script>
<script src="/MyDemo/Public/js/jquery.validate.min.js"></script>
<script src="/MyDemo/Public/js/jquery.md5.js"></script>
<script src="/MyDemo/Public/js/CONST.js"></script>

</body>

</html>