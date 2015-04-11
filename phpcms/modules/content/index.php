<?php
defined('IN_PHPCMS') or exit('No permission resources.');
//模型缓存路径
define('CACHE_MODEL_PATH',CACHE_PATH.'caches_model'.DIRECTORY_SEPARATOR.'caches_data'.DIRECTORY_SEPARATOR);
pc_base::load_app_func('util','content');
class index {
	private $db;
	function __construct() {
		$this->db = pc_base::load_model('content_model');
		$this->_userid = param::get_cookie('_userid');
		$this->_username = param::get_cookie('_username');
		$this->_groupid = param::get_cookie('_groupid');
	}
	//首页
	public function init() {
		if(isset($_GET['siteid'])) {
			$siteid = intval($_GET['siteid']);
		} else {
			$siteid = 1;
		}
		$siteid = $GLOBALS['siteid'] = max($siteid,1);
		define('SITEID', $siteid);
		$_userid = $this->_userid;
		$_username = $this->_username;
		$_groupid = $this->_groupid;
		//SEO
		$SEO = seo($siteid);
		$sitelist  = getcache('sitelist','commons');
		$default_style = $sitelist[$siteid]['default_style'];
		$CATEGORYS = getcache('category_content_'.$siteid,'commons');
		include template('content','index',$default_style);
	}
	//内容页
	public function show() {
		$catid = intval($_GET['catid']);
		$id = intval($_GET['id']);

		if(!$catid || !$id) showmessage(L('information_does_not_exist'),'blank');
		$_userid = $this->_userid;
		$_username = $this->_username;
		$_groupid = $this->_groupid;

		$page = intval($_GET['page']);
		$page = max($page,1);
		$siteids = getcache('category_content','commons');
		$siteid = $siteids[$catid];
		$CATEGORYS = getcache('category_content_'.$siteid,'commons');
		
		if(!isset($CATEGORYS[$catid]) || $CATEGORYS[$catid]['type']!=0) showmessage(L('information_does_not_exist'),'blank');
		$this->category = $CAT = $CATEGORYS[$catid];
		$this->category_setting = $CAT['setting'] = string2array($this->category['setting']);
		$siteid = $GLOBALS['siteid'] = $CAT['siteid'];
		
		$MODEL = getcache('model','commons');
		$modelid = $CAT['modelid'];
		
		$tablename = $this->db->table_name = $this->db->db_tablepre.$MODEL[$modelid]['tablename'];
		$r = $this->db->get_one(array('id'=>$id));
		if(!$r || $r['status'] != 99) showmessage(L('info_does_not_exists'),'blank');
		
		$this->db->table_name = $tablename.'_data';
		$r2 = $this->db->get_one(array('id'=>$id));
		$rs = $r2 ? array_merge($r,$r2) : $r;

		//再次重新赋值，以数据库为准
		$catid = $CATEGORYS[$r['catid']]['catid'];
		$modelid = $CATEGORYS[$catid]['modelid'];
		
		require_once CACHE_MODEL_PATH.'content_output.class.php';
		$content_output = new content_output($modelid,$catid,$CATEGORYS);
		$data = $content_output->get($rs);
		extract($data);
		
		//检查文章会员组权限
		if($groupids_view && is_array($groupids_view)) {
			$_groupid = param::get_cookie('_groupid');
			$_groupid = intval($_groupid);
			if(!$_groupid) {
				$forward = urlencode(get_url());
				showmessage(L('login_website'),APP_PATH.'index.php?m=member&c=index&a=login&forward='.$forward);
			}
			if(!in_array($_groupid,$groupids_view)) showmessage(L('no_priv'));
		} else {
			//根据栏目访问权限判断权限
			$_priv_data = $this->_category_priv($catid);
			if($_priv_data=='-1') {
				$forward = urlencode(get_url());
				showmessage(L('login_website'),APP_PATH.'index.php?m=member&c=index&a=login&forward='.$forward);
			} elseif($_priv_data=='-2') {
				showmessage(L('no_priv'));
			}
		}
		if(module_exists('comment')) {
			$allow_comment = isset($allow_comment) ? $allow_comment : 1;
		} else {
			$allow_comment = 0;
		}
		//阅读收费 类型
		$paytype = $rs['paytype'];
		$readpoint = $rs['readpoint'];
		$allow_visitor = 1;
		if($readpoint || $this->category_setting['defaultchargepoint']) {
			if(!$readpoint) {
				$readpoint = $this->category_setting['defaultchargepoint'];
				$paytype = $this->category_setting['paytype'];
			}
			
			//检查是否支付过
			$allow_visitor = self::_check_payment($catid.'_'.$id,$paytype);
			if(!$allow_visitor) {
				$http_referer = urlencode(get_url());
				$allow_visitor = sys_auth($catid.'_'.$id.'|'.$readpoint.'|'.$paytype).'&http_referer='.$http_referer;
			} else {
				$allow_visitor = 1;
			}
		}
		//最顶级栏目ID
		$arrparentid = explode(',', $CAT['arrparentid']);
		$top_parentid = $arrparentid[1] ? $arrparentid[1] : $catid;
		
		$template = $template ? $template : $CAT['setting']['show_template'];
		if(!$template) $template = 'show';
		//SEO
		$seo_keywords = '';
		if(!empty($keywords)) $seo_keywords = implode(',',$keywords);
		$SEO = seo($siteid, $catid, $title, $description, $seo_keywords);
		
		define('STYLE',$CAT['setting']['template_list']);
		if(isset($rs['paginationtype'])) {
			$paginationtype = $rs['paginationtype'];
			$maxcharperpage = $rs['maxcharperpage'];
		}
		$pages = $titles = '';
		if($rs['paginationtype']==1) {
			//自动分页
			if($maxcharperpage < 10) $maxcharperpage = 500;
			$contentpage = pc_base::load_app_class('contentpage');
			$content = $contentpage->get_data($content,$maxcharperpage);
		}
		if($rs['paginationtype']!=0) {
			//手动分页
			$CONTENT_POS = strpos($content, '[page]');
			if($CONTENT_POS !== false) {
				$this->url = pc_base::load_app_class('url', 'content');
				$contents = array_filter(explode('[page]', $content));
				$pagenumber = count($contents);
				if (strpos($content, '[/page]')!==false && ($CONTENT_POS<7)) {
					$pagenumber--;
				}
				for($i=1; $i<=$pagenumber; $i++) {
					$pageurls[$i] = $this->url->show($id, $i, $catid, $rs['inputtime']);
				}
				$END_POS = strpos($content, '[/page]');
				if($END_POS !== false) {
					if($CONTENT_POS>7) {
						$content = '[page]'.$title.'[/page]'.$content;
					}
					if(preg_match_all("|\[page\](.*)\[/page\]|U", $content, $m, PREG_PATTERN_ORDER)) {
						foreach($m[1] as $k=>$v) {
							$p = $k+1;
							$titles[$p]['title'] = strip_tags($v);
							$titles[$p]['url'] = $pageurls[$p][0];
						}
					}
				}
				//当不存在 [/page]时，则使用下面分页
				$pages = content_pages($pagenumber,$page, $pageurls);
				//判断[page]出现的位置是否在第一位 
				if($CONTENT_POS<7) {
					$content = $contents[$page];
				} else {
					if ($page==1 && !empty($titles)) {
						$content = $title.'[/page]'.$contents[$page-1];
					} else {
						$content = $contents[$page-1];
					}
				}
				if($titles) {
					list($title, $content) = explode('[/page]', $content);
					$content = trim($content);
					if(strpos($content,'</p>')===0) {
						$content = '<p>'.$content;
					}
					if(stripos($content,'<p>')===0) {
						$content = $content.'</p>';
					}
				}
			}
		}
		$this->db->table_name = $tablename;
		//上一页
		$previous_page = $this->db->get_one("`catid` = '$catid' AND `id`<'$id' AND `status`=99",'*','id DESC');
		//下一页
		$next_page = $this->db->get_one("`catid`= '$catid' AND `id`>'$id' AND `status`=99");

		if(empty($previous_page)) {
			$previous_page = array('title'=>L('first_page'), 'thumb'=>IMG_PATH.'nopic_small.gif', 'url'=>'javascript:alert(\''.L('first_page').'\');');
		}

		if(empty($next_page)) {
			$next_page = array('title'=>L('last_page'), 'thumb'=>IMG_PATH.'nopic_small.gif', 'url'=>'javascript:alert(\''.L('last_page').'\');');
		}
		
			include template('content',$template);
	}
	//列表页
	public function lists() {
		if($_GET['d']==''){
		     $_GET['d']  = date("Y-m-d");
		}
		if($_GET['ds']==''){
		     $_GET['ds']  = date("j");
		}
		if($_GET['ms']==''){
		     $_GET['ms']  = date("m");
		}
		$catid = intval($_GET['catid']);
		$_priv_data = $this->_category_priv($catid);
		if($_priv_data=='-1') {
			$forward = urlencode(get_url());
			showmessage(L('login_website'),APP_PATH.'index.php?m=member&c=index&a=login&forward='.$forward);
		} elseif($_priv_data=='-2') {
			showmessage(L('no_priv'));
		}
		$_userid = $this->_userid;
		$_username = $this->_username;
		$_groupid = $this->_groupid;

		if(!$catid) showmessage(L('category_not_exists'),'blank');
		$siteids = getcache('category_content','commons');
		$siteid = $siteids[$catid];
		$CATEGORYS = getcache('category_content_'.$siteid,'commons');
		if(!isset($CATEGORYS[$catid])) showmessage(L('category_not_exists'),'blank');
		$CAT = $CATEGORYS[$catid];
		$siteid = $GLOBALS['siteid'] = $CAT['siteid'];
		extract($CAT);
		$setting = string2array($setting);
		//SEO
		if(!$setting['meta_title']) $setting['meta_title'] = $catname;
		$SEO = seo($siteid, '',$setting['meta_title'],$setting['meta_description'],$setting['meta_keywords']);
		define('STYLE',$setting['template_list']);
		$page = $_GET['page'];

		$template = $setting['category_template'] ? $setting['category_template'] : 'category';
		$template_list = $setting['list_template'] ? $setting['list_template'] : 'list';
		
		
		if($type==0) {
			
			$template = $child ? $template : $template_list;
			$arrparentid = explode(',', $arrparentid);
			$top_parentid = $arrparentid[1] ? $arrparentid[1] : $catid;
			$array_child = array();
			$self_array = explode(',', $arrchildid);
			//获取一级栏目ids
			foreach ($self_array as $arr) {
				if($arr!=$catid && $CATEGORYS[$arr][parentid]==$catid) {
					$array_child[] = $arr;
				}
			}
			$arrchildid = implode(',', $array_child);
			//URL规则
			$urlrules = getcache('urlrules','commons');
			$urlrules = str_replace('|', '~',$urlrules[$category_ruleid]);
			$tmp_urls = explode('~',$urlrules);
			$tmp_urls = isset($tmp_urls[1]) ?  $tmp_urls[1] : $tmp_urls[0];
			preg_match_all('/{\$([a-z0-9_]+)}/i',$tmp_urls,$_urls);
			if(!empty($_urls[1])) {
				foreach($_urls[1] as $_v) {
					$GLOBALS['URL_ARRAY'][$_v] = $_GET[$_v];
				}
			}
			define('URLRULE', $urlrules);
			$GLOBALS['URL_ARRAY']['categorydir'] = $categorydir;
			$GLOBALS['URL_ARRAY']['catdir'] = $catdir;
			$GLOBALS['URL_ARRAY']['catid'] = $catid;
			
			///预约日期处理
			
			if($catid==15){
		//	$this->db->table_name = "v9_kecheng_data";
				if($_GET[d]==1){
					
					//判断登陆
					$myid = $cfrendid=param::get_cookie('_userid');
					$myname = $cfrendid=param::get_cookie('_username');
					if(!$myname)
						showmessage(L('预约前，请先登陆'),APP_PATH.'index.php?m=member&c=index&a=login');
					
					if($this->_groupid==4)	
						showmessage(L('只有学生才能预约'));
						
					$this->db->table_name = 'v9_kecheng';
					
					$you = $this->db->get_one(array('id'=>$_GET[id]));
					
					$youname = $you[username];
					
					if($myname==$youname)
					   showmessage(L('自己不能预约自己'),APP_PATH.'index.php?m=content&c=index&a=lists&catid=15');
					
					$this->db->table_name = 'v9_kecheng_data';
					
					$re['is_yuyue']=2;
					$re['come_id']=$myid;
					$ress= $this->db->update($re,array('id'=>$_GET[id]));
					 if($ress)
					 showmessage(L('恭喜你，预约成功'),APP_PATH.'index.php?m=content&c=index&a=lists&catid=15');
					 
				}
				$tds=intval(date("d"));
				
				if($_GET[d]){
					
					$ms=intval(date("m"));
					if($_GET[ms] == $ms)
					{					
					  $dated=$_GET[ds]+1;				
					  $dateds=-1;
					 } else
					  {
						  $dateds=$_GET[ds]+3;				
						  $dated=$tds;
					  }
					  
					$nowdate=$_GET[d];
					
				}
				else
				$nowdate=date('Y-m-d');
				//$date_data = $this->db->select("`dates` = '$nowdate' ",'*','','id DESC');
				
				//$nowdate="2012-06-29";
				
				$date_data = array();
				
				//获取对应日期的所有预约信息
				$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
				$pagesize = 5;
				$offset = $pagesize*($page-1);
				$sql = "select * from v9_kecheng a,v9_kecheng_data b where `dates` = '$nowdate' and a.id=b.id group by a.username order by a.id desc limit ".$offset.",".$pagesize;
				$re_data = $this->db->query($sql);
				while($r = mysql_fetch_array($re_data))
						$date_data[] = $r;	
					
				//获取老师数量及信息	
				$key = 'username';
				$ls_data=assoc_unique(&$date_data, $key);
				$num = $this->db->query("select * from v9_kecheng a,v9_kecheng_data b where `dates` = '$nowdate' and a.id=b.id group by a.username ");
				$num = count($this->db->fetch_array($num));
				$pages = pages($num,$page,$pagesize,'index.php?m=content&c=index&a=lists&catid=15&d='.$nowdate.'&ds='.$_GET[ds].'&ms='.$_GET['ms'].'&page={$page}');

				//翻页
				if($_GET[ps]){
				
					$gg=$_GET[ps];
					$date_s = array();
					
					$i=0;
					
					$sss=$gg+2;
					//print_r($ls_data[0]);
					for($gg;$gg<$sss;$gg++){
						
						
						$date_s[$i] = $ls_data[$gg];
						$i++;
					}
					
					$ls_data=$date_s;
					
				}
				else
				{
					$i=0;
					for($gg=0;$gg<5;$gg++){
						
						
						$date_s[$i] = $ls_data[$gg];
						$i++;
					}
					
					$ls_data=$date_s;
					
				}
				
				/*$ls_data = array();
		foreach($data_laos as $key=>$val){
		
$re_data = $this->db->query("select * from v9_kecheng a,v9_kecheng_data b where `username` = '$val[username]' and a.id=b.id order by b.time desc");
			
				while($r = mysql_fetch_array($re_data))
						 $t_data[] = $r;	
						 
					$ls_data[$i] = $t_data;  //对应一个老师的所有预约课程信息
					
				//	print_r($t_data);
					
					unset($t_data);
					$i++;
				}
				*/
	
			}
			
	    if($nowdate<date('Y-m-d')){
		    $where = " and b.is_yuyue=2";
		}
		$shows=$_GET['shows'];$uid=$_GET[uid];
		if($catid==10 and $shows=="is")
			include template('content',"show_lao");
		else	

			include template('content',$template);
			
		} else {
			
		//单网页
			$this->page_db = pc_base::load_model('page_model');
			$r = $this->page_db->get_one(array('catid'=>$catid));
			if($r) extract($r);
			$template = $setting['page_template'] ? $setting['page_template'] : 'page';
			$arrchild_arr = $CATEGORYS[$parentid]['arrchildid'];
			if($arrchild_arr=='') $arrchild_arr = $CATEGORYS[$catid]['arrchildid'];
			$arrchild_arr = explode(',',$arrchild_arr);
			array_shift($arrchild_arr);
			$keywords = $keywords ? $keywords : $setting['meta_keywords'];
			$SEO = seo($siteid, 0, $title,$setting['meta_description'],$keywords);
			include template('content',$template);
		}
	}

