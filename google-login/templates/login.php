<!DOCTYPE html>
<html>
<head>
<title><?php echo SYSTEM_NAME ?></title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<meta name="HandheldFriendly" content="true">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="author" content="kookxiang">
<link rel="shortcut icon" href="favicon.ico">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="renderer" content="webkit">
<link rel="stylesheet" href="./templates/simple/style/main.css?version=1.14.6.2" type="text/css"></head>
<body>
<div class="wrapper" id="page_login">
<h1><?php echo SYSTEM_NAME ?></h1>
<p class="title_desc">麻麻再也不用担心我断签了~</p>
<div id="content-login" class="center-box">
<img src="./templates/simple/style/no_avatar.png" class="avatar">
<form name="f" method="post" action="<?php echo SYSTEM_URL ?>index.php?mod=admin:login">
<div class="login-info">
<p><input type="text" name="user" required tabindex="1" placeholder="用户名"></p>
<p><input type="password" name="pw" id="pw" required tabindex="2" placeholder="密码"></p>
</div>
<p><input type="submit" value="登录" tabindex="3" /></p>
</form></div>
<div id="content-register" class="hidden center-box">
<img src="./templates/simple/style/no_avatar.png" class="avatar">
<form name="f" method="post" action="<?php echo SYSTEM_URL ?>index.php?mod=admin:reg">
<div class="login-info">
<p><input type="text" name="user" required tabindex="1" placeholder="用户名"/></p>
<p><input type="password" name="pw" id="pw" required tabindex="2" placeholder="密码"/></p>
<p><input type="text" name="mail" id="mail" required tabindex="3" placeholder="邮箱"/></p>
<?php 
$yr_reg = option::get('yr_reg');
if (!empty($yr_reg)) { ?>
<div class="login-info">
  <input type="text" name="yr" id="yr" required placeholder="邀请码"/>
</div>
<?php } ?>
</div>
<?php
if (option::get('enable_reg') != 1) {
echo '<p><p><input type="submit" value="停止注册" tabindex="4" /></p>';
} 
else
echo '<p><p><input type="submit" value="注册" tabindex="4" /></p>';
?>
</form></div>
<div id="content-lostpass" class="hidden center-box">
<img src="./templates/simple/style/no_avatar.png" class="avatar">
<form method="post" action="<?php echo SYSTEM_URL ?>index.php?pub_plugin=dl_zhmm&page=yz&zhmm">
<div class="login-info">
<p><input type="text" name="mail" id="mail" required tabindex="2" placeholder="邮箱"></p>
</div>
<p><input type="submit" value="找回密码" tabindex="3"></p>
</form>
</div>
<p class="other">
<a href="javascript:;" id="menu_login" class="current">已有账号？点击登陆</a>
<a href="javascript:;" id="menu_register">注册新账号</a>
<a href="https://www.tbsign.cn/tool/forget/" id="menu_lostpass">忘记在哪站</a>
</p>
<script src="/uploads/common/js/jquery-1.4.2.min.js" type="text/javascript"></script>
<style>
.black_overlay{
display: none;
position: absolute;
top: 0%;
left: 0%;
width: 100%;
height: 100%;
background-color: black;
z-index:1001;
-moz-opacity: 0.8;
opacity:.80;
filter: alpha(opacity=80);
}
.white_content {
display: none;
position: absolute;
top: 42%;
left: 40%;
width: 20%;
height: 15%;
border: 16px solid #E0E0E0;
background-color: white;
z-index:1002;
overflow: auto;
}
.white_content_small {
display: none;
position: absolute;
top: 20%;
left: 30%;
width: 40%;
height: 50%;
border: 16px solid #E0E0E0;
background-color: white;
z-index:1002;
overflow: auto;
}
</style>
<script type="text/javascript">
//弹出隐藏层
function ShowDiv(show_div,bg_div){
document.getElementById(show_div).style.display='block';
document.getElementById(bg_div).style.display='block' ;
var bgdiv = document.getElementById(bg_div);
bgdiv.style.width = document.body.scrollWidth;
// bgdiv.style.height = $(document).height();
$("#"+bg_div).height($(document).height());
};
//关闭弹出层
function CloseDiv(show_div,bg_div)
{
document.getElementById(show_div).style.display='none';
document.getElementById(bg_div).style.display='none';
};
</script>
<?php 
if($_REQUEST['error_msg']!=""){echo '<body onload="ShowDiv(\'MyDiv\',\'fade\')">';}
?>
<div id="fade" class="black_overlay">
</div>
<div id="MyDiv" class="white_content">
<div style="text-align: right; cursor: default; height: 40px;">
<span style="font-size: 16px;" onclick="CloseDiv('MyDiv','fade')">×</span>
</div>
<p><?php echo SYSTEM_NAME ?>温馨提示：<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_REQUEST['error_msg']; ?>
</div>
<div class="footer">
<ul>
<li>版本:V<?php echo SYSTEM_VER ?>  作者: <a href="http://zhizhe8.net" target="_blank">无名智者</a> @ <a href="http://www.stus8.com/" target="_blank">StusGame GROUP</a></li>
</ul>
</div>
<script src="./templates/simple/js/jquery-1.10.2.min.js?version=1.14.6.2"></script>
<script src="./templates/simple/js/member.js?version=1.14.6.2"></script>
</div>

</body>
</html>