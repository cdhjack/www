<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 4;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode,'Edit');//功能区权限检测

$act = isset($_POST['act'])?$_POST['act']:$_GET['act'];
switch($act){
	case 'save':
		$id = isset($_POST["id"])?(int)$_POST["id"]:(int)$_GET["id"];
		$groupName = trim($_POST['groupname']);
		$groupNumber = 0;
		
		if(empty($groupName)){
			redirectAdmin ('请输入用户群组名称！', 'history.go(-1)',false);
		}

		if($id){//更新		
			$num = $db->num("SELECT ID FROM `group` WHERE Name='".$groupName."' and ID<>'".$id."'");
			if($num){
				redirectAdmin ('对不起,该群组名称已存在！', 'history.go(-1)',false);
			}
			$db->query("UPDATE `group` SET Name='".$groupName."',Number='".$groupNumber."' WHERE ID='".$id."'");
			
			
			//先清除所有该用组的功能设置
			$db->query("DELETE FROM power WHERE GroupID='".$id."'");			
			$msgInfo = "修改群组名称\"".$groupName."\"成功";
			
			$groupId = $id;
		}
		else{//新增
			$num = $db->num("SELECT ID FROM `group` WHERE Name='".$groupName."'");
			if($num){
				redirectAdmin ('对不起,该群组名称已存在！', 'history.go(-1)',false);
			}
			$db->query("INSERT INTO `group`(`Name`,`Number`) VALUES('".$groupName."','".$groupNumber."')");
			$msgInfo = "添加群组名称\"".$groupName."\"成功";
			
			$groupId = $db->getLastId();
		}
		
		//查看功能设置入库		
		$sql_set = "INSERT INTO `power`(Code,View,Edit,GroupID) VALUES";
		$j=0;
		if(!empty($_POST['power_view'])){
			foreach($_POST['power_view'] as $code){
				$sql_set .= "(".$code.",1,0,".$groupId."),";	
				$j++;
			}			
		}
		if($j > 0){
			$sql_set = substr($sql_set,0,-1) . ';';		
			$db->query($sql_set);
		}
		//修改功能设置入库
		if(!empty($_POST['power_edit'])){
			foreach($_POST['power_edit'] as $code){
				$num = $db->num("SELECT ID FROM `power` WHERE GroupID='".$groupId."' and Code='".$code."'");
				if($num){
					$db->query("UPDATE `power` SET Edit=1 WHERE GroupID='".$groupId."' and Code='".$code."'");
				}
				else{
					$db->query("INSERT INTO `power`(Code,View,Edit,GroupID) VALUES(".$code.",0,1,".$groupId.")");
				}								
			}			
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/usergroup.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);		
		break;
	case 'delete':
		if (isset($_POST['selected']) && !empty($_POST['selected'])) {
			$deleteGroupId = "";
			$notDeleteGroupName = "";
			foreach($_POST ['selected'] as $groupId){
				//echo "SELECT a.ID,a.Name,(SELECT count(b.ID) FROM `admin` b WHERE b.GroupID=a.ID) as AdminNum FROM `group` a WHERE a.ID='".$groupId."'";exit;
				$groupInfo = $db->fetchRow("SELECT a.ID,a.Name,(SELECT count(b.ID) FROM `admin` b WHERE b.GroupID=a.ID) as AdminNum FROM `group` a WHERE a.ID='".$groupId."'");
				if($groupInfo['AdminNum']>0){
					$notDeleteGroupName .= "[".$groupInfo['Name']."]";
				}
				else{
					$deleteGroupId .= $groupId.',';
				}
			}
			if($deleteGroupId!=""){
				$deleteGroupId = substr($deleteGroupId,0,-1);
				$condition = (strstr($deleteGroupId,','))?"ID in(".$deleteGroupId.")":"ID='".$deleteGroupId."'";
				$db->query("DELETE FROM `group` WHERE ".$condition);
				$msgInfo = "删除选中的信息成功";
				$msgInfo .= ($notDeleteGroupName=="")?"!":",附：群组".$notDeleteGroupName."中的所有用户被删除后才可删除!";
			}
			else{
				$msgInfo = "册除失败,群组中的所有用户被删除后才可删除用户组!";
			}
		}
		else{
			$msgInfo = "错误:请您先选择要删除的信息！";
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/usergroup.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		break;	
	default:
		redirectAdmin ('IllegalError', SITE_URL.'admin/usergroup.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']));
		break;
}



?>