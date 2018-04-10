<?php
error_reporting(7);
require_once('../global.php');
//检测是否登录，且是否为相应的登录类型用户
$memberObj->member_is_login(2);
$member_owner_id = $memberObj->member_id;
$member_owner_name = $memberObj->member_name;
$member_type_name_arr = $memberObj->member_type_name_arr;


$result['REV'] = 0;
//充值玩家
$member_id = intval($_POST['member_id']);
$amount_1 = trim($_POST['amount_1']);
if(empty($member_id)){
	$result['MSG'] = '充值玩家id不能为空';
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
//查询房主信息中余额是否小于充币数理
$r = $db->fetchRow("SELECT a.id,a.mobile,b.balance FROM member a LEFT JOIN member_type b ON a.id=b.member_id and b.member_type=2 WHERE a.id='".$member_owner_id."'");
$member_owner_balance = (isset($r['balance']) && !empty($r['balance']))?$r['balance']:0;
if($member_owner_balance < $amount_1){
	$result['MSG'] = '您的彩虹币数量"'.$member_owner_balance.'"小于'.$amount_1;
	$result['INPUTID'] = 'amount_1';
	echo json_encode($result);exit;	
}


//房主彩虹币减少
$member_owner_balance = $member_owner_balance-$amount_1;
$query1 = $db->query("UPDATE member_type set balance='".$member_owner_balance."' where member_id='".$member_owner_id."' and member_type=2");
//玩家彩虹币增加(玩家在该房主下的余额增加，及玩家的总余客也增加)
$query2 = $db->query("UPDATE member_owner set balance=balance+'".$amount_1."' where member_id='".$member_id."' and  member_owner_id='".$member_owner_id."'");
$query3 = $db->query("UPDATE member_type set balance=balance+'".$amount_1."' where member_id='".$member_id."' and member_type=1");
//order_pay_owner充值订单表入库
$AddTime = time();
$query4 = $db->query("INSERT INTO order_pay_owner(`member_id`,`amount`,`status`,`owner_id`,`add_time`,`pay_time`) VALUES('".$member_id."','".$amount_1."','1','".$member_owner_id."','".$AddTime."','".$AddTime."')");

if($query1 && $query2 && $query3 && $query4){
	$result['REV'] = 1;
	$result['MSG'] = '恭喜,为该玩家充值成功!';
}
else{	
	$result['INPUTID'] = 'amount_1';
	$result['MSG'] = '抱歉,为该玩家充值失败,请重试!';
}
echo json_encode($result);exit;
?>