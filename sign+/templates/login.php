<?php if (!defined('SYSTEM_ROOT')) { die('Insufficient Permissions'); } loadhead(); ?>
<div >

  <div style="margin:0% 5% 5% 5%;">
<div>
                <h1 class="logo-name" style="margin-top:0;"><?php echo SYSTEM_NAME ?></h1>
            </div>
  <body class="gray-bg">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
	<?php doAction('login_page_1'); ?>
        <div>
            
            <h3>欢迎使用 <?php echo SYSTEM_NAME ?></h3>

            <form class="m-t" name="f" method="post" action="index.php?mod=admin:login">
                <div class="form-group">
                    <input type="text" class="form-control" name="user" placeholder="账户可以为用户名或者邮箱地址" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="pw" id="pw">
                </div>
				  <?php if (isset($_GET['error_msg'])): ?><div class="alert alert-danger alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  错误：<?php echo strip_tags($_GET['error_msg']); ?></div><?php endif;?>
                <button type="submit" class="btn btn-primary block full-width m-b">登 录</button>
				  <?php doAction('login_page_3'); ?>
<input type="checkbox" name="ispersis" id="ispersis" value="1" />&nbsp;<label for="ispersis">记住密码及账户</label><br/>
<?php doAction('login_page_2'); ?>
                <p class="text-muted text-center"> <a href="login.html#" tppabs="http://www.zi-han.net/theme/hplus/login.html#"><small>忘记密码了？</small></a> | <a href="index.php?mod=reg" class="<?php checkIfActive('reg') ?>">注册一个新账号</a>
                </p>

            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.min.js" tppabs="http://www.zi-han.net/theme/hplus/js/jquery-2.1.1.min.js"></script>
    <script src="js/bootstrap.min.js-v=3.4.0" tppabs="http://www.zi-han.net/theme/hplus/js/bootstrap.min.js?v=3.4.0"></script>

</body>

<div style="text-align:center;"><?php echo SYSTEM_FN ?> V<?php echo SYSTEM_VER ?> // 作者: <a href="http://zhizhe8.net" target="_blank">无名智者</a> @ <a href="http://www.stus8.com/forum.php" target="_blank">StusGame GROUP</a> &amp; <a href="http://www.longtings.com/" target="_blank">mokeyjay</a></div>
	<!--底部信息开始-->
	<div style="text-align:center"><?php 
  $icp=option::get('icp');
    if (!empty($icp)) {
      echo ' | <a href="http://www.miitbeian.gov.cn/" target="_blank">'.$icp.'</a>';
    }
    echo ''.option::get('footer');
    doAction('footer');
  ?></div>
  <!--底部信息结束-->
  <div style=" clear:both;"></div>
	<div class="login-ext"></div>
	<div class="login-bottom"></div>
</div>
<script src="source/js/jiankong.js"></script>