<?php
require_once('../global.php');

$mobile = trim($_POST['mobile']);
$act = trim($_GET['act']);//reg:注册帐号发送短信，pwd:找回密码发送短信

$result['REV'] = 0;
if(empty($mobile)){
	$result['MSG'] = '请输入手机号码';
	echo json_encode($result);exit;	
}
//echo $mobile;exit;
if(!empty($mobile) && !preg_match('/(^((1[1-9][0-9]{1})+\d{8})$)/i', $mobile)){
	$result['MSG'] = '手机号格式错误';
	echo json_encode($result);exit;	
}

$randNumber = rand(100000,999999);
if($act=='reg'){
	$sessionObj->data['smscode_reg'] = $randNumber;
	$content = '欢迎您加入彩虹屋！验证码:'.$randNumber.'，请在30分钟内使用，超时请重新申请。';
}
if($act=='pwd'){
	$sessionObj->data['smscode_pwd'] = $randNumber;
	$content = '【彩虹屋】您正修改登录密码,验证码:'.$randNumber.'，请在30分钟内使用，超时请重新申请。';
}
$res = sendSms($mobile,$content);
if($res['REV']==0){//格式验证失败
	$result['MSG'] = $res['MSG'];
}
else if($res['REV']==1){//发送短信成功
	$result['REV'] = 1;
	$result['MSG'] = '短信发送成功!';
}
else{//发送短信失败
	$result['MSG'] = '短信发送失败,请联系客服!';
}
echo json_encode($result);exit;




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