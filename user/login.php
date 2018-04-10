<?php
require_once('../global.php');
$come_url = !empty($_GET['come_url'])?urldecode($_GET['come_url']):'';
//$referer = !empty($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'';
//$come_url = empty($come_url)?$referer:'';

$smarty->assign("title", "会员登录");
$smarty->assign("member_username", !empty($_COOKIE['member_username'])?$_COOKIE['member_username']:'');//记住用户名30天
$smarty->assign("come_url", $come_url);//登录成功后需要跳转至来自页面
$smarty->view('user/login.tpl');
?>