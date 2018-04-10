<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 6;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode,'Edit');//功能区权限检测

$act = isset($_POST['act'])?$_POST['act']:$_GET['act'];
switch($act){
	case 'setrank':
		if (isset($_POST['set_rank']) && !empty($_POST['set_rank'])) {
			foreach($_POST['set_rank'] as $key => $val) {
				$val = (empty ( $val ) || $val=='未设置') ? 9999999 : $val;
				$db->query("UPDATE coach SET `set_rank`='".$val."' WHERE id='".$key."'");
			}
			$msgInfo = "更新设置排名值成功!";
		}
		else{
			$msgInfo = "错误:还没有相关教练信息！";
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/rank.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		break;
	case 'canclesetrank':
		if (isset($_POST['selected']) && !empty($_POST['selected'])) {
			$selectedId = (count($_POST ['selected'])>1)?implode ( ",", $_POST ['selected'] ):$_POST ['selected'][0];
			$condition = (strstr($selectedId,','))?"id in(".$selectedId.")":"id='".$selectedId."'";
			$db->query("UPDATE coach SET `set_rank`='9999999' WHERE ".$condition);
			$msgInfo = "选中的信息恢复正常排名成功!";
		}
		else{
			$msgInfo = "错误:请您先选择要恢复的信息！";
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/rank.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		break;
	case 'canclesetrankone':
		$id = isset($_POST["id"])?(int)$_POST["id"]:(int)$_GET["id"];	
		
		//获取教练姓名
		$sql = "SELECT id,rname FROM coach WHERE id='".$id."'";
		$coachInfo = $db->fetchRow($sql);	
		if ($coachInfo) {			
			$condition = "id='".$id."'";
			$db->query("UPDATE coach SET `set_rank`='9999999' WHERE ".$condition);
			$msgInfo = "教练\"".$coachInfo['rname']."\"恢复正常排名成功!";
		}
		else{
			$msgInfo = "错误:教练\"".$coachInfo['rname']."\"的信息不存在！";
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/rank.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		break;	
	default:
		redirectAdmin ('IllegalError', SITE_URL.'admin/rank.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']));
		break;
}



?>