<?php
error_reporting(7);
require_once('../global.php');
//检测是否登录，且是否为相应的登录类型用户
$memberObj->member_is_login(3);
$member_agent_id = $memberObj->member_id;
$member_agent_name = $memberObj->member_name;
$member_type_name_arr = $memberObj->member_type_name_arr;


$result['REV'] = 0;
$order_id = intval($_POST['order_id']);
$act_type = trim($_POST['act_type']);
if(empty($order_id) || empty($act_type)){
	$result['MSG'] = '参数错误';
	echo json_encode($result);exit;	
}
//订单充值请求处理
if($act_type == 'pay'){
	//充值订单信息
	$r = $db->fetchRow("SELECT id,member_id,amount FROM order_pay_agent WHERE id='".$order_id."' and agent_id='".$member_agent_id."'");
	//充值房主
	$owner_id = intval($r['owner_id']);
	$amount_1 = trim($r['amount']);
	
	//查询代理商信息中余额是否小于充币数理
	$r = $db->fetchRow("SELECT a.id,a.mobile,b.balance FROM member a LEFT JOIN member_type b ON a.id=b.member_id and b.member_type=3 WHERE a.id='".$member_agent_id."'");
	$member_agent_balance = (isset($r['balance']) && !empty($r['balance']))?$r['balance']:0;
	if($member_agent_balance < $amount_1){
		$result['MSG'] = '您的彩虹币数量"'.$member_agent_balance.'"小于'.$amount_1;
		echo json_encode($result);exit;	
	}
	
	//代理商彩虹币减少
	$member_agent_balance = $member_agent_balance-$amount_1;
	$query1 = $db->query("UPDATE member_type set balance='".$member_agent_balance."' where member_id='".$member_agent_id."' and member_type=3");
	//房主彩虹币增加(房主在该代理商下的余额增加，及房主的总余客也增加)
	$query2 = $db->query("UPDATE member_agent set balance=balance+'".$amount_1."' where member_id='".$owner_id."' and  member_agent_id='".$member_agent_id."'");
	$query3 = $db->query("UPDATE member_type set balance=balance+'".$amount_1."' where member_id='".$owner_id."' and member_type=2");
	//order_pay_agent充值订单表更新状态
	$query4 = $db->query("UPDATE order_pay_agent set status=1,pay_time='".time()."' where id='".$order_id."'");
	if($query1 && $query2 && $query3 && $query4){
		$result['REV'] = 1;
		$result['MSG'] = '恭喜,为该房主充值成功!';
	}
	else{
		$result['MSG'] = '抱歉,为该房主充值失败,请重试!';
	}
}
else if($act_type == 'cancle'){
	//order_pay_agent充值订单表更新状态
	$query = $db->query("UPDATE order_pay_agent set status=2,pay_time='".time()."' where id='".$order_id."'");
	if($query){
		$result['REV'] = 1;
		$result['MSG'] = '该房主充值订单取消成功!';
	}
	else{
		$result['MSG'] = '抱歉,该房主充值订单取消失败,请重试!';
	}
}
else{
	$result['MSG'] = '参数错误';
}
echo json_encode($result);exit;
?>