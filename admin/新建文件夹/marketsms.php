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

$file = SYS_ROOT . 'uploadfile/sms/marketsmslog.txt';		
if (file_exists($file)) {
	$marketsms = file_get_contents($file, FILE_USE_INCLUDE_PATH, null);
} else {
	$marketsms = '';
}

$smarty->assign("marketsms", $marketsms);
$smarty->view('marketsms_list.tpl');
?>