<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 10;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode);//功能区权限检测
$smarty->assign("title", "营销短信");

$breadcrumbs = array();
$breadcrumbs[] = array(
	'text'      => '首页',
	'href'      => SITE_URL.'admin',
	'separator' => false
);

$breadcrumbs[] = array(
	'text'      => '营销短信',
	'href'      => SITE_URL.'admin/marketsms.php',
	'separator' => ' :: '
);
$smarty->assign("breadcrumbs", $breadcrumbs);
$smarty->view('marketsms_form.tpl');
?>