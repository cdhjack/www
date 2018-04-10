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

if(isset($_GET["i_type"])){
	$i_type = (int)$_GET["i_type"];
	$couponClassInfo = array();
	$sql = "SELECT * FROM coupon WHERE i_type='".$i_type."' ";
	$couponClassNum = $db->num($sql);//生成该类型优惠券数量
	$sql .=" limit 1";
	$couponClassInfo = $db->fetchRow($sql);	
}


//获取优惠券类型
$sql = "SELECT i_type,idesc FROM coupon GROUP BY i_type ORDER BY i_type asc";
$query = $db->query($sql);
$couponClassArr = $db->fetch($query);


$smarty->assign("backUrl", empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']);
$smarty->assign("couponClassArr", $couponClassArr);
$smarty->assign("couponClassNum", $couponClassNum);
$smarty->assign("couponClassInfo", $couponClassInfo);
$smarty->view('couponclass_form.tpl');
?>