<?php
error_reporting(7);
require_once('../global.php');
//检测是否登录，且是否为相应的登录类型用户
$memberObj->member_is_login(1);
$member_id = $memberObj->member_id;
$member_name = $memberObj->member_name;
$member_type_name_arr = $memberObj->member_type_name_arr;


$result['REV'] = 0;
//修改玩家信息
$nickname = trim($_POST['nickname']);
$identity_1 = trim($_POST['identity_1']);
$tx_base_64 = trim($_POST['tx_base_64']);
$identity_2_base_64 = trim($_POST['identity_2_base_64']);
$wx_pay_qrcode_base_64 = trim($_POST['wx_pay_qrcode_base_64']);
//$wx_group_qrcode_base_64 = trim($_POST['wx_group_qrcode_base_64']);
//echo '<pre>';
//print_r($_POST["identity_2_base_64"]);exit;
if(empty($nickname)){
	$result['MSG'] = '请输入您的名称';
	$result['INPUTID'] = 'nickname';
	echo json_encode($result);exit;	
}
if(empty($identity_1)){
	$result['MSG'] = '请输入您的身份证号码';
	$result['INPUTID'] = 'identity_1';
	echo json_encode($result);exit;	
}
/*if(empty($identity_2_base_64)){
	$result['MSG'] = '请上传手持身份证图片';
	$result['INPUTID'] = 'identity_2';
	echo json_encode($result);exit;	
}*/

//会员信息表更新
$query1 = true;
if($tx_base_64){	
	//手持身份证照片处理
	$tmp_data = urldecode($tx_base_64);
	//判断是否是canvas的base64图流上传（png文件）
	$pos = strpos($tmp_data, "data:image/png;base64,");
	if ($pos !== false) {
		//去掉22个无用的字符即： "data:image/png;base64,"				
		//$tmp_data = substr($tmp_data,22);
		$tmp_data = str_replace('data:image/png;base64,', '', $tmp_data);
		$tmp_data = str_replace(' ', '+', $tmp_data);
		$tmp_data = base64_decode($tmp_data);				
	}
	
	//$filename = md5(uniqid(mt_rand())).'.png';//文件名
	$filename = 'head_pic.png';//文件名:头像照片，重复上传覆盖
	$file_path = SYS_ROOT . 'uploadfile' . DIRECTORY_SEPARATOR;
	//创建玩家子目录
	$file_path = $file_path . 'member' . DIRECTORY_SEPARATOR;
	if (!file_exists($file_path)) {
		@mkdir($file_path);
	}
	//创建玩家id子目录
	$file_path = $file_path . $member_id . DIRECTORY_SEPARATOR;
	if (!file_exists($file_path)) {
		@mkdir($file_path);
	}
	//开始写图片文件	
	if(!file_put_contents($file_path.$filename,$tmp_data)){				
		$query1 = false;
	}
	else{
		$tx_pic = 'uploadfile/member/'.$member_id.'/'.$filename;
		$query1 = $db->query("UPDATE member set nickname='".$nickname."',identity='".$identity_1."',tx='".$tx_pic."' where id='".$member_id."'");
	}
}

