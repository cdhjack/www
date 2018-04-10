<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 1;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode);//功能区权限检测
$smarty->assign("title", "消费记录");

$breadcrumbs = array();
$breadcrumbs[] = array(
	'text'      => '首页',
	'href'      => SITE_URL.'admin',
	'separator' => false
);

$breadcrumbs[] = array(
	'text'      => '用户列表',
	'href'      => SITE_URL.'admin/member.php',
	'separator' => ' :: '
);
//获取用户信息
$id = isset($_POST["id"])?(int)$_POST["id"]:(int)$_GET["id"];
$breadcrumbs[] = array(
	'text'      => '消费记录',
	'href'      => SITE_URL.'admin/memberpayform.php?id='.$id,
	'separator' => ' :: '
);
$smarty->assign("breadcrumbs", $breadcrumbs);

$memberInfo = array();
if($id){
	$sql = "SELECT id,rname FROM user WHERE id='".$id."'";
	$memberInfo = $db->fetchRow($sql);	
}
else{
	redirectAdmin ('IllegalError', SITE_URL.'admin/member.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']));
}

$smarty->assign("backUrl", empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']);
$smarty->assign("memberInfo", $memberInfo);
$smarty->view('member_pay_form.tpl');
?>