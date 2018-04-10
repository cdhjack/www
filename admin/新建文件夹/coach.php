<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 2;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode);//功能区权限检测
$smarty->assign("title", "教练列表");

$breadcrumbs = array();
$breadcrumbs[] = array(
	'text'      => '首页',
	'href'      => SITE_URL.'admin',
	'separator' => false
);

$breadcrumbs[] = array(
	'text'      => '教练列表',
	'href'      => SITE_URL.'admin/coach.php',
	'separator' => ' :: '
);
$smarty->assign("breadcrumbs", $breadcrumbs);

//获取类型列表
$sql = "SELECT id,val FROM coachtype ORDER BY id asc";
$query = $db->query($sql);
$coachTypeArr = $db->fetch($query);
//print_r($coachTypeArr);

//分页信息
require_once(SYS_ROOT . "class/class_adminpagination.php");
$pagination=new MYPagination();
$page = intval($_GET['page']);
$pagination->page = $page ? $page : 1;
$pagination->perpage = 20;


//查询值
$filter_id = isset($_POST["filter_id"])?$_POST["filter_id"]:$_GET["filter_id"];
$filter_phone = isset($_POST["filter_phone"])?$_POST["filter_phone"]:$_GET["filter_phone"];
$filter_rname = isset($_POST["filter_rname"])?$_POST["filter_rname"]:urldecode($_GET["filter_rname"]);
$filter_sex = isset($_POST["filter_sex"])?$_POST["filter_sex"]:$_GET["filter_sex"];
$filter_typeid = isset($_POST["filter_typeid"])?$_POST["filter_typeid"]:$_GET["filter_typeid"];
$filter_level = isset($_POST["filter_level"])?$_POST["filter_level"]:$_GET["filter_level"];
$filter_min_price = isset($_POST["filter_min_price"])?$_POST["filter_min_price"]:$_GET["filter_min_price"];
$filter_max_price = isset($_POST["filter_max_price"])?$_POST["filter_max_price"]:$_GET["filter_max_price"];
$filter_order_num = isset($_POST["filter_order_num"])?$_POST["filter_order_num"]:$_GET["filter_order_num"];
$filter_score = isset($_POST["filter_score"])?$_POST["filter_score"]:$_GET["filter_score"];
$filter_reg_start_date = isset($_POST["filter_reg_start_date"])?$_POST["filter_reg_start_date"]:$_GET["filter_reg_start_date"];
$filter_reg_end_date = isset($_POST["filter_reg_end_date"])?$_POST["filter_reg_end_date"]:$_GET["filter_reg_end_date"];
$filter_pass = isset($_POST["filter_pass"])?$_POST["filter_pass"]:$_GET["filter_pass"];


$addurl = '';
$sql = "SELECT a.*,b.val,c.price FROM coach a LEFT JOIN coachtype b ON a.typeid=b.id LEFT JOIN course c ON a.id=c.uid WHERE 1=1 ";

if(!empty($filter_id)){
	$sql .=" and a.id='".(int)$filter_id."' ";
	$addurl .='&filter_id='.$filter_id;
}
if(!empty($filter_phone)){
	$sql .=" and a.phone='".$filter_phone."' ";
	$addurl .='&filter_phone='.$filter_phone;
}
if(!empty($filter_rname)){
	$sql .=" and a.rname like '%".$filter_rname."%' ";
	$addurl .='&filter_rname='.urlencode($filter_rname);
}
if($filter_sex!=''){
	$sql .=" and a.sex='".(int)$filter_sex."' ";
	$addurl .='&filter_sex='.$filter_sex;
}
if(!empty($filter_typeid)){
	$sql .=" and a.typeid='".(int)$filter_typeid."' ";
	$addurl .='&filter_typeid='.$filter_typeid;
}
if(!empty($filter_level)){
	$sql .=" and a.level='".(int)$filter_level."' ";
	$addurl .='&filter_level='.$filter_level;
}
if(!empty($filter_min_price) && !empty($filter_max_price)){
	$sql .=" and c.price>='".(float)$filter_min_price."' and c.price<='".(float)$filter_max_price."'";
	$addurl .='&filter_min_price='.$filter_min_price.'&filter_max_price='.$filter_max_price;
}
if(!empty($filter_order_num)){
	$sql .=" and a.order_num='".(int)$filter_order_num."' ";
	$addurl .='&filter_order_num='.$filter_order_num;
}
if(!empty($filter_score)){
	$sql .=" and a.score='".(int)$filter_score."' ";
	$addurl .='&filter_score='.$filter_score;
}
if(!empty($filter_reg_start_date) && !empty($filter_reg_end_date)){
	$sql .=" and a.reg_date>='".$filter_reg_start_date."' and a.reg_date<='".$filter_reg_end_date."'";
	$addurl .='&filter_reg_start_date='.$filter_reg_start_date.'&filter_reg_end_date='.$filter_reg_end_date;
}
/*if($filter_pass!=''){
	if($filter_pass==2){//待审核是指教练类型未选择
		//$sql .=" and a.typeid=0 and a.pass=0";
		$sql .=" and a.typeid=0";
	}
	else{
		$sql .=" and a.pass='".(int)$filter_pass."' and a.typeid>0";
	}
	$addurl .='&filter_pass='.$filter_pass;
}*/
if($filter_pass!=''){
	$sql .=" and a.pass='".(int)$filter_pass."'";
	$addurl .='&filter_pass='.$filter_pass;
}

//echo $sql;
$num = $db->num($sql);
$sql .=" ORDER BY ";
$sql .=" a.id desc LIMIT ".$pagination->get_begin().",".$pagination->perpage;

$query = $db->query($sql);
$coachArr = $db->fetch($query);

//头像信息处理
$newCoachArr = array();
if($coachArr){
	foreach($coachArr as $key=>$coach){
		foreach($coach as $k=>$v){
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
				$newCoachArr[$key]['avatar'] = $avatar;
			}		
			$newCoachArr[$key][$k] = $v;
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
$smarty->assign("filter_phone", $filter_phone);
$smarty->assign("filter_rname", $filter_rname);
$smarty->assign("filter_sex", $filter_sex);
$smarty->assign("filter_typeid", $filter_typeid);
$smarty->assign("filter_level", $filter_level);
$smarty->assign("filter_min_price", $filter_min_price);
$smarty->assign("filter_max_price", $filter_max_price);
$smarty->assign("filter_order_num", $filter_order_num);
$smarty->assign("filter_score", $filter_score);
$smarty->assign("filter_reg_start_date", $filter_reg_start_date);
$smarty->assign("filter_reg_end_date", $filter_reg_end_date);
$smarty->assign("filter_pass", $filter_pass);
$smarty->assign("coachTypeArr", $coachTypeArr);
$smarty->assign("coachArr", $newCoachArr);
$smarty->assign("pageHtml", $pageHtml);
$smarty->view('coach_list.tpl');
?>