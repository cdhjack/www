<?php
error_reporting(7);
require_once('../global.php');
//检测是否登录，且是否为相应的登录类型用户
$memberObj->member_is_login(2);
$member_owner_id = $memberObj->member_id;
$member_owner_name = $memberObj->member_name;
$member_type_name_arr = $memberObj->member_type_name_arr;
//查询房主信息
$sql = "
	SELECT 
		a.id,
		a.mobile,
		a.nickname,
		a.rname,
		a.tx,
		a.identity,
		a.reg_time,
		b.member_type,
		b.invite_code,
		b.friend_count,
		b.wx_group_qrcode,
		b.balance,
		c.identity_pic,
		c.wx_nick,
		c.wx_tx,
		c.wx_pay_qrcode 
	FROM 
		member a 
	LEFT JOIN 
		member_info c 
	ON 
		a.id=c.member_id 
	LEFT JOIN 
		member_type b 
	ON 
		a.id=b.member_id and b.member_type=2 
	WHERE 
		a.id='".$member_owner_id."'";
$member_arr = $db->fetchRow($sql);
//头像
$avatar = empty($member_arr['tx'])?'uploadfile/avatar.jpg':(substr($member_arr['tx'], 0, 1) == '/' ? substr($member_arr['tx'],1) : $member_arr['tx']);
$member_arr['avatar'] = SITE_URL.$avatar;

//$smarty->assign("member_type_name_arr", $member_type_name_arr);
$smarty->assign("member_arr", $member_arr);
$smarty->assign("title", "房主信息");
$smarty->view('owner/owner_info_form.tpl');
?>