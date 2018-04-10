<?php
error_reporting(7);
require_once('../global.php');
//检测是否登录，且是否为相应的登录类型用户
$memberObj->member_is_login(2);
$member_owner_id = $memberObj->member_id;
$member_owner_name = $memberObj->member_name;
$member_type_name_arr = $memberObj->member_type_name_arr;

//查询值
$filter_search_name = isset($_POST["filter_search_name"])?$_POST["filter_search_name"]:$_GET["filter_search_name"];
$filter_mobile = "";
$filter_nickname = "";

//判断查询内容是否是手机号
if(!empty($filter_search_name)){
	if(!preg_match('/(^((1[1-9][0-9]{1})+\d{8})$)/i', $filter_search_name)){
		$filter_nickname = $filter_search_name;
	}
	else{
		$filter_mobile = $filter_search_name;
	}
}

$addurl = '';
$sql = "
	SELECT 
		a.id,a.mobile,a.status,a.nickname,a.identity,a.reg_time,a.tx,b.friend_count,c.balance,d.identity_pic 
	FROM 
		member_owner c 
	LEFT JOIN 
		member a 
	ON 
		c.member_id = a.id 
	LEFT JOIN 
		member_type b 
	ON 
		c.member_id = b.member_id and b.member_type=1  
	LEFT JOIN 
		member_info d
	ON
		c.member_id = d.member_id 
	 WHERE  
	 	c.member_owner_id='".$member_owner_id."'";
if(!empty($filter_mobile)){
	$sql .=" and a.mobile='".$filter_mobile."' ";
	$addurl .='&filter_search_name='.$filter_search_name;
}
if(!empty($filter_nickname)){
	$sql .=" and a.nickname like '%".$filter_nickname."%' ";
	$addurl .='&filter_search_name='.$filter_search_name;
}

//echo $sql;
$num = $db->num($sql);
$sql .=" ORDER BY c.id desc";
//$sql .=" c.id desc LIMIT ".$pagination->get_begin().",".$pagination->perpage;

$query = $db->query($sql);
$memberArr = $db->fetch($query);
$newMemberArr = $memberArr;
if($memberArr){
	foreach($memberArr as $key=>$member){
		//头像信息处理
		$avatar = empty($member['tx'])?'uploadfile/avatar.jpg':(substr($member['tx'], 0, 1) == '/' ? substr($member['tx'],1) : $member['tx']);
		$newMemberArr[$key]['avatar'] = SITE_URL.$avatar;
		
		//玩家充值页面参数信息（玩家id、房主头像、房主昵称）
		$recharge_owner_arr = array(
			'member_id' => $member['id'],
			'avatar' => SITE_URL.$avatar,
			'nickname' => $member['nickname']
		);
		//base64字符串替换字符串以便适合URL地址		
		$newMemberArr[$key]['member_recharge'] = strtr(base64_encode(serialize($recharge_owner_arr)), '+/=', '-_,');
		
		//玩家信息详细页面内容（玩家手机号、昵称、身份证、身份证或手持身份证照片、玩家在该房主下的币数、注册时间）
		$owner_info_arr = array(
			'member_id' => $member['id'],
			'mobile' => $member['mobile'],
			'nickname' => $member['nickname'],
			'balance' => $member['balance'],
			//'friend_count' => $member['friend_count'],
			'identity' => $member['identity'],
			'identity_pic' => $member['identity_pic'],
			'reg_time' => $member['reg_time']
		);
		//base64字符串替换字符串以便适合URL地址		
		$newMemberArr[$key]['member_detail'] = strtr(base64_encode(serialize($owner_info_arr)), '+/=', '-_,');
	}
}

//返回列表页参数值
$addurl = empty($addurl)?'':substr($addurl,1);
setcookie ('backurl', empty($addurl)?'':$addurl, 0, '/', '');

$smarty->assign("filter_search_name", $filter_search_name);
$smarty->assign("memberArr", $newMemberArr);
$smarty->assign("title", "我的玩家");
$smarty->view('owner/member_list.tpl');
?>