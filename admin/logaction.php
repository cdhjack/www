<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 5;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode,'Edit');//功能区权限检测

$act = isset($_POST['act'])?$_POST['act']:$_GET['act'];
switch($act){
	case 'clear':
		$file = SYS_ROOT . 'uploadfile/log.txt';		
		$handle = fopen($file, 'w+'); 				
		fclose($handle);		
		$msgInfo = "清除日志成功";	
		redirectAdmin ($msgInfo, SITE_URL.'admin/log.php',false);		
		break;	
	default:
		redirectAdmin ('IllegalError', SITE_URL.'admin/log.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']));
		break;
}



?>