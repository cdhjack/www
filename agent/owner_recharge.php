<?php
error_reporting(7);
require_once('../global.php');
//检测是否登录，且是否为相应的登录类型用户
$memberObj->member_is_login(3);
$member_agent_id = $memberObj->member_id;
$member_agent_name = $memberObj->member_name;
$member_type_name_arr = $memberObj->member_type_name_arr;

//获取需要充值的房主参数信息
$owners = isset($_POST["owners"])?$_POST["owners"]:$_GET["owners"];
$owners = strtr($owners, '-_,', '+/=');
$owners_base64_decode = base64_decode($owners);
$owners_unserialize = $owners_base64_decode?unserialize($owners_base64_decode):array();
$owner_arr = empty($owners_unserialize)?array():$owners_unserialize;//房主数组信息（房主id,key:owner_id、房主头像,key:avatar、房主昵称,key:nickname）
//echo '<pre>';
//print_r($owner_arr );


//查询该代理商为该用户的充值记录
$owner_id = isset($owner_arr['owner_id'])?intval($owner_arr['owner_id']):0;
$newRechargeArr = array();
if($owner_id){
	$sql = "SELECT a.id,a.member_id,a.amount,a.status,a.agent_id,a.add_time,a.pay_time,b.mobile,b.nickname,b.tx FROM order_pay_agent a LEFT JOIN member b ON a.member_id=b.id WHERE a.member_id='".$owner_id."' and a.agent_id='".$member_agent_id."'";	
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
			$avatar = empty($member['tx'])?'uploadfile/avatar.jpg':(substr($member['tx'], 0, 1) == '/' ? substr($member['tx'],1) : $member['tx']);
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


$smarty->assign("title", "房主充币");
$smarty->assign("owner_arr", $owner_arr);
$smarty->assign("rechargeArr", $newRechargeArr);
$smarty->view('agent/owner_recharge.tpl');
?>