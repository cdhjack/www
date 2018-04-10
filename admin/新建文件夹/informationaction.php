<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 12;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode,'Edit');//功能区权限检测

$act = isset($_POST['act'])?$_POST['act']:$_GET['act'];
switch($act){
	case 'save':
		$id = isset($_POST["id"])?(int)$_POST["id"]:(int)$_GET["id"];
		$title = trim($_POST['title']);
		$classid = (int)trim($_POST['classid']);
		$content = $_POST['content'];			
		$isshow = (int)trim($_POST['isshow']);
		$addtime = time();
		if($id){//更新
			$db->query("UPDATE information SET classid='".$classid."',title='".$title."',content='".$content."',isshow='".$isshow."' WHERE id='".$id."'");
			$msgInfo = "修改信息\"".$title."\"成功";
		}
		else{//新增
			$db->query("INSERT INTO information(`classid`,`title`,`content`,`isshow`,`adduser`,`addtime`) VALUES('".$classid."','".$title."','".$content."','".$isshow."','".($admin->u_name)."','".$addtime."');");
			$msgInfo = "添加信息\"".$title."\"成功";
		}			
		redirectAdmin ($msgInfo, SITE_URL.'admin/information.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);		
		break;
	case 'delete':
		if (isset($_POST['selected']) && !empty($_POST['selected'])) {
			$selectedId = (count($_POST ['selected'])>1)?implode ( ",", $_POST ['selected'] ):$_POST ['selected'][0];
			$condition = (strstr($selectedId,','))?"id in(".$selectedId.")":"id='".$selectedId."'";
			$db->query("DELETE FROM information WHERE ".$condition);
			$msgInfo = "删除选中的信息成功!";
		}
		else{
			$msgInfo = "错误:请您先选择要删除的信息！";
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/information.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		break;
	case 'isshow':
		if (isset($_POST['selected']) && !empty($_POST['selected'])) {
			$selectedId = (count($_POST ['selected'])>1)?implode ( ",", $_POST ['selected'] ):$_POST ['selected'][0];
			$condition = (strstr($selectedId,','))?"id in(".$selectedId.")":"id='".$selectedId."'";
			$db->query("UPDATE information SET IsShow=1 WHERE ".$condition);
			$msgInfo = "启用选中的信息成功!";
		}
		else{
			$msgInfo = "错误:请您先选择要启用的信息！";
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/information.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		break;
	case 'notshow':
		if (isset($_POST['selected']) && !empty($_POST['selected'])) {
			$selectedId = (count($_POST ['selected'])>1)?implode ( ",", $_POST ['selected'] ):$_POST ['selected'][0];
			$condition = (strstr($selectedId,','))?"id in(".$selectedId.")":"id='".$selectedId."'";
			$db->query("UPDATE information SET IsShow=0 WHERE ".$condition);
			$msgInfo = "停用选中的信息成功!";
		}
		else{
			$msgInfo = "错误:请您先选择要停用的信息！";
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/information.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		break;
	default:
		redirectAdmin ('IllegalError', SITE_URL.'admin/information.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']));
		break;
}



?>