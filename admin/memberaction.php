<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 1;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode,'Edit');//功能区权限检测

$act = isset($_POST['act'])?$_POST['act']:$_GET['act'];
switch($act){
	case 'save':
		/*$id = isset($_POST["id"])?(int)$_POST["id"]:(int)$_GET["id"];
		$RealName = trim($_POST['realname']);
		$Location = trim($_POST['city']);
		$Content = $_POST['content'];			
		$Project = trim($_POST['project']);
		$Manifesto = htmlspecialchars($_POST['manifesto']);
		$HeadPic = $_POST['headpic'];
		$OrderNum = (int)trim($_POST['ordernum']);
		$IsIndex = (int)trim($_POST['isindex']);
		$IsHot = (int)trim($_POST['ishot']);
		$IsShow = (int)trim($_POST['isshow']);			
		$AddTime = time();
		
		//获取图片的路径和名称开始
		$pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";
		preg_match_all($pattern,$HeadPic,$match);
		//print_r($match);exit;
			
		$picArr = $match[1];
		$picPathName = $picArr[0];
		//print_r($picArr);exit;
		
		$temp_arr = explode("/", $picPathName);
		$HeadPicName = array_pop($temp_arr);
		$HeadPicPath = str_replace($HeadPicName,"",$picPathName);
		$HeadPicPath = substr($HeadPicPath,1);
		//echo $HeadPicName.'<br>'.$HeadPicPath;exit;
		//获取图片的路径和名称结束
		
		if($id){//更新
			$db->query("UPDATE user SET Location='".$Location."',RealName='".$RealName."',Project='".$Project."',Manifesto='".$Manifesto."',Content='".$Content."',HeadPic='".$HeadPic."',HeadPicPath='".$HeadPicPath."',HeadPicName='".$HeadPicName."',OrderNum='".$OrderNum."',IsHot='".$IsHot."',IsIndex='".$IsIndex."',IsShow='".$IsShow."' WHERE id='".$id."'");
			$msgInfo = "修改信息\"".$RealName."\"成功";
		}
		else{//新增
			$db->query("INSERT INTO user(`Location`,`RealName`,`Project`,`Manifesto`,`Content`,`HeadPic`,`HeadPicPath`,`HeadPicName`,`OrderNum`,`IsHot`,`IsIndex`,`IsShow`,`AddUser`,`AddTime`) VALUES('".$Location."','".$RealName."','".$Project."','".$Manifesto."','".$Content."','".$HeadPic."','".$HeadPicPath."','".$HeadPicName."','".$OrderNum."','".$IsHot."','".$IsIndex."','".$IsShow."','".($admin->u_name)."','".$AddTime."');");
			$msgInfo = "添加信息\"".$RealName."\"成功";
		}			
		redirectAdmin ($msgInfo, SITE_URL.'admin/member.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);	*/	
		break;
	case 'delete':
		if (isset($_POST['selected']) && !empty($_POST['selected'])) {
			$selectedId = (count($_POST ['selected'])>1)?implode ( ",", $_POST ['selected'] ):$_POST ['selected'][0];
			$condition = (strstr($selectedId,','))?"id in(".$selectedId.")":"id='".$selectedId."'";
			$db->query("DELETE FROM member WHERE ".$condition);
			$msgInfo = "删除选中的信息成功!";
		}
		else{
			$msgInfo = "错误:请您先选择要删除的信息！";
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/member.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		break;
	case 'pass':
		if (isset($_POST['selected']) && !empty($_POST['selected'])) {
			$selectedId = (count($_POST ['selected'])>1)?implode ( ",", $_POST ['selected'] ):$_POST ['selected'][0];
			$condition = (strstr($selectedId,','))?"id in(".$selectedId.")":"id='".$selectedId."'";
			$db->query("UPDATE member SET status=1 WHERE ".$condition);
			$msgInfo = "启用选中的信息成功!";
		}
		else{
			$msgInfo = "错误:请您先选择要启用的信息！";
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/member.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		break;
	case 'notpass':
		if (isset($_POST['selected']) && !empty($_POST['selected'])) {
			$selectedId = (count($_POST ['selected'])>1)?implode ( ",", $_POST ['selected'] ):$_POST ['selected'][0];
			$condition = (strstr($selectedId,','))?"id in(".$selectedId.")":"id='".$selectedId."'";
			$db->query("UPDATE member SET status=0 WHERE ".$condition);
			$msgInfo = "禁用选中的信息成功!";
		}
		else{
			$msgInfo = "错误:请您先选择要禁用的信息！";
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/member.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		break;
	case 'updatepassword':
		$id = isset($_POST["id"])?$_POST["id"]:$_GET["id"];
		$pass = doAddslashes(trim($_POST["password"]));
		$confirm = doAddslashes(trim($_POST["confirm"]));
		$confirm_md5 = md5($confirm);
	
		if (isset($_POST['confirm']) && !empty($_POST['confirm'])) {
			if($pass!==$confirm){
				redirectAdmin ('密码和确认密码不一致！', 'history.go(-1)',false);
			}
			
			$sql = "UPDATE `member` SET pwd='".$confirm_md5."' WHERE id='".$id."'";
			$db->query($sql);
			redirectAdmin ('修改密码成功！', SITE_URL.'admin/member.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		}
		else{
			redirectAdmin ('请输入新密码及确认密码！', 'history.go(-1)',false);
		}
		break;
	default:
		redirectAdmin ('IllegalError', SITE_URL.'admin/member.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']));
		break;
}



?>