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
<div class="quyu_2">
 <div class="quyu2_left">
   <div class="quyu2_left_tit"><span><a>教师个人主页</a></span></div>
   <div style="width:635px; margin:0 auto; margin-top:10px; color:#757575; line-height:1.8em;">
       
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=7fdbf78d7da5bc9e52a87a0da06f2358&sql=SELECT+%2A+FROM+v9_linkage+a%2C+v9_member+b%2Cv9_member_jiangs+c+where+b.userid%3D%24uid+and+b.userid%3Dc.userid+and+b.modelid%3D12+and+c.wenp%3Da.linkageid&return=datas&order=listorder+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT * FROM v9_linkage a, v9_member b,v9_member_jiangs c where b.userid=$uid and b.userid=c.userid and b.modelid=12 and c.wenp=a.linkageid LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$datas = $a;unset($a);?> 
<?php $n=1; if(is_array($datas)) foreach($datas AS $key => $val) { ?> 

 <div class="touxiang_pic">
 
 <span style="float:left; width:140px; height:140px;"><img src="<?php echo get_memberavatar($val['phpssouid'], '', 180);?>" width="140" height="140" /></span>
<span style="float:left; width:140px; height:30px; margin:20px 10px 10px 0px;">
<?php if($val[shengy]!='') { ?>
<object width="150" height="24" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">
<param value="<?php echo APP_PATH;?>/uploadfile/swf/3.swf?soundFile=<?php echo $val['shengy'];?>&amp;bg=0xCDDFF3&amp;leftbg=0x357DCE&amp;lefticon=0xF2F2F2&amp;rightbg=0x357DCE&amp;rightbghover=0x4499EE&amp;righticon=0xF2F2F2&amp;righticonhover=0xFFFFFF&amp;text=0x357DCE&amp;slider=0x357DCE&amp;track=0xFFFFFF&amp;border=0xFFFFFF&amp;loader=0x8EC2F4" name="movie">
<param value="high" name="quality">
<param name="wmode" value="transparent">
<embed width="150" height="24" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" quality="high" src="<?php echo APP_PATH;?>/uploadfile/swf/3.swf?soundFile=<?php echo $val['shengy'];?>&amp;bg=0xCDDFF3&amp;leftbg=0x357DCE&amp;lefticon=0xF2F2F2&amp;rightbg=0x357DCE&amp;rightbghover=0x4499EE&amp;righticon=0xF2F2F2&amp;righticonhover=0xFFFFFF&amp;text=0x357DCE&amp;slider=0x357DCE&amp;track=0xFFFFFF&amp;border=0xFFFFFF&amp;loader=0x8EC2F4">
</object>
<?php } ?>
</span>
<input type="button" onclick="javascript:history.go(-1);" value="返回列表">
 </div>
      
<div class="zhuye_main">
	     <div class="zhuye_tit"><?php echo $val['nickname'];?></div>
		 <p style="padding-left:10px; width:460px; line-height:30px; padding-top:10px;">

姓　名：<?php echo $val['nickname'];?><br />
性　别：	男性<br />
资&nbsp;&nbsp;&nbsp;历：<?php echo $val['zili'];?><br />
学 &nbsp;历：	<?php echo $val['name'];?><br />
爱　好：	<br />

<?php echo $val['jianjie'];?></p>

<table width="400" border="1" bordercolor="#d9d9d9" style="float:left;">
 <tr>
    <td colspan="3" align="right"><a href="<?php echo APP_PATH;?>index.php?m=content&c=index&a=make_look&uid=<?php echo $val['userid'];?>&uname=<?php echo $val['username'];?>" target="_blank">点击预约该老师</a></td>
 </tr>
 <tr>
    
    <td width="120"><div align="center">日期	</div></td>
	<td width="100" height="30"><div align="center">时间</div></td>
	<td width="120"><div align="center">预约情况</div></td>
 </tr>

<?php $nowdate=date("Y-m-d",mktime(0,0,0,date("m"),date("d")-1,date("Y")));?>
 <?php $usn=$val[username];?>
 <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=4263400648170caf00830e8bc018f0cd&sql=select+%2A+from+v9_kecheng+a%2Cv9_kecheng_data+b%2Cv9_linkage+c+where+a.id%3Db.id+and+a.username+%3D+%27%24usn%27++and+c.linkageid%3Db.time+and+b.dates%3E%27%24nowdate%27&return=datan&order=listorder+a.id+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_kecheng a,v9_kecheng_data b,v9_linkage c where a.id=b.id and a.username = '$usn'  and c.linkageid=b.time and b.dates>'$nowdate' LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$datan = $a;unset($a);?> 
 <?php $n=1; if(is_array($datan)) foreach($datan AS $key => $vals) { ?> 
  <tr>
    <td><div align="center"><?php echo $vals['dates'];?></div></td>
    <td><div align="center"><?php echo $vals['name'];?></div></td>
    
    <td>
	 <?php if($vals[is_yuyue]==0) { ?>
	 
	<div align="center" style="padding-left:22px;">
	<input type="button" onclick="window.location.href='<?php echo APP_PATH;?>index.php?m=content&c=index&a=lists&catid=15&id=<?php echo $vals['id'];?>&d=1'" style="background-image:url(<?php echo IMG_PATH;?>online/anniu_q.jpg);height:17px;width:66px;border:0"/>
	</div>
	<?php } ?>
	 <?php if($vals[is_yuyue]==2) { ?>
	 <div align="center" style="padding-left:22px;">
	<input type="button"style="background-image:url(<?php echo IMG_PATH;?>online/anniu_w.jpg);height:17px;width:66px;border:0"/>
	</div>
	 <?php } ?>
	</td>    
  </tr>
 <?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?> 

</table>
       </div>
   </div> 
  </div>

<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>


  <?php include template("content","right_content"); ?>
  </div>
</div>

<?php include template("content","footer_s"); ?>
</body>
</html>