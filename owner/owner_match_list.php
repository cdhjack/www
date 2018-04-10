<?php
error_reporting(7);
require_once('../global.php');
//检测是否登录，且是否为相应的登录类型用户
$memberObj->member_is_login(2);
$member_owner_id = $memberObj->member_id;
$member_owner_name = $memberObj->member_name;
$member_type_name_arr = $memberObj->member_type_name_arr;

$status = isset($_POST['status'])?intval($_POST['status']):intval($_GET['status']);
$addurl = '';
$sql = "
	SELECT 
		a.id,a.owner_id,a.red_packet_amount,a.red_packet_num,a.status,a.start_time,a.end_time,b.nickname,b.mobile,b.tx,c.friend_count,
		(SELECT count(d.id) FROM match_home_member d WHERE d.home_id=a.id) as join_match_num
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
	 	a.owner_id='".$member_owner_id."'";
if($status == 1){
	$sql .= " AND a.status=1";
}
elseif($status == 2){
	$sql .= " AND a.status=2";
}
else{
	$sql .= "";
}

//echo $sql;
$num = $db->num($sql);
$sql .=" ORDER BY a.id desc";
//$sql .=" c.id desc LIMIT ".$pagination->get_begin().",".$pagination->perpage;

$query = $db->query($sql);
$matchArr = $db->fetch($query);
$newMatchArr = $matchArr;
if($matchArr){
	foreach($matchArr as $key=>$member){
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
			'join_match_num' => empty($member['join_match_num'])?0:$member['join_match_num'],//参赛人数
			'owner_pay_amount' => $owner_pay_amount,//房主消耗彩虹币
			'progress' => $progress_value//进度条的百分值
		);
		//base64字符串替换字符串以便适合URL地址		
		$newMatchArr[$key]['matchs'] = strtr(base64_encode(serialize($match_info_arr)), '+/=', '-_,');		
	}
}

//返回列表页参数值
$addurl = empty($addurl)?'':substr($addurl,1);
setcookie ('backurl', empty($addurl)?'':$addurl, 0, '/', '');

$smarty->assign("filter_search_name", $filter_search_name);
$smarty->assign("matchArr", $newMatchArr);
$smarty->assign("status", $status);
$smarty->assign("title", "我的比赛");
$smarty->view('owner/owner_match_list.tpl');
?>