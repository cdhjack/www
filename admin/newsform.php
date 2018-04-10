<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 7;//config/power_config.inc.php中手动定义
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
	'href'      => SITE_URL.'admin/news.php',
	'separator' => ' :: '
);
$smarty->assign("breadcrumbs", $breadcrumbs);

$id = isset($_POST["id"])?(int)$_POST["id"]:(int)$_GET["id"];
$newsInfo = array();
if($id){
	$sql = "SELECT ID,ClassID,Title,Author,Source,Introduce,Content,NewsPic,IsHot,IsIndex,OnClick,SubmitDate,IsShow,AddUser,AddTime FROM News WHERE ID='".$id."'";
	$newsInfo = $db->fetchRow($sql);	
}

//获取类别列表
$sql = "SELECT ID,Name FROM NewsClass ORDER BY OrderNum asc";
$query = $db->query($sql);
$newClassArr = $db->fetch($query);


$smarty->assign("backUrl", empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']);
$smarty->assign("newClassArr", $newClassArr);
$smarty->assign("newsInfo", $newsInfo);
$smarty->view('news_form.tpl');
?>