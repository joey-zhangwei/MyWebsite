<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>英语在线</title>

<link href="<?php echo CSS_PATH;?>online/style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo JS_PATH;?>online/texiao.js"></script>

<script type="text/javascript" src="<?php echo JS_PATH;?>jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery-ui-1.7.3.custom.min.js"></script>
<script  type="text/javascript" src="<?php echo JS_PATH;?>jquery.js" ></script>

<script type="text/javascript">
$(document).ready(function(){
	$(".guide_left table a").css({"background-image":"url(<?php echo IMG_PATH;?>online/c_anniu2.gif)","font-weight":"normal"});
  $(this).css({"background-image":"url(<?php echo IMG_PATH;?>online/c_anniu1.gif)","font-weight":"bold"});  
  $(".mid1").css("display","none");
  $(".mid2").css("display","none");
    $(".mid").css("display","block");

  $(".guide_left table  a:eq(0)").mouseover(function(){
  $(".guide_left table a").css({"background-image":"url(<?php echo IMG_PATH;?>online/c_anniu2.gif)","font-weight":"normal"});
  $(this).css({"background-image":"url(<?php echo IMG_PATH;?>online/c_anniu1.gif)","font-weight":"bold"});  
  $(".mid1").css("display","none");
  $(".mid2").css("display","none");

    $(".mid").css("display","block");
 });
 $(".guide_left table a:eq(1)").mouseover(function(){
  $(".guide_left table a").css({"background-image":"url(<?php echo IMG_PATH;?>online/c_anniu2.gif)","font-weight":"normal"});
  $(this).css({"background-image":"url(<?php echo IMG_PATH;?>online/c_anniu1.gif)","font-weight":"bold"});  
  $(".mid").css("display","none");
  $(".mid2").css("display","none");
    $(".mid1").css("display","block");
 
});
 $(".guide_left table a:eq(2)").mouseover(function(){
  $(".guide_left table a").css({"background-image":"url(<?php echo IMG_PATH;?>online/c_anniu2.gif)","font-weight":"normal"});
  $(this).css({"background-image":"url(<?php echo IMG_PATH;?>online/c_anniu1.gif)","font-weight":"bold"});  $(".mid").css("display","none");
  $(".mid2").css("display","block");
  $(".mid1").css("display","none");
 
 
});
});
</script>

</head>
<body>
<?php include template("content","header_s"); ?>

<?php include template("content","right_top"); ?>
<div class="quyu_2">
  <div class="quyu2_left">
    <div class="quyu2_left_tit"><span><a href="#">初始向导</a></span></div>
   <div class="guide_left">

<p>※ 我们提供一次<span class="STYLE1">完全免费</span>体验课程的机会，只要注册就可以体验（不要任何费用）<br />
※ 老师在首次免费体验后完成对学生的评估，并针对其弱点量身打造强化课程<br />
※ 您觉得满意后再购买我们的课程 <br /><br /></p>
<table width="50%" border="0">
  <tr>
    <td><a href="#">会员注册</a></td>
    <td><img src="<?php echo IMG_PATH;?>online/xiantou.gif" /></td>
    <td><a href="#">登陆预约</a></td>
    <td><img src="<?php echo IMG_PATH;?>online/xiantou.gif" /></td>
    <td><a href="#">开始上课</a></td>
  </tr>
</table>

<div  class="mid">
<img src="<?php echo IMG_PATH;?>online/guide1.jpg" /><br /><br /></div>
<div class="mid1">
<p>1. 输入您注册的邮件地址和密码，登陆英语在线<br />
2. 登陆后，点击“预约课程”就可以进行预约<br />
3. 选择您喜欢的老师和想预约的时间，然后“点击预约”<br />
4. 点击确认按钮完成预约，我们会给您注册的信箱发送预约完成的邮件<br />
5.在MYPAGE可以确认你的预约的老师和上课时间<br /><p>
<img src="<?php echo IMG_PATH;?>online/xd_003.jpg" /><br /><br />

</div>
<div class="mid2">
<p>1.请确保在上课前，提前15分钟登录Skype，我们的老师会提前添加您为联系人，请务必将我们的老师加为您的联系人以确保可以正常上课<br />
2.上课前请务必检查您的话筒是否正常工作,(Skype联系人里有自动测试语音系统，您可以自己测试一下)，然后等待老师拨打您的Skype<br />
3.老师呼叫您后，点击“应答”便可以开始上课了<br /></p><br />
<p><img src="<?php echo IMG_PATH;?>online/xd_004.jpg" width="460" height="670" /></p>
</div>
   </div> 
  </div>
  <?php include template("content","right_content"); ?>
  </div>
</div>
<?php include template("content","footer_s"); ?>
</body>
</html>
