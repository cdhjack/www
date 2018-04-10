<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 3;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode);//功能区权限检测
$smarty->assign("title", "用户管理");

$breadcrumbs = array();
$breadcrumbs[] = array(
	'text'      => '首页',
	'href'      => SITE_URL.'admin',
	'separator' => false
);

$breadcrumbs[] = array(
	'text'      => '用户管理',
	'href'      => SITE_URL.'admin/user.php',
	'separator' => ' :: '
);
$smarty->assign("breadcrumbs", $breadcrumbs);

$id = isset($_POST["id"])?(int)$_POST["id"]:(int)$_GET["id"];
$userInfo = array();
if($id){
	$sql = "SELECT ID,Name,RealName,Sex,Mail,GroupID,Checked,LoginTime FROM admin WHERE ID='".$id."'";
	$userInfo = $db->fetchRow($sql);	
}

//获取组列表
$sql = "SELECT ID,Name FROM `group` ORDER BY Number asc";
$query = $db->query($sql);
$groupArr = $db->fetch($query);


$smarty->assign("backUrl", empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']);
$smarty->assign("groupArr", $groupArr);
$smarty->assign("userInfo", $userInfo);
$smarty->view('user_form.tpl');
?>