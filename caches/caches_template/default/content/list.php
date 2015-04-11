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
    <div class="quyu2_left_tit"><span><a><?php echo catpos($catid);?></a></span></div>
   <div class="guide_left">
   <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=5ab4b05e97fd14c3ed386604ee1a9399&action=lists&catid=%24catid&num=25&order=id+DESC&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 25;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
	 <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
	  <div style="float:left; width:600px; line-height:30px; font-size:14px;">
	 <a href="<?php echo $r['url'];?>"> <?php echo $r['title'];?></a> <span style="margin-left:20px; font-size:12px; color:#999999"><?php echo date('Y-m-d',$r[inputtime]);?></span>
	  </div>
  <?php $n++;}unset($n); ?>
 <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
	  
   </div> 
  </div>
  
  
  <?php include template("content","right_content"); ?>
  </div>
</div>
<?php include template("content","footer_s"); ?>
</body>
</html>
