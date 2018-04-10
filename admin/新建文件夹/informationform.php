<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 12;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode);//功能区权限检测
$smarty->assign("title", "文章管理");

$breadcrumbs = array();
$breadcrumbs[] = array(
	'text'      => '首页',
	'href'      => SITE_URL.'admin',
	'separator' => false
);

$breadcrumbs[] = array(
	'text'      => '文章管理',
	'href'      => SITE_URL.'admin/information.php',
	'separator' => ' :: '
);
$smarty->assign("breadcrumbs", $breadcrumbs);

$id = isset($_POST["id"])?(int)$_POST["id"]:(int)$_GET["id"];
$informationInfo = array();
if($id){
	$sql = "SELECT * FROM information WHERE id='".$id."'";
	$informationInfo = $db->fetchRow($sql);	
}

//获取类别列表
$sql = "SELECT id,name FROM informationclass ORDER BY ordernum asc";
$query = $db->query($sql);
$informationClassArr = $db->fetch($query);


$smarty->assign("backUrl", empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']);
$smarty->assign("informationClassArr", $informationClassArr);
$smarty->assign("informationInfo", $informationInfo);
$smarty->view('information_form.tpl');
?>