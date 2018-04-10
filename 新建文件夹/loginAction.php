<?php
require_once('global.php');

$action = isset($_POST['isweb'])?$_POST['isweb']:$_GET['isweb'];
switch($action){
	case 1://登陆判断
		$username1 = doAddslashes($_POST['username']);
		$password1 = doAddslashes($_POST['password']);
		if(!empty($username1) && !preg_match('/(^((1[1-9][0-9]{1})+\d{8})$)/i', $username1)){
			$membertype = 2;	
		}
		else{
			$membertype = 1;
		}
		$come_url = isset($_POST['come_url'])?trim($_POST['come_url']):'';
		$memberObj->member_login($come_url,$username1,$password1,$membertype);
		break;
	case 2://退出登陆
		$memberObj->member_loginout();
		break;
	default://登陆页面
		redirect ('非法参数，提交失败!', SITE_URL.'index.php',false);
		break;
}
?>