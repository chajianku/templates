<?php if (!defined('SYSTEM_ROOT')) { die('Insufficient Permissions'); }  if (ROLE != 'admin') { msg('权限不足！'); }
global $m;
include 'header.php';
include 'navibar.php';
if (isset($_GET['ok'])) {
	echo '<script>alert("操作用户成功");</script>';
}
if (isset($_GET['add'])) {	?>
<br/>
<div class="row">
	<div class="col s12">
		<div class="container">
			<div class="card">
				<div class="card-image grey" style="height:50px;padding:0px;">
					<span style="padding:10px;" class="card-title">用户管理</span>
				</div>
				<div class="card-content">

					<form action="setting.php?mod=admin:users" method="post">
						<input type="hidden" name="do" value="add">
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<th>参数</th>
										<th>值</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>用户名</td>
										<td><input type="text" name="name" class="form-control" required></td>
									</tr>
									<tr>
										<td>密码</td>
										<td><input type="password" name="pwd" class="form-control" required></td>
									</tr>
									<tr>
										<td>邮箱</td>
										<td><input type="email" name="mail" class="form-control" required></td>
									</tr>
									<tr>
										<td>用户组</td>
										<td><input type="radio" name="role" value="user" id="user-role" required><label for="user-role">用户</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="admin-role" name="role" value="admin" required><label for="admin-role">管理员</label></td>
									</tr>
								</tbody>
							</table>
						</div>
						<input type="submit" class="btn btn-primary" value="提交更改">
					</form>
				</div>
			</div>
		</div>
		<?php } else {
			$userc = $m->fetch_row($m->query("SELECT COUNT(*) FROM `".DB_NAME."`.`".DB_PREFIX."users`"));
			$users = '';
			$s = $m->query('SELECT * FROM  `'.DB_NAME.'`.`'.DB_PREFIX.'users`');

			while ($x = $m->fetch_array($s)) {
				$users .= '<tr><td>'.$x['id'].'<br/><input type="checkbox" name="user[]" id="'.$x['id'].'" value="'.$x['id'].'"><label for="'.$x['id'].'"></label></td><td>'.$x['name'].'<br/>用户组：'.getrole($x['role']).'</td><td>'.$x['email'].'<br/>数据表：'.$x['t'].'</td></tr>';
			}

			?>
			<br/>
			<div class="row">
				<div class="col s12">
					<div class="container">
						<div class="card">
							<div class="card-image grey" style="height:50px;padding:0px;">
								<span style="padding:10px;" class="card-title">用户管理</span>
							</div>
							<div class="card-content">
								<div class="card blue-grey darken-1"><div class="card-content white-text">目前共有 <?php echo $userc[0]; ?> 名用户。点击 UID 下面的复选框表示对该用户进行操作<br/><a href="index.php?mod=admin:users&add">点击此处可以添加一名用户</a></div></div>
								<form action="setting.php?mod=admin:users" method="post" onsubmit="return confirm('此操作不可逆，你确定要执行吗？');">
									<div class="table-responsive">
										<table class="table table-hover">
											<thead>
												<tr>
													<th>UID</th>
													<th>用户名/用户组</th>
													<th>电子邮箱/数据表</th>
												</tr>
											</thead>
											<tbody>
												<?php echo $users; ?>
											</tbody>
										</table>
									</div>
									选择操作：<input type="radio" name="do" id="cookie" value="cookie" required><label for="cookie">清除 Cookie</label>&nbsp;&nbsp;&nbsp;&nbsp; 
									<input type="radio" name="do" id="clean" value="clean"><label for="clean">清除贴吧数据</label>&nbsp;&nbsp;&nbsp;&nbsp; 
									<input type="radio" name="do" id="delete" value="delete"><label for="delete">把他哔掉</label>&nbsp;&nbsp;&nbsp;&nbsp; 
									<input type="radio" name="do" id="cset" value="cset"><label for="cset">清除用户数据</label>&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="radio" name="do" id="crole" value="crole"><label for="crole">调整用户组为 
								</label>
								<div class="input-field col s12">
									<select class="browser-default" name="crolev"  onchange="document.getElementsByName('do')[4].checked = true">
										<option value="user">用户</option>
										<option value="vip">VIP</option>
										<option value="admin">管理员</option>
										<option value="banned">禁止访问</option>
									</select>
									<br/><br/>
								</div>
								<br/><br/><input type="submit" class="btn btn-primary red" value="执行操作">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<button type="button" class="btn btn-default blue" onclick="location = 'index.php?mod=admin:users&add'">添加用户</button>
							</form></div>
						</div>
					</div><?php } ?>
					<?php include 'footer.php';?>