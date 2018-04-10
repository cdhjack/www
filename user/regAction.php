<?php
require_once('../global.php');

$result['REV'] = 0;
//手机注册
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
/*if(!empty($checkmobile) && $sessionObj->data['smscode_reg']!=$checkmobile){
	$result['MSG'] = '手机短信验证码不正确';
	$result['INPUTID'] = 'checkmobile';
	echo json_encode($result);exit;	
}*/


//判断手机号是否已注册
$num = $db->num("SELECT id FROM member WHERE mobile='".$mobile."'");
if($num){
	$result['MSG'] = '手机号码"'.$mobile.'"已经注册';
	$result['INPUTID'] = 'mobile';
	echo json_encode($result);exit;	
}		

$LoginIP = getIP();
$AddTime = time();
//会员信息表入库
$query1 = $db->query("INSERT INTO member(`mobile`,`pwd`,`reg_time`,`login_time`,`login_ip`,`status`) VALUES('".$mobile."','".md5($passwd_1)."','".$AddTime."','".$AddTime."','".$LoginIP."',1);");
$member_id = $db->getLastId();
//会员类型表入库(注册默认用户类型为玩家,member_type为1,会员类型，1：玩家，2：房主，3：代理商)
$query2 = $db->query("INSERT INTO member_type(`member_id`,`member_type`,`add_time`) VALUES('".$member_id."','1','".$AddTime."');");
if($query1 && $query2){
	//创建登录cookie
	$memberID = $db->getLastId();
	setcookie ('member_userid', $memberID, 0, '/', '');
	setcookie ('member_username', $mobile, 0, '/', '');		
	setcookie ('member_type', 1, 0, '/', '');		
	setcookie ('member_flag', 1, 0, '/', '');//用户状态status字段信息
	setcookie ('member_logintime', time (), 0, '/', '');

	$result['REV'] = 1;
	$result['MSG'] = '恭喜,您注册成功!';
}
else{
	$result['INPUTID'] = 'mobile';
	$result['MSG'] = '抱歉,您注册失败,请重试!';
}
echo json_encode($result);exit;
?>