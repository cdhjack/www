<?php
require_once('global.php');

$action = isset($_POST['isweb'])?$_POST['isweb']:$_GET['isweb'];
switch($action){
	case 1://登录		
		if(empty($_POST['username']) || empty($_POST['password'])){
			header('Location: ' . SITE_URL.'admin/login.php?error_warning='.urlencode('请输入有效的用户名和密码!'));
		}		
		
		$username = doAddslashes($_POST['username']);
		$password = doAddslashes($_POST['password']);
		$checkcode = trim($_POST['checkcode']);
		$remember = (int)$_POST['remember'];
				
		$admin->u_login($username,$password,$checkcode,$remember);
		break;
	case 2://退出登录
		$admin->u_loginout();
		break;
	default://登录页面
		$smarty->assign("title", "管理登陆");
		$smarty->assign("error_warning",empty($_GET['error_warning'])?'':urldecode($_GET['error_warning']));
		$smarty->assign("remember_username",empty($_COOKIE['remember_username'])?'':$_COOKIE['remember_username']);
        $smarty->view('login.tpl');
		break;
}
?>