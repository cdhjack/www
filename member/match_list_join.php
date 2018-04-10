<?php
error_reporting(7);
require_once('../global.php');
//检测是否登录，且是否为相应的登录类型用户
$memberObj->member_is_login(1);
$member_id = $memberObj->member_id;
$member_name = $memberObj->member_name;
$member_type_name_arr = $memberObj->member_type_name_arr;

//查询关系表获取与我有关系的房主id信息
$sql = "SELECT id,member_id,member_owner_id,balance,add_time FROM member_owner WHERE member_id='".$member_id."'";
$query = $db->query($sql);
$member_owner_arr = $db->fetch($query);
$my_owner_arr = array();
if(!empty($member_owner_arr)){
	foreach($member_owner_arr as $key=>$value){
		$my_owner_arr[] = $value['member_owner_id'];
	}
}

$newMatchArr = array();
if(!empty($my_owner_arr)){
	$my_owner_id_str = (count($my_owner_arr)>1)?implode ( ",", $my_owner_arr ):$my_owner_arr[0];	
	//查询与登录用户存在关系的房主开的比赛房间
	$sql = "
		SELECT 
			a.id,a.owner_id,a.red_packet_amount,a.red_packet_num,a.status,a.start_time,a.end_time,b.nickname,b.mobile,b.tx,c.friend_count,c.wx_group_qrcode,c.invite_code,
			(SELECT count(d.id) FROM match_home_member d WHERE d.home_id=a.id) as join_match_num,
			(SELECT SUM(e.pay_amount) FROM match_home_member e WHERE e.home_id=a.id AND e.member_id='".$member_id."') as my_pay_amount,
			(SELECT f.balance FROM member_owner f WHERE f.member_owner_id=a.owner_id AND f.member_id='".$member_id."') as my_balance_in_owner
		FROM 
			match_home a 
		LEFT JOIN 
			member b 
		ON 
			a.owner_id = b.id 
		LEFT JOIN 
			member_type c 
		ON 
			c.member_id = a.owner_id and c.member_type=2 
		 WHERE  
			a.status=1 ";
	$sql .= (strstr($my_owner_id_str,','))?" AND a.owner_id in(".$my_owner_id_str.")":" AND a.owner_id='".$my_owner_id_str."'";
	//echo $sql;exit;
	$num = $db->num($sql);
	$sql .=" ORDER BY a.id desc";
	//$sql .=" c.id desc LIMIT ".$pagination->get_begin().",".$pagination->perpage;
	
	$query = $db->query($sql);
	$matchArr = $db->fetch($query);
	$newMatchArr = $matchArr;
	if($matchArr){
		foreach($matchArr as $key=>$member){
			$newMatchArr[$key]['join_match_num'] = empty($member['join_match_num'])?0:$member['join_match_num'];
			$newMatchArr[$key]['my_pay_amount'] = empty($member['my_pay_amount'])?0:$member['my_pay_amount'];
			$newMatchArr[$key]['my_balance_in_owner'] = empty($member['my_balance_in_owner'])?0:$member['my_balance_in_owner'];
			
			//头像信息处理
			$avatar = empty($member['tx'])?'uploadfile/avatar.jpg':(substr($member['tx'], 0, 1) == '/' ? substr($member['tx'],1) : $member['tx']);
			$newMatchArr[$key]['avatar'] = SITE_URL.$avatar;
			
			//进度条的百分值
			$progress_value = round($member['join_match_num']*100/$member['red_packet_num']);
			$newMatchArr[$key]['progress'] = $progress_value;
			
			//房主消耗彩虹币
			$match_rule_arr = isset(MatchConfig::$arr_rule)?MatchConfig::$arr_rule:array();
			$real_amount =  isset($match_rule_arr[$member['red_packet_amount']]['real_amount'])?$match_rule_arr[$member['red_packet_amount']]['real_amount']:0;
			$commissions_per =  isset($match_rule_arr[$member['red_packet_amount']]['commissions'])?$match_rule_arr[$member['red_packet_amount']]['commissions']:0;
			$owner_pay_amount = $real_amount + $member['red_packet_amount']*$commissions_per;
			
			
			
			//赛事信息及房主信息
			$match_info_arr = array(
				'home_id' => $member['id'],
				'owner_id' => $member['owner_id'],
				'red_packet_amount' => $member['red_packet_amount'],
				'red_packet_num' => $member['red_packet_num'],
				'start_time' => $member['start_time'],
				'end_time' => $member['end_time'],
				'nickname' => $member['nickname'],
				'mobile' => $member['mobile'],
				'avatar' => $avatar,
				'friend_count' => $member['friend_count'],
				'wx_group_qrcode' => $member['wx_group_qrcode'],
				'invite_code' => $member['invite_code'],
				'join_match_num' => empty($member['join_match_num'])?0:$member['join_match_num'],//参赛人数
				'my_pay_amount' => empty($member['my_pay_amount'])?0:$member['my_pay_amount'],//该游戏我投注币
				'my_balance_in_owner' => empty($member['my_balance_in_owner'])?0:$member['my_balance_in_owner'],//我在该房主下的余额
				'owner_pay_amount' => $owner_pay_amount,//房主消耗彩虹币
				'progress' => $progress_value//进度条的百分值
			);
			//base64字符串替换字符串以便适合URL地址		
			$newMatchArr[$key]['matchs'] = strtr(base64_encode(serialize($match_info_arr)), '+/=', '-_,');		
		}
	}
}
$smarty->assign("matchArr", $newMatchArr);
$smarty->assign("title", "投注游戏屋");
$smarty->view('member/match_list_join.tpl');
?>