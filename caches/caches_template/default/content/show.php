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
    <div class="quyu2_left_tit"><span style="text-align:center; float:left; width:700px;"><a><?php echo $title;?></a></span></div>
   <div class="guide_left">
	<?php echo $content;?>
	
   </div> 
  </div>
  
  
  <?php include template("content","right_content"); ?>
  </div>
</div>
<?php include template("content","footer_s"); ?>
</body>
</html>
