<?php
error_reporting(7);
require_once('../global.php');
//检测是否登录，且是否为相应的登录类型用户
$memberObj->member_is_login(2);
$member_owner_id = $memberObj->member_id;
$member_owner_name = $memberObj->member_name;
$member_type_name_arr = $memberObj->member_type_name_arr;

//获取需要充值的房主参数信息
$members = isset($_POST["members"])?$_POST["members"]:$_GET["members"];
$members = strtr($members, '-_,', '+/=');
$members_base64_decode = base64_decode($members);
$members_unserialize = $members_base64_decode?unserialize($members_base64_decode):array();
$member_arr = empty($members_unserialize)?array():$members_unserialize;//房主数组信息（房主id,key:member_id、房主头像,key:avatar、房主昵称,key:nickname）
//echo '<pre>';
//print_r($member_arr );


//查询该房主为该用户的充值记录
$member_id = isset($member_arr['member_id'])?intval($member_arr['member_id']):0;
$newRechargeArr = array();
if($member_id){
	$sql = "SELECT a.id,a.member_id,a.amount,a.status,a.owner_id,a.add_time,a.pay_time,b.mobile,b.nickname,b.tx FROM order_pay_owner a LEFT JOIN member b ON a.member_id=b.id WHERE a.member_id='".$member_id."' and a.owner_id='".$member_owner_id."'";	
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


$smarty->assign("title", "玩家充币");
$smarty->assign("member_arr", $member_arr);
$smarty->assign("rechargeArr", $newRechargeArr);
$smarty->view('owner/member_recharge.tpl');
?>