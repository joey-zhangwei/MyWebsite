<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?> <div class="quyu2_right">
			<div class="jiangshi_newstext">
			  <div class="newstext_tit"><span><a href="index.php?m=content&c=index&a=lists&catid=27">师资介绍</a></span><span class="js_more"></span></div>
				 
				  <p>　　菲律宾是除英，美外世界第三大英语国家，也是亚洲说英语最好的国家。 在菲律宾从幼儿园到大学，人们把英语作为正式语言来学习，每天有24种报纸用英文发行，并且电视和广播有很多英文频道。因为没有语言障碍，好莱坞电影在菲律宾与美国能同期上映。<br />
			　　
			E口语的外教都来自菲律宾最优秀
			         </p>
			
			</div>
			 <div class="jiangshi_xinwe">
				  <div class="newstext_tit"><span>
				  <a href="index.php?m=content&c=index&a=lists&catid=28">常见问题</a></span>
				  <span class="js_more"><a href="index.php?m=content&c=index&a=lists&catid=28">more</a></span></div>
					  <ul>
				 <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=ef3f91c35d74ed2d00f2f73b8d2ef9f2&action=lists&catid=28&order=id+DESC&num=5\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'28','order'=>'id DESC','limit'=>'5',));}?>
					<?php $n=1; if(is_array($data)) foreach($data AS $key => $val) { ?>
	  		
					<li>
						<a href="<?php echo $val['url'];?>"><?php echo $val['title'];?></a> 
					</li>
				 <?php $n++;}unset($n); ?>
				 <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
						
					  </ul>
			</div>
				<div class="quyu_right" style="margin-top:10px;">
					<div class="newstext_tit"><span><a href="index.php?m=content&c=index&a=lists&catid=24">联系我们</a></span></div>
						<div class="dizhi">
						英语在线<br />
						邮编：100085<br />
						王经理：1888888888<br />
						郝经理：1888888888<br />
						邮箱：123456789@qq.com<br />
						王经理QQ:825910014<br />
						地址：海淀区中关村东路东升大厦C座236
				</div>
 </div>