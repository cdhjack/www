<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 5;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode);//功能区权限检测
$smarty->assign("title", "操作日志");

$breadcrumbs = array();
$breadcrumbs[] = array(
	'text'      => '首页',
	'href'      => SITE_URL.'admin',
	'separator' => false
);

$breadcrumbs[] = array(
	'text'      => '操作日志',
	'href'      => SITE_URL.'admin/log.php',
	'separator' => ' :: '
);
$smarty->assign("breadcrumbs", $breadcrumbs);

$file = SYS_ROOT . 'uploadfile/log.txt';		
if (file_exists($file)) {
	$log = file_get_contents($file, FILE_USE_INCLUDE_PATH, null);
} else {
	$log = '';
}

$smarty->assign("log", $log);
$smarty->view('log_list.tpl');
?>