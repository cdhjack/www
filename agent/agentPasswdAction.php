<?php
error_reporting(7);
require_once('../global.php');
//检测是否登录，且是否为相应的登录类型用户
$memberObj->member_is_login(3);
$member_agent_id = $memberObj->member_id;
$member_agent_name = $memberObj->member_name;
$member_type_name_arr = $memberObj->member_type_name_arr;


$result['REV'] = 0;
//修改代理商信息
$nickname = trim($_POST['nickname']);
$passwd_old = trim($_POST['passwd_old']);
$passwd_1 = trim($_POST['passwd_1']);
//echo '<pre>';
//print_r($_POST["identity_2_base_64"]);exit;
if(empty($nickname)){
	$result['MSG'] = '请输入您的名称';
	$result['INPUTID'] = 'nickname';
	echo json_encode($result);exit;	
}
if(empty($passwd_old)){
	$result['MSG'] = '请输入原密码';
	$result['INPUTID'] = 'passwd_old';
	echo json_encode($result);exit;	
}
$passwd_old_len = strlen($passwd_old);
if($passwd_old_len < 8 || $passwd_old_len > 18){
	$result['MSG'] = '原密码长度8至18个字符';
	$result['INPUTID'] = 'passwd_old';
	echo json_encode($result);exit;
}
if(empty($passwd_1)){
	$result['MSG'] = '请输入新密码';
	$result['INPUTID'] = 'passwd_1';
	echo json_encode($result);exit;	
}
$passwd_1_len = strlen($passwd_1);
if($passwd_1_len < 8 || $passwd_1_len > 18){
	$result['MSG'] = '新密码长度8至18个字符';
	$result['INPUTID'] = 'passwd_1';
	echo json_encode($result);exit;
}

//判断原密码是否正确
$num = $db->num("SELECT id FROM member WHERE id='".$member_agent_id."' and pwd='".md5($passwd_old)."'");
if(!$num){
	$result['MSG'] = '您输入的原密码错误';
	$result['INPUTID'] = 'passwd_old';
	echo json_encode($result);exit;
}		

//会员信息表更新
$query1 = $db->query("UPDATE member set nickname='".$nickname."',pwd='".md5($passwd_1)."' where id='".$member_agent_id."'");
if($query1){
	$result['REV'] = 1;
	$result['MSG'] = '您的信息修改成功!';
}
else{
	$result['INPUTID'] = 'nickname';
	$result['MSG'] = '抱歉,您的信息修改失败,请重试!';
}
echo json_encode($result);exit;
?>