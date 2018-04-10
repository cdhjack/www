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


$result['REV'] = 0;
$match_type = intval($_POST['match_type']);
$match_num = trim($_POST['match_num']);
$end_date = trim($_POST['end_date']);
$end_time = strtotime($end_date.' 23:59:59');
if(empty($match_type)){
	$result['MSG'] = '请选择赛事类型';
	$result['INPUTID'] = 'match_type';
	echo json_encode($result);exit;	
}
if (!in_array($match_type, $match_type_arr)) {
	$result['MSG'] = '赛事类型不合法';
	$result['INPUTID'] = 'match_type';
	echo json_encode($result);exit;	
}
if(!isset($match_rule_arr[$match_type])){
	$result['INPUTID'] = 'match_type';
	$result['MSG'] = '赛事类型规则暂未配置';
	echo json_encode($result);exit;	
}

if(empty($match_num)){
	$result['MSG'] = '请选择彩包数量';
	$result['INPUTID'] = 'match_num';
	echo json_encode($result);exit;	
}
if (!in_array($match_num, $match_num_arr)) {
	$result['MSG'] = '彩包数量不合法';
	$result['INPUTID'] = 'match_num';
	echo json_encode($result);exit;	
}
if(empty($end_date)){
	$result['MSG'] = '请选择赛事结束时间';
	$result['INPUTID'] = 'end_date';
	echo json_encode($result);exit;	
}
if ($end_time<time()) {
	$result['MSG'] = '时间格式错误';
	$result['INPUTID'] = 'end_date';
	echo json_encode($result);exit;	
}


$real_amount =  isset($match_rule_arr[$match_type]['real_amount'])?$match_rule_arr[$match_type]['real_amount']:0;
$commissions_per =  isset($match_rule_arr[$match_type]['commissions'])?$match_rule_arr[$match_type]['commissions']:0;
$owner_pay_amount = $real_amount + $match_type*$commissions_per;
//判断房主彩币是否够开赛费用
$r = $db->fetchRow("SELECT a.id,a.mobile,b.balance FROM member a LEFT JOIN member_type b ON a.id=b.member_id and b.member_type=2 WHERE a.id='".$member_owner_id."'");
$member_owner_balance = (isset($r['balance']) && !empty($r['balance']))?$r['balance']:0;
if($member_owner_balance < $owner_pay_amount){
	$result['MSG'] = '您的彩虹币数量"'.$member_owner_balance.'"小于'.$owner_pay_amount;
	$result['INPUTID'] = 'match_type';
	echo json_encode($result);exit;	
}

//房主彩虹币减少
$member_owner_balance = $member_owner_balance-$owner_pay_amount;
$query1 = $db->query("UPDATE member_type set balance='".$member_owner_balance."' where member_id='".$member_owner_id."' and member_type=2");
$AddTime = time();
//比赛信息入库入处理
$query2 = $db->query("INSERT INTO match_home(`owner_id`,`red_packet_amount`,`red_packet_num`,`status`,`start_time`,`end_time`) VALUES('".$member_owner_id."','".$match_type."','".$match_num."',1,'".$AddTime."','".$end_time."')");
$home_id = $db->getLastId();
//流水记录表入库处理
$query3 = $db->query("INSERT INTO match_home_bill(`home_id`,`member_id`,`introduce`,`amount`,`add_time`) VALUES('".$home_id."','".$amount_1."','房主开赛房间扣减彩虹币','".$owner_pay_amount."','".$AddTime."')");
if($query1 && $query2 && $query3){
	$result['REV'] = 1;
	$result['DATA']['commissions'] = $owner_pay_amount;
}
else{	
	$result['INPUTID'] = 'amount_1';
	$result['MSG'] = '抱歉,开赛房间失败,请重试!';
}
echo json_encode($result);exit;


























$num = $db->num("SELECT a.id FROM member a,member_type b,member_owner c WHERE a.id=b.member_id and b.member_type=1 and a.mobile='".$mobile."' and a.id=c.member_id and c.member_owner_id='".$member_owner_id."'");
if($num){
	$result['MSG'] = '该玩家您已经添加过,不需重复添加';
	echo json_encode($result);exit;	
}
else{
	//查询手机号是否已注册	
	$r = $db->fetchRow ("select id,mobile,status,nickname,identity from member where mobile='".$mobile."' limit 1");
	$result['REV'] = 1;
	$result['DATA'] = array(
		"nickname"=>(isset($r['nickname']) && !empty($r['nickname']))?$r['nickname']:'',
		"identity"=>(isset($r['identity']) && !empty($r['identity']))?$r['identity']:''
	);	
	echo json_encode($result);exit;
}


//order_pay_admin充值订单表入库（房主请求代理商充值订单）
$AddTime = time();
$query = $db->query("INSERT INTO order_pay_agent(`member_id`,`amount`,`status`,`agent_id`,`add_time`,`pay_time`) VALUES('".$member_owner_id."','".$amount_1."','0','".$agent_id."','".$AddTime."','".$AddTime."')");
if($query){
	$result['REV'] = 1;
	$result['MSG'] = '恭喜,你的充值请求订单提交成功!';
}
else{	
	$result['INPUTID'] = 'amount_1';
	$result['MSG'] = '抱歉,你的充值请求订单提交失败,请重试!';
}
echo json_encode($result);exit;
?>