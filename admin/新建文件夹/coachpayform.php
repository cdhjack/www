<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 2;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode);//功能区权限检测
$smarty->assign("title", "消费记录");

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
//获取教练信息
$id = isset($_POST["id"])?(int)$_POST["id"]:(int)$_GET["id"];
$breadcrumbs[] = array(
	'text'      => '消费记录',
	'href'      => SITE_URL.'admin/coachpayform.php?id='.$id,
	'separator' => ' :: '
);
$smarty->assign("breadcrumbs", $breadcrumbs);

$coachInfo = array();
if($id){
	$sql = "SELECT id,rname FROM coach WHERE id='".$id."'";
	$coachInfo = $db->fetchRow($sql);	
}
else{
	redirectAdmin ('IllegalError', SITE_URL.'admin/coach.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']));
}

$smarty->assign("backUrl", empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']);
$smarty->assign("coachInfo", $coachInfo);
$smarty->view('coach_pay_form.tpl');
?>