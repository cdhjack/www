<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 13;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode);//功能区权限检测
$smarty->assign("title", "意见反馈");

$breadcrumbs = array();
$breadcrumbs[] = array(
	'text'      => '首页',
	'href'      => SITE_URL.'admin',
	'separator' => false
);

$breadcrumbs[] = array(
	'text'      => '意见反馈',
	'href'      => SITE_URL.'admin/message.php',
	'separator' => ' :: '
);
$smarty->assign("breadcrumbs", $breadcrumbs);

$act = isset($_POST['act'])?$_POST['act']:$_GET['act'];
$sendPhoneArr = array();
if($act=='smsone'){//单个手机发短信
	$id = isset($_POST["id"])?(int)$_POST["id"]:(int)$_GET["id"];
	$sql = "SELECT id,i_value,i_reserved_1,i_reserved_2,i_datetime FROM appmeta WHERE id='".$id."'";
	$messageInfo = $db->fetchRow($sql);	
	if(!empty($messageInfo['i_reserved_2'])){
		$sendPhoneArr[] = $messageInfo['i_reserved_2'];
	}
}
elseif($act=='sms'){//多个手机发送短信
	if (isset($_POST['selected']) && !empty($_POST['selected'])) {
		$selectedId = (count($_POST ['selected'])>1)?implode ( ",", $_POST ['selected'] ):$_POST ['selected'][0];
		$condition = (strstr($selectedId,','))?"id in(".$selectedId.")":"id='".$selectedId."'";
		$sql = "SELECT id,i_value,i_reserved_1,i_reserved_2,i_datetime FROM appmeta WHERE ".$condition;
		$query = $db->query($sql);
		$messageArr = $db->fetch($query);
		if(!empty($messageArr)){
			foreach($messageArr as $key=>$value){
				if(!empty($value['i_reserved_2'])){
					$sendPhoneArr[] = $value['i_reserved_2'];
				}
			}
		}
	}
	else{
		redirectAdmin ("错误:请您先选择要回复短信的信息！", SITE_URL.'admin/message.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
	}
}

//将删除数组中所有等值为 FALSE 的条目
$sendPhoneArr = array_filter($sendPhoneArr);
//数组过滤重复号码
$sendPhoneArr = array_unique($sendPhoneArr);
$smarty->assign("sendPhone", (count($sendPhoneArr)>1)?implode ( ";", $sendPhoneArr ):$sendPhoneArr[0]);
$smarty->view('messagesms_form.tpl');
?>