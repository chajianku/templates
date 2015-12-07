<!DOCTYPE HTML PUBLIC>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<meta name="HandheldFriendly" content="true">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title><?php echo SYSTEM_NAME; ?></title>
	<style>
	body{padding:0px;margin:0px;font-family: Microsoft JhengHei;}
	.background{width:100%;height:100%;position:fixed;background-image: url(templates/background.jpg);background-size: cover;background-position: center;z-index: -99;}
	.panel{width:70%;margin:0 auto;}
	#cannotlogin{width:50%;}
	@media screen and (max-width: 1024px){.panel{width:90%;}#cannotlogin{width:80%;}}
	.panel h3{font-size:36px;margin:0px;padding-top:20px;text-align:center;color:#fff;}
	.description{font-size:24px;color:#fff;text-align: center;font-family: Comic sans ms;}
	.login-panel{text-align: center;margin:0 auto;padding-top:10px;}
	.avatar{border-radius: 360px;-moz-transition: all 0.8s ease-in-out; -webkit-transition: all 0.8s ease-in-out; -o-transition: all 0.8s ease-in-out; -ms-transition: all 0.8s ease-in-out; transition: all 0.8s ease-in-out; }
	.avatar:hover{-moz-transform: rotate(360deg); -webkit-transform: rotate(360deg); -o-transform: rotate(360deg); -ms-transform: rotate(360deg); transform: rotate(360deg); }
	.input{background: #FFF;text-align:center;width:300px;height:45px;font-size:16px;border: 1px solid #D9D9D6;padding: 8px;border-radius: 2px;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;}
	.submit{padding:10px;transition: width 0.5s, transform 0.5s;background-color: #00CCFF;color:#fff;border:0px;border-radius: 10px;font-size:18px;width:25%;}
	.submit:hover{background-color: #00A3CC;width:30%;}
	.inputarea{display: inline;width:auto;transition: width 0.5s, transform 0.5s; margin:0 auto;width:50%;}
	.inputarea:hover{width:60%;}
	.footer{text-align:center;color:#fff;padding:8px;font-size:16px;font-family: Microsoft yahei;}
	.footer a{color:#00A3CC;text-decoration: none;}
	.signorlogin{color:#000;font-size:18px;font-family:comic sans ms;}
	@media screen and(max-width: 1024px){#haveproblem{font-size:14px;height:auto;}}
	ul{text-align: center;margin:0 auto;color:#000;}
	ul li{list-style: none;display: inline;margin:0 auto;}
	ul li a{text-decoration: none;font-family: Microsoft Yahei;color:#9900FF;padding:10px;}
	#error{list-style: circle;display: normal;}
	</style>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="renderer" content="webkit">
	<script type="text/javascript" src=" //lib.sinaapp.com/js/jquery/1.6/jquery.js"></script>
</head>
<body>
<?php if(isset($_GET['msg'])): ?>
	<script type="text/javascript">alert("<?php echo $_GET['msg'];?>");</script>
<?php endif;?>
	<div class="background"><p></p></div>
	<script type="text/javascript">
	$(document).ready(function(){
		$("#haveproblem").click(function(){
			$("#cannotlogin").fadeIn(500)
		});
	});
	$(document).ready(function(){
		$("#ignore").click(function(){
			$("#cannotlogin").fadeOut(500)
		});
	});
	</script>
	<a class="submit" href="#" id="haveproblem" style="position:fixed;right:3%;bottom:2%;width:auto;text-decoration:none;">遇到问题无法登录？</a>
	<div id="cannotlogin" style="display:none;position:fixed;right:3%;bottom:10%;padding:10px;background-color:#fff;">
		常见异常状况自助解决：
		<ol>
			<li id="error">之前注册之后无法登录：忘记了密码或者由于邮箱乱填&未绑定百度ID而被【哔——】账号，请联系站长。</li>
			<li id="error">忘记自己在哪一个站点：由于站点不多建议一个一个试一下，实在不行联系站长。</li>
			<li id="error">无法绑定百度账号：尝试使用手动绑定的方法或者到百度安全中心登录保护后再关闭。</li>
			<li id="error">其他问题请联系站长解决。</li>
		</ol>
		<p></p><a class="submit" href="#" id="ignore" style="width:auto;text-decoration:none;margin:0 auto;text-align:Center;">我知道啦</a></p>
	</div>
	<div class="panel">
		<h3><?php echo SYSTEM_NAME; ?></h3>
		<p class="description">Set free to your hands!</p>
		<div class="login-panel" id="login">
			<img src="templates/avatar.jpg" width="140px" class="avatar">
			<div class="inputarea" >
				<form name="f" method="post" action="<?php echo SYSTEM_URL ?>index.php?mod=admin:login">
					<p><input type="text" class="input" name="user" required tabindex="1" placeholder="Type your username here." title="您的用户名。"></p>
					<p><input type="password" name="pw"  class="input"  id="pw" required tabindex="2" placeholder="Password also required." title="您的密码。"></p>
					<p style="text-align:center;"><button type="submit" tabindex="3" class="submit">Log in</button></p>
					<p><a href="#" title="在这个站点上注册！" class="signorlogin" id="signin">Or Sign in for free!</a></p>
						<ul id="otherapi">还想干啥_(:3 」∠)_：<?php doAction('navi_11'); ?></ul>
						<script type="text/javascript">
						$(document).ready(function(){
							$("#otherapi").click(function(){
								$("body").fadeOut(500)
							});
						});
						</script>
					</form>
				</div>
			</div>
			<script type="text/javascript">
			$(document).ready(function(){
				$("#signin").click(function(){
					$("#login").fadeOut(500)
					$("#register").fadeIn(500);
				});
			});
			</script>
			<script type="text/javascript">
			$(document).ready(function(){
				$("#letslogin").click(function(){
					$("#login").fadeIn(500)
					$("#register").fadeOut(500);
				});
			});
			</script>
			<div class="login-panel" id="register" style="display:none;">
				<img src="templates/avatar.jpg" width="140px" class="avatar">
				<?php
				if (option::get('enable_reg') != 1) {
					echo '<h3>果咩，此站点已停止注册 :( </h3>';
						echo '<p><a href="#" class="signorlogin" id="letslogin">Return to Login Panel</a></p>';
					} 
					else{
						?>
						<div class="inputarea" >
							<form name="f" method="post" action="<?php echo SYSTEM_URL ?>index.php?mod=admin:reg">
								<p><input type="text" name="user" class="input" required tabindex="1" placeholder="You need a username for signing in." title="输入你想要注册的用户名w。"/></p>
								<p><input type="password" name="pw" class="input" id="pw" required tabindex="2" placeholder="And password to protect your account." title="输入密码，请你牢记w。"/></p>
								<p><input type="password" name="rpw"  class="input"  id="rpw" required tabindex="2" placeholder="Please type your password again." title="请重新输入您的密码。"></p>
								<p><input type="text" name="mail" class="input" id="mail" required tabindex="3" placeholder="We need to take your E-mail,too." title="我们需要登记您的邮箱w。"/></p>
								<?php 
								$yr_reg = option::get('yr_reg');
								if (!empty($yr_reg)) { ?>
								<p><input type="text" name="yr" class="input" id="yr" required placeholder="Invite code...?" title="本站开启了邀请注册，您需要输入邀请码。"/></p>
								<?php } ?>
								<p style="text-align:center;"><button type="submit" tabindex="3" class="submit">Register!</button></p>
								<p><a href="#" class="signorlogin" id="letslogin">Return to Login Panel</a></p>
							</form>
						</div>
						<?php
					}
					?>
				</div>
			</div>
			<br/><br/>
			<div class="footer">
				&copy;百度贴吧云签到助手 Ver.<?php echo SYSTEM_VER ?> | 作者:<a href="http://zhizhe8.net" target="_blank">无名智者</a>&<a href="http://www.longtings.com" target="_blank">Mokeyjay</a> at <a href="http://www.stus8.com/" target="_blank">StusGame Group</a> | Templates by <a href="https://inmeng.xyz" target="_blank">KiraInmoe</a><?php if($_SERVER['HTTPS']=='on') echo ' | 当前正使用SSL登录';?>
				<p><script type="text/javascript" src="https://inmeng.xyz/api/hitokoto.php"></script><script type="text/javascript">hitokoto()</script></p>
			</div>
			<?php 
			if($_REQUEST['error_msg']!=""){echo '<script>alert("提示：'.$_REQUEST['error_msg'].'");</script>';}
			?>
		</body>
		</html>