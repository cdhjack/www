<?php
error_reporting(7);
require_once('../global.php');
//检测是否登录，且是否为相应的登录类型用户
$memberObj->member_is_login(3);
$member_agent_id = $memberObj->member_id;
$member_agent_name = $memberObj->member_name;
$member_type_name_arr = $memberObj->member_type_name_arr;

//查询代理商信息
$sql = "SELECT a.id,a.mobile,a.nickname,a.rname,a.tx,b.member_type,b.invite_code,b.friend_count,b.wx_group_qrcode,b.balance,(SELECT count(c.id) FROM order_pay_agent c WHERE c.agent_id=a.id) as order_num FROM member a LEFT JOIN member_type b ON a.id=b.member_id and b.member_type=3 WHERE a.id='".$member_agent_id."'";
$member_arr = $db->fetchRow($sql);
$avatar = empty($member_arr['tx'])?'uploadfile/avatar.jpg':(substr($member_arr['tx'], 0, 1) == '/' ? substr($member_arr['tx'],1) : $member_arr['tx']);
$member_arr['avatar'] = SITE_URL.$avatar;




$smarty->assign("member_type_name_arr", $member_type_name_arr);
$smarty->assign("member_arr", $member_arr);
$smarty->assign("title", "代理商");
$smarty->view('agent/index.tpl');
?>