<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 7;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode,'Edit');//功能区权限检测

$act = isset($_POST['act'])?$_POST['act']:$_GET['act'];
switch($act){
	case 'save':
		$id = isset($_POST["id"])?(int)$_POST["id"]:(int)$_GET["id"];
		$Title = trim($_POST['title']);
		$ClassID = (int)trim($_POST['classid']);
		$Content = $_POST['content'];			
		$Author = trim($_POST['author']);
		$Source = trim($_POST['source']);
		$Introduce = htmlspecialchars($_POST['introduce']);
		$NewsPic = $_POST['newspic'];			
		$IsIndex = (int)trim($_POST['isindex']);
		$IsHot = (int)trim($_POST['ishot']);
		$IsShow = (int)trim($_POST['isshow']);
		$SubmitDate = trim($_POST['submitdate']);			
		$AddTime = time();
		if($id){//更新
			$db->query("UPDATE News SET ClassID='".$ClassID."',Title='".$Title."',Author='".$Author."',Source='".$Source."',Introduce='".$Introduce."',Content='".$Content."',NewsPic='".$NewsPic."',IsHot='".$IsHot."',IsIndex='".$IsIndex."',SubmitDate='".$SubmitDate."',IsShow='".$IsShow."' WHERE ID='".$id."'");
			$msgInfo = "修改信息\"".$Title."\"成功";
		}
		else{//新增
			$db->query("INSERT INTO News(`ClassID`,`Title`,`Author`,`Source`,`Introduce`,`Content`,`NewsPic`,`IsHot`,`IsIndex`,`Onclick`,`SubmitDate`,`IsShow`,`AddUser`,`AddTime`) VALUES('".$ClassID."','".$Title."','".$Author."','".$Source."','".$Introduce."','".$Content."','".$NewsPic."','".$IsHot."','".$IsIndex."',0,'".$SubmitDate."','".$IsShow."','".($admin->u_name)."','".$AddTime."');");
			$msgInfo = "添加信息\"".$Title."\"成功";
		}			
		redirectAdmin ($msgInfo, SITE_URL.'admin/news.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);		
		break;
	case 'delete':
		if (isset($_POST['selected']) && !empty($_POST['selected'])) {
			$selectedId = (count($_POST ['selected'])>1)?implode ( ",", $_POST ['selected'] ):$_POST ['selected'][0];
			$condition = (strstr($selectedId,','))?"ID in(".$selectedId.")":"ID='".$selectedId."'";
			$db->query("DELETE FROM News WHERE ".$condition);
			$msgInfo = "删除选中的信息成功!";
		}
		else{
			$msgInfo = "错误:请您先选择要删除的信息！";
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/news.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		break;
	case 'isshow':
		if (isset($_POST['selected']) && !empty($_POST['selected'])) {
			$selectedId = (count($_POST ['selected'])>1)?implode ( ",", $_POST ['selected'] ):$_POST ['selected'][0];
			$condition = (strstr($selectedId,','))?"ID in(".$selectedId.")":"ID='".$selectedId."'";
			$db->query("UPDATE News SET IsShow=1 WHERE ".$condition);
			$msgInfo = "启用选中的信息成功!";
		}
		else{
			$msgInfo = "错误:请您先选择要启用的信息！";
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/news.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		break;
	case 'notshow':
		if (isset($_POST['selected']) && !empty($_POST['selected'])) {
			$selectedId = (count($_POST ['selected'])>1)?implode ( ",", $_POST ['selected'] ):$_POST ['selected'][0];
			$condition = (strstr($selectedId,','))?"ID in(".$selectedId.")":"ID='".$selectedId."'";
			$db->query("UPDATE News SET IsShow=0 WHERE ".$condition);
			$msgInfo = "停用选中的信息成功!";
		}
		else{
			$msgInfo = "错误:请您先选择要停用的信息！";
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/news.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		break;
	default:
		redirectAdmin ('IllegalError', SITE_URL.'admin/news.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']));
		break;
}



?>