	//外教可预约课程周查看
	public function make_look(){
	      $uid   = $_GET['uid'];//老师id
	      $uname = $_GET['uname'];//老师名称
		  
		  $day_data = $_GET['str_date'];
		  if($day_data==''){
		    $day_data = strtotime(date("Y-m-d"));
		  }
          switch(date('w',$day_data)){
		     case "0";$n=6;$k=0;break;
		     case "6";$n=5;$k=1;break;
		     case "5";$n=4;$k=2;break;
		     case "4";$n=3;$k=3;break;
		     case "3";$n=2;$k=4;break;
		     case "2";$n=1;$k=5;break;
		     case "1";$n=0;$k=6;break;
		  }
		 
		  $date_arr = array();
		  
		  for($m=$n;$m>0;$m--){			 
		     $date_arr[$m]['data'] = date('Y-m-d',$day_data-$m*86400);
		  }
		  $num  = 7-$k;
		  for($i=0;$i<=$k;$i++){
		     $date_arr[$num]['data'] = date('Y-m-d',$day_data+$i*86400);            
             $num++;
		  }
		  
          $end_date = strtotime($date_arr[7]['data'])+86400;
		  include template('content',"make_look");
//		     showmessage(L('请登陆后预约！'),APP_PATH.'index.php?m=content&c=index&a=lists&catid=15');
	}
	

