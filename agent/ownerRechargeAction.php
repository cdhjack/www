<?php
error_reporting(7);
require_once('../global.php');
//检测是否登录，且是否为相应的登录类型用户
$memberObj->member_is_login(3);
$member_agent_id = $memberObj->member_id;
$member_agent_name = $memberObj->member_name;
$member_type_name_arr = $memberObj->member_type_name_arr;


$result['REV'] = 0;
//充值房主
$owner_id = intval($_POST['owner_id']);
$amount_1 = trim($_POST['amount_1']);
if(empty($owner_id)){
	$result['MSG'] = '充值房主id不能为空';
	$result['INPUTID'] = 'amount_1';
	echo json_encode($result);exit;	
}
if(empty($amount_1)){
	$result['MSG'] = '请输入彩红币数量';
	$result['INPUTID'] = 'amount_1';
	echo json_encode($result);exit;	
}
if(!is_numeric($amount_1)){
	$result['MSG'] = '彩虹币必须为数字';
	$result['INPUTID'] = 'amount_1';
	echo json_encode($result);exit;	
}
//查询代理商信息中余额是否小于充币数理
$r = $db->fetchRow("SELECT a.id,a.mobile,b.balance FROM member a LEFT JOIN member_type b ON a.id=b.member_id and b.member_type=3 WHERE a.id='".$member_agent_id."'");
$member_agent_balance = (isset($r['balance']) && !empty($r['balance']))?$r['balance']:0;
if($member_agent_balance < $amount_1){
	$result['MSG'] = '您的彩虹币数量"'.$member_agent_balance.'"小于'.$amount_1;
	$result['INPUTID'] = 'amount_1';
	echo json_encode($result);exit;	
}


//代理商彩虹币减少
$member_agent_balance = $member_agent_balance-$amount_1;
$query1 = $db->query("UPDATE member_type set balance='".$member_agent_balance."' where member_id='".$member_agent_id."' and member_type=3");
//房主彩虹币增加(房主在该代理商下的余额增加，及房主的总余客也增加)
$query2 = $db->query("UPDATE member_agent set balance=balance+'".$amount_1."' where member_id='".$owner_id."' and  member_agent_id='".$member_agent_id."'");
$query3 = $db->query("UPDATE member_type set balance=balance+'".$amount_1."' where member_id='".$owner_id."' and member_type=2");
//order_pay_agent充值订单表入库
$AddTime = time();
$query4 = $db->query("INSERT INTO order_pay_agent(`member_id`,`amount`,`status`,`agent_id`,`add_time`,`pay_time`) VALUES('".$owner_id."','".$amount_1."','1','".$member_agent_id."','".$AddTime."','".$AddTime."')");

if($query1 && $query2 && $query3 && $query4){
	$result['REV'] = 1;
	$result['MSG'] = '恭喜,为该房主充值成功!';
}
else{
	/*echo 'query1:<br>';
	print_r($query1);
	echo 'query2:<br>';
	print_r($query2);
	echo 'query3:<br>';
	print_r($query3);*/
	
	$result['INPUTID'] = 'amount_1';
	$result['MSG'] = '抱歉,为该房主充值失败,请重试!';
}
echo json_encode($result);exit;
?>