<?php
error_reporting(7);
require_once('../global.php');
//检测是否登录，且是否为相应的登录类型用户
$memberObj->member_is_login(2);
$member_owner_id = $memberObj->member_id;
$member_owner_name = $memberObj->member_name;
$member_type_name_arr = $memberObj->member_type_name_arr;


//获取赛事及房主相关信息
/*$match_info_arr = array(
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
);*/
$matchs = isset($_POST["matchs"])?$_POST["matchs"]:$_GET["matchs"];
$matchs = strtr($matchs, '-_,', '+/=');
$matchs_base64_decode = base64_decode($matchs);
$matchs_unserialize = $matchs_base64_decode?unserialize($matchs_base64_decode):array();
$match_arr = empty($matchs_unserialize)?array():$matchs_unserialize;

$home_id = (isset($match_arr['home_id']) && !empty($match_arr['home_id']))?intval($match_arr['home_id']):0;
$red_packet_num = (isset($match_arr['red_packet_num']) && !empty($match_arr['red_packet_num']))?intval($match_arr['red_packet_num']):0;
if($member_owner_id != $match_arr['owner_id'] || !$home_id){
	echo '非法参数';
	exit;
}


//查询比寒房间玩家参赛信息
$sql = "SELECT a.id,a.home_id,a.owner_id,a.member_id,a.pay_amount,a.win_amount,a.add_time,b.tx,b.nickname,b.mobile FROM match_home_member a LEFT JOIN member b ON a.member_id=b.id WHERE a.home_id='".$home_id."' AND a.owner_id='".$member_owner_id."' ORDER BY a.win_amount DESC,a.id DESC";
//echo $sql;exit;
$query = $db->query($sql);
$match_member_arr = $db->fetch($query);
$member_pay_amount = 0;
$new_match_member_arr = $match_member_arr;
$match_member_result_arr = array();//开赛结果
if($match_member_arr){
	foreach($match_member_arr as $key=>$member){
		$member_pay_amount = $member_pay_amount + $member['pay_amount'];
		
		//头像信息处理
		$avatar = empty($member['tx'])?'uploadfile/avatar.jpg':(substr($member['tx'], 0, 1) == '/' ? substr($member['tx'],1) : $member['tx']);
		$new_match_member_arr[$key]['avatar'] = SITE_URL.$avatar;
		
		//一行五个头像，第一排第一个添加样式class="margin0"
		$new_match_member_arr[$key]['style'] = ($key%5==0)?'class="margin0"':'';
		
		//开赛结果
		if($member['win_amount']>0){
			$match_member_result_arr[$key] = $member;		
		}
	}
}
//echo '<pre>';print_r($new_match_member_arr);
//剩下的未投注的彩虹包
$match_member_count = count($match_member_arr);
$match_nomember_count = ($red_packet_num - $match_member_count)<0?0:($red_packet_num - $match_member_count);
//echo '<br>'.$match_nomember_count;
$match_nomember_arr = array();
if($match_nomember_count>0){
	for($i=0;$i<$match_nomember_count;$i++){
		$position = $match_member_count + $i;
		$match_nomember_arr[$i] = ($position%5==0)?'class="margin0"':'';
	}
}

$smarty->assign("title", "赛事信息");
$smarty->assign("match_arr", $match_arr);
$smarty->assign("match_member_arr", $new_match_member_arr);
$smarty->assign("match_nomember_arr", $match_nomember_arr);
$smarty->assign("$match_member_result_arr", $match_member_result_arr);
$smarty->assign("member_pay_amount", $member_pay_amount);
$smarty->view('owner/owner_match_detail.tpl');
?>