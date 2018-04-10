<?php
error_reporting(7);
require_once('../global.php');
//检测是否登录，且是否为相应的登录类型用户
$memberObj->member_is_login(3);
$member_agent_id = $memberObj->member_id;
$member_agent_name = $memberObj->member_name;
$member_type_name_arr = $memberObj->member_type_name_arr;


$result['REV'] = 0;
//添加房主
$nickname = trim($_POST['nickname']);
$mobile = trim($_POST['mobile']);		
$identity_1 = trim($_POST['identity_1']);
$identity_base_64 = trim($_POST['identity_base_64']);
//echo '<pre>';
//print_r($_POST["identity_base_64"]);exit;
if(empty($nickname)){
	$result['MSG'] = '请输入房主名';
	$result['INPUTID'] = 'nickname';
	echo json_encode($result);exit;	
}
if(empty($mobile)){
	$result['MSG'] = '请输入房主手机号码';
	$result['INPUTID'] = 'mobile';
	echo json_encode($result);exit;	
}
//echo $mobile;exit;
if(!empty($mobile) && !preg_match('/(^((1[1-9][0-9]{1})+\d{8})$)/i', $mobile)){
	$result['MSG'] = '手机号格式错误';
	$result['INPUTID'] = 'mobile';
	echo json_encode($result);exit;	
}		
if(empty($identity_1)){
	$result['MSG'] = '请输入身份证号码';
	$result['INPUTID'] = 'identity_1';
	echo json_encode($result);exit;	
}
if(empty($identity_base_64)){
	$result['MSG'] = '请上传手持身份证图片';
	$result['INPUTID'] = 'identity_2';
	echo json_encode($result);exit;	
}

//判断手机号是否已注册，且该手机号用户存在房主身份，且与代理商建立了关系表，则提示该房主您已添加
$num = $db->num("SELECT a.id FROM member a,member_type b,member_agent c WHERE a.id=b.member_id and b.member_type=2 and a.mobile='".$mobile."' and a.id=c.member_id and c.member_agent_id='".$member_agent_id."'");
if($num){
	$result['MSG'] = '该房主您已经添加过,不需重复添加';
	$result['INPUTID'] = 'mobile';
	echo json_encode($result);exit;	
}

//查询手机号是否已注册
$query1 = true;
$r = $db->fetchRow ("select id,mobile,status,nickname,identity from member where mobile='".$mobile."' limit 1");
$member_id = isset($r['id'])?$r['id']:0;
$passwd_1 = '';
if($member_id){	
	$sql_set = "";
	//如果添加的房主用户已存在，且昵称已存在，则不更新
	if(isset($r['nickname']) && !empty($r['nickname'])){
		$sql_set .= "";
	}
	else{
		$sql_set .= " nickname='".$nickname."',";
	}
	//如果添加的房主用户已存在，且身份证号已存在，则不更新
	if(isset($r['identity']) && !empty($r['identity'])){
		$sql_set .= "";
	}
	else{
		$sql_set .= "identity='".$identity_1."',";
	}
	if(!empty($sql_set)){
		$sql = "UPDATE member set";
		$sql .= substr($sql_set,0,-1)." where id='".$member_id."'";
		
		//更新member主表
		$query1 = $db->query($sql);
	}
}
else{	
	$passwd_1 = substr(sha1(mt_rand()), 17, 8);//8位随机密码
	$LoginIP = getIP();
	$AddTime = time();
	
	//会员信息表入库
	$query1 = $db->query("INSERT INTO member(`mobile`,`nickname`,`pwd`,`identity`,`reg_time`,`login_time`,`login_ip`,`status`) VALUES('".$mobile."','".$nickname."','".md5($passwd_1)."','".$identity_1."','".$AddTime."','".$AddTime."','".$LoginIP."',1);");
	$member_id = $db->getLastId();
}

