<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 11;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode);//功能区权限检测
$smarty->assign("title", "充送活动");

$breadcrumbs = array();
$breadcrumbs[] = array(
	'text'      => '首页',
	'href'      => SITE_URL.'admin',
	'separator' => false
);

$breadcrumbs[] = array(
	'text'      => '充送活动',
	'href'      => SITE_URL.'admin/charge.php',
	'separator' => ' :: '
);
$smarty->assign("breadcrumbs", $breadcrumbs);

//分页信息
require_once(SYS_ROOT . "class/class_adminpagination.php");
$pagination=new MYPagination();
$page = intval($_GET['page']);
$pagination->page = $page ? $page : 1;
$pagination->perpage = 20;


//查询值
$filter_id = isset($_POST["filter_id"])?$_POST["filter_id"]:$_GET["filter_id"];
$filter_title = isset($_POST["filter_title"])?$_POST["filter_title"]:urldecode($_GET["filter_title"]);
$filter_total = isset($_POST["filter_total"])?$_POST["filter_total"]:$_GET["filter_total"];
$filter_give = isset($_POST["filter_give"])?$_POST["filter_give"]:$_GET["filter_give"];
$filter_date_start = isset($_POST["filter_date_start"])?$_POST["filter_date_start"]:$_GET["filter_date_start"];
$filter_date_end = isset($_POST["filter_date_end"])?$_POST["filter_date_end"]:$_GET["filter_date_end"];
$filter_status = isset($_POST["filter_status"])?$_POST["filter_status"]:$_GET["filter_status"];


$addurl = '';
$sql = "SELECT a.* FROM charge a WHERE 1=1 ";

if(!empty($filter_id)){
	$sql .=" and a.id='".(int)$filter_id."' ";
	$addurl .='&filter_id='.$filter_id;
}
if(!empty($filter_title)){
	$sql .=" and a.title like '%".$filter_title."%' ";
	$addurl .='&filter_title='.urlencode($filter_title);
}
if(!empty($filter_total)){
	$sql .=" and a.total='".(float)$filter_total."' ";
	$addurl .='&filter_total='.$filter_total;
}
if(!empty($filter_give)){
	$sql .=" and a.give='".(float)$filter_give."' ";
	$addurl .='&filter_give='.$filter_give;
}
if(!empty($filter_date_start)){
	$sql .=" and a.date_start='".$filter_date_start."' ";
	$addurl .='&filter_date_start='.$filter_date_start;
}
if(!empty($filter_date_end)){
	$sql .=" and a.date_end='".$filter_date_end."' ";
	$addurl .='&filter_date_end='.$filter_date_end;
}
if($filter_status!=''){
	$sql .=" and a.status='".(int)$filter_status."' ";
	$addurl .='&filter_status='.$filter_status;
}
$num = $db->num($sql);
$sql .=" ORDER BY a.id desc LIMIT ".$pagination->get_begin().",".$pagination->perpage;
$query = $db->query($sql);
$chargeArr = $db->fetch($query);


//分页处理	
$pagination->rows = $num;		
$pagination->href = $addurl;
$pageHtml = $pagination->create();

//返回列表页参数值
$addurl = empty($addurl)?'':substr($addurl,1);
setcookie ('backurl', empty($addurl)?'':$addurl, 0, '/', '');

$smarty->assign("filter_id", $filter_id);
$smarty->assign("filter_title", $filter_title);
$smarty->assign("filter_total", $filter_total);
$smarty->assign("filter_give", $filter_give);
$smarty->assign("filter_date_start", $filter_date_start);
$smarty->assign("filter_date_end", $filter_date_end);
$smarty->assign("filter_status", $filter_status);
$smarty->assign("chargeArr", $chargeArr);
$smarty->assign("pageHtml", $pageHtml);
$smarty->view('charge_list.tpl');
?>