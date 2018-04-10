<?php
require_once('global.php');

$membertype = isset($_GET['membertype'])?(int)$_GET['membertype']:(int)$_POST['membertype'];
$result['REV'] = 0;
switch($membertype){
	case 1://手机帐号检查
		$mobile = trim($_POST['mobile']);	
		if(empty($mobile)){
			$result['MSG'] = '请输入手机号码';
			echo json_encode($result);exit;	
		}
		//echo $mobile;exit;
		if(!empty($mobile) && !preg_match('/(^((1[1-9][0-9]{1})+\d{8})$)/i', $mobile)){
			$result['MSG'] = '手机号格式错误';
			echo json_encode($result);exit;	
		}
		
		//判断手机号是否已注册
		$num = $db->num("SELECT ID FROM member WHERE mobile='".$mobile."'");
		if($num){
			$result['MSG'] = '该手机号已注册，请更换';
			echo json_encode($result);exit;	
		}
		
		$result['REV'] = 1;
		$result['MSG'] = '手机号未注册';
		echo json_encode($result);exit;
		break;
	case 2://邮箱检查
		$email = trim($_POST['email']);	
		if(empty($email)){
			$result['MSG'] = '请输入邮箱地址';
			echo json_encode($result);exit;	
		}
		//echo $email;exit;
		if(!empty($email) && !preg_match('/^([a-zA-Z0-9_-]\.*)+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)*(\.[a-zA-Z0-9_-]{2,3})$/', $email)){
			$result['MSG'] = '邮箱格式错误';
			echo json_encode($result);exit;	
		}
		
		//判断邮箱是否已注册
		$num = $db->num("SELECT ID FROM member WHERE email='".$email."'");
		if($num){
			$result['MSG'] = '该邮箱号已注册，请更换';
			echo json_encode($result);exit;	
		}
		
		$result['REV'] = 1;
		$result['MSG'] = '邮箱未注册';
		echo json_encode($result);exit;
		break;
	default:
		$result['MSG'] = '非法参数，提交失败!';
		echo json_encode($result);exit;
		break;
}
?>