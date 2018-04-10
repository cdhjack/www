<?php
error_reporting(7);
require_once('../global.php');
//检测是否登录，且是否为相应的登录类型用户
$memberObj->member_is_login(3);
$member_agent_id = $memberObj->member_id;
$member_agent_name = $memberObj->member_name;
$member_type_name_arr = $memberObj->member_type_name_arr;

//查询代理商信息
$sql = "SELECT a.id,a.mobile,a.nickname,a.rname,a.tx,b.member_type,b.invite_code,b.friend_count,b.wx_group_qrcode,b.balance FROM member a LEFT JOIN member_type b ON a.id=b.member_id and b.member_type=3 WHERE a.id='".$member_agent_id."'";
$agent_arr = $db->fetchRow($sql);
$avatar = empty($agent_arr['tx'])?'uploadfile/avatar.jpg':(substr($agent_arr['tx'], 0, 1) == '/' ? substr($agent_arr['tx'],1) : $agent_arr['tx']);
$agent_arr['avatar'] = SITE_URL.$avatar;

//查询该代理商请求充值的订单记录
$newRechargeArr = array();
if($member_agent_id){
	$sql = "SELECT a.id,a.member_id,a.amount,a.status,a.admin_id,a.add_time,a.pay_time,b.mobile,b.nickname,b.tx FROM order_pay_admin a LEFT JOIN member b ON a.member_id=b.id WHERE a.member_id='".$member_agent_id."'";	
	//echo $sql;
	$num = $db->num($sql);
	$sql .=" ORDER BY a.id desc LIMIT 0,5";
	//$sql .=" a.id desc LIMIT ".$pagination->get_begin().",".$pagination->perpage;
	
	$query = $db->query($sql);
	$rechargeArr = $db->fetch($query);
	//头像信息处理
	$newRechargeArr = $rechargeArr;
	if($rechargeArr){
		foreach($rechargeArr as $key=>$member){
			$avatar = empty($member['tx'])?'uploadfile/avatar.jpg':(substr($member['tx'], 0, 1) == '/' ? substr($member['tx'],1) : $member['tx']);;
			$newRechargeArr[$key]['avatar'] = SITE_URL.$avatar;
			if($member['status']==0){
				$status_name = '待处理';
				$order_time_name = "创建时间";
				$order_time = date('Y-m-d H:i:s',$member['add_time']);
			}
			elseif($member['status']==1){
				$status_name = '已完成';
				$order_time_name = "完成时间";
				$order_time = date('Y-m-d H:i:s',$member['pay_time']);
			}
			elseif(($member['status']==2)){
				$status_name = '已取消';
				$order_time_name = "处理时间";
				$order_time = date('Y-m-d H:i:s',$member['pay_time']);
			}
			$newRechargeArr[$key]['status_name'] = $status_name;
			$newRechargeArr[$key]['order_time_name'] = $order_time_name;
			$newRechargeArr[$key]['order_time'] = $order_time;
		}
	}
}


$smarty->assign("title", "我的彩虹币");
$smarty->assign("agent_arr", $agent_arr);
$smarty->assign("rechargeArr", $newRechargeArr);
$smarty->view('agent/agent_rainbow.tpl');
?>