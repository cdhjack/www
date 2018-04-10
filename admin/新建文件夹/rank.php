<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 6;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode);//功能区权限检测
$smarty->assign("title", "教练排行");

$breadcrumbs = array();
$breadcrumbs[] = array(
	'text'      => '首页',
	'href'      => SITE_URL.'admin',
	'separator' => false
);

$breadcrumbs[] = array(
	'text'      => '教练排行',
	'href'      => SITE_URL.'admin/rank.php',
	'separator' => ' :: '
);
$smarty->assign("breadcrumbs", $breadcrumbs);

//获取类型列表
$sql = "SELECT id,val FROM coachtype ORDER BY id asc";
$query = $db->query($sql);
$rankTypeArr = $db->fetch($query);
//print_r($rankTypeArr);

//分页信息
require_once(SYS_ROOT . "class/class_adminpagination.php");
$pagination=new MYPagination();
$page = intval($_GET['page']);
$pagination->page = $page ? $page : 1;
$pagination->perpage = 20;


//查询值
$filter_id = isset($_POST["filter_id"])?$_POST["filter_id"]:$_GET["filter_id"];
$filter_set_rank = isset($_POST["filter_set_rank"])?$_POST["filter_set_rank"]:$_GET["filter_set_rank"];
$filter_phone = isset($_POST["filter_phone"])?$_POST["filter_phone"]:$_GET["filter_phone"];
$filter_rname = isset($_POST["filter_rname"])?$_POST["filter_rname"]:urldecode($_GET["filter_rname"]);
$filter_typeid = isset($_POST["filter_typeid"])?$_POST["filter_typeid"]:$_GET["filter_typeid"];
$filter_level = isset($_POST["filter_level"])?$_POST["filter_level"]:$_GET["filter_level"];
$filter_i_rank = isset($_POST["filter_i_rank"])?$_POST["filter_i_rank"]:$_GET["filter_i_rank"];
$filter_is_set = isset($_POST["filter_is_set"])?$_POST["filter_is_set"]:$_GET["filter_is_set"];


$addurl = '';
$sql = "SELECT a.*,b.val,c.price FROM coach a LEFT JOIN coachtype b ON a.typeid=b.id LEFT JOIN course c ON a.id=c.uid WHERE a.pass=1 ";

if(!empty($filter_id)){
	$sql .=" and a.id='".(int)$filter_id."' ";
	$addurl .='&filter_id='.$filter_id;
}
if(!empty($filter_set_rank)){
	$sql .=" and a.set_rank='".(int)$filter_set_rank."' ";
	$addurl .='&filter_set_rank='.$filter_set_rank;
}
if(!empty($filter_phone)){
	$sql .=" and a.phone='".$filter_phone."' ";
	$addurl .='&filter_phone='.$filter_phone;
}
if(!empty($filter_rname)){
	$sql .=" and a.rname like '%".$filter_rname."%' ";
	$addurl .='&filter_rname='.urlencode($filter_rname);
}
if(!empty($filter_typeid)){
	$sql .=" and a.typeid='".(int)$filter_typeid."' ";
	$addurl .='&filter_typeid='.$filter_typeid;
}
if(!empty($filter_level)){
	$sql .=" and a.level='".(int)$filter_level."' ";
	$addurl .='&filter_level='.$filter_level;
}
if(!empty($filter_i_rank)){
	$sql .=" and a.i_rank='".(int)$filter_i_rank."' ";
	$addurl .='&filter_i_rank='.$filter_i_rank;
}
if($filter_is_set!=''){
	if($filter_is_set==1){
		$sql .=" and a.set_rank<>9999999";
	}
	else{
		$sql .=" and a.set_rank=9999999";
	}
	$addurl .='&filter_is_set='.$filter_is_set;
}

//echo $sql;
$num = $db->num($sql);
$sql .=" ORDER BY ";
$sql .=" a.set_rank asc,a.i_rank desc LIMIT ".$pagination->get_begin().",".$pagination->perpage;

$query = $db->query($sql);
$rankArr = $db->fetch($query);

//头像信息处理
$newRankArr = array();
if($rankArr){
	foreach($rankArr as $key=>$rank){
		foreach($rank as $k=>$v){
			if($k=='tx'){
				if(strpos($v, 'http://api.holylandsports.com.cn/')!==false){
					$avatar = str_replace("http://api.holylandsports.com.cn/",SITE_URL,$v);
				}
				else if(strpos($v, 'http://www.website.com/')!==false){
					$avatar = str_replace("http://www.website.com/",SITE_URL,$v);
				}
				else{
					$avatar = SITE_URL.substr($v,1);
				}
				$newRankArr[$key]['avatar'] = $avatar;
			}		
			$newRankArr[$key][$k] = $v;
		}
	}
}


//分页处理	
$pagination->rows = $num;		
$pagination->href = $addurl;
$pageHtml = $pagination->create();

//返回列表页参数值
$addurl = empty($addurl)?'':substr($addurl,1);
setcookie ('backurl', empty($addurl)?'':$addurl, 0, '/', '');

$smarty->assign("filter_id", $filter_id);
$smarty->assign("filter_set_rank", $filter_set_rank);
$smarty->assign("filter_phone", $filter_phone);
$smarty->assign("filter_rname", $filter_rname);
$smarty->assign("filter_typeid", $filter_typeid);
$smarty->assign("filter_level", $filter_level);
$smarty->assign("filter_i_rank", $filter_i_rank);
$smarty->assign("filter_is_set", $filter_is_set);
$smarty->assign("rankTypeArr", $rankTypeArr);
$smarty->assign("rankArr", $newRankArr);
$smarty->assign("pageHtml", $pageHtml);
$smarty->view('rank_list.tpl');
?>