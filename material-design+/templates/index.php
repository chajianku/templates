<?php 
include('header.php');
include('navibar.php');
?>
<?php if (!defined('SYSTEM_ROOT')) { die('Insufficient Permissions'); }
global $i,$m;
$today = date('Y-m-d');
doAction('index_1');
?>
<br/>
<div class="container">
	<div class="row">
		<div class="col s12">
			<div class="card">
				<div class="card-image" style="height:50px;padding:0px;background-color:#00B1DD;">
					<span style="padding:10px;" class="card-title">程序信息</span>
				</div>
				<div class="card-content">
					<span id="avatar" style="float:right;"><img src="<?php echo getGravatar() ?>" alt="您的头像" title="您的头像" class="img-rounded" height='100px' weight='100px' onerror="$('#avatar').html('无法加载头像');"></span>
					嗨，欢迎来到<?php echo SYSTEM_FN;?>！<br/><br/>
					点击上方导航栏的 功能菜单 可以列出所有功能哦。
					<br/><br/>本站 [ <?php echo SYSTEM_NAME ?> ] 保留除版权外所有权利
					<?php doAction('index_p_1'); ?>
				</div>
				<div class="card-action">
					<p>程序作者 <a href="http://zhizhe8.net" target="_blank" style="margin-right:0px;">无名智者</a> @ <a style="margin-right:0px;" href="http://www.stus8.com/forum.php" target="_blank">StusGame GROUP</a> &amp; <a href="http://www.longtings.com/" target="_blank">Mokeyjay</a></p>
				</div>
			</div>
		</div>
		<div class="col s12">
			<div class="card">
				<div class="card-image" style="height:50px;padding:0px;background-color:#fcf8e3;">
					<span style="padding:10px;color:#8a6d3b;" class="card-title">用户信息</span>
				</div>
				<div class="card-content" style="padding:0px;">
					<ul class="collection" style="font-size:15px;margin:0px;">
						<li class="collection-item">
							<span class="glyphicon glyphicon-user"></span>
							<b>用户组：</b>
							<?php
if(ISVIP) { echo '您是尊贵的 '.getrole(ROLE).'，享有无限绑定数和贴吧数等特权。'; } //<font color="orange"></font>
else { echo getrole(ROLE); }
?>
</li>
<li class="collection-item">
	<?php if(empty($i['user']['bduss'])){ ?>
	<span class="glyphicon glyphicon-info-sign"></span>
	您还没有绑定任何百度账号，无法使用云签到功能，<a href="index.php?mod=baiduid">前往绑定</a>
	<?php } else { ?>
	<span class="glyphicon glyphicon-link"></span> <b>百度账号数：</b>
	<?php
	echo '<span id="baiduid_used">' . count($i['user']['bduss']).'</span> 个 / ';
	if ($i['opt']['bduss_num'] != '0' && $i['opt']['bduss_num'] != '-1' && ISVIP == false) { 
		echo '<span id="baiduid_limit">'.$i['opt']['bduss_num'].'</span> 个'; 
	} elseif ($i['opt']['bduss_num'] == '-1') {
		echo '<span id="baiduid_limit">禁止绑定</span>'; 
	} else { 
		echo '<span id="baiduid_limit">无限</span>'; 
} // ('.getrole(ROLE).')
echo '<div class="progress hidden-xs" style="float:right;width:45%">
<div class="progress-bar" role="progressbar" aria-valuenow="0" id="baiduid_prog" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
</div>
</div>';
}
?>
</li>
<li class="collection-item">
	<?php
	if(empty($i['user']['tbnum'])){ ?>
	<span class="glyphicon glyphicon-info-sign"></span>
	哎，您还没有刷新贴吧列表呢，怎么让我们签到啊？<a href="index.php?mod=showtb">快去刷新吧</a>
	<?php } else { ?>
	<span class="glyphicon glyphicon-check"></span> <b>贴吧数量：</b>
	<?php
	echo '<span id="tb_used">' . $i['user']['tbnum'].'</span> 个 / ';
	if ($i['opt']['tb_max'] != '0' && $i['opt']['tb_max'] != '-1' && ISVIP == false) { 
		echo '<span id="tb_limit">' . $i['opt']['tb_max'] . '</span> 个'; 
	} elseif ($i['opt']['tb_max'] == '-1') {
		echo '<span id="tb_limit">禁止刷新</span>'; 
	} else { 
		echo '<span id="tb_limit">无限</span>'; 
	} 
	echo '<div class="progress hidden-xs" style="float:right;width:45%">
	<div class="progress-bar" role="progressbar" aria-valuenow="0" id="tb_prog" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
	</div>
</div>';
}
?>
</li>
<?php doAction('index_p_2'); ?>
<li class="collection-item">
	<span class="glyphicon glyphicon-stats"></span>
	<b>签到状态统计信息：</b>
	<span id="stat" onclick="view_status(this);"><a style="color=orange;" href='javascript:void(0)'>点击查看</a></span>
</li>
</ul>
</div>
<?php
if(!empty($i['opt']['ann'])){
	echo '<div class="card-action"><b>公告：</b>';
	echo $i['opt']['ann'].'</div>';
}
?>
</div>
</div>

