<?php
require_once('../global.php');

$mobile = trim($_POST['mobile']);
$act = trim($_GET['act']);//reg:注册帐号检查，pwd:找回密码帐号检查

$result['REV'] = 0;
//手机帐号检查	
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
$num = $db->num("SELECT id FROM member WHERE mobile='".$mobile."'");
if($num){
	if($act=='reg'){
		$result['MSG'] = '该手机号已注册，请更换';
		echo json_encode($result);exit;
	}
	if($act=='pwd'){
		$result['REV'] = 1;		
		echo json_encode($result);exit;
	}
}
else{
	if($act=='reg'){
		$result['REV'] = 1;
		echo json_encode($result);exit;
	}
	if($act=='pwd'){	
		$result['MSG'] = '该手机号不存在';
		echo json_encode($result);exit;
	}
}
?>