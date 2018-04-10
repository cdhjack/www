<?php
require_once('global.php');

$membertype = isset($_GET['membertype'])?(int)$_GET['membertype']:(int)$_POST['membertype'];
$result['REV'] = 0;
switch($membertype){
	case 1://手机注册
		$mobile = trim($_POST['mobile']);		
		$passwd_1 = trim($_POST['passwd_1']);
		$checkcode_1 = trim($_POST['checkcode_1']);
		//$checkmobile = trim($_POST['checkmobile']);
		$rname_1 = trim($_POST['rname_1']);	
		$identity_1 = trim($_POST['identity_1']);	
		//echo $checkcode_1.'<br>';
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
		if(empty($checkcode_1)){
			$result['MSG'] = '请输入验证码';
			$result['INPUTID'] = 'checkcode_1';
			echo json_encode($result);exit;	
		}
		if(!empty($checkcode_1) && $sessionObj->data['captcha_mobile']!=$checkcode_1){
			$result['MSG'] = '输入验证码错误';
			$result['INPUTID'] = 'checkcode_1';
			echo json_encode($result);exit;	
		}
		/*if(empty($checkmobile)){
			$result['MSG'] = '请输入手机短信验证码';
			$result['INPUTID'] = 'checkmobile';
			echo json_encode($result);exit;	
		}
		if(!empty($checkmobile) && $sessionObj->data['smscode']!=$checkmobile){
			$result['MSG'] = '手机短信验证码不正确';
			$result['INPUTID'] = 'checkmobile';
			echo json_encode($result);exit;	
		}*/
		if(empty($rname_1)){
			$result['MSG'] = '请输入真实姓名';
			$result['INPUTID'] = 'rname_1';
			echo json_encode($result);exit;	
		}
		if(empty($identity_1)){
			$result['MSG'] = '请输入身份证号码';
			$result['INPUTID'] = 'identity_1';
			echo json_encode($result);exit;	
		}
		
		
		//判断手机号是否已注册
		$num = $db->num("SELECT ID FROM member WHERE mobile='".$mobile."'");
		if($num){
			$result['MSG'] = '手机号码"'.$mobile.'"已经注册';
			$result['INPUTID'] = 'mobile';
			echo json_encode($result);exit;	
		}		
		
		$LoginIP = getIP();
		$AddTime = time();
		$query = $db->query("INSERT INTO member(`mobile`,`pwd`,`rname`,`identity`,`reg_time`,`login_time`,`login_ip`,`status`) VALUES('".$mobile."','".md5($passwd_1)."','".$rname_1."','".$identity_1."','".$AddTime."','".$AddTime."','".$LoginIP."',1);");
		if($query){
			//创建登录cookie
			$memberID = $db->getLastId();
			setcookie ('member_userid', $memberID, 0, '/', '');
			setcookie ('member_username', $mobile, 0, '/', '');		
			setcookie ('member_type', 1, 0, '/', '');		
			setcookie ('member_flag', 1, 0, '/', '');
			setcookie ('member_logintime', time (), 0, '/', '');
		
			$result['REV'] = 1;
			$result['MSG'] = '恭喜,您注册成功!';
		}
		else{
			$result['INPUTID'] = 'userselect_1';
			$result['MSG'] = '抱歉,您注册失败,请重试!';
		}
		echo json_encode($result);exit;
		break;
	case 2://邮箱注册
		$email = trim($_POST['email']);		
		$passwd_2 = trim($_POST['passwd_2']);
		$checkcode_2 = trim($_POST['checkcode_2']);
		$rname_2 = trim($_POST['rname_2']);	
		$identity_2 = trim($_POST['identity_2']);	
		if(empty($email)){
			$result['MSG'] = '请输入邮箱地址';
			$result['INPUTID'] = 'email';
			echo json_encode($result);exit;	
		}
		//echo $email;exit;
		if(!empty($email) && !preg_match('/^([a-zA-Z0-9_-]\.*)+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)*(\.[a-zA-Z0-9_-]{2,3})$/', $email)){
			$result['INPUTID'] = 'email';
			$result['MSG'] = '邮箱格式错误';
			echo json_encode($result);exit;	
		}		
		if(empty($passwd_2)){
			$result['INPUTID'] = 'passwd_2';
			$result['MSG'] = '请输入密码';
			echo json_encode($result);exit;	
		}
		$passwd_2_len = strlen($passwd_2);
		if($passwd_2_len < 8 || $passwd_2_len > 18){
			$result['INPUTID'] = 'passwd_2';
			$result['MSG'] = '密码长度8至18个字符';
			echo json_encode($result);exit;
		}
		if(empty($checkcode_2)){
			$result['INPUTID'] = 'checkcode_2';
			$result['MSG'] = '请输入验证码';
			echo json_encode($result);exit;	
		}
		if(!empty($checkcode_2) && $sessionObj->data['captcha_email']!=$checkcode_2){
			$result['INPUTID'] = 'checkcode_2';
			$result['MSG'] = '输入验证码错误';
			echo json_encode($result);exit;	
		}
		if(empty($rname_2)){
			$result['MSG'] = '请输入真实姓名';
			$result['INPUTID'] = 'rname_2';
			echo json_encode($result);exit;	
		}
		if(empty($identity_2)){
			$result['MSG'] = '请输入身份证号码';
			$result['INPUTID'] = 'identity_2';
			echo json_encode($result);exit;	
		}
		
		
		//判断邮箱是否已注册
		$num = $db->num("SELECT ID FROM member WHERE email='".$email."'");
		if($num){
			$result['MSG'] = '邮箱"'.$email.'"已经注册';
			$result['INPUTID'] = 'email';
			echo json_encode($result);exit;	
		}		
		
		$LoginIP = getIP();
		$AddTime = time();
		$query = $db->query("INSERT INTO member(`email`,`pwd`,`rname`,`identity`,`reg_time`,`login_time`,`login_ip`,`status`) VALUES('".$email."','".md5($passwd_2)."','".$rname_2."','".$identity_2."','".$AddTime."','".$AddTime."','".$LoginIP."',1);");
		if($query){
			//创建登录cookie
			$memberID = $db->getLastId();
			setcookie ('member_userid', $memberID, 0, '/', '');
			setcookie ('member_username', $email, 0, '/', '');		
			setcookie ('member_type', 2, 0, '/', '');		
			setcookie ('member_flag', 1, 0, '/', '');
			setcookie ('member_logintime', time (), 0, '/', '');
		
			$result['REV'] = 1;
			$result['MSG'] = '恭喜,您注册成功!';
		}
		else{
			$result['INPUTID'] = 'userselect_2';
			$result['MSG'] = '抱歉,您注册失败,请重试!';
		}
		
		echo json_encode($result);exit;
		break;
	default:
		if($membertype==1){
			$result['INPUTID'] = 'userselect_1';
		}
		else{
			$result['INPUTID'] = 'userselect_2';
		}
		$result['MSG'] = '非法参数，提交失败!';
		echo json_encode($result);exit;
		break;
}
?>