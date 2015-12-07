<!DOCTYPE HTML PUBLIC>
<html>
<head>
<title>登录 <?php echo SYSTEM_NAME;?></title>
<script type="text/javascript" src="source/js/jquery.min.js"></script>
<SCRIPT TYPE="text/javascript" src="source/js/bootstrap.min.js"></SCRIPT>
<link rel="stylesheet" type="text/css" href="source/css/bootstrap.min.css">
<?php include('header.php');?>
</head>
<body>
<?php if (!defined('SYSTEM_ROOT')) { die('Insufficient Permissions'); }
include  'navibar.php';?>
<div class="row"><div class="col s12">
<?php doAction('login_page_1'); ?>
<?php if (isset($_GET['error_msg'])): ?>
<script type="text/javascript">alert("<?php echo $_GET['error_msg'];?>");</script>
<?php endif;?>
<br/>
<form class="col s12" name="f" method="post" id="loginform" action="index.php?mod=admin:login">
<div class="card blue-grey darken-1">
<div class="card-content white-text">
<span class="card-title" style="margin:0 auto;text-align:center;height:auto;">登录到 <?php echo SYSTEM_NAME; ?></span>
<br/>
<p>请填写账号和密码信息，然后点击下方登录。</p>
<br/>
<div class="row">
  <div class="input-field col s12">
    <i class="mdi-action-account-circle prefix"></i>
    <input id="icon_prefix" name="user" type="text" class="validate">
    <label for="icon_prefix">用户名</label>
  </div>
</div>
<div class="row">
  <div class="input-field col s12">
    <i class="mdi-communication-vpn-key prefix"></i>
    <input id="pw" name="pw" type="password" class="validate">
    <label for="icon_prefix">密码</label>
  </div>
</div>
<button class="btn waves-effect waves-light" id="login" name="action">即刻开启云签到世界
  <i class="mdi-content-send right"></i>
</button>
<a class="waves-effect waves-light btn blue" href="index.php?mod=reg" style="float:right;"><i class="mdi-file-cloud left"></i>还没有账号？立刻注册！</a>
<div id="posting" style="display:none;"><br/><p><i class="mdi-content-send left"></i>正在鉴权，请稍等……</p></div>
<div id="success-login" style="display:none;"><br/><p><i class="mdi-hardware-keyboard-alt left"></i>登录成功，正在跳转……</p></div>
<div id="failed-login" style="display:none;"><br/><p><i class="mdi-content-clear left"></i>登录失败，请检查用户名和密码是否正确。</p></div>
</div>
</div>
</form>
</div>
</div>
<?php include 'footer.php';?>
</body>
<script type="text/javascript">
$(document).ready(function(){
$("#login").click(function(){
$("#posting").fadeIn(1000)
$.ajax({
type: "POST",
url:"index.php?mod=admin:login",
data:$('#loginform').serialize(),// 你的formid
error: function(request) {
$("#posting").fadeOut(300)
},
success: function(data) {
$("#posting").fadeOut(300)
$("#success-login").fadeIn(300);
}
});
});
});
</script>
</html>