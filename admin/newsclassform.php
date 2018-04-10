<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 6;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode);//功能区权限检测
$smarty->assign("title", "文章分类");

$breadcrumbs = array();
$breadcrumbs[] = array(
	'text'      => '首页',
	'href'      => SITE_URL.'admin',
	'separator' => false
);

$breadcrumbs[] = array(
	'text'      => '文章分类',
	'href'      => SITE_URL.'admin/newsclass.php',
	'separator' => ' :: '
);
$smarty->assign("breadcrumbs", $breadcrumbs);

$id = isset($_POST["id"])?(int)$_POST["id"]:(int)$_GET["id"];
$newsClassInfo = array();
if($id){
	$sql = "SELECT ID,Name,Introduce,OrderNum,IsShow FROM NewsClass WHERE ID='".$id."'";
	$newsClassInfo = $db->fetchRow($sql);	
}


$smarty->assign("backUrl", empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']);
$smarty->assign("newsClassInfo", $newsClassInfo);
$smarty->view('newsclass_form.tpl');
?>