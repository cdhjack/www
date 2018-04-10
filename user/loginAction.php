<?php
require_once('../global.php');

$action = isset($_POST['isweb'])?(int)$_POST['isweb']:(int)$_GET['isweb'];
switch($action){
	case 1://登陆判断
		$result['REV'] = 0;
		$username = doAddslashes($_POST['username']);
		$password = doAddslashes($_POST['password']);
		$checkcode_1 = trim($_POST['checkcode_1']);
		if(empty($username)){
			$result['MSG'] = '请输入手机号';
			$result['INPUTID'] = 'username';
			echo json_encode($result);exit;	
		}
		//echo $username;exit;
		if(!empty($username) && !preg_match('/(^((1[1-9][0-9]{1})+\d{8})$)/i', $username)){
			$result['MSG'] = '手机号格式错误';
			$result['INPUTID'] = 'username';
			echo json_encode($result);exit;	
		}		
		if(empty($password)){
			$result['MSG'] = '请输入密码';
			$result['INPUTID'] = 'password';
			echo json_encode($result);exit;	
		}
		$password_len = strlen($password);
		if($password_len < 8 || $password_len > 18){
			$result['MSG'] = '密码长度8至18个字符';
			$result['INPUTID'] = 'password';
			echo json_encode($result);exit;
		}
		if(empty($checkcode_1)){
			$result['MSG'] = '请输入验证码';
			$result['INPUTID'] = 'checkcode_1';
			echo json_encode($result);exit;	
		}
		if(!empty($checkcode_1) && $sessionObj->data['captcha_login']!=$checkcode_1){
			$result['MSG'] = '输入验证码错误';
			$result['INPUTID'] = 'checkcode_1';
			echo json_encode($result);exit;	
		}		
		$res = $memberObj->member_login($username,$password,1);
		//echo '<pre>';
		//print_r($res);
		if($res['REV'] === false){
			$result['MSG'] = $res['MSG'];
			$result['INPUTID'] = 'checkcode_1';
			echo json_encode($result);exit;
		}
		else{//登录成功
			$membertype_arr = $res['DATA'];//返回的用户类型值,一个用户可能多个值,会员类型，1：玩家，2：房主，3：代理商
			$result['REV'] = 1;
			$result['MSG'] = $res['MSG'];
			$result['DATA'] = array(
				'is_agent'=>(in_array('3', $membertype_arr))?1:0,//登录用户是否是代理商
				'is_owner'=>(in_array('2', $membertype_arr))?1:0,//登录用户是否是房主
				'is_member'=>(in_array('1', $membertype_arr))?1:0//登录用户是否是玩家
			);
			echo json_encode($result);exit;
		}
		break;
	case 2://退出登陆
		$memberObj->member_loginout();
		break;
	default://登陆页面
		redirect ('非法参数，提交失败!', SITE_URL.'index.php',false);
		break;
}
?>