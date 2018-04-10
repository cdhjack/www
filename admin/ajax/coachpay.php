<?php
require_once('../global.php');
require_once (SYS_ROOT . "admin/include/message.php");
$act = isset($_POST['act'])?$_POST['act']:$_GET['act'];
switch($act){
	case 'addpay':
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
		$optype = (int)trim($_POST['optype']);
		$money = (float)trim($_POST['money']);
		if($optype==0){
			$money = -$money;
		}
		$idesc = htmlspecialchars($_POST['idesc']);
		$idesc = ($optype==1)?'后台充值:'.$idesc:'后台扣款:'.$idesc;
		$addtime = date('Y-m-d H:i:s');
		
		//获取教练姓名和余额
		$sql = "SELECT id,rname,ye FROM coach WHERE id='".$id."'";
		$coachInfo = $db->fetchRow($sql);
		$updateYeValue = floatval($coachInfo['ye']+$money);
		//echo $money.'<br>';
		//echo $coachInfo['ye'].'<br>';
		//echo $updateYeValue;exit;
		if($updateYeValue<0){
			$res['info'] = '教练'.$coachInfo['rname'].'余额操作后为负值!';
			echo json_encode($res);exit;
		}
		$result = $db->query("INSERT INTO paydetail(`uid`,`utype`,`optype`,`money`,`idesc`,`datetime`,`adduser`) VALUES('".$id."',1,'".$optype."','".$money."','".$idesc."','".$addtime."','".($admin->u_name)."');");
		$result2 = $db->query("UPDATE coach SET ye='".$updateYeValue."'  WHERE id='".$id."'");
		if($result && $result2){
			$res['msg'] = 1;
			$res['info'] = '教练'.$coachInfo['rname'].(($optype==1)?'充值':'扣款').'￥'.$money.'成功!';
		}
		else{
			$res['info'] = '教练'.$coachInfo['rname'].(($optype==1)?'充值':'扣款').'￥'.$money.'失败!';
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