	//JSON 输出
	public function json_list() {
		if($_GET['type']=='keyword' && $_GET['modelid'] && $_GET['keywords']) {
		//根据关键字搜索
			$modelid = intval($_GET['modelid']);
			$id = intval($_GET['id']);

			$MODEL = getcache('model','commons');
			if(isset($MODEL[$modelid])) {
				$keywords = safe_replace(htmlspecialchars($_GET['keywords']));
				$keywords = addslashes(iconv('utf-8','gbk',$keywords));
				$this->db->set_model($modelid);
				$result = $this->db->select("keywords LIKE '%$keywords%'",'id,title,url',10);
				if(!empty($result)) {
					$data = array();
					foreach($result as $rs) {
						if($rs['id']==$id) continue;
						if(CHARSET=='gbk') {
							foreach($rs as $key=>$r) {
								$rs[$key] = iconv('gbk','utf-8',$r);
							}
						}
						$data[] = $rs;
					}
					if(count($data)==0) exit('0');
					echo json_encode($data);
				} else {
					//没有数据
					exit('0');
				}
			}
		}

	}
	
	
	/**
	 * 检查支付状态
	 */
	protected function _check_payment($flag,$paytype) {
		$_userid = $this->_userid;
		$_username = $this->_username;
		if(!$_userid) return false;
		pc_base::load_app_class('spend','pay',0);
		$setting = $this->category_setting;
		$repeatchargedays = intval($setting['repeatchargedays']);
		if($repeatchargedays) {
			$fromtime = SYS_TIME - 86400 * $repeatchargedays;
			$r = spend::spend_time($_userid,$fromtime,$flag);
			if($r['id']) return true;
		}
		return false;
	}
	
	/**
	 * 检查阅读权限
	 *
	 */
	protected function _category_priv($catid) {
		$catid = intval($catid);
		if(!$catid) return '-2';
		$_groupid = $this->_groupid;
		$_groupid = intval($_groupid);
		if($_groupid==0) $_groupid = 8;
		$this->category_priv_db = pc_base::load_model('category_priv_model');
		$result = $this->category_priv_db->select(array('catid'=>$catid,'is_admin'=>0,'action'=>'visit'));
		if($result) {
			if(!$_groupid) return '-1';
			foreach($result as $r) {
				if($r['roleid'] == $_groupid) return '1';
			}
			return '-2';
		} else {
			return '1';
		}
	 }
}
?>