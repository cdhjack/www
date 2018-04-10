<?php
require_once('../global.php');

$result['REV'] = 0;
//手机帐号找回密码
$mobile = trim($_POST['mobile']);		
$passwd_1 = trim($_POST['passwd_1']);
$checkmobile = trim($_POST['checkmobile']);
//echo $sessionObj->data['captcha'];exit;
if(empty($mobile)){
	$result['MSG'] = '请输入手机号码';
	$result['INPUTID'] = 'mobile';
	echo json_encode($result);exit;	
}
//echo $mobile;exit;
if(!empty($mobile) && !preg_match('/(^((1[1-9][0-9]{1})+\d{8})$)/i', $mobile)){
	$result['MSG'] = '手机号格式错误';
	$result['INPUTID'] = 'mobile';
	echo json_encode($result);exit;	
}		
if(empty($passwd_1)){
	$result['MSG'] = '请输入密码';
	$result['INPUTID'] = 'passwd_1';
	echo json_encode($result);exit;	
}
$passwd_1_len = strlen($passwd_1);
if($passwd_1_len < 8 || $passwd_1_len > 18){
	$result['MSG'] = '密码长度8至18个字符';
	$result['INPUTID'] = 'passwd_1';
	echo json_encode($result);exit;
}
if(empty($checkmobile)){
	$result['MSG'] = '请输入手机短信验证码';
	$result['INPUTID'] = 'checkmobile';
	echo json_encode($result);exit;	
}
if(!empty($checkmobile) && $sessionObj->data['smscode_pwd']!=$checkmobile){
	$result['MSG'] = '手机短信验证码不正确';
	$result['INPUTID'] = 'checkmobile';
	echo json_encode($result);exit;	
}


//判断手机号是否已注册
$num = $db->num("SELECT id FROM member WHERE mobile='".$mobile."'");
if(!$num){
	$result['MSG'] = '手机号码"'.$mobile.'"不存在';
	$result['INPUTID'] = 'mobile';
	echo json_encode($result);exit;	
}	

$query = $db->query("UPDATE `member` SET pwd='".md5($passwd_1)."' WHERE mobile='".$mobile."'");
if($query){
	$result['REV'] = 1;
	$result['MSG'] = '新密码设置成功!';
}
else{
	$result['INPUTID'] = 'mobile';
	$result['MSG'] = '抱歉,新密码设置失败,请重试!';
}
echo json_encode($result);exit;
?>