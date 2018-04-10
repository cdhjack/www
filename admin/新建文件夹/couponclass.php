<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 7;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode);//功能区权限检测
$smarty->assign("title", "优惠券类型");

$breadcrumbs = array();
$breadcrumbs[] = array(
	'text'      => '首页',
	'href'      => SITE_URL.'admin',
	'separator' => false
);

$breadcrumbs[] = array(
	'text'      => '优惠券类型',
	'href'      => SITE_URL.'admin/couponclass.php',
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
$filter_name = isset($_POST["filter_name"])?$_POST["filter_name"]:urldecode($_GET["filter_name"]);
$filter_idesc = isset($_POST["filter_idesc"])?$_POST["filter_idesc"]:urldecode($_GET["filter_idesc"]);
$filter_price = isset($_POST["filter_price"])?$_POST["filter_price"]:$_GET["filter_price"];
$filter_yxq = isset($_POST["filter_yxq"])?$_POST["filter_yxq"]:$_GET["filter_yxq"];
$filter_total = isset($_POST["filter_total"])?$_POST["filter_total"]:$_GET["filter_total"];
$filter_note = isset($_POST["filter_note"])?$_POST["filter_note"]:urldecode($_GET["filter_note"]);

$addurl = '';
$sql = "SELECT a.name,a.i_type,a.idesc,a.price,a.yxq,a.note,count(a.id) as total FROM coupon a WHERE 1=1";

if(!empty($filter_name)){
	$sql .=" and a.name like '%".$filter_name."%' ";
	$addurl .='&filter_name='.urlencode($filter_name);
}
if(!empty($filter_idesc)){
	$sql .=" and a.idesc like '%".$filter_idesc."%' ";
	$addurl .='&filter_idesc='.urlencode($filter_idesc);
}
if(!empty($filter_note)){
	$sql .=" and a.note like '%".$filter_note."%' ";
	$addurl .='&filter_note='.urlencode($filter_note);
}
if(!empty($filter_price)){
	$sql .=" and a.price='".(float)$filter_price."' ";
	$addurl .='&filter_price='.$filter_price;
}
if(!empty($filter_yxq)){
	$sql .=" and a.yxq='".$filter_yxq."' ";
	$addurl .='&filter_yxq='.$filter_yxq;
}
$sql .= " GROUP BY a.i_type";
if(!empty($filter_total)){	
	$sql .=" having count(a.id)='".(int)$filter_total."' ";
	$addurl .='&filter_total='.$filter_total;
}
//echo $sql;
$num = $db->num($sql);
$sql .="  ORDER BY a.i_type desc LIMIT ".$pagination->get_begin().",".$pagination->perpage;
$query = $db->query($sql);
$couponClassArr = $db->fetch($query);


//分页处理	
$pagination->rows = $num;		
$pagination->href = $addurl;
$pageHtml = $pagination->create();

//返回列表页参数值
$addurl = empty($addurl)?'':substr($addurl,1);
setcookie ('backurl', empty($addurl)?'':$addurl, 0, '/', '');

$smarty->assign("filter_name", $filter_name);
$smarty->assign("filter_idesc", $filter_idesc);
$smarty->assign("filter_price", $filter_price);
$smarty->assign("filter_yxq", $filter_yxq);
$smarty->assign("filter_total", $filter_total);
$smarty->assign("filter_note", $filter_note);
$smarty->assign("couponClassArr", $couponClassArr);
$smarty->assign("pageHtml", $pageHtml);
$smarty->view('couponclass_list.tpl');
?>