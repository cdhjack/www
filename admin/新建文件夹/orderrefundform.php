<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 14;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode);//功能区权限检测
$smarty->assign("title", "订单退款");

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
$id = isset($_POST["id"])?(int)$_POST["id"]:(int)$_GET["id"];
$breadcrumbs[] = array(
	'text'      => '订单退款',
	'href'      => SITE_URL.'admin/orderrefundform.php?id='.$id,
	'separator' => ' :: '
);
$smarty->assign("breadcrumbs", $breadcrumbs);

$orderInfo = array();
if($id){
	$sql = "SELECT id,name,rprice,type FROM orders WHERE id='".$id."'";
	$orderInfo = $db->fetchRow($sql);	
}

$smarty->assign("backUrl", empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']);
$smarty->assign("orderInfo", $orderInfo);
$smarty->view('orderrefund_form.tpl');
?>