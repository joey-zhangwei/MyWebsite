<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>英语在线</title>
<link rel="stylesheet" href="<?php echo CSS_PATH;?>online/style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo CSS_PATH;?>online/style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo CSS_PATH;?>online/lrtk.css" type="text/css" />
<SCRIPT type=text/javascript src="{js_PATH}online/index_solid.js"></SCRIPT>
<SCRIPT type=text/javascript src="{js_PATH}online/jquery.js"></SCRIPT>
<script language="javascript" src="{js_PATH}online/texiao.js" type="text/javascript"></script>
<style>
.tab table td{padding-left:5px;padding-right:5px;}</style>

<script type="text/javascript" src="<?php echo JS_PATH;?>formvalidator.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>formvalidatorregex.js" charset="UTF-8"></script>
<link href="<?php echo CSS_PATH;?>dialog.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH;?>dialog.js"></script>
<script type="text/javascript">
var jQuery = $;
<!--
	var charset = '<?php echo CHARSET;?>';
	var uploadurl = '<?php echo pc_base::load_config('system','upload_url')?>';
//-->
</script>
<link href="<?php echo CSS_PATH;?>dialog.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH;?>dialog.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH;?>content_addtop.js"></script>
</head>
<body>
<?php include template("member","header_s"); ?>

<div class="home_r_xia">
         <div class="tab">
<div id="memberArea">
	<?php include template('member', 'left_s'); ?>
	<div class="col-auto">
		<div class="col-1 ">
			<h5 class="title">创建课程</h5>
			<div class="content">
				
			<form method="post" action="" id="myform" name="myform">
				<table width="100%" cellspacing="0" class="table_form">
				<?php if(ROUTE_A=='publish') { ?>
				<script language="JavaScript">
				<!--
					function c_c(catid) {
						location.href='index.php?m=member&c=content&a=publish&siteid=<?php echo $siteid;?>&catid='+catid;
					}
				//-->
				</script>
					<tr>
						<th><?php echo L('please_select_cat');?>：</th>
						<td><?php echo form::select_category('', $catid, 'name="info[catid]" onchange="javascript:c_c(this.value);"','','',0,1,$siteid,'1');?></td>
					</tr>
				<?php } ?>
					<?php $n=1; if(is_array($forminfos)) foreach($forminfos AS $k => $v) { ?>
						<?php if($v['name']!="预约情况" and $v['name']!="来预约者ID" and  $v['name']!="关键词") { ?>
							<tr>
								<th width="100"><?php if($v['star']) { ?> <font color="red">*</font><?php } ?> <?php echo $v['name'];?>：</th> 
								<td><?php echo $v['form'];?><?php if($v['tips']) { ?><?php echo $v['tips'];?><?php } ?></td>
							</tr>
						<?php } ?>
					<?php $n++;}unset($n); ?>
					<tr>
						<th></th>
						<td>
						<input name="forward" type="hidden" value="<?php echo HTTP_REFERER;?>">
						<input name="id" type="hidden" value="<?php echo $id;?>">
						<input name="dosubmit" type="submit" id="dosubmit" value="<?php echo L('submit');?>" class="button"></td>
					</tr>
				</table>
			</form>

			</div>
			<span class="o1"></span><span class="o2"></span><span class="o3"></span><span class="o4"></span>
		</div>
	</div>
</div>
<div class="clear"></div>
<script type="text/javascript"> 
<!--
//只能放到最下面
$(function(){
	$.formValidator.initConfig({formid:"myform",autotip:true,onerror:function(msg,obj){window.top.art.dialog({content:msg,lock:true,width:'200',height:'50'}, 	function(){$(obj).focus();
	boxid = $(obj).attr('id');
	if($('#'+boxid).attr('boxid')!=undefined) {
		check_content(boxid);
	}
	})}});
	<?php echo $formValidator;?>
})
//-->
</script>
	 </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php include template("member","footer_s"); ?>


</body>
</html>