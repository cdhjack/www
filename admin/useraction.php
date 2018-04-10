<?php
require_once('global.php');

$admin->u_is_login("admin");
$powerCode = 3;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode,'Edit');//功能区权限检测

$act = isset($_POST['act'])?$_POST['act']:$_GET['act'];
switch($act){
	case 'save':
		$id = isset($_POST["id"])?(int)$_POST["id"]:(int)$_GET["id"];
		$user = doAddslashes(trim($_POST["username"]));
		$pass = doAddslashes(trim($_POST["password"]));
		$confirm = doAddslashes(trim($_POST["confirm"]));
		$pass_md5=md5($pass);
		$nickname = trim($_POST['realname']);
		$sex = empty($sex)?1:trim($_POST['sex']);
		$mail = trim($_POST['mail']);
		$zuid = (int)$_POST['groupid'];
		$checked = (int)$_POST['checked'];
		$ordernum = 0;		
		$rnd = $admin->u_make_password (20);
		$LoginIp = getIP();
		$LoginTime = time();
		
		if($pass!==$confirm){
			redirectAdmin ('密码和确认密码不一致！', 'history.go(-1)',false);
		}

		if($id){//更新		
			$num = $db->num("SELECT ID FROM `admin` WHERE Name='".$user."' and ID<>'".$id."'");
			if($num){
				redirectAdmin ('对不起,该用户名已存在！', 'history.go(-1)',false);
			}
			$sql = "UPDATE `admin` SET Name='".$user."',";
			$sql .= (!empty($pass) && !empty($confirm))?"Passwd='".$pass_md5."',":"";
			$sql .= "RealName='".$nickname."',Sex='".$sex."',Mail='".$mail."',GroupID='".$zuid."',Checked='".$checked."',OrderNum='".$ordernum."' WHERE ID='".$id."'";
			$db->query($sql);
			$msgInfo = "修改用户\"".$user."\"成功";
		}
		else{//新增
			$num = $db->num("SELECT ID FROM `admin` WHERE Name='".$user."'");
			if($num){
				redirectAdmin ('对不起,该用户名已存在！', 'history.go(-1)',false);
			}
			$db->query("INSERT INTO `admin`(`Name`,`Passwd`,`RealName`,`Sex`,`Mail`,`Rnd`,`GroupID`,`Checked`,`LoginTime`,`LoginIp`,`UserFlag`,`OrderNum`) VALUES('".$user."','".$pass_md5."','".$nickname."','".$sex."','".$mail."','".$rnd."','".$zuid."','".$checked."','".$LoginTime."','".$LoginIp."',0,'".$ordernum."');");
			$msgInfo = "添加用户\"".$user."\"成功";
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/user.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);		
		break;
	case 'delete':
		if (isset($_POST['selected']) && !empty($_POST['selected'])) {
			$selectedId = (count($_POST ['selected'])>1)?implode ( ",", $_POST ['selected'] ):$_POST ['selected'][0];
			$condition = (strstr($selectedId,','))?"ID in(".$selectedId.")":"ID='".$selectedId."'";
			//删除的用户是否有超级管理员
			$query = $db->query("SELECT ID,Name,UserFlag FROM `admin` WHERE ".$condition);
			$userArr = $db->fetch($query);
			$adminList = "";
			foreach ($userArr as $k=>$v){
				if($v['UserFlag']==1){
					$adminList .= "[".$v['Name']."]";
				}
			}		
			
			//UserFlag=1的用户为超级管理员，不允许删除
			$db->query("DELETE FROM `admin` WHERE UserFlag!=1 and ".$condition);
			$msgInfo = "删除选中的信息成功";
			$msgInfo .= ($adminList=="")?"!":",超级管理员".$adminList."除外!";
		}
		else{
			$msgInfo = "错误:请您先选择要删除的信息！";
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/user.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		break;
	case 'isshow':
		if (isset($_POST['selected']) && !empty($_POST['selected'])) {
			$selectedId = (count($_POST ['selected'])>1)?implode ( ",", $_POST ['selected'] ):$_POST ['selected'][0];
			$condition = (strstr($selectedId,','))?"ID in(".$selectedId.")":"ID='".$selectedId."'";
			//用户是否有超级管理员
			$query = $db->query("SELECT ID,Name,UserFlag FROM `admin` WHERE ".$condition);
			$userArr = $db->fetch($query);
			$adminList = "";
			foreach ($userArr as $k=>$v){
				if($v['UserFlag']==1){
					$adminList .= "[".$v['Name']."]";
				}
			}
			
			$db->query("UPDATE `admin` SET Checked=1 WHERE UserFlag!=1 and ".$condition);
			$msgInfo = "启用选中的信息成功";
			$msgInfo .= ($adminList=="")?"!":",超级管理员".$adminList."除外!";
		}
		else{
			$msgInfo = "错误:请您先选择要启用的信息！";
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/user.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		break;
	case 'notshow':
		if (isset($_POST['selected']) && !empty($_POST['selected'])) {
			$selectedId = (count($_POST ['selected'])>1)?implode ( ",", $_POST ['selected'] ):$_POST ['selected'][0];
			$condition = (strstr($selectedId,','))?"ID in(".$selectedId.")":"ID='".$selectedId."'";
			//用户是否有超级管理员
			$query = $db->query("SELECT ID,Name,UserFlag FROM `admin` WHERE ".$condition);
			$userArr = $db->fetch($query);
			$adminList = "";
			foreach ($userArr as $k=>$v){
				if($v['UserFlag']==1){
					$adminList .= "[".$v['Name']."]";
				}
			}
			
			$db->query("UPDATE `admin` SET Checked=0 WHERE UserFlag!=1 and ".$condition);
			$msgInfo = "停用选中的信息成功";
			$msgInfo .= ($adminList=="")?"!":",超级管理员".$adminList."除外!";
		}
		else{
			$msgInfo = "错误:请您先选择要停用的信息！";
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/user.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		break;
	default:
		redirectAdmin ('IllegalError', SITE_URL.'admin/user.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']));
		break;
}



?>