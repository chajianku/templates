<script type="text/javascript">
	$(document ).ready(function(){
		$("#action").dropdown()
		$("#manager").dropdown()
		$("#plugins").dropdown()
		$("#show-side").sideNav({
			menuWidth: 300
		});
	});
</script>
<nav>
	<div class="nav-wrapper fixed" style="background-color:#0CA6EB;">
		<a style="width:70%;" href="#" class="brand-logo" style="padding-left:10px;"><?php echo SYSTEM_NAME;?></a>
		<ul id="nav-mobile" class="right hide-on-med-and-down">
			<?php if (ROLE != 'visitor' && ROLE != 'banned') { ?>   
			<li><a class="dropdown-button waves-effect" id="action" href="#!" data-activates="action-menu">功能菜单<i class="mdi-navigation-arrow-drop-down right"></i></a></li>
			<?php if (ROLE == 'admin') { ?>
			<li><a class="dropdown-button waves-effect" id="manager" href="#!" data-activates="manager-menu">管理菜单<i class="mdi-navigation-arrow-drop-down right"></i></a></li>
			<li><a class="dropdown-button waves-effect" id="plugins" href="#!" data-activates="plugins-menu">插件管理<i class="mdi-navigation-arrow-drop-down right"></i></a></li>
			<?php doAction('navi_4'); ?>
			<li><a class="dropdown-button waves-effect" id="about" href="#!" data-activates="author-menu">关于<i class="mdi-navigation-arrow-drop-down right"></i></a></li>
			<li><a class="waves-effect" href="index.php?mod=admin:logout"><span class="glyphicon glyphicon-off"></span> 退出登录</a></li>
			<?php } }else { ?>
			<li class="<?php checkIfActive('login') ?>  waves-effect" ><a href="index.php?mod=login"><span class="glyphicon glyphicon-play"></span> 登录</a></li>
			<li class="<?php checkIfActive('reg') ?>  waves-effect" ><a href="index.php?mod=reg"><span class="glyphicon glyphicon-user"></span> 注册</a></li>
			<?php doAction('navi_10'); ?>
			<?php } ?>
		</ul>
		<li style="list-style:none;float:right;"><a href="#" class="waves-effect" data-activates="slide-out" id="show-side"><i class="mdi-navigation-menu"></i></a></li>
		<ul id="action-menu" class="dropdown-content">
			<li class="<?php checkIfActive('default') ?>" ><a style="color:#26a69a;" href="index.php"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
			<li class="<?php checkIfActive('set') ?>" ><a style="color:#26a69a;" href="index.php?mod=set"><span class="glyphicon glyphicon-wrench"></span> 设置</a></li>
			<li class="<?php checkIfActive('baiduid') ?>" ><a style="color:#26a69a;" href="index.php?mod=baiduid"><span class="glyphicon glyphicon-link"></span> 账号管理</a></li>
			<li class="<?php checkIfActive('showtb') ?>" ><a style="color:#26a69a;" href="index.php?mod=showtb"><span class="glyphicon glyphicon-calendar"></span> 签到状态</a></li>
			<?php doAction('navi_1'); ?>
		</ul>
		<ul id="manager-menu" class="dropdown-content">
			<li class="<?php checkIfActive('admin:tools') ?>" ><a style="color:#26a69a;" href="index.php?mod=admin:tools"><span class="glyphicon glyphicon-briefcase"></span> 工具箱</a></li>
			<li class="<?php checkIfActive('admin:set') ?>" ><a style="color:#26a69a;" href="index.php?mod=admin:set"><span class="glyphicon glyphicon-cog"></span> 全局设置</a></li>
			<li class="<?php checkIfActive('admin:users') ?>" ><a style="color:#26a69a;" href="index.php?mod=admin:users"><span class="glyphicon glyphicon-user"></span> 用户管理</a></li>
			<li class="<?php checkIfActive('admin:stat') ?>" ><a style="color:#26a69a;" href="index.php?mod=admin:stat"><span class="glyphicon glyphicon-stats"></span> 统计信息</a></li>
			<li class="<?php checkIfActive('admin:cron') ?>" ><a style="color:#26a69a;" href="index.php?mod=admin:cron"><span class="glyphicon glyphicon-time"></span> 计划任务</a></li>
			<li><a style="color:#26a69a;" href="index.php?mod=admin:plugins"><span class="glyphicon glyphicon-tasks"></span> 插件管理</a></li>
			<?php doAction('navi_2'); ?>
		</ul>
		<ul id="plugins-menu" class="dropdown-content">
			<li><a style="color:#26a69a;" href="index.php?mod=admin:plugins"><span class="glyphicon glyphicon-tasks"></span> 插件管理</a></li>
			<li><a style="color:#26a69a;" href="http://www.stus8.com/forum.php?mod=forumdisplay&fid=163&filter=sortid&sortid=13" target="_blank"><span class="glyphicon glyphicon-shopping-cart"></span> 插件商城</a></li>
			<?php doAction('navi_3'); ?>
		</ul>
		<ul id="author-menu" class="dropdown-content">
			<li><a style="color:#26a69a;" href="http://www.stus8.com" target="_blank">StusGame</a></li>
			<li><a style="color:#26a69a;" href="http://zhizhe8.net" target="_blank">无名智者</a></li>
			<li><a style="color:#26a69a;" href="http://longtings.com" target="_blank">龙霆工作室</a></li>
			<li><a style="color:#26a69a;" href="https://www.imim.pw/" target="_blank">模版作者</a></li>
			<?php doAction('navi_5'); ?>
		</ul>
	</div>
