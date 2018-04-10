<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 2;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode,'Edit');//功能区权限检测

$act = isset($_POST['act'])?$_POST['act']:$_GET['act'];
switch($act){
	case 'save':
		$id = isset($_POST["id"])?(int)$_POST["id"]:(int)$_GET["id"];
		$nickname = trim($_POST['nickname']);
		$rname = trim($_POST['rname']);
		$sex = (int)trim($_POST['sex']);
		$typeid = (int)trim($_POST['typeid']);
		$level = (int)trim($_POST['level']);
		$price = (float)trim($_POST['price']);	
		$sign = htmlspecialchars($_POST['sign']);
		$adv = htmlspecialchars($_POST['adv']);
		$flow = htmlspecialchars($_POST['flow']);
		$headpic = $_POST['headpic'];
		$status = (int)trim($_POST['status']);	
		$photoList = $_POST['photo'];		
		$addtime = date('Y-m-d H:i:s');
		
		
		//验证提交信息
		if(empty($typeid)){
			redirectAdmin ('错误:请选择教练类型！', 'history.go(-1)',false);
		}		
		if(empty($level)){
			redirectAdmin ('错误:请选择教练级别！', 'history.go(-1)',false);
		}
		
		//获取头像的路径和名称开始
		if(empty($headpic)){
			$tx = '';
		}
		else{
			$pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";
			preg_match_all($pattern,$headpic,$match);
			$picArr = $match[1];
			$tx = $picArr[0];
		}
		//获取头像的路径和名称结束
		
		//获取图片的路径和名称开始
		if(empty($photoList)){
			$photo = '';
		}
		else{
			$pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";
			preg_match_all($pattern,$photoList,$match);
			$picArr = $match[1];
			$photoArr = array();
			if($picArr){
				foreach($picArr as $k=>$v){
					$photoArr[$k]->id = $k+1;
					$photoArr[$k]->url = $v;
				}
			}
			$photo = json_encode($photoArr);
		}
		//获取图片的路径和名称结束
		
		if($id){//更新
			$db->query("UPDATE coach SET `name`='".$nickname."',rname='".$rname."',sex='".$sex."',typeid='".$typeid."',level='".$level."',tx='".$tx."',status='".$status."',pass=1 WHERE id='".$id."'");
			//判断course表是否有关联记录
			$num = $db->num("SELECT id FROM course WHERE uid='".$id."'");
			if($num){
				$db->query("UPDATE course SET `price`='".$price."',sign='".$sign."',adv='".$adv."',flow='".$flow."',photo='".$photo."' WHERE uid='".$id."'");
			}
			else{
				//获取教练类型名称
				$sql = "SELECT id,val FROM coachtype ORDER BY id asc";
				$coachTypeInfo = $db->fetchRow($sql,MYSQL_ASSOC);

				$db->query("INSERT INTO course(`uid`,`uname`,`typeid`,`val`,`time`,`price`,`photo`,`sign`,`adv`,`flow`) VALUES('".$id."','".$rname."','".$typeid."','".$coachTypeInfo['val']."','".$addtime."','".$price."','".$photo."','".$sign."','".$adv."','".$flow."');");
			}
			$msgInfo = "修改信息\"".$rname."\"成功";
		}
		else{//新增
			//$db->query("");
			$msgInfo = "添加信息\"".$rname."\"成功";
		}			
		redirectAdmin ($msgInfo, SITE_URL.'admin/coach.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);		
		break;
	case 'delete':
		if (isset($_POST['selected']) && !empty($_POST['selected'])) {
			$selectedId = (count($_POST ['selected'])>1)?implode ( ",", $_POST ['selected'] ):$_POST ['selected'][0];
			$condition = (strstr($selectedId,','))?"id in(".$selectedId.")":"id='".$selectedId."'";
			$db->query("DELETE FROM coach WHERE ".$condition);
			$msgInfo = "删除选中的信息成功!";
		}
		else{
			$msgInfo = "错误:请您先选择要删除的信息！";
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/coach.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		break;
	case 'status':
		if (isset($_POST['selected']) && !empty($_POST['selected'])) {
			$selectedId = (count($_POST ['selected'])>1)?implode ( ",", $_POST ['selected'] ):$_POST ['selected'][0];
			$condition = (strstr($selectedId,','))?"id in(".$selectedId.")":"id='".$selectedId."'";
			$db->query("UPDATE coach SET status=1 WHERE ".$condition);
			$msgInfo = "启用选中的信息成功!";
		}
		else{
			$msgInfo = "错误:请您先选择要启用的信息！";
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/coach.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		break;
	case 'notstatus':
		if (isset($_POST['selected']) && !empty($_POST['selected'])) {
			$selectedId = (count($_POST ['selected'])>1)?implode ( ",", $_POST ['selected'] ):$_POST ['selected'][0];
			$condition = (strstr($selectedId,','))?"id in(".$selectedId.")":"id='".$selectedId."'";
			$db->query("UPDATE coach SET status=0 WHERE ".$condition);
			$msgInfo = "禁用选中的信息成功!";
		}
		else{
			$msgInfo = "错误:请您先选择要禁用的信息！";
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/coach.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		break;
	case 'updatepassword':
		$id = isset($_POST["id"])?$_POST["id"]:$_GET["id"];
		$pass = doAddslashes(trim($_POST["password"]));
		$confirm = doAddslashes(trim($_POST["confirm"]));
	
		if (isset($_POST['confirm']) && !empty($_POST['confirm'])) {
			if($pass!==$confirm){
				redirectAdmin ('密码和确认密码不一致！', 'history.go(-1)',false);
			}
			
			$sql = "UPDATE `coach` SET pwd='".$confirm."' WHERE id='".$id."'";
			$db->query($sql);
			redirectAdmin ('修改密码成功！', SITE_URL.'admin/coach.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		}
		else{
			redirectAdmin ('请输入新密码及确认密码！', 'history.go(-1)',false);
		}
		break;
	default:
		redirectAdmin ('IllegalError', SITE_URL.'admin/coach.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']));
		break;
}



?>