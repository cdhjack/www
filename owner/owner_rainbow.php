<?php
error_reporting(7);
require_once('../global.php');
//检测是否登录，且是否为相应的登录类型用户
$memberObj->member_is_login(2);
$member_owner_id = $memberObj->member_id;
$member_owner_name = $memberObj->member_name;
$member_type_name_arr = $memberObj->member_type_name_arr;

//查询房主信息
$sql = "SELECT a.id,a.mobile,a.nickname,a.rname,a.tx,b.member_type,b.invite_code,b.friend_count,b.wx_group_qrcode,b.balance FROM member a LEFT JOIN member_type b ON a.id=b.member_id and b.member_type=2 WHERE a.id='".$member_owner_id."'";
$owner_arr = $db->fetchRow($sql);
$avatar = empty($owner_arr['tx'])?'uploadfile/avatar.jpg':(substr($owner_arr['tx'], 0, 1) == '/' ? substr($owner_arr['tx'],1) : $owner_arr['tx']);
$owner_arr['avatar'] = SITE_URL.$avatar;

//获取房主所属代理商列表
$sql = "SELECT a.id,a.member_id,a.member_agent_id,a.balance,a.add_time,b.nickname,b.mobile FROM member_agent a LEFT JOIN member b ON a.member_agent_id=b.id WHERE a.member_id='".$member_owner_id."' ORDER BY a.id DESC";
$query = $db->query($sql);
$agent_list_arr = $db->fetch($query);
$new_agent_list_arr = array();//我的代理商key为代理商id，value为代理商名称及手机号
foreach($agent_list_arr as $key=>$value){
	$new_agent_list_arr[$value['member_agent_id']] = $value['nickname'].'('.$value['mobile'].')';
}
//echo '<pre>';
//print_r($new_agent_list_arr);

//查询该房主请求充值的订单记录
$newRechargeArr = array();
if($member_owner_id){
	$sql = "
	SELECT 
		a.id,
		a.member_id,
		a.amount,
		a.status,
		a.agent_id,
		a.add_time,
		a.pay_time,
		b.mobile,
		b.nickname,
		b.tx
	FROM 
		order_pay_agent a 
	LEFT JOIN 
		member b 
	ON 
		a.member_id=b.id 
	WHERE 
		a.member_id='".$member_owner_id."'";	
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
$smarty->assign("agent_list_arr", $agent_list_arr);
$smarty->assign("new_agent_list_arr", $new_agent_list_arr);
$smarty->assign("owner_arr", $owner_arr);
$smarty->assign("rechargeArr", $newRechargeArr);
$smarty->view('owner/owner_rainbow.tpl');
?>