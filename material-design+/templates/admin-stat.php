<?php if (!defined('SYSTEM_ROOT')) { die('Insufficient Permissions'); }  if (ROLE != 'admin') { msg('权限不足！'); }
global $m,$i,$today;
include 'header.php';
include 'navibar.php';
if (isset($_GET['ok'])) {
echo '<div class="alert alert-success">设置保存成功</div>';
}

if (!isset($i['mode'][2])) $i['mode'][2] = 'sign';

switch ($i['mode'][2]) {

case 'sign' : 
?>
<br/>
<div class="row">
<div class="col s12">
<div class="container">
<div class="card">
<div class="card-image orange" style="height:50px;padding:0px;">
<span style="padding:10px;" class="card-title">统计信息</span>
</div>
<div class="card-content">

<ul class="nav nav-tabs" role="tablist">
<li class="active"><a href="index.php?mod=admin:stat:sign">签到</a></li>
<li><a href="index.php?mod=admin:stat:env">环境</a></li>
<?php doAction('stat_navi'); ?>
</ul>
<h4>查看签到信息和用户信息</h4>
<?php /* 数据缓存于 <?php echo date('Y-m-d H:m:s' , C::getTime('admin_stat')) ?>，点击刷新 */ ?>
<table class="table table-striped">
<thead>
	<th>UID</th>
	<th>用户名</th>
	<th>已绑定数</th>
	<th>等待签到数</th>
	<th>签到成功数</th>
	<th>签到出错数</th>
	<th>签到忽略数</th>
	<th>贴吧总数</th>
</thead>
<tbody>
	<?php 
	$uxsv = $m->query("SELECT * FROM `".DB_PREFIX."users`");
	$uxsg = $m->once_fetch_array("SELECT COUNT(*) AS `c` FROM `".DB_PREFIX."baiduid`");
	$alls = $alle = $alln = $allm = $allw = 0;
	while ($uxs = $m->fetch_array($uxsv)) {
		$uxsc = $m->once_fetch_array("SELECT COUNT(*) AS `c` FROM `".DB_PREFIX."baiduid` WHERE `uid` = ".$uxs['id']);
		$list = $m->query("SELECT id,no,status,lastdo FROM `".DB_PREFIX.$uxs['t']."` WHERE `uid` = ".$uxs['id']);
		$success = $error = $no = $all = $waiting = 0;
		$num = $m->num_rows($list);
		while ($x = $m->fetch_array($list)) {
			if ($x['no'] == '1') {
				$no++;
			} elseif ($x['lastdo'] != $today) {
				$waiting++;
			} elseif ($x['status'] == '0') {
				$success++;
			} elseif ($x['status'] != '0') {
				$error++;
			}
		}
		$allw = $allw + $waiting;
		$alls = $alls + $success;
		$alln = $alln + $no;
		$allm = $allm + $num;
		$alle = $alle + $error;
		echo '<tr><td>'.$uxs['id'].'</td><td>'.$uxs['name'].'</td><td>'.$uxsc['c'].'</td><td>'.$waiting.'</td><td>'.$success.'</td><td>'.$error.'</td><td>'.$no.'</td><td>'.$num.'</td>';
	}
	echo '<tr><td colspan="2"><strong>总计数据</strong></td><td>'.$uxsg['c'].'</td><td>'.$allw.'</td><td>'.$alls.'</td><td>'.$alle.'</td><td>'.$alln.'</td><td>'.$allm.'</td>';

	?>
</tbody>
</table>
<?php break; case 'env' : ?>
<br/>
<div class="row">
<div class="col s12">
<div class="container">
<div class="card">
<div class="card-image orange" style="height:50px;padding:0px;">
<span style="padding:10px;" class="card-title">统计信息</span>
</div>
<div class="card-content">
<ul class="nav nav-tabs" role="tablist">
<li><a href="index.php?mod=admin:stat:sign">签到</a></li>
<li class="active"><a href="index.php?mod=admin:stat:env">环境</a></li>
<?php doAction('stat_navi'); ?>
</ul>
<h4>当前服务器软件环境</h4>
<?php 
define('DO_NOT_LOAD_UI', true);
require SYSTEM_ROOT.'/setup/check.php';
?>
<?php break; default:  ?>
<ul class="nav nav-tabs" role="tablist">
<li><a href="index.php?mod=admin:stat:sign">签到</a></li>
<li><a href="index.php?mod=admin:stat:env">环境</a></li>
<?php doAction('stat_navi'); ?>
</ul>
<?php break;
} ?>
<br/><br/><br/><br/>
</div>
</div>
</div>
<?php include 'footer.php';?>