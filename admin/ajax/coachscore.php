<?php
require_once('../global.php');
require_once (SYS_ROOT . "admin/include/message.php");
$act = isset($_POST['act'])?$_POST['act']:$_GET['act'];
switch($act){
	case 'addscore':
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
			
		$id = isset($_POST["id"])?(int)$_POST["id"]:(int)$_GET["id"];
		$score = (int)trim($_POST['score']);
		$reason = htmlspecialchars($_POST['reason']);
		$addtime = time();
	
		$result = $db->query("INSERT INTO coachscore(`coachid`,`score`,`reason`,`adduser`,`addtime`) VALUES('".$id."','".$score."','".$reason."','".($admin->u_name)."','".$addtime."');");
		$result2 = $db->query("UPDATE coach SET score=score+'".$score."'  WHERE id='".$id."'");
		if($result && $result2){
			$res['msg'] = 1;
			$res['info'] = '添加扣分成功!';
		}
		else{
			$res['info'] = '添加扣分失败!';
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