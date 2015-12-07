<?php if (!defined('SYSTEM_ROOT')) { die('Insufficient Permissions'); } 
include 'header.php';
include 'navibar.php';
global $m,$i;?>
<div class="row"><div class="col s12"><br/>
	<div class="container">
		<div class="card">
			<div class="card-image" style="height:50px;padding:0px;background-color:#FFCC00;">
				<span style="padding:10px;" class="card-title">个人设置</span>
			</div>
			<?php
			if (isset($_GET['ok'])) {
				echo '<script>alert("设置保存成功啦☆Kira~");</script>';
			}

			function addset($name,$type,$x,$other = '',$text = '') {
				if ($type == 'checkbox') {
					if (option::uget($x) == 1) {
						$other .= ' checked="checked"';
					}
					$value = '1';
				} else {
					$value = option::uget($x);
				}
				echo '<tr><td>'.$name.'</td><td><input type="'.$type.'" name="'.$x.'" value="'.$value.'" '.$other.'>'.$text.'</td>';
			}
			?>
			<form action="setting.php?mod=set" method="post" style="margin:10px;">
				<?php doAction('set_1'); ?>
				<div class="table-responsive">
					<table class="table table-hover" style="font-size:16px;">
						<thead>
							<tr>
								<th style="width:40%">参数</th>
								<th>值</th>
							</tr>
						</thead>
						<tbody>
							<?php doAction('set_3'); ?>
							<tr>
								<td>头像设置<br/>使用Gravatar头像或贴吧头像</td>
								<td>
									<input type="radio" class="with-gap" id="gravatar" name="face_img" value="0" <?php if (option::uget('face_img') == '0') { echo 'checked'; } ?>><label for="gravatar">使用Gravatar头像</label><br/>
									<input type="radio" class="with-gap" name="face_img" id="tieba" value="1" <?php if (option::uget('face_img') == '1') { echo 'checked'; } ?>><label for="tieba">使用百度贴吧头像（推荐）</label> 
									<div class="input-field col s12">
										<i class="mdi-action-account-circle prefix"></i>
										<input id="icon_prefix" type="text" name="face_baiduid" value="<?php if (option::uget('face_baiduid')) { echo option::uget('face_baiduid'); } ?>" class="validate">
										<label for="icon_prefix">贴吧用户名</label>
									</div>
								</td>
							</tr>
							<tr>
								<td>邮箱设置<br/>更改你在本站设置的邮箱地址</td>
								<td>
									<div class="input-field col s12">
										<i class="mdi-communication-email prefix"></i>
										<input id="email" type="email" name="face_baiduid" value="<?php echo $i['user']['email'] ?>" class="validate">
										<label for="email">邮箱</label>
									</div>

								</td>
							</tr>
							<?php doAction('set_2'); ?>
						</tbody>
					</table>
				</div>
				<button class="waves-effect waves-light btn" type="submit"><i class='mdi-content-send left'></i>提交更改</button>
				<br/><br/>
			</form>
		</div>
	</div>
</div>
</div>
<?php include 'footer.php';?>