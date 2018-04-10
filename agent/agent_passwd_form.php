<?php
error_reporting(7);
require_once('../global.php');
//检测是否登录，且是否为相应的登录类型用户
$memberObj->member_is_login(3);
$member_agent_id = $memberObj->member_id;
$member_agent_name = $memberObj->member_name;
$member_type_name_arr = $memberObj->member_type_name_arr;
//查询代理商信息
$sql = "SELECT id,mobile,nickname FROM member WHERE id='".$member_agent_id."'";
$member_arr = $db->fetchRow($sql);

$smarty->assign("member_arr", $member_arr);
$smarty->assign("title", "账号管理");
$smarty->view('agent/agent_passwd_form.tpl');
?>