</nav>

<div class="row">
	<div class="col s3">
		<ul id="slide-out" class="side-nav">
			<li><a href="#"><?php echo SYSTEM_NAME; ?></a></li>
			<?php if (ROLE != 'visitor' && ROLE != 'banned') { ?>   
			<li class="<?php checkIfActive('default') ?>" ><a href="index.php"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
			<li class="<?php checkIfActive('set') ?>" ><a href="index.php?mod=set"><span class="glyphicon glyphicon-wrench"></span> 设置</a></li>
			<li class="<?php checkIfActive('baiduid') ?>" ><a href="index.php?mod=baiduid"><span class="glyphicon glyphicon-link"></span> 账号管理</a></li>
			<li class="<?php checkIfActive('showtb') ?>" ><a href="index.php?mod=showtb"><span class="glyphicon glyphicon-calendar"></span> 签到状态</a></li>
			<?php doAction('navi_7'); if (ROLE == 'admin') {?>
			<li class="<?php checkIfActive('admin:tools') ?>" ><a href="index.php?mod=admin:tools"><span class="glyphicon glyphicon-briefcase"></span> 工具箱</a></li>
			<li class="<?php checkIfActive('admin:set') ?>" ><a href="index.php?mod=admin:set"><span class="glyphicon glyphicon-cog"></span> 全局设置</a></li>
			<li class="<?php checkIfActive('admin:users') ?>" ><a href="index.php?mod=admin:users"><span class="glyphicon glyphicon-user"></span> 用户管理</a></li>
			<li class="<?php checkIfActive('admin:stat') ?>" ><a href="index.php?mod=admin:stat"><span class="glyphicon glyphicon-stats"></span> 统计信息</a></li>
			<li class="<?php checkIfActive('admin:cron') ?>" ><a href="index.php?mod=admin:cron"><span class="glyphicon glyphicon-time"></span> 计划任务</a></li>
			<li><a href="index.php?mod=admin:plugins"><span class="glyphicon glyphicon-tasks"></span> 插件管理</a></li>
			<?php doAction('navi_2'); ?>
			<li><a href="http://www.stus8.com/forum.php?mod=forumdisplay&fid=163&filter=sortid&sortid=13" target="_blank"><span class="glyphicon glyphicon-shopping-cart"></span> 插件商城</a></li>
			<?php doAction('navi_3'); ?>

			<?php } else { ?>
			<?php } }else {?>
			<li class="<?php checkIfActive('login') ?>" ><a class="waves-effect" href="index.php?mod=login"><span class="glyphicon glyphicon-play"></span> 登录</a></li>
			<li class="<?php checkIfActive('reg') ?>  waves-effect" ><a href="index.php?mod=reg"><span class="glyphicon glyphicon-user"></span> 注册</a></li>
			<?php doAction('navi_10'); ?>

			<?php }?>
		</ul>
	</li>
</ul>
</div>