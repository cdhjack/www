<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 9;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode,'Edit');//功能区权限检测

$act = isset($_POST['act'])?$_POST['act']:$_GET['act'];
switch($act){	
	case 'delete':
		if (isset($_POST['selected']) && !empty($_POST['selected'])) {
			$selectedId = (count($_POST ['selected'])>1)?implode ( ",", $_POST ['selected'] ):$_POST ['selected'][0];
			$condition = (strstr($selectedId,','))?"id in(".$selectedId.")":"id='".$selectedId."'";
			$db->query("DELETE FROM i_sms WHERE ".$condition);
			$msgInfo = "删除选中的信息成功!";
		}
		else{
			$msgInfo = "错误:请您先选择要删除的信息！";
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/regsms.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		break;
	case 'deleteone':
		$id = isset($_POST["id"])?(int)$_POST["id"]:(int)$_GET["id"];		
		if ($id) {			
			$condition = "id='".$id."'";
			$db->query("DELETE FROM i_sms WHERE ".$condition);
			$msgInfo = "删除信息成功!";
		}
		else{
			$msgInfo = "错误:请您先选择要删除的信息！";
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/regsms.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		break;	
	default:
		redirectAdmin ('IllegalError', SITE_URL.'admin/regsms.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']));
		break;
}



?>