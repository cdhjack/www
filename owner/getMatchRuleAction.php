<?php
error_reporting(7);
require_once('../global.php');
$result['REV'] = 0;
$result['INPUTID'] = 'match_type';
//检测是否登录，且是否为相应的登录类型用户
$res = $memberObj->ajax_member_is_login(2);
if(!$res['REV']){
	//$result['MSG'] = $res['MSG'];
	$result['MSG'] = '登录信息异常操作失败,请刷新页面';
	echo json_encode($result);exit;	
}
$member_owner_id = $memberObj->member_id;
$member_owner_name = $memberObj->member_name;
$member_type_name_arr = $memberObj->member_type_name_arr;

//获取彩虹包金额类型
$match_type_arr = isset(MatchConfig::$arr_type)?MatchConfig::$arr_type:array();
//获取不同金额类弄彩虹包规则信息配置(key为彩虹包金额类型)
$match_rule_arr = isset(MatchConfig::$arr_rule)?MatchConfig::$arr_rule:array();

$match_type = trim($_POST['match_type']);
if(empty($match_type)){
	$result['MSG'] = '请选择赛事类型';
	echo json_encode($result);exit;	
}
if (!in_array($match_type, $match_type_arr)) {
	$result['MSG'] = '赛事类型不合法';
	echo json_encode($result);exit;	
}
if(!isset($match_rule_arr[$match_type])){
	$result['MSG'] = '赛事类型规则暂未配置';
}
else{
	$result['REV'] = 1;
	$result['DATA'] = $match_rule_arr[$match_type];
}
echo json_encode($result);exit;	
?>