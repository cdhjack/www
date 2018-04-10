<?php
error_reporting(7);
require_once('../global.php');
//检测是否登录，且是否为相应的登录类型用户
$memberObj->member_is_login(2);
$member_owner_id = $memberObj->member_id;
$member_owner_name = $memberObj->member_name;
$member_type_name_arr = $memberObj->member_type_name_arr;

//房主充值或收到的充值订单（房主向房主发起充币订单）
$sql = "
	SELECT 
		a.id,
		a.member_id,
		a.amount,
		a.status,
		a.owner_id,
		a.add_time,
		a.pay_time,
		b.mobile,
		b.nickname,
		b.tx 
	FROM 
		order_pay_owner a 
	LEFT JOIN 
		member b 
	ON 
		a.member_id=b.id 
	WHERE 
		a.owner_id='".$member_owner_id."'";	
//echo $sql;exit;
$num = $db->num($sql);
$sql .=" ORDER BY a.id desc";

$query = $db->query($sql);
$orderArr = $db->fetch($query);

$order_pending_arr = array();//待处理订单
$order_complete_arr = array();//已完成订单
$order_cancle_arr = array();//已取消订单
if($orderArr){
	foreach($orderArr as $key=>$member){
		$avatar = empty($member['tx'])?'uploadfile/avatar.jpg':(substr($member['tx'], 0, 1) == '/' ? substr($member['tx'],1) : $member['tx']);;
		
		//待处理订单
		if($member['status']==0){
			$order_pending_arr[$key] = $member;
			$order_pending_arr[$key]['avatar'] = SITE_URL.$avatar;
			
			$status_name = '待处理';
			$order_time_name = "创建时间";
			$order_time = date('Y-m-d H:i:s',$member['add_time']);
			$order_pending_arr[$key]['status_name'] = $status_name;
			$order_pending_arr[$key]['order_time_name'] = $order_time_name;
			$order_pending_arr[$key]['order_time'] = $order_time;
		}
		//已完成订单
		if($member['status']==1){
			$order_complete_arr[$key] = $member;
			$order_complete_arr[$key]['avatar'] = SITE_URL.$avatar;
			
			$status_name = '已完成';
			$order_time_name = "完成时间";
			$order_time = date('Y-m-d H:i:s',$member['pay_time']);
			$order_complete_arr[$key]['status_name'] = $status_name;
			$order_complete_arr[$key]['order_time_name'] = $order_time_name;
			$order_complete_arr[$key]['order_time'] = $order_time;
		}
		//已取消订单
		if($member['status']==2){
			$order_cancle_arr[$key] = $member;
			$order_cancle_arr[$key]['avatar'] = SITE_URL.$avatar;
			
			$status_name = '已取消';
			$order_time_name = "处理时间";
			$order_time = date('Y-m-d H:i:s',$member['pay_time']);
			$order_cancle_arr[$key]['status_name'] = $status_name;
			$order_cancle_arr[$key]['order_time_name'] = $order_time_name;
			$order_cancle_arr[$key]['order_time'] = $order_time;
		}
		
	}
}

$smarty->assign("order_pending_arr", $order_pending_arr);
$smarty->assign("order_complete_arr", $order_complete_arr);
$smarty->assign("order_cancle_arr", $order_cancle_arr);
$smarty->assign("title", "群订单-房主收到的订单");
$smarty->view('owner/owner_orderlist.tpl');
?>