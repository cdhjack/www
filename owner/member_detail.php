<?php
error_reporting(7);
require_once('../global.php');
//检测是否登录，且是否为相应的登录类型用户
$memberObj->member_is_login(2);
$member_owner_id = $memberObj->member_id;
$member_owner_name = $memberObj->member_name;
$member_type_name_arr = $memberObj->member_type_name_arr;


//获取玩家详情
$members = isset($_POST["members"])?$_POST["members"]:$_GET["members"];
$members = strtr($members, '-_,', '+/=');
$members_base64_decode = base64_decode($members);
$members_unserialize = $members_base64_decode?unserialize($members_base64_decode):array();
$member_arr = empty($members_unserialize)?array():$members_unserialize;//玩家数组信息
//echo '<pre>';
//print_r($member_arr );
/*$member_arr = array(
	'member_id' => $member['id'],
	'mobile' => $member['mobile'],
	'nickname' => $member['nickname'],
	'balance' => $member['balance'],
	'friend_count' => $member['friend_count'],
	'identity' => $member['identity'],
	'identity_pic' => $member['identity_pic'],
	'reg_time' => $member['reg_time']
);*/
		
$smarty->assign("member_arr", $member_arr);
$smarty->assign("title", "玩家详情");
$smarty->view('owner/member_detail.tpl');
?>