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

$id = isset($_POST["id"])?(int)$_POST["id"]:(int)$_GET["id"];
$chargeInfo = array();
if($id){
	$sql = "SELECT id,title,total,give,date_start,date_end,status FROM charge WHERE id='".$id."'";
	$chargeInfo = $db->fetchRow($sql);	
}

$smarty->assign("backUrl", empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']);
$smarty->assign("chargeInfo", $chargeInfo);
$smarty->view('charge_form.tpl');
?>