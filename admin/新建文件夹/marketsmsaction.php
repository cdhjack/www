<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 10;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode,'Edit');//功能区权限检测

$act = isset($_POST['act'])?$_POST['act']:$_GET['act'];
switch($act){
	case 'save':
		$user_type = $_POST["user_type"];
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
		if($user_type==''){
			redirectAdmin ('错误:请选择用户类型！', 'history.go(-1)',false);
		}		
		if($user_type=='new' && empty($phoneArr)){
			redirectAdmin ('错误:请填写手机号码！', 'history.go(-1)',false);
		}
		if($user_type=='new' && !empty($phoneArr)){
			$errorPhone = "";
			foreach($phoneArr as $key=>$value){
				if(!empty($value) && !preg_match('/^((1[1-9][0-9]{1})+\d{8})$/i', $value)){
					$errorPhone .= "【".$value."】";
				}
			}
			if($errorPhone!=""){
				redirectAdmin ('错误:你输入的手机号'.$errorPhone.'格式错误！', 'history.go(-1)',false);
			}
		}
		
		
		//开始发送短信和记录日志
		$sendPhoneArr = array();
		switch($user_type){
			case 'new'://输入的手机号码
				$sendPhoneArr = $phoneArr;
				break;
			case 'user'://个人用户
				//获取个人用户
				$query = $db->query("SELECT id,name,rname,phone FROM user");
				$userArr = $db->fetch($query);
				foreach($userArr as $key=>$value){
					$sendPhoneArr[] = $value['phone'];
				}
				//将删除数组中所有等值为 FALSE 的条目
				$sendPhoneArr = array_filter($sendPhoneArr);
				//数组过滤重复号码
				$sendPhoneArr = array_unique($sendPhoneArr);
				break;
			case 'coach'://教练用户
				//获取教练用户
				$query = $db->query("SELECT id,name,rname,phone FROM coach");
				$coachArr = $db->fetch($query);
				foreach($coachArr as $key=>$value){
					$sendPhoneArr[] = $value['phone'];
				}
				//将删除数组中所有等值为 FALSE 的条目
				$sendPhoneArr = array_filter($sendPhoneArr);
				//数组过滤重复号码
				$sendPhoneArr = array_unique($sendPhoneArr);
				break;
			case 'all'://所有用户
				//获取个人用户
				$query = $db->query("SELECT id,name,rname,phone FROM user");
				$userArr = $db->fetch($query);
				//获取教练用户
				$query = $db->query("SELECT id,name,rname,phone FROM coach");
				$coachArr = $db->fetch($query);
				
				foreach($userArr as $key=>$value){
					$sendPhoneArr[] = $value['phone'];
				}
				
				foreach($coachArr as $key=>$value){
					$sendPhoneArr[] = $value['phone'];
				}	
				//将删除数组中所有等值为 FALSE 的条目
				$sendPhoneArr = array_filter($sendPhoneArr);
				//数组过滤重复号码
				$sendPhoneArr = array_unique($sendPhoneArr);
				break;
			default:
				break;
		}
		
		

		
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
						redirectAdmin ("错误:发送短信失败,".$smsResult, SITE_URL.'admin/marketsms.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);		
					}
					
					$i = 0;	
					$phoneStr = '';
				}				
			}
		}
		if($i>0){			
			$phoneStr = substr($phoneStr,0,-1);
			//echo $phoneStr;exit;
			$smsResult = sendSms($phoneStr, $content);
		}
		
		//记录发送短信日志
		//echo $smsResult;exit;
		if($smsResult==100){
			foreach($sendPhoneArr as $key=>$value){
				if(!empty($value) && preg_match('/^((1[1-9][0-9]{1})+\d{8})$/i', $value)){
					$smsContent = date('Y-m-d H:i:s').' - sender:【'.($admin->u_name).'】;phone:【'.$value.'】;contnet:【'.$content.'】';
					//echo $smsContent.'<br>';
					writeSmsLog($smsContent,'marketsms');
				}
			}
		}
		else{
			redirectAdmin ("错误:发送短信失败,".$smsResult, SITE_URL.'admin/marketsms.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);		
		}
		
		switch($user_type){
			case 'new'://输入的手机号码
				$userTypeName = "输入手机号:".implode('、',$sendPhoneArr);
				break;
			case 'user'://个人用户
				$userTypeName = "个人用户";
				break;
			case 'coach'://教练用户
				$userTypeName = "教练用户";
				break;
			case 'all'://所有用户
				$userTypeName = "所有用户";
				break;
			default:
				break;
		}
		$msgInfo = "向".$userTypeName."发送短信成功!";
		redirectAdmin ($msgInfo, SITE_URL.'admin/marketsms.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);		
		break;
	default:
		redirectAdmin ('IllegalError', SITE_URL.'admin/marketsms.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']));
		break;
}


?>