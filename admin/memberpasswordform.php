<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 1;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode);//功能区权限检测
$smarty->assign("title", "修改密码");

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

$id = isset($_POST["id"])?(int)$_POST["id"]:(int)$_GET["id"];
$breadcrumbs[] = array(
	'text'      => '修改密码',
	'href'      => SITE_URL.'admin/memberpasswordform.php?id='.$id,
	'separator' => ' :: '
);
$smarty->assign("breadcrumbs", $breadcrumbs);


$memberInfo = array();
if($id){
	$sql = "SELECT id,`mobile`,`email` FROM member WHERE id='".$id."'";
	$memberInfo = $db->fetchRow($sql);	
}

$smarty->assign("backUrl", empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']);
$smarty->assign("memberInfo", $memberInfo);
$smarty->view('member_password_form.tpl');
?>