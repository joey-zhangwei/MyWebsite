<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>英语在线</title>
<link rel="stylesheet" href="<?php echo CSS_PATH;?>online/style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo CSS_PATH;?>online/style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo CSS_PATH;?>online/lrtk.css" type="text/css" />
<SCRIPT type=text/javascript src="{js_PATH}online/index_solid.js"></SCRIPT>
<script language="javascript" src="{js_PATH}online/texiao.js" type="text/javascript"></script>
<style>
.tab table td{padding-left:5px;padding-right:5px;}</style>

<script type="text/javascript" src="<?php echo JS_PATH;?>formvalidator.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>formvalidatorregex.js" charset="UTF-8"></script>
<link href="<?php echo CSS_PATH;?>dialog.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH;?>dialog.js"></script>
</head>
<body>
<?php include template("member","header_s"); ?>

<div class="home_r_xia">
         <div class="tab">
<div id="memberArea">
<?php include template('member', 'left_s'); ?>
    <div class="col-auto">
	
    	<div class="col-auto">

            	<span class="o1"></span><span class="o2"></span><span class="o3"></span><span class="o4"></span>
            </div>
            <div class="bk10"></div>

            <div class="col-1 ">
            	<h5 class="title"><?php echo L('collect');?></h5>
            	<div class="content">
					<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"member\" data=\"op=member&tag_md5=1295f2e2b9a3034aec368254b03901a1&action=favoritelist&userid=%24memberinfo%5Buserid%5D&num=10\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$member_tag = pc_base::load_app_class("member_tag", "member");if (method_exists($member_tag, 'favoritelist')) {$data = $member_tag->favoritelist(array('userid'=>$memberinfo[userid],'limit'=>'10',));}?>	
                    <ul class="title-list">
					<?php $n=1; if(is_array($data)) foreach($data AS $k => $v) { ?>
                    	<li>·<a href="<?php echo $v['url'];?>" target="_blank"><?php echo $v['title'];?></a><span><em><?php echo format::date($v['adddate'], 1);?></em> <a href="index.php?m=member&c=index&a=favorite&id=<?php echo $v['id'];?>"><?php echo L('delete');?></a></span></li>
                    <?php $n++;}unset($n); ?>
                    </ul>
					<?php echo $pages;?>
					<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            	</div>
            	<span class="o1"></span><span class="o2"></span><span class="o3"></span><span class="o4"></span>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<script type="text/javascript" src="<?php echo JS_PATH;?>cookie.js"></script>
<script language="JavaScript">
<!--
$(document).ready(function() {
	var announcement = getcookie('announcement_<?php echo $memberinfo['userid'];?>_<?php echo $announceid;?>');
	if(announcement==null || announcement=='') {
		$("#announcement").fadeIn("slow");
	}
});
//-->
</script>
</div>
        </div>
    </div>
</div>
</div>
</div>
<?php include template("member","footer_s"); ?>


</body>
</html>