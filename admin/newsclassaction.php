<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 6;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode,'Edit');//功能区权限检测

$act = isset($_POST['act'])?$_POST['act']:$_GET['act'];
switch($act){
	case 'save':
		$id = isset($_POST["id"])?(int)$_POST["id"]:(int)$_GET["id"];
		$Name = trim($_POST['classname']);
		$Introduce = trim($_POST['introduce']);
		$OrderNum = (int)trim($_POST['ordernum']);
		$IsShow = (int)trim($_POST['isshow']);			
		$AddTime = time();
		if($id){//更新
			$db->query("UPDATE NewsClass SET Name='".$Name."',Introduce='".$Introduce."',OrderNum='".$OrderNum."',IsShow='".$IsShow."' WHERE ID='".$id."'");
			$msgInfo = "修改文章类别\"".$Name."\"成功";
		}
		else{//新增
			$db->query("INSERT INTO NewsClass(`Name`,`Introduce`,`OrderNum`,`IsShow`,`AddUser`,`AddTime`) VALUES('".$Name."','".$Introduce."','".$OrderNum."','".$IsShow."','".($admin->u_name)."','".$AddTime."');");
			$msgInfo = "添加文章类别\"".$Name."\"成功";
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/newsclass.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);		
		break;
	case 'delete':
		if (isset($_POST['selected']) && !empty($_POST['selected'])) {
			$deleteClassId = "";
			$notDeleteClassName = "";
			foreach($_POST ['selected'] as $classId){				
				$classInfo = $db->fetchRow("SELECT a.ID,a.Name,(SELECT count(b.ID) FROM `News` b WHERE b.ClassID=a.ID) as ClassNum FROM `NewsClass` a WHERE a.ID='".$classId."'");
				if($classInfo['ClassNum']>0){
					$notDeleteClassName .= "[".$classInfo['Name']."]";
				}
				else{
					$deleteClassId .= $classId.',';
				}
			}
			if($deleteClassId!=""){
				$deleteClassId = substr($deleteClassId,0,-1);
				$condition = (strstr($deleteClassId,','))?"ID in(".$deleteClassId.")":"ID='".$deleteClassId."'";
				$db->query("DELETE FROM `NewsClass` WHERE ".$condition);
				$msgInfo = "删除选中的信息成功";
				$msgInfo .= ($notDeleteClassName=="")?"!":",附：分类".$notDeleteClassName."中的所有文章被删除后才可删除!";
			}
			else{
				$msgInfo = "册除失败,分类中的所有文章被删除后才可删除分类!";
			}
		}
		else{
			$msgInfo = "错误:请您先选择要删除的信息！";
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/newsclass.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		break;
	case 'isshow':
		if (isset($_POST['selected']) && !empty($_POST['selected'])) {
			$selectedId = (count($_POST ['selected'])>1)?implode ( ",", $_POST ['selected'] ):$_POST ['selected'][0];
			$condition = (strstr($selectedId,','))?"ID in(".$selectedId.")":"ID='".$selectedId."'";
			$db->query("UPDATE NewsClass SET IsShow=1 WHERE ".$condition);
			$msgInfo = "启用选中的信息成功!";
		}
		else{
			$msgInfo = "错误:请您先选择要启用的信息！";
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/newsclass.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		break;
	case 'notshow':
		if (isset($_POST['selected']) && !empty($_POST['selected'])) {
			$selectedId = (count($_POST ['selected'])>1)?implode ( ",", $_POST ['selected'] ):$_POST ['selected'][0];
			$condition = (strstr($selectedId,','))?"ID in(".$selectedId.")":"ID='".$selectedId."'";
			$db->query("UPDATE NewsClass SET IsShow=0 WHERE ".$condition);
			$msgInfo = "停用选中的信息成功!";
		}
		else{
			$msgInfo = "错误:请您先选择要停用的信息！";
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/newsclass.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		break;
	default:
		redirectAdmin ('IllegalError', SITE_URL.'admin/newsclass.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']));
		break;
}



?>