//会员信息附属表入库处理
$query2 = true;
if($identity_2_base_64 || $wx_pay_qrcode_base_64){	
	$tmp_data = "";
	if($identity_2_base_64){
		//手持身份证照片处理
		$tmp_data = urldecode($identity_2_base_64);
		//判断是否是canvas的base64图流上传（png文件）
		$pos = strpos($tmp_data, "data:image/png;base64,");
		if ($pos !== false) {
			//去掉22个无用的字符即： "data:image/png;base64,"				
			//$tmp_data = substr($tmp_data,22);
			$tmp_data = str_replace('data:image/png;base64,', '', $tmp_data);
			$tmp_data = str_replace(' ', '+', $tmp_data);
			$tmp_data = base64_decode($tmp_data);				
		}
	}
	
	$tmp_data2 = "";
	if($wx_pay_qrcode_base_64){
		//微信收款二维码图片照片处理
		$tmp_data2 = urldecode($wx_pay_qrcode_base_64);
		//判断是否是canvas的base64图流上传（png文件）
		$pos = strpos($tmp_data2, "data:image/png;base64,");
		if ($pos !== false) {
			//去掉22个无用的字符即： "data:image/png;base64,"				
			//$tmp_data2 = substr($tmp_data2,22);
			$tmp_data2 = str_replace('data:image/png;base64,', '', $tmp_data2);
			$tmp_data2 = str_replace(' ', '+', $tmp_data2);
			$tmp_data2 = base64_decode($tmp_data2);				
		}
	}
	
	//$filename = md5(uniqid(mt_rand())).'.png';//文件名
	$filename = 'identity_hand_pic.png';//文件名:手持身份证照片，重复上传覆盖
	$filename2 = 'wx_pay_qrcode_pic.png';//文件名:微信收款二维码图片照片，重复上传覆盖
	$file_path = SYS_ROOT . 'uploadfile' . DIRECTORY_SEPARATOR;
	//创建玩家子目录
	$file_path = $file_path . 'member' . DIRECTORY_SEPARATOR;
	if (!file_exists($file_path)) {
		@mkdir($file_path);
	}
	//创建玩家id子目录
	$file_path = $file_path . $member_id . DIRECTORY_SEPARATOR;
	if (!file_exists($file_path)) {
		@mkdir($file_path);
	}
	//开始写图片文件	
	if(!empty($tmp_data) && !file_put_contents($file_path.$filename,$tmp_data)){				
		$query2 = false;
	}
	else if(!empty($tmp_data2) && !file_put_contents($file_path.$filename2,$tmp_data2)){
		$query2 = false;
	}
	else{
		$identity_pic = !empty($tmp_data)?'uploadfile/member/'.$member_id.'/'.$filename:'';
		$wx_pay_qrcode = !empty($tmp_data2)?'uploadfile/member/'.$member_id.'/'.$filename2:'';
		
		//查询该用户是否有附属表信息记录
		$r = $db->fetchRow ("select id,identity_pic,wx_pay_qrcode from member_info where member_id='".$member_id."' limit 1");
		$member_info_id = isset($r['id'])?$r['id']:0;
		if($member_info_id){
			//更新member_info表
			$query2 = $db->query("UPDATE member_info set identity_pic='".$identity_pic."',wx_pay_qrcode='".$wx_pay_qrcode."' where id='".$member_info_id."'");
		}
		else{
			$AddTime = time();
			
			//member_info表入库
			$query2 = $db->query("INSERT INTO member_info(`member_id`,`identity_pic`,`wx_pay_qrcode`,`add_time`) VALUES('".$member_id."','".$identity_pic."','".$wx_pay_qrcode."','".$AddTime."')");
		}
	}
}

/*/会员类型表更新处理
$query3 = true;
if($wx_group_qrcode_base_64){	
	//微信群二维码图片处理
	$tmp_data = urldecode($wx_group_qrcode_base_64);
	//判断是否是canvas的base64图流上传（png文件）
	$pos = strpos($tmp_data, "data:image/png;base64,");
	if ($pos !== false) {
		//去掉22个无用的字符即： "data:image/png;base64,"				
		//$tmp_data = substr($tmp_data,22);
		$tmp_data = str_replace('data:image/png;base64,', '', $tmp_data);
		$tmp_data = str_replace(' ', '+', $tmp_data);
		$tmp_data = base64_decode($tmp_data);				
	}
	
	//$filename = md5(uniqid(mt_rand())).'.png';//文件名
	$filename = 'wx_group_qrcode_pic.png';//文件名:微信群二维码图片，重复上传覆盖
	$file_path = SYS_ROOT . 'uploadfile' . DIRECTORY_SEPARATOR;
	//创建玩家子目录
	$file_path = $file_path . 'member' . DIRECTORY_SEPARATOR;
	if (!file_exists($file_path)) {
		@mkdir($file_path);
	}
	//创建玩家id子目录
	$file_path = $file_path . $member_id . DIRECTORY_SEPARATOR;
	if (!file_exists($file_path)) {
		@mkdir($file_path);
	}
	//开始写图片文件	
	if(!file_put_contents($file_path.$filename,$tmp_data)){				
		$query3 = false;
	}
	else{
		$wx_group_qrcode = 'uploadfile/member/'.$member_id.'/'.$filename;
		//echo "UPDATE member_type set wx_group_qrcode='".$wx_group_qrcode."' where id='".$member_id."' and member_type=1";exit;
		$query3 = $db->query("UPDATE member_type set wx_group_qrcode='".$wx_group_qrcode."' where member_id='".$member_id."' and member_type=1");
	}
}*/

if($query1 && $query2){
	$result['REV'] = 1;
	$result['MSG'] = '您的信息修改成功!';
}
else{
	$result['INPUTID'] = 'nickname';
	$result['MSG'] = '抱歉,您的信息修改失败,请重试!';
}
echo json_encode($result);exit;
?>