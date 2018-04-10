<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 13;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode,'Edit');//功能区权限检测

$act = isset($_POST['act'])?$_POST['act']:$_GET['act'];
switch($act){	
	case 'save':
		$phone = trim($_POST['phone']);
		$phoneArr = array();
		if(!empty($phone)){
			//将中文的分号转换为英文的分号
			$phone = str_replace('；',';',$phone);
			$phoneArr = explode(';',$phone);
			//将删除数组中所有等值为 FALSE 的条目
			$phoneArr = array_filter($phoneArr);
			//数组过滤重复号码
			$phoneArr = array_unique($phoneArr);
			//print_r($phoneArr);
		}
		$content = htmlspecialchars($_POST['content']);
		$addtime = date('Y-m-d H:i:s');
		
		//验证提交信息
		$errorPhone = "";
		foreach($phoneArr as $key=>$value){
			if(!empty($value) && !preg_match('/^((1[1-9][0-9]{1})+\d{8})$/i', $value)){
				$errorPhone .= "【".$value."】";
			}
		}
		if($errorPhone!=""){
			redirectAdmin ('错误:你输入的手机号'.$errorPhone.'格式错误！', 'history.go(-1)',false);
		}
		if($content==""){
			redirectAdmin ('错误:你输入发送短信内容！', 'history.go(-1)',false);
		}
		
		
		//开始发送短信和记录日志
		$sendPhoneArr = array();
		$sendPhoneArr = $phoneArr;
		
		
		//发送短信
		//print_r($sendPhoneArr);	exit;	
		$i = 0;	
		$phoneStr = '';	
		foreach($sendPhoneArr as $key=>$value){
			if(!empty($value) && preg_match('/^((1[1-9][0-9]{1})+\d{8})$/i', $value)){
				$phoneStr .= $value.',';
				$i++;
				//发送短信
				if($i>1000){
					$phoneStr = substr($phoneStr,0,-1);
					$smsResult = sendSms($phoneStr, $content);
					if($smsResult!=100){
						redirectAdmin ("错误:发送短信失败,".$smsResult, SITE_URL.'admin/message.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);		
					}
					
					$i = 0;	
					$phoneStr = '';
				}				
			}
		}
		if($i>0){
			$phoneStr = substr($phoneStr,0,-1);
			$smsResult = sendSms($phoneStr, $content);
		}
		
		//写发送短信日志
		if($smsResult==100){
			//print_r($sendPhoneArr);	exit;			
			foreach($sendPhoneArr as $key=>$value){
				if(!empty($value) && preg_match('/^((1[1-9][0-9]{1})+\d{8})$/i', $value)){
					$smsContent = date('Y-m-d H:i:s').' - sender:【'.($admin->u_name).'】;phone:【'.$value.'】;contnet:【'.$content.'】';
					//echo $smsContent.'<br>';
					writeSmsLog($smsContent,'messagesms');
				}
			}
		}
		else{
			redirectAdmin ("错误:发送短信失败,".$smsResult, SITE_URL.'admin/message.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);		
		}
		$msgInfo = "向手机号:".implode('、',$sendPhoneArr)."回复短信成功!";
		redirectAdmin ($msgInfo, SITE_URL.'admin/message.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);		
		break;
	case 'delete':
		if (isset($_POST['selected']) && !empty($_POST['selected'])) {
			$selectedId = (count($_POST ['selected'])>1)?implode ( ",", $_POST ['selected'] ):$_POST ['selected'][0];
			$condition = (strstr($selectedId,','))?"id in(".$selectedId.")":"id='".$selectedId."'";
			$db->query("DELETE FROM appmeta WHERE ".$condition);
			$msgInfo = "删除选中的信息成功!";
		}
		else{
			$msgInfo = "错误:请您先选择要删除的信息！";
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/message.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		break;
	case 'deleteone':
		$id = isset($_POST["id"])?(int)$_POST["id"]:(int)$_GET["id"];		
		if ($id) {			
			$condition = "id='".$id."'";
			$db->query("DELETE FROM appmeta WHERE ".$condition);
			$msgInfo = "删除信息成功!";
		}
		else{
			$msgInfo = "错误:请您先选择要删除的信息！";
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/message.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		break;	
	default:
		redirectAdmin ('IllegalError', SITE_URL.'admin/message.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']));
		break;
}



?>