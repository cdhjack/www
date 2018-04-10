<?php
error_reporting(7);
require_once('../global.php');
//检测是否登录，且是否为相应的登录类型用户
$memberObj->member_is_login(2);
$member_owner_id = $memberObj->member_id;
$member_owner_name = $memberObj->member_name;
$member_type_name_arr = $memberObj->member_type_name_arr;


$result['REV'] = 0;
$agent_id = intval($_POST['agent_id']);
$amount_1 = trim($_POST['amount_1']);
if(empty($agent_id)){
	$result['MSG'] = '请选择代理商';
	$result['INPUTID'] = 'agent_id';
	echo json_encode($result);exit;	
}
if(empty($amount_1)){
	$result['MSG'] = '请输入彩红币数量';
	$result['INPUTID'] = 'amount_1';
	echo json_encode($result);exit;	
}
if(!is_numeric($amount_1) || $amount_1<=0){
	$result['MSG'] = '彩虹币必须为数字且大于0';
	$result['INPUTID'] = 'amount_1';
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