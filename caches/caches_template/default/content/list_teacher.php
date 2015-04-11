<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>英语在线</title>
<link href="<?php echo CSS_PATH;?>online/style.css" rel="stylesheet" type="text/css" />

</head>
<body>
<?php include template("content","header_s"); ?>

<div class="quyu_2">
  <div class="quyu2_left">
    <div class="quyu2_left_tit"><span><a>讲师列表</a></span></div>
 
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=e75c35501a020a7d81bace08f9aea79b&sql=SELECT+%2A+FROM+v9_linkage+a%2C+v9_member+b%2Cv9_member_jiangs+c+where++b.userid%3Dc.userid+and+b.modelid%3D12+and+c.wenp%3Da.linkageid+and+b.islook+%3D+0&return=datas&num=10&page=%24page&order=listorder+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$pagesize = 10;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$r = $get_db->sql_query("SELECT COUNT(*) as count FROM  v9_linkage a, v9_member b,v9_member_jiangs c where  b.userid=c.userid and b.modelid=12 and c.wenp=a.linkageid and b.islook = 0");$s = $get_db->fetch_next();$pages=pages($s['count'], $page, $pagesize, $urlrule);$r = $get_db->sql_query("SELECT * FROM v9_linkage a, v9_member b,v9_member_jiangs c where  b.userid=c.userid and b.modelid=12 and c.wenp=a.linkageid and b.islook = 0 LIMIT $offset,$pagesize");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$datas = $a;unset($a);?> 
<?php $n=1; if(is_array($datas)) foreach($datas AS $key => $val) { ?> 
    <div class="jiangshi">
      <div class="jiangshi_pic">
	  <a href="<?php echo APP_PATH;?>index.php?m=content&c=index&a=lists&catid=10&shows=is&uid=<?php echo $val['userid'];?>">
	  <img src="<?php echo get_memberavatar($val['phpssouid'], '', 180);?>" width="140" height="140" />
	  </a></div>
      <div class="jieshao"> 
	  <a href="<?php echo APP_PATH;?>index.php?m=content&c=index&a=lists&catid=10&shows=is&uid=<?php echo $val['userid'];?>"><?php echo $val['nickname'];?></a> 
	  <br />
        资历：<?php echo $val['zili'];?><br />
        文凭：<?php echo $val['name'];?><br />
        简介：<?php echo str_cut($val[jianjie],50,"");?>
		<br />
		
		</div>
    </div>
 
	
   <?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>	
	

   
   
    <div class="yema"><?php echo $pages;?>
    </div>
  </div>
  <?php include template("content","right_content"); ?>
  </div>
</div>
<?php include template("content","footer_s"); ?>
</body>
</html>
