<!DOCTYPE HTML PUBLIC>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<meta name="HandheldFriendly" content="true">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title><?php echo SYSTEM_NAME; ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="renderer" content="webkit">
	<script type="text/javascript" src="source/js/jquery.min.js"></script>
	<meta name="author" content="Microsoft&KiraInmoe">
	<link rel="stylesheet" type="text/css" href="templates/metro/style.css">
</head>
<body>
	<script type="text/javascript">	$(document).ready(function(){$("#welcome").fadeIn(0)});</script>
	<div id="welcome" style="display:none;">
		<p class="time"><?php echo date("H:i");?></p>
		<p class="date"><?php echo date("n月j日 , l");?></p>
		<p class="title"><?php echo SYSTEM_NAME; ?></p>
		<!--当你在定制此模板的时候，此部分内容不准删除，否则你将会受到严厉的调教-->
		<p class="copyright">&copy;<a href="http://zhizhe8.net" target="_blank">无名智者</a>&<a href="http://longtings.com" target="_blank">Mokeyjay</a>@<a href="http://www.stus8.com" tatget="_blank">StusGame Group</a>
			<!--不可修改部分 End-->
			<br/>
			Templates by <a href="https://inmeng.xyz/" target="_blank">KiraInmoe</a></p>
			<script type="text/javascript">	$(document).ready(function(){$("#welcome").click(function(){$("#welcome").fadeOut(500)});});</script>
		</div>
		<div id="panel">
			<div id="login">
				<form name="f" method="post" action="<?php echo SYSTEM_URL ?>index.php?mod=admin:login">
					<img src="templates/metro/avatar.jpg" class="avatar">
					<div id="input">
						<span class="sysname"><?php echo SYSTEM_NAME;?> · 登录</span>
						<p style="padding:12px;color:#fff;">解放双手，从现在就开始。</p>
						<div id="anapi">
							<div class="inputarea"><input type="text" class="iinput" name="user" required tabindex="1" placeholder="用户名" title="您的用户名。"></div>
							<div class="inputarea">
								<input type="password" name="pw"  class="iinput"  id="pw" required tabindex="2" placeholder="密码" title="您的密码。" style="width:89%;">
								<button type="submit" id="submit" style="width:9%;height:auto;background-color:#2173EF;border:0px;height:29px;color:#fff;font-weight:bold;">→</button>
							</div>
						</div>
					</div>
				</div>
				<script type="text/javascript">
					$(document).ready(function(){
						$("#sign").click(function(){
							$("#login").fadeOut(500)
							$("#action").fadeOut(500)
							$("#register").fadeIn(500);
						});
					});
				</script>				
				<div id="action"><a href="index.php?mod=reg" id="sign">注册到本站</a></div>
			</form>
		</div>
		<img src="templates/metro/power.png" width="50px" class="show-menu">
		<script type="text/javascript">
			$(document).ready(function(){
				$(".show-menu").click(function(){
					$("#menu").toggle(200);
				});
			});
		</script>	
		<div id="menu" style="display:none">
			<li><a href="index.php?mod=reg">注册帐号</a></li>
			<?php doAction('navi_11'); ?>
		</div>
		<!--当你在定制此模板的时候，此部分内容不准删除，否则你将会受到严厉的调教-->
		<p class="copyright">&copy;<a href="http://zhizhe8.net" target="_blank">无名智者</a>&<a href="http://longtings.com" target="_blank">Mokeyjay</a>&<a href="http://fyy.l19l.com">FYY</a>@<a href="http://www.stus8.com" tatget="_blank">StusGame Group</a>
			<!--不可修改部分 End--><br/>
			Templates by <a href="https://www.imim.pw/" target="_blank">KiraInmoe</a></p>
		</div>
		<?php 
		if(isset($_REQUEST['error_msg'])){echo '<script>alert("啊嘞，'.$_REQUEST['error_msg'].'……");</script>';}
		?>
	</body>
	</html>