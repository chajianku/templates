<!DOCTYPE html>
<!-- 模板作者E-mail: weirdo4253@qq.com -->
<?php if (!defined('SYSTEM_ROOT')) { die('Insufficient Permissions'); } ?>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title><?php echo SYSTEM_NAME; ?></title>
<link href="templates/css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<script>var __links = document.querySelectorAll('a');function __linkClick(e) { parent.window.postMessage(this.href, '*');} ;for (var i = 0, l = __links.length; i < l; i++) {if ( __links[i].getAttribute('data-t') == '_blank' ) { __links[i].addEventListener('click', __linkClick, false);}}</script>
<script src="http://libs.useso.com/js/jquery/2.1.1/jquery.min.js"></script>
<script>
$(document).ready(function(c) {
	$('.alert-close').on('click', function(c){
		$('.message').fadeOut('slow', function(c){
	  		$('.message').remove();
		});
	});	  
});
</script>
</head>
<body>
<div class="message warning">
	<div class="inset">
		<div class="login-head">
			<h1>登录</h1>
			<div class="alert-close"></div>
		</div>
		<form name="f" method="post" action="index.php?mod=admin:login">
			<li>
				<input type="text" class="text" name="user" placeholder="用户名" onfocus="this.value = '';">
			</li>
				<div class="clear"></div>
			<li>
				<input type="password" name="pw" id="pw" placeholder="密码" onfocus="this.value = '';">
			</li>
			<div class="clear"></div>
			<div class="submit">
				<input type="submit" onclick="myFunction()" value="登录" >
				<h4><a href="index.php?mod=reg">注册</a></h4>
				<div class="clear"></div>	
			</div>
			Copyright &copy; 2014 - 2015 <a href="<?php echo SYSTEM_URL; ?>"><?php echo SYSTEM_NAME; ?></a>.
			<!-- 开发不易，且行且珍惜。 -->
			<br/><a href="http://zhizhe8.net" target="_blank">无名智者</a> @ <a href="http://stus8.com" target="_blank">StusGame GROUP</a> &amp; <a href="http://www.longtings.com/" target="_blank">mokeyjay</a>，保留所有权利。
			<!-- 请勿修改版权。 -->
		</form>
	</div>
</div>
<div class="clear"></div>
<?php 
if($_REQUEST['error_msg']!=""){echo '<script>alert("'.$_REQUEST['error_msg'].'");</script>';}
?>
</body>
</html>