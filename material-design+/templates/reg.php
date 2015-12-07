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
<?php doAction('reg_page_1'); ?>
<?php if (isset($_GET['error_msg'])): ?>
<script type="text/javascript">alert("<?php echo $_GET['error_msg'];?>");</script>
<?php endif;?>
<br/>
<?php if (option::get('enable_reg') != 1){
?>
<h3 style="text-align:Center;">果咩，此站点已经停止注册:(<br/><br/>下次记得早点来哦XD</h3>
<?php
}
else{
?>
<form class="col s12" name="f" method="post" id="loginform" action="index.php?mod=admin:reg">
<div class="card blue-grey darken-1">
<div class="card-content white-text">
<span class="card-title" style="margin:0 auto;text-align:center;height:auto;">注册 <?php echo SYSTEM_NAME; ?></span>
<br/>
<p>请填写账号、密码、邮箱等关键信息，然后点击下方注册，即可享受云签到。</p>
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
<div class="row">
  <div class="input-field col s12">
    <i class="mdi-content-mail prefix"></i>
    <input id="email" name="email" type="email" class="validate">
    <label for="icon_prefix">邮箱</label>
  </div>
</div>
<?php 
$yr_reg = option::get('yr_reg');
if (!empty($yr_reg)) { ?>
<div class="row">
  <div class="input-field col s12">
    <i class="mdi-social-group prefix"></i>
    <input id="yr" name="yr" type="text" class="validate">
    <label for="icon_prefix">邀请码</label>
  </div>
</div>
<?php } ?>
<button class="btn waves-effect waves-light" id="login" name="action">立刻注册
  <i class="mdi-content-send right"></i>
</button>
<a class="waves-effect waves-light btn blue" href="index.php?mod=login" style="float:right;"><i class="mdi-file-cloud left"></i>已有账号？直接登录！</a>
</div>
</div>
</form>
<?php } ?>
</div>
</div>
<?php include 'footer.php';?>
</body>
</html>