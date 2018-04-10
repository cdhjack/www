<?php
error_reporting(7);
require_once('../global.php');
//检测是否登录，且是否为相应的登录类型用户
$memberObj->member_is_login(2);
$member_owner_id = $memberObj->member_id;
$member_owner_name = $memberObj->member_name;
$member_type_name_arr = $memberObj->member_type_name_arr;

//获取彩虹包金额类型
$match_type_arr = isset(MatchConfig::$arr_type)?MatchConfig::$arr_type:array();
//获取彩虹包发放红包数量设定
$match_num_arr = isset(MatchConfig::$arr_num)?MatchConfig::$arr_num:array();
//获取不同金额类弄彩虹包规则信息配置(key为彩虹包金额类型)
$match_rule_arr = isset(MatchConfig::$arr_rule)?MatchConfig::$arr_rule:array();

$smarty->assign("title", "添加新赛事");
$smarty->assign("match_type_arr", $match_type_arr);
$smarty->assign("match_num_arr", $match_num_arr);
$smarty->assign("match_rule_arr", $match_rule_arr);
$smarty->view('owner/owner_match_form.tpl');
?>