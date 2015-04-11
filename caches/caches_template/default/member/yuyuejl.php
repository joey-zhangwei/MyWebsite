<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>英语在线</title>
<link rel="stylesheet" href="<?php echo CSS_PATH;?>online/style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo CSS_PATH;?>online/style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo CSS_PATH;?>online/lrtk.css" type="text/css" />
<SCRIPT type=text/javascript src="<?php echo JS_PATH;?>online/index_solid.js"></SCRIPT>
<script language="javascript" src="<?php echo JS_PATH;?>online/texiao.js" type="text/javascript"></script>
<style>
.text_1{ heigh :23px;width:250px;margin-top:10px}
table td{ border:#efefef 1px solid;text-align:center;height:28px;}
table{margin-top:20px;margin-left:10px;}
.anniu1{background-color:transparent; border:none;padding:0}
.ff{font-weight:700; color:#FFFFFF; background:#4791da;}
</style>
</head>

<body>
<?php include template("member","header_s"); ?>
<?php include template("member","left_s"); ?>


<div class="home_r_xia">
<div  class="home_tit_r">预约记录</div>

<table width="755" border="1">
  <tr>
    <td class="ff">课程日期</td>
    <td class="ff">课程时间</td>
	 <td class="ff">课程名称</td>
    <td class="ff">预约者</td>
    <td class="ff">课程状态</td>
	
  </tr>

 <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=1e0516056ba7b1e95f3f15f025e263a9&sql=SELECT+%2AFROM++v9_kecheng_data+a%2Cv9_member+b%2Cv9_kecheng+c%2Cv9_linkage+d+WHERE+++a.come_id+%3D+%27%24memberinfo%5Buserid%5D%27+and+c.username%3Db.username+and+a.is_yuyue%3D2+and+a.id%3Dc.id+and+d.linkageid%3Da.time&return=datan\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT *FROM  v9_kecheng_data a,v9_member b,v9_kecheng c,v9_linkage d WHERE   a.come_id = '$memberinfo[userid]' and c.username=b.username and a.is_yuyue=2 and a.id=c.id and d.linkageid=a.time LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$datan = $a;unset($a);?> 
<!--学生的 -->

<?php if(count($datan)==0) { ?>
 <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=52698843aeec22c84c922d9635726656&sql=SELECT+%2AFROM++v9_kecheng_data+a%2Cv9_member+b%2Cv9_kecheng+c%2Cv9_linkage+d+WHERE+++c.username+%3D+%27%24memberinfo%5Busername%5D%27+and+c.username%3Db.username+and+a.is_yuyue%3D2+and+a.id%3Dc.id+and+d.linkageid%3Da.time&return=datan\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT *FROM  v9_kecheng_data a,v9_member b,v9_kecheng c,v9_linkage d WHERE   c.username = '$memberinfo[username]' and c.username=b.username and a.is_yuyue=2 and a.id=c.id and d.linkageid=a.time LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$datan = $a;unset($a);?> 
 <?php $ls=1;?>
<?php } ?>

<!--老师的 -->
	<?php $n=1; if(is_array($datan)) foreach($datan AS $key => $val) { ?>					
	 
	  <tr>
		<td width="100"><?php echo $val['dates'];?></td>
		<td width="100"><?php echo $val['name'];?></td>
		<td width="300"><?php echo $val['title'];?></td>
		
		<td width="100">
		<?php if($ls!=1) { ?>
			<?php echo $val['username'];?>
		<?php } else { ?>
			 <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=2154b63bb7042484dc1c7acca10feb0d&sql=SELECT+%2AFROM++v9_member+WHERE+userid+%3D+%27%24val%5Bcome_id%5D%27&return=datax\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT *FROM  v9_member WHERE userid = '$val[come_id]' LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$datax = $a;unset($a);?> 
			 	<?php echo $datax['0']['username'];?>
			 <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
		<?php } ?>
		</td>
		
		<td width="200">
		
		<input  type="submit"  name=""  class="anniu1" value="已预约"/>
		
		</td>
	  </tr>
	  
 	 <?php $n++;}unset($n); ?>	
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?> 

  
</table>

</div></div>
</div></div></div>
</div>
<?php include template("member","footer_s"); ?>
</body>
</html>