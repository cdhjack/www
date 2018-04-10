<?php
error_reporting(7);
require_once('../global.php');
$result['REV'] = 0;
$result['INPUTID'] = 'mobile';
//检测是否登录，且是否为相应的登录类型用户
$res = $memberObj->ajax_member_is_login(2);
if(!$res['REV']){
	//$result['MSG'] = $res['MSG'];
	$result['MSG'] = '登录信息异常操作失败,请刷新页面';
	echo json_encode($result);exit;	
}
$member_owner_id = $memberObj->member_id;
$member_owner_name = $memberObj->member_name;
$member_type_name_arr = $memberObj->member_type_name_arr;

$mobile = trim($_POST['mobile']);
//手机帐号检查	
if(empty($mobile)){
	$result['MSG'] = '请输入玩家手机号码';
	echo json_encode($result);exit;	
}
//echo $mobile;exit;
if(!empty($mobile) && !preg_match('/(^((1[1-9][0-9]{1})+\d{8})$)/i', $mobile)){
	$result['MSG'] = '手机号格式错误';
	echo json_encode($result);exit;	
}

//判断手机号是否已注册，且该手机号用户存在玩家身份，且与房主建立了关系表，则提示该玩家您已添加
$num = $db->num("SELECT a.id FROM member a,member_type b,member_owner c WHERE a.id=b.member_id and b.member_type=1 and a.mobile='".$mobile."' and a.id=c.member_id and c.member_owner_id='".$member_owner_id."'");
if($num){
	$result['MSG'] = '该玩家您已经添加过,不需重复添加';
	echo json_encode($result);exit;	
}
else{
	//查询手机号是否已注册	
	$r = $db->fetchRow ("select id,mobile,status,nickname,identity from member where mobile='".$mobile."' limit 1");
	$result['REV'] = 1;
	$result['DATA'] = array(
		"nickname"=>(isset($r['nickname']) && !empty($r['nickname']))?$r['nickname']:'',
		"identity"=>(isset($r['identity']) && !empty($r['identity']))?$r['identity']:''
	);	
	echo json_encode($result);exit;
}
?>