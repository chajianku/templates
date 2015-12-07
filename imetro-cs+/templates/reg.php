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
	<style type="text/css">
		<?php 
		$yr_reg = option::get('yr_reg');
		if (empty($yr_reg)) 
			echo '.inputarea{margin-top:30px}';
		?>
	</style>
</head>
<body>
	<div id="panel">
		<div id="register" style="display:none;">
			<script type="text/javascript">
				$(document).ready(function(){
					$("#register").fadeIn(500);
				});
			</script>	
			<?php
			if (option::get('enable_reg') != 1) {
				echo '<div class="refuse">';
				echo '<img src="templates/metro/avatar.jpg" class="avatar">';
				echo '<h3>果咩，此站点已停止注册 :( </h3>';
				echo '<h3>下次请早点来哦XD</h3>';
				echo '</div>';
			} 
			else{
				?>
				<form name="f" method="post" action="<?php echo SYSTEM_URL ?>index.php?mod=admin:reg">
					<img src="templates/metro/avatar.jpg" class="avatar">
					<div id="input">
						<div class="inputarea">
							<input type="text" name="user" class="iinput" required tabindex="1" placeholder="用户名" title="输入你想要注册的用户名w。"/></div>
							<div class="inputarea"><input type="password" name="pw" class="iinput" id="pw" required tabindex="2" placeholder="密码" title="输入密码，请你牢记w。"/></div>
							<div class="inputarea"><input type="password" name="rpw" class="iinput" id="rpw" required tabindex="2" placeholder="再次输入密码" title="请重新输入您刚才输入的密码。"/></div>
							<div class="inputarea"><input type="text" name="mail" class="iinput" id="mail" required tabindex="3" placeholder="邮箱" title="我们需要登记您的邮箱w。"

								<?php if (empty($yr_reg)) echo 'style="width:89%;" />  <button type="submit" id="submit" style="width:9%;height:auto;background-color:#2173EF;border:0px;height:29px;color:#fff;font-weight:bold;" title="点此注册！">→</button></div>';
								else echo '/></div><div class="inputarea"><input type="text" name="yr" class="iinput" id="yr" style="width:90%;" required placeholder="邀请码" title="本站开启了邀请注册，您需要输入邀请码。"/><button type="submit" id="submit" style="width:9%;height:auto;background-color:#2173EF;border:0px;height:29px;color:#fff;font-weight:bold;"  title="点此注册！">→</button></div>' ;?>
							</div>
						</form>
						<?php
					}
					?>
					<script type="text/javascript">
						$(document).ready(function(){
							$("#return").click(function(){
								$("#register").fadeOut(500);
							});
						});
					</script>	
				</div>
				<img src="templates/metro/power.png" width="50px" class="show-menu">
				<script type="text/javascript">
					$(document).ready(function(){
						$(".show-menu").click(function(){
							$("#menu").toggle(200);
						});
					});
				</script>	
				<div id="action"><a href="index.php?mod=login" id="return">返回登录页面</a></div>
				<div id="menu" style="display:none">
					<?php doAction('navi_11'); ?>
				</div>
				<!--当你在定制此模板的时候，此部分内容不准删除，否则你将会受到严厉的调教-->
				<p class="copyright">&copy;<a href="http://zhizhe8.net" target="_blank">无名智者</a>&<a href="http://longtings.com" target="_blank">Mokeyjay</a>&<a href="http://fyy.l19l.com">FYY</a>@<a href="http://www.stus8.com" tatget="_blank">StusGame Group</a>
					<!--不可修改部分 End--><br/>
					Templates by <a href="https://www.imim.pw/" target="_blank">KiraInmoe</a></p>
				</div>
				<?php 
				if($_REQUEST['error_msg']!=""){echo '<script>alert("啊嘞，'.$_REQUEST['error_msg'].'……");</script>';}
				?>
			</body>