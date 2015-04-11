<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?>﻿<div class="home_main">
    <div class="home_main_left">
       
	    <div class="home_kuai">
		
            <div class="home_tit">个人信息</div>
            <ul class="green">
                <li><a href="index.php?m=member&c=index&a=account_manage_info&t=1">修改个人信息</a></li>
                <li><a href="index.php?m=member&c=index&a=account_manage_avatar&t=1">修改头像</a></li>
               
                <li><a href="index.php?m=member&c=index&a=account_manage_password&t=1">修改邮箱密码</a></li>
            </ul>
        </div>
		
		
        <div class="home_kuai" style="margin-top:8px;">
            <div class="home_tit">上课情况</div>
            <ul class="kecheng">
                <li><a href="index.php?m=member&c=content&a=published&jl=1">预约记录</a></li>
                <li><a href="index.php?m=member&c=content&a=published&pl=1">课程评价</a></li>
                <li><a href="index.php?m=member&c=index&a=favorite&t=2">收藏夹</a></li>
				<?php if($memberinfo['groupid']==4) { ?>
				 <li><a href="index.php?m=member&c=content&a=published">创建课程</a></li>
				<?php } ?>
            </ul>
        </div>
        <div class="home_kuai" style="margin-top:8px;">
            <div class="home_tit">账户管理</div>
            <ul class="kecheng">
                <li><a href="#">我的账户</a></li>
                <li><a href="index.php?m=pay&c=deposit&a=pay">会员充值</a></li>
                <li><a href="#">余额查询</a></li>
                <li><a href="index.php?m=pay&c=spend_list&a=init">消费记录</a></li>
            </ul>
        </div>
    </div>
	
    <div  class="home_main_right">
        <div class="home_kuai_r">
            <div class="home_r_top">
                <div  class="home_tit_r">会员中心</div>
                <div class="home_touxiang">
				<a title="<?php echo L('modify').L('avatar');?>" href="index.php?m=member&c=index&a=account_manage_avatar&t=1">
				<img src="<?php echo get_memberavatar($memberinfo['phpssouid'], '', 180);?>" width="109" height="114" >
				</a>
				
				</div>
                <div  class="home_r_top_r">
                    <div  class="home_yonghu">
					用户名:<font>
					<?php if($memberinfo['nickname']) { ?> <?php echo $memberinfo['nickname'];?> <?php } else { ?> <?php echo $memberinfo['username'];?><?php } ?>
					</font></div>
                    <div class="top1">
					<ul>
					<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=874bafc69540566424164a94742e5c35&sql=SELECT+%2AFROM+%60v9_member%60+WHERE+username++%3D+%27%24memberinfo%5Busername%5D%27+&order=listorder+DESC&return=datan\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT *FROM `v9_member` WHERE username  = '$memberinfo[username]'  LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$datan = $a;unset($a);?> 
						<?php $n=1; if(is_array($datan)) foreach($datan AS $key => $val) { ?>
							
							<li style="width:200px; margin-right:50px;">注册时间：<?php echo date('Y-m-d H:i:s',$val[regdate]);?></li>
						
							 <li>上次登录时间：<?php echo date('Y-m-d H:i:s',$val[lastdate]);?></li>
					 	
						<?php $n++;}unset($n); ?>
					 <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?> 
					 
					 </ul>
					</div>
                  
						<div class="top2">
							<ul>
							<li style="margin-left:10px;"> 收件箱：</li>
							<li><a href="index.php?m=message&c=index&a=inbox"><img src="<?php echo IMG_PATH;?>online/youjian.jpg" />
							<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=4dabf17d5cee58d275146fd07b8e5359&sql=SELECT+%2AFROM+%60v9_message%60+WHERE+send_to_id+%3D+%27%24memberinfo%5Busername%5D%27+&return=datan\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT *FROM `v9_message` WHERE send_to_id = '$memberinfo[username]'  LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$datan = $a;unset($a);?> 											
							<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?> 
								<?php echo count($datan);?>
							</a></li>
							<li style="width:170px;">&nbsp;</li>
							<li>未读邮件：</li>
							<li><a href="index.php?m=message&c=index&a=inbox"><img src="<?php echo IMG_PATH;?>online/shoujian.jpg" /></a></li>
							<li>
							<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=65984085ec534c71b55d880791b8541a&sql=SELECT+%2AFROM+%60v9_message%60+WHERE+send_to_id+%3D+%27%24memberinfo%5Busername%5D%27+and+status%3D1&return=datan\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT *FROM `v9_message` WHERE send_to_id = '$memberinfo[username]' and status=1 LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$datan = $a;unset($a);?> 											
							<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?> 
								<?php echo count($datan);?>
							</li>						
							</ul>
						</div>
						<div class="top2">
							<ul>
								<li style="margin:10px;">
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=5ac6aeb3c2996d5a827b767984f41606&sql=SELECT+%2AFROM++v9_kecheng_data+a%2Cv9_member+b+WHERE+++b.username+%3D+%27%24memberinfo%5Busername%5D%27+and+a.come_id%3Db.userid+and+a.is_yuyue%3D2&return=datan\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT *FROM  v9_kecheng_data a,v9_member b WHERE   b.username = '$memberinfo[username]' and a.come_id=b.userid and a.is_yuyue=2 LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$datan = $a;unset($a);?> 

<?php if($memberinfo['groupid']==4) { ?>	
	<!-- 老师 -->	
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=16221568476b9a6d0d47c5093415ad46&sql=SELECT+%2A+FROM+v9_kecheng_data+a%2Cv9_member+b%2Cv9_kecheng+c+WHERE++c.username+%3D+%27%24memberinfo%5Busername%5D%27+and+b.userid%3D%27%24memberinfo%5Buserid%5D%27+and+a.id%3Dc.id+and+a.is_yuyue%3D2&return=datan\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT * FROM v9_kecheng_data a,v9_member b,v9_kecheng c WHERE  c.username = '$memberinfo[username]' and b.userid='$memberinfo[userid]' and a.id=c.id and a.is_yuyue=2 LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$datan = $a;unset($a);?> 	
										
<?php } ?>							
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?> 

 <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=3a446185cb258c709a23839d024cf42e&sql=SELECT+%2A+FROM+v9_comment_data_1+a%2Cv9_member+b+WHERE+b.userid%3D%27%24memberinfo%5Buserid%5D%27+and+a.userid%3D%27%24memberinfo%5Buserid%5D%27&return=clanum\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT * FROM v9_comment_data_1 a,v9_member b WHERE b.userid='$memberinfo[userid]' and a.userid='$memberinfo[userid]' LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$clanum = $a;unset($a);?>
 <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

                                    
								您有 <font color="#FF0000"><?php echo count($datan);?> </font>  条预约
								 <a href="index.php?m=member&c=content&a=published&jl=1"> 点击查看</a>								 
								 <?php if($memberinfo['modelid']==12) { ?>
									 您已上 <font color="#FF0000"><?php echo count($clanum);?> </font>  节
								 <?php } ?>
								</li>
							</ul>
						</div>
                </div>
            </div>