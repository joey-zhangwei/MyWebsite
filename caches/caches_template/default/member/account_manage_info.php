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
<script language="JavaScript">
<!--
$(function(){
	$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
	$("#nickname").formValidator({onshow:"<?php echo L('input').L('nickname');?>",onfocus:"<?php echo L('nickname').L('between_2_to_20');?>"}).inputValidator({min:2,max:20,onerror:"<?php echo L('nickname').L('between_2_to_20');?>"}).regexValidator({regexp:"ps_username",datatype:"enum",onerror:"<?php echo L('nickname').L('format_incorrect');?>"}).ajaxValidator({
	    type : "get",
		url : "",
		data :"m=member&c=index&a=public_checknickname_ajax&userid=<?php echo $memberinfo['userid'];?>",
		datatype : "html",
		async:'false',
		success : function(data){
            if( data == "1" ) {
                return true;
			} else {
                return false;
			}
		},
		buttons: $("#dosubmit"),
		onerror : "<?php echo L('already_exist');?>",
		onwait : "<?php echo L('connecting_please_wait');?>"
	}).defaultPassed();

	<?php echo $formValidator;?>
});

//-->
</script>
</head>
<body>
<?php include template("member","header_s"); ?>

<div class="home_r_xia">
         <div class="tab">
<div id="memberArea">
	
<?php include template("member","left_s"); ?>
	<div class="col-auto">
	
		<div class="point" id='announcement'>
			<a href="javascript:hide_element('announcement');" hidefocus="true" class="close"><span><?php echo L('close');?></span></a>
			<div class="content">
				<strong class="title"><?php echo L('notice');?>：</strong>
				<p><?php echo L('with_star_must_input');?></p>
			</div>
		</div>
       		
		<div class="col-1 ">
			<h5 class="title"><?php echo L('modify').L('memberinfo');?></h5>           
			<div class="content">			
			<form method="post" action="" id="myform" name="myform">
				<table width="100%" cellspacing="0" class="table_form">
					<tr>
						<th width="100"><?php echo L('nickname');?></th> 
						<td><input id="nickname" name="nickname" value="<?php echo $memberinfo['nickname'];?>" type="text" class="input-text" size="30"></td>
					</tr>

					<?php $n=1; if(is_array($forminfos)) foreach($forminfos AS $k => $v) { ?>
					<tr>
						<th width="100"><?php if($v['isbase']) { ?><font color=red>*</font><?php } ?> <?php echo $v['name'];?>：<?php if($v['tips']) { ?><br />(<?php echo $v['tips'];?>)<?php } ?></th> 
						<td><?php echo $v['form'];?></td>
					</tr>
					<?php $n++;}unset($n); ?>
					<tr>
						<th></th>
						<td><input name="dosubmit" type="submit" id="dosubmit" value="<?php echo L('submit');?>" class="button"></td>
					</tr>
				</table>
			</form>

			</div>
			<span class="o1"></span><span class="o2"></span><span class="o3"></span><span class="o4"></span>
		</div>
	</div>
	
</div>
<div class="clear"></div>


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