<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 13;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode);//功能区权限检测
$smarty->assign("title", "意见反馈");

$breadcrumbs = array();
$breadcrumbs[] = array(
	'text'      => '首页',
	'href'      => SITE_URL.'admin',
	'separator' => false
);

$breadcrumbs[] = array(
	'text'      => '意见反馈',
	'href'      => SITE_URL.'admin/message.php',
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
$filter_content = isset($_POST["filter_content"])?$_POST["filter_content"]:urldecode($_GET["filter_content"]);
$filter_tel = isset($_POST["filter_tel"])?$_POST["filter_tel"]:$_GET["filter_tel"];
$filter_adddate = isset($_POST["filter_adddate"])?$_POST["filter_adddate"]:$_GET["filter_adddate"];

$addurl = '';
$sql = "SELECT a.id,a.i_value,a.i_reserved_1,a.i_reserved_2,a.i_datetime FROM appmeta a WHERE a.type=2 ";//type:2为所馈信息

if(!empty($filter_id)){
	$sql .=" and a.id='".(int)$filter_id."' ";
	$addurl .='&filter_id='.$filter_id;
}
if(!empty($filter_content)){
	$sql .=" and a.i_value like '%".$filter_content."%' ";
	$addurl .='&filter_content='.urlencode($filter_content);
}
if(!empty($filter_tel)){
	$sql .=" and a.i_reserved_2='".$filter_tel."' ";
	$addurl .='&filter_tel='.$filter_tel;
}
if(!empty($filter_adddate)){
	$s_mktime = toTime($filter_adddate.' 00:00:00');
	$e_mktime = toTime($filter_adddate.' 23:59:59');	
	$sql .=" and UNIX_TIMESTAMP(a.i_datetime)>=".$s_mktime." and UNIX_TIMESTAMP(a.i_datetime)<=".$e_mktime." ";
	$addurl .='&filter_adddate='.$filter_adddate;
}
$num = $db->num($sql);
$sql .="ORDER BY a.id desc LIMIT ".$pagination->get_begin().",".$pagination->perpage;
$query = $db->query($sql);
$messageArr = $db->fetch($query);


//分页处理	
$pagination->rows = $num;		
$pagination->href = $addurl;
$pageHtml = $pagination->create();

//返回列表页参数值
$addurl = empty($addurl)?'':substr($addurl,1);
setcookie ('backurl', empty($addurl)?'':$addurl, 0, '/', '');

$smarty->assign("filter_id", $filter_id);
$smarty->assign("filter_content", $filter_content);
$smarty->assign("filter_tel", $filter_tel);
$smarty->assign("filter_adddate", $filter_adddate);
$smarty->assign("messageArr", $messageArr);
$smarty->assign("pageHtml", $pageHtml);
$smarty->view('message_list.tpl');
?>