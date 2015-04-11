<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>英语在线</title>

<link href="<?php echo CSS_PATH;?>online/style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo JS_PATH;?>online/texiao.js"></script>

<script type="text/javascript" src="<?php echo JS_PATH;?>jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery-ui-1.7.3.custom.min.js"></script>


</head>
<body>
<?php include template("content","header_s"); ?>

<?php include template("content","right_top"); ?>

<div class="quyu_2">
  <div class="quyu2_left">
    <div class="quyu2_left_tit"><span><a>简单预约</a></span><span class="more"></span></div>
	  <div style="width:635px; margin:0 auto; margin-top:10px; color:#757575; line-height:1.8em;">
	<p style="width:635px; margin-top:10px; color:#757575;">   
	 为了减少广大英语学习爱好者的课程费用，打造全国在线VIP一对一英语口语学习的最低学费，降低客服的成本，我们创立了一个全自动的学员预约上课C2C平台，完全根据自己的需求，自己预约课程，自己选择老师上课!</p>

<div style="width:635px; float:left;">
<p style="margin-top:10px; width:635px; "><img src="<?php echo IMG_PATH;?>online/anniu_q.jpg" />：可以预约：请点击预约</p>
<p style=" width:635px;"><img src="<?php echo IMG_PATH;?>online/anniu_w.jpg" />：不能预约：已被其他学员预约或预约时间已过</p>
<p style="color:#ff0000;">预约课程请在该时间段上课的15分钟之前；取消课程请在上课前提前四个小时取消！</p>
</div>
<div class="jiaoshiliebiao">

<!-- <select>
  <option value="06:00">06:00</option>
  <option value="06:30">06:30</option>
</select>---
<select>
  <option value="06:00">06:00</option>
  <option value="06:30">06:30</option>
</select>
<input name="" type="submit" value=" 男 " />
<input name="" type="submit" value=" 女 " />
<input name="" type="submit"  class="shaixuan" value="筛选" />
-->
<span align="right" style="padding-left:470px;"><a href="<?php echo APP_PATH;?>index.php?m=content&c=index&a=make_look&str_date=<?php echo $end_date;?>&uid=<?php echo $uid;?>&uname=<?php echo $uname;?>">下一周</a></span>
</div>






<table width="635" border="1" bordercolor="#d9d9d9" style="float:left;">
 <tr> 
  <td width="100" height="80"><div align="center"></div></td>




<?php $n=1; if(is_array($date_arr)) foreach($date_arr AS $keys => $val) { ?> 	

    <td width="80">
	
	<div style="width:70px; height:auto; margin:0 auto;">
		<span style="width:60px; line-height:20px;">
		
			<?php echo $val['data'];?></br>
		    星期<?php if($keys=='1') { ?>
			     一
				<?php } ?>
				<?php if($keys=='2') { ?>
				二
				<?php } ?>
				<?php if($keys=='3') { ?>
				三
				<?php } ?>
				<?php if($keys=='4') { ?>
				四
				<?php } ?>
				<?php if($keys=='5') { ?>
				五
				<?php } ?>
				<?php if($keys=='6') { ?>
				六
				<?php } ?>
				<?php if($keys=='7') { ?>
				天
				<?php } ?>
		</span>
	</div>
	</td>
	
  <?php $n++;}unset($n); ?>

  </tr> 

<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=cbf0ad5489955a0b3a81e6046b45d63d&sql=SELECT+%2A+FROM+v9_linkage+where+keyid%3D+3360&return=datas&num=35+order%3D\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT * FROM v9_linkage where keyid= 3360 LIMIT 35");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$datas = $a;unset($a);?> 
<?php $n=1; if(is_array($datas)) foreach($datas AS $key => $times) { ?> 

 <tr> 
   <td> <div align="center"><?php echo $times['name'];?></div> </td>	
<?php $n=1; if(is_array($date_arr)) foreach($date_arr AS $keys => $vals) { ?> 	
	
<?php $date_day=$vals[data]; $tim=$times[linkageid]?>	
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=bc43ed71b1b8db4e544845f8d60b97bf&sql=select+%2A+from+v9_kecheng+a%2Cv9_kecheng_data+b+where+%60dates%60+%3D+%27%24date_day%27+and+a.id%3Db.id+and+a.username%3D%27%24uname%27+and+b.time%3D%24tim+%24where&return=datas&order=listorder+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from v9_kecheng a,v9_kecheng_data b where `dates` = '$date_day' and a.id=b.id and a.username='$uname' and b.time=$tim $where LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$datas = $a;unset($a);?> 

<?php if(count($datas)!=0) { ?>

		<?php $n=1; if(is_array($datas)) foreach($datas AS $key => $val) { ?>
			 <?php if($val[is_yuyue]==0) { ?>
								<td>
								<div align="center" style="padding-left:5px;">
								
						<input type="button" onclick="window.location.href='<?php echo APP_PATH;?>index.php?m=content&c=index&a=lists&catid=15&id=<?php echo $val['id'];?>&d=1'"style="background-image:url(<?php echo IMG_PATH;?>online/anniu_q.jpg);height:17px;width:66px;border:0"/>
								</div>
								</td>
							<?php } ?>
							 <?php if($val[is_yuyue]==1) { ?>
								<td>
								<div align="center" style="padding-left:5px;">
								
						<input type="button" onclick="window.location.href='<?php echo APP_PATH;?>index.php?m=content&c=index&a=lists&catid=15&id=<?php echo $val['id'];?>&d=1'"style="background-image:url(<?php echo IMG_PATH;?>online/anniu_q.jpg);height:17px;width:66px;border:0"/>
								</div>
								</td>
							<?php } ?>
					
							 <?php if($val[is_yuyue]==2) { ?>
								<td>
								<div align="center" style="padding-left:5px;">
								<input type="button"style="background-image:url(<?php echo IMG_PATH;?>online/anniu_w.jpg);height:17px;width:66px;border:0"/>
								</div>
								</td>
							<?php } ?>
		
 		
			
		
		
		<?php $n++;}unset($n); ?>
		
	<?php } else { ?>
	 <td><div align="center">---</div></td>
	<?php } ?>
	
	<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
	
	<?php $n++;}unset($n); ?>

	</tr>
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?> 
  
  
  <!---
  <tr>
    <td><div align="center">22:30</div></td>
	
    <td><div align="center">---</div></td>
	
    <td><div align="center" style="padding-left:22px;">
	<input type="button" onclick="window.location.href='1.html'"   style="background-image:url(<?php echo IMG_PATH;?>online/anniu_w.jpg);height:17px;width:66px;border:0"/></div></td>
    <td><div align="center" style="padding-left:22px;"><input type="button" onclick="window.location.href='1.html'"   style="background-image:url(<?php echo IMG_PATH;?>online/anniu_q.jpg);height:17px;width:66px;border:0"/></div></td>
    <td><div align="center" style="padding-left:22px;"><input type="button" onclick="window.location.href='1.html'"   style="background-image:url(<?php echo IMG_PATH;?>online/anniu_q.jpg);height:17px;width:66px;border:0"/></div></td>
    <td><div align="center" style="padding-left:22px;"><input type="button" onclick="window.location.href='1.html'"   style="background-image:url(<?php echo IMG_PATH;?>online/anniu_q.jpg);height:17px;width:66px;border:0"/></div></td>
  </tr>
  -->
</table> <div id="pages" class="dh"><?php echo $pages;?></div> 

</div>
  </div>
<?php include template("content","right_content"); ?>
 

  </div>
</div>
<?php include template("content","footer_s"); ?>
</body>
</html>