//会员信息附属表入库处理
$query2 = true;
if($identity_base_64){	
	//手持身份证照片处理
	$tmp_data = urldecode($identity_base_64);
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
	$filename = 'identity_hand_pic.png';//文件名:手持身份证照片，重复上传覆盖
	$file_path = SYS_ROOT . 'uploadfile' . DIRECTORY_SEPARATOR;
	//创建房主子目录
	$file_path = $file_path . 'owner' . DIRECTORY_SEPARATOR;
	if (!file_exists($file_path)) {
		@mkdir($file_path);
	}
	//创建房主id子目录
	$file_path = $file_path . $member_id . DIRECTORY_SEPARATOR;
	if (!file_exists($file_path)) {
		@mkdir($file_path);
	}
	//开始写图片文件	
	if(!file_put_contents($file_path.$filename,$tmp_data)){				
		$query2 = false;
	}
	else{
		$identity_pic = 'uploadfile/owner/'.$member_id.'/'.$filename;
		//查询该用户是否有附属表信息记录
		$r = $db->fetchRow ("select id,identity_pic from member_info where member_id='".$member_id."' limit 1");
		$member_info_id = isset($r['id'])?$r['id']:0;
		if($member_info_id){
			//如果添加的房主用户已存在，且手持身份证照片已存在，则不更新
			if(isset($r['identity_pic']) && !empty($r['identity_pic'])){
				
			}
			else{
				//更新member_info表
				$query2 = $db->query("UPDATE member_info set identity_pic='".$identity_pic."' where id='".$member_info_id."'");
			}
		}
		else{
			$AddTime = time();
			
			//member_info表入库
			$query2 = $db->query("INSERT INTO member_info(`member_id`,`identity_pic`,`add_time`) VALUES('".$member_id."','".$identity_pic."','".$AddTime."')");
		}
	}
}

//会员类型表入库处理（判断用户是否有房主类型记录）
$query3 = true;
$r = $db->fetchRow ("select id from member_type where member_id='".$member_id."' and member_type=2 limit 1");
$member_type_id = isset($r['id'])?$r['id']:0;
$invite_code = substr(sha1(mt_rand()), 17, 6);//6位随机邀请码
if($member_type_id){
	//更新member_type表
	//$query3 = $db->query("UPDATE member_type set invite_code='".$invite_code."' where id='".$member_type_id."'");
}
else{
	$AddTime = time();
	
	//member_type表入库
	$query3 = $db->query("INSERT INTO member_type(`member_id`,`member_type`,`invite_code`,`add_time`) VALUES('".$member_id."',2,'".$invite_code."','".$AddTime."')");
}


//代理商与房主关系表member_agent入库处理,代理商下线数量更新
$query4 = true;
$query5 = true;
$r = $db->fetchRow ("select id from member_agent where member_id='".$member_id."' and member_agent_id='".$member_agent_id."' limit 1");
$member_agent_relation_id = isset($r['id'])?$r['id']:0;
if($member_agent_relation_id){
	//更新member_agent表
	//$query4 = $db->query("UPDATE member_agent set member_id='".$member_id."',member_agent_id='".$member_agent_id."' where id='".$member_agent_relation_id."'");
}
else{
	$AddTime = time();
	
	//member_agent表入库
	$query4 = $db->query("INSERT INTO member_agent(`member_id`,`member_agent_id`,`balance`,`add_time`) VALUES('".$member_id."','".$member_agent_id."',0,'".$AddTime."')");
	//代理商下线数量更新
	$query5 = $db->query("UPDATE member_type set friend_count=friend_count+1 where member_id='".$member_agent_id."' and member_type=3");
	
}


if($query1 && $query2 && $query3 && $query4 && $query5){
	$result['REV'] = 1;
	$result['MSG'] = empty($passwd_1)?'恭喜,添加房主成功!':'恭喜,添加房主成功,该房主的初始密码为:"'.$passwd_1.'"!';
}
else{
	/*echo 'query1:<br>';
	print_r($query1);
	echo 'query2:<br>';
	print_r($query2);
	echo 'query3:<br>';
	print_r($query3);*/
	
	$result['INPUTID'] = 'identity_2';
	$result['MSG'] = '抱歉,添加房主失败,请重试!';
}
echo json_encode($result);exit;
?>