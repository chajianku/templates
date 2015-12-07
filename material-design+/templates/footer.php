<?php
/*Warning:请注意，当你在定制模版的时候，请勿删除和修改以下信息。请您尊重程序作者。如果您修改了以下信息，一切后果由您自负。*/
define('APP_AUTHOR','<div style="font-size:14px;">'.SYSTEM_FN.SYSTEM_VER.'  作者：<a href="http://zhizhe8.net/" target="_blank">无名智者</a> and <a href="http://www.longtings.com" target="_blank">Mokeyjay</a> @ <a href="http://www.stus8.com/" target="_blank">StusGame Group</a> Template <a href="http://www.imim.pw/">KiraInmoe</a> ');
/*请不要动以上的内容，否则一切后果请自行承担。*/
?>
<script type="text/javascript">
  $(document).ready(function() {
    $("#to-top").hide();
//当滚动条的位置处于距顶部100像素以下时，跳转链接出现，否则消失
$(function() {
  $(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
      $("#totop").fadeIn(200);
    } else {
      $("#totop").fadeOut(200);
    }
  });
//当点击跳转链接后，回到页面顶部位置
$("#totop").click(function() {
  $('body,html').animate({
    scrollTop: 0
  },
  1000);
  return false;
});
});
});
</script>
<a class="btn-floating btn-large waves-effect waves-light green" href="#top" id="totop" style="position:fixed;bottom:10%;z-index:99;right:5%;"><i class="mdi-hardware-keyboard-arrow-up"></i></a>
<div class="container" style="text-align:center;font-size:16px;">
<?php echo APP_AUTHOR;?>