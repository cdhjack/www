<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 14;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode);//功能区权限检测
$smarty->assign("title", "订单列表");

$breadcrumbs = array();
$breadcrumbs[] = array(
	'text'      => '首页',
	'href'      => SITE_URL.'admin',
	'separator' => false
);

$breadcrumbs[] = array(
	'text'      => '订单列表',
	'href'      => SITE_URL.'admin/order.php',
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
$filter_name = isset($_POST["filter_name"])?$_POST["filter_name"]:urldecode($_GET["filter_name"]);
$filter_phone = isset($_POST["filter_phone"])?$_POST["filter_phone"]:$_GET["filter_phone"];
$filter_cname = isset($_POST["filter_cname"])?$_POST["filter_cname"]:urldecode($_GET["filter_cname"]);
$filter_kcname = isset($_POST["filter_kcname"])?$_POST["filter_kcname"]:urldecode($_GET["filter_kcname"]);
$filter_hour = isset($_POST["filter_hour"])?$_POST["filter_hour"]:$_GET["filter_hour"];
$filter_perprice = isset($_POST["filter_perprice"])?$_POST["filter_perprice"]:$_GET["filter_perprice"];
$filter_price = isset($_POST["filter_price"])?$_POST["filter_price"]:$_GET["filter_price"];
$filter_coupon = isset($_POST["filter_coupon"])?$_POST["filter_coupon"]:$_GET["filter_coupon"];
$filter_rprice = isset($_POST["filter_rprice"])?$_POST["filter_rprice"]:$_GET["filter_rprice"];
$filter_date = isset($_POST["filter_date"])?$_POST["filter_date"]:$_GET["filter_date"];
$filter_type = isset($_POST["filter_type"])?$_POST["filter_type"]:$_GET["filter_type"];


$addurl = '';
$sql = "SELECT a.*,b.price as coupon FROM orders a LEFT JOIN coupon b ON a.yhqid=b.id WHERE 1=1 ";

if(!empty($filter_id)){
	$sql .=" and a.id='".(int)$filter_id."' ";
	$addurl .='&filter_id='.$filter_id;
}
if(!empty($filter_name)){
	$sql .=" and a.name like '%".$filter_name."%' ";
	$addurl .='&filter_name='.urlencode($filter_name);
}
if(!empty($filter_phone)){
	$sql .=" and a.phone='".$filter_phone."' ";
	$addurl .='&filter_phone='.$filter_phone;
}
if(!empty($filter_cname)){
	$sql .=" and a.cname like '%".$filter_cname."%' ";
	$addurl .='&filter_cname='.urlencode($filter_cname);
}
if(!empty($filter_kcname)){
	$sql .=" and a.kcname like '%".$filter_kcname."%' ";
	$addurl .='&filter_kcname='.urlencode($filter_kcname);
}
if(!empty($filter_hour)){
	$sql .=" and a.hour='".(int)$filter_hour."' ";
	$addurl .='&filter_hour='.$filter_hour;
}
if(!empty($filter_perprice)){
	$sql .=" and a.perprice='".(float)$filter_perprice."' ";
	$addurl .='&filter_perprice='.$filter_perprice;
}
if(!empty($filter_price)){
	$sql .=" and a.price='".(float)$filter_price."' ";
	$addurl .='&filter_price='.$filter_price;
}
if(!empty($filter_coupon)){
	$sql .=" and b.price='".(float)$filter_coupon."' ";
	$addurl .='&filter_coupon='.$filter_coupon;
}
if(!empty($filter_rprice)){
	$sql .=" and a.rprice='".(float)$filter_rprice."' ";
	$addurl .='&filter_rprice='.$filter_rprice;
}
if(!empty($filter_date)){
	$sql .=" and a.date='".$filter_date."' ";
	$addurl .='&filter_date='.$filter_date;
}
if($filter_type!=''){
	$sql .=" and a.type='".(int)$filter_type."' ";
	$addurl .='&filter_type='.$filter_type;
}
$num = $db->num($sql);
$sql .=" ORDER BY a.id desc LIMIT ".$pagination->get_begin().",".$pagination->perpage;
$query = $db->query($sql);
$orderArr = $db->fetch($query);


//分页处理	
$pagination->rows = $num;		
$pagination->href = $addurl;
$pageHtml = $pagination->create();

//返回列表页参数值
$addurl = empty($addurl)?'':substr($addurl,1);
setcookie ('backurl', empty($addurl)?'':$addurl, 0, '/', '');

$smarty->assign("filter_id", $filter_id);
$smarty->assign("filter_name", $filter_name);
$smarty->assign("filter_phone", $filter_phone);
$smarty->assign("filter_cname", $filter_cname);
$smarty->assign("filter_kcname", $filter_kcname);
$smarty->assign("filter_hour", $filter_hour);
$smarty->assign("filter_perprice", $filter_perprice);
$smarty->assign("filter_price", $filter_price);
$smarty->assign("filter_coupon", $filter_coupon);
$smarty->assign("filter_rprice", $filter_rprice);
$smarty->assign("filter_date", $filter_date);
$smarty->assign("filter_type", $filter_type);
$smarty->assign("orderArr", $orderArr);
$smarty->assign("pageHtml", $pageHtml);
$smarty->view('order_list.tpl');
?>