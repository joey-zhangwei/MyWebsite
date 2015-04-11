<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>英语在线</title>

<link rel="stylesheet" href="<?php echo CSS_PATH;?>online/style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo CSS_PATH;?>online/lrtk.css" type="text/css" />

<SCRIPT type=text/javascript src="{js_PATH}online/index_solid.js"></SCRIPT>
<script language="javascript" src="{js_PATH}online/texiao.js" type="text/javascript"></script>


<style>
.anniu{ background:url(<?php echo IMG_PATH;?>online/chuangjian.jpg) no-repeat; width:139px;height:36px; border:0}
.home_r_xia td{text-align:center; border:#a6a4a4 1px solid;height:40px}
.ff{background:#f9f9f9; color:#f0841a;font-weight:700;font-size:14px;}
.home_r_xia table{margin-top:40px}
.anniu1{background-color:transparent; border:none;padding:0}
</style>

</head>

<body>

<?php include template("member","header_s"); ?>
<?php include template("member","left_s"); ?>


<div class="home_r_xia">
<div  class="home_tit_r"></div>
<div style="margin-left:100px; margin-top:20px"><input onclick="window.location.href='<?php echo APP_PATH;?>index.php?m=member&c=content&a=publish'"type="button"  class="anniu"/></div>
<table width="600" border="1" align="center">
  <tr>
    <td class="ff">课程</td>
    <td class="ff">日期</td>
    <td class="ff">时间</td>
    <td class="ff">功能操作</td>
  </tr>
  	<?php $n=1;if(is_array($datas)) foreach($datas AS $info) { ?> 
		  <tr>
			<td><?php echo str_cut($info['title'], 60);?></td>
			<?php $ss=$info[id];?>
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=92874e1661ca0b24df8d43e2921c8fcc&sql=SELECT+%2A+FROM+v9_linkage+a%2C+v9_kecheng_data+b+where+b.id%3D%24ss+and+b.time%3Da.linkageid+%24kc_where&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT * FROM v9_linkage a, v9_kecheng_data b where b.id=$ss and b.time=a.linkageid $kc_where LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$datas = $a;unset($a);?> 

<?php $n=1; if(is_array($datas)) foreach($datas AS $key => $val) { ?>  
           <?php if($val['dates']!='') { ?>
			<td><?php echo $val['dates'];?></td>
			<td><?php echo $val['name'];?></td>	
			<?php } else { ?>
			<td>无效</td>
			<td>无效</td>
		   <?php } ?>
<?php $n++;}unset($n); ?> 
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>	
			<td>
<input type="button" onclick="window.location.href='index.php?m=member&c=content&a=delete&catid=<?php echo $info['catid'];?>&id=<?php echo $info['id'];?>'"class="anniu1" value="删除"/></td>
		  </tr>
  <?php $n++;}unset($n); ?>
 
 
   <tr>
    <td colspan="4"><?php echo $pages;?></td>
   
  </tr>
</table>

</div></div>
</div></div></div>
</div>
<?php include template("member","footer_s"); ?>
</body>
</html>