<?php 
if (ROLE == 'admin') {
	?>
	<div class="col s12">
		<div class="card">
			<div class="card-image" style="height:50px;padding:0px;background-color:#00BB00;">
				<span style="padding:10px;" class="card-title">管理面板</span>
			</div>
			<ul class="collection" style="margin:0px;font-size:15px;">
				<?php
				echo '<li class="collection-item"><b>计划任务上次执行日期：</b>'.$i['opt']['cron_last_do_time'];
if (time() - strtotime($i['opt']['cron_last_do_time']) > 86400) { //如果是'从未执行'，结果就为time()
echo '<br/><font color="red"><i class="mdi-social-notifications-none tiny"></i></span> <b>温馨提示：</b></font>啊嘞，计划任务今天还没运行过呢，请检查一下是否已设置 <b>do.php</b> 到您的主机的计划任务？';
}
echo '</li>';
if (!file_exists(SYSTEM_ROOT . '/setup/install.lock')) {
	echo '<li class="collection-item"><font color="red"><span class="glyphicon glyphicon-warning-sign"></span> <b>安全性警告：</b></font>未找到 <b>/setup/install.lock</b> 文件，站点将有被恶意重装的风险，请务必建立一个空的 install.lock 文件，<a href="setting.php?mod=admin:create_lock">点此建立</a>';
}
doAction('index_p_3');
echo '<div class="input-field col s12" style="margin:10px;margin-right:10px;padding-right:20px;"><p class="info">请填写您的邮件地址，订阅 StusGame 云签到官方订阅，以便于及时接收关于云签到程序的更新与重要通知：</p><div class="mailInput"><form action="https://list.qq.com/cgi-bin/qf_compose_send" target="_blank" method="post"><input type="hidden" name="t" value="qf_booked_feedback"><input type="hidden" name="id" value="f752182ed774de32ef9ee39fbb5e44e38261368b16e7ea44"><div class="input-group">
<input type="hidden" name="mod" value="baiduid">
<input type="text" class="form-control" name="to">
<span class="input-group-btn"><input type="submit" class="btn btn-primary" value="点击订阅"></span></div></form></div></div>
<br/>';
?>
</li>
</ul>
</div>
</div>


<div class="col s12">
	<div class="card">
		<div class="card-image" style="height:50px;padding:0px;background-color:#ebccd1;">
			<span style="padding:10px;" class="card-title">服务器信息</span>
		</div>
		<ul class="collection" style="margin:0px;font-size:15px;">
			<li class="collection-item"><b>PHP 版本：</b><?php echo phpversion() ?>
				<?php if(ini_get('safe_mode')) { echo '线程安全'; } else { echo '非线程安全'; } ?>
			</li>
			<?php if(version_compare('5.3', phpversion()) === 1) { echo '<li class="collection-item"><b>PHP 版本警告：</b><font color="red">PHP 版本太低</font>，未来云签到可能不再支持当前版本 <a href="http://php.net/manual/zh/appendices.php" target="_blank">查看如何升级</a></li>'; }?>
				<?php if(get_magic_quotes_gpc()) { echo '<li class="collection-item"><b>性能警告：</b><font color="red">魔术引号被激活</font>，这样程序的运行效率将会降低哦。 <a href="http://php.net/manual/zh/security.magicquotes.whynot.php" target="_blank">为什么不用魔术引号</a> <a href="http://php.net/manual/zh/security.magicquotes.disabling.php" target="
				_blank">如何关闭魔术引号</a></li>'; }?>
				<li class="collection-item"><b>MySQL 版本：</b><?php echo $m->getMysqlVersion() ?></li>
				<li class="collection-item">服务器软件：</b><?php echo $_SERVER['SERVER_SOFTWARE'] ?></li>
				<li class="collection-item">程序最大运行时间：</b><?php echo ini_get('max_execution_time') ?>秒</li>
				<li class="collection-item">POST许可：</b><?php echo ini_get('post_max_size'); ?></li>
				<li class="collection-item">文件上传许可：</b><?php echo ini_get('upload_max_filesize'); ?></li>
			</ul>
		</div>
	</div>
</div>
</div>
<?php
}
//由于历史原因，挂载点有2个
doAction('index_3');
doAction('index_2');
include('footer.php'); ?>
<script type="text/javascript">
	<?php if ($i['opt']['bduss_num'] != '0' && $i['opt']['bduss_num'] != '-1' && ISVIP == false) { ?>
		var baiduid = Math.round($("#baiduid_used").html() / $("#baiduid_limit").html() * 100);
		$("#baiduid_prog").html(baiduid + '%');
		$("#baiduid_prog").css("width",baiduid + '%');
		$("#baiduid_prog").attr("aria-valuenow",baiduid);
		<?php } ?>
		<?php if ($i['opt']['tb_max'] != '0' && $i['opt']['tb_max'] != '-1' && ISVIP == false) { ?>
			var tb = Math.round($("#tb_used").html() / $("#tb_limit").html() * 100);
			$("#tb_prog").html(tb + '%');
			$("#tb_prog").css("width",tb + '%');
			$("#tb_prog").attr("aria-valuenow",tb);
			<?php } ?>
		</script>