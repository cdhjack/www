<?php
require_once('../global.php');
require_once (SYS_ROOT . "admin/include/message.php");
$act = isset($_POST['act'])?$_POST['act']:$_GET['act'];
switch($act){
	case 'checkcoach':
		$res['msg'] = 0;		
		
		//检测是否登录
		$loginArr = $admin->ajax_u_is_login();
		if(!$loginArr['msg']){
			$res['info'] = $message_r[$loginArr['info']];
			echo json_encode($res);exit;
		}
		//检测是否有操作权限
		$powerCode = 2;//config/power_config.inc.php中手动定义
		$powerArr = $admin->ajax_u_check_power($powerCode,'Edit');//功能区权限检测
		if(!$powerArr['msg']){
			$res['info'] = $message_r[$powerArr['info']];
			echo json_encode($res);exit;
		}
			
		$coach_id = isset($_POST["coach_id"])?(int)$_POST["coach_id"]:(int)$_GET["coach_id"];
		$coach_typeid = (int)trim($_POST['coach_typeid']);
		$coach_level = (int)trim($_POST['coach_level']);
		
		//获取教练姓名
		$sql = "SELECT id,rname FROM coach WHERE id='".$coach_id."'";
		$coachInfo = $db->fetchRow($sql);
		
		$result = $db->query("UPDATE coach SET typeid='".$coach_typeid."',level='".$coach_level."',pass=1  WHERE id='".$coach_id."'");
		if($result){
			$res['msg'] = 1;
			$res['info'] = '教练"'.$coachInfo['rname'].'"审核成功!';
		}
		else{
			$res['info'] = '教练"'.$coachInfo['rname'].'"审核失败!';
		}
		echo json_encode($res);exit;
		break;
	default:
		$res['msg'] = 0;
		$res['info'] = $message_r['IllegalError'];
		echo json_encode($res);exit;
		break;
}



?>