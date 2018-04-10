<?php
require_once('../global.php');
require_once (SYS_ROOT . "admin/include/message.php");
$act = isset($_POST['act'])?$_POST['act']:$_GET['act'];
switch($act){
	case 'getitypeinfo':
		$res['msg'] = 0;		
		
		//检测是否登录
		$loginArr = $admin->ajax_u_is_login();
		if(!$loginArr['msg']){
			$res['info'] = $message_r[$loginArr['info']];
			echo json_encode($res);exit;
		}
		//检测是否有操作权限
		$powerCode = 7;//config/power_config.inc.php中手动定义
		$powerArr = $admin->ajax_u_check_power($powerCode);//功能区权限检测
		if(!$powerArr['msg']){
			$res['info'] = $message_r[$powerArr['info']];
			echo json_encode($res);exit;
		}
			
		$i_type = isset($_POST["i_type"])?$_POST["i_type"]:$_GET["i_type"];
		if($i_type!=""){
			$sql = "SELECT id,name,idesc FROM coupon WHERE i_type='".(int)$i_type."' ORDER BY id desc limit 1";
			$couponInfo = $db->fetchRow($sql);	
			$res['msg'] = 1;
			$res['info'] = $couponInfo;
		}
		else{
			$res['info'] = $message_r['IllegalError'];
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