<?php
error_reporting(7);
require_once('../global.php');
//检测是否登录，且是否为相应的登录类型用户
$memberObj->member_is_login(3);
$member_agent_id = $memberObj->member_id;
$member_agent_name = $memberObj->member_name;
$member_type_name_arr = $memberObj->member_type_name_arr;


//获取需要充值的房主参数信息
$owners = isset($_POST["owners"])?$_POST["owners"]:$_GET["owners"];
$owners = strtr($owners, '-_,', '+/=');
$owners_base64_decode = base64_decode($owners);
$owners_unserialize = $owners_base64_decode?unserialize($owners_base64_decode):array();
$owner_arr = empty($owners_unserialize)?array():$owners_unserialize;//房主数组信息
//echo '<pre>';
//print_r($owner_arr );
/*$owner_arr = array(
	'owner_id' => $member['id'],
	'mobile' => $member['mobile'],
	'nickname' => $member['nickname'],
	'balance' => $member['balance'],
	'friend_count' => $member['friend_count'],
	'identity' => $member['identity'],
	'identity_pic' => $member['identity_pic'],
	'reg_time' => $member['reg_time']
);*/
		
$smarty->assign("owner_arr", $owner_arr);
$smarty->assign("title", "房主详情");
$smarty->view('agent/owner_detail.tpl');
?>