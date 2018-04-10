<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 9;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode);//功能区权限检测
$smarty->assign("title", "系统短信");

$breadcrumbs = array();
$breadcrumbs[] = array(
	'text'      => '首页',
	'href'      => SITE_URL.'admin',
	'separator' => false
);

$breadcrumbs[] = array(
	'text'      => '系统短信',
	'href'      => SITE_URL.'admin/regsms.php',
	'separator' => ' :: '
);
$smarty->assign("breadcrumbs", $breadcrumbs);

//获取类别列表
$smsClassArr = array(1=>'用户注册',2=>'找回密码',3=>'找回支付密码');

//分页信息
require_once(SYS_ROOT . "class/class_adminpagination.php");
$pagination=new MYPagination();
$page = intval($_GET['page']);
$pagination->page = $page ? $page : 1;
$pagination->perpage = 20;


//查询值
$filter_id = isset($_POST["filter_id"])?$_POST["filter_id"]:$_GET["filter_id"];
$filter_send_start_date = isset($_POST["filter_send_start_date"])?$_POST["filter_send_start_date"]:$_GET["filter_send_start_date"];
$filter_send_end_date = isset($_POST["filter_send_end_date"])?$_POST["filter_send_end_date"]:$_GET["filter_send_end_date"];
$filter_phone = isset($_POST["filter_phone"])?$_POST["filter_phone"]:$_GET["filter_phone"];
$filter_class = isset($_POST["filter_class"])?$_POST["filter_class"]:$_GET["filter_class"];
$filter_code = isset($_POST["filter_code"])?$_POST["filter_code"]:$_GET["filter_code"];


$addurl = '';
$sql = "SELECT a.id,a.phone,a.smscode,a.optype,a.i_datetime FROM i_sms a WHERE 1=1 ";

if(!empty($filter_id)){
	$sql .=" and a.id='".(int)$filter_id."' ";
	$addurl .='&filter_id='.$filter_id;
}
if(!empty($filter_send_start_date) && !empty($filter_send_end_date)){
	$filter_send_start_date_unix = toTime($filter_send_start_date.' 00:00:00');
	$filter_send_end_date_unix = toTime($filter_send_end_date.' 23:59:59');
	$sql .=" and UNIX_TIMESTAMP(a.i_datetime)>='".$filter_send_start_date_unix."' and UNIX_TIMESTAMP(a.i_datetime)<='".$filter_send_end_date_unix."'";
	$addurl .='&filter_send_start_date='.$filter_send_start_date.'&filter_send_end_date='.$filter_send_end_date;
}
if(!empty($filter_phone)){
	$sql .=" and a.phone='".$filter_phone."' ";
	$addurl .='&filter_phone='.$filter_phone;
}
if(!empty($filter_class)){
	$sql .=" and a.optype='".(int)$filter_class."' ";
	$addurl .='&filter_class='.$filter_class;
}
if(!empty($filter_code)){
	$sql .=" and a.smscode='".$filter_code."' ";
	$addurl .='&filter_code='.$filter_code;
}
$num = $db->num($sql);
$sql .=" ORDER BY a.id desc LIMIT ".$pagination->get_begin().",".$pagination->perpage;
$query = $db->query($sql);
$regsmsArr = $db->fetch($query);


//分页处理	
$pagination->rows = $num;		
$pagination->href = $addurl;
$pageHtml = $pagination->create();

//返回列表页参数值
$addurl = empty($addurl)?'':substr($addurl,1);
setcookie ('backurl', empty($addurl)?'':$addurl, 0, '/', '');


$smarty->assign("filter_id", $filter_id);
$smarty->assign("filter_send_start_date", $filter_send_start_date);
$smarty->assign("filter_send_end_date", $filter_send_end_date);
$smarty->assign("filter_phone", $filter_phone);
$smarty->assign("filter_class", $filter_class);
$smarty->assign("filter_code", $filter_code);
$smarty->assign("smsClassArr", $smsClassArr);
$smarty->assign("regsmsArr", $regsmsArr);
$smarty->assign("pageHtml", $pageHtml);
$smarty->view('regsms_list.tpl');
?>