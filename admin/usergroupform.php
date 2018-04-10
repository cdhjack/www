<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 4;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode);//功能区权限检测
$smarty->assign("title", "用户群组");

$breadcrumbs = array();
$breadcrumbs[] = array(
	'text'      => '首页',
	'href'      => SITE_URL.'admin',
	'separator' => false
);

$breadcrumbs[] = array(
	'text'      => '用户群组',
	'href'      => SITE_URL.'admin/usergroup.php',
	'separator' => ' :: '
);
$smarty->assign("breadcrumbs", $breadcrumbs);

$id = isset($_POST["id"])?(int)$_POST["id"]:(int)$_GET["id"];
$userGroupInfo = array();
if($id){
	$sql = "SELECT ID,Name FROM `group` WHERE ID='".$id."'";
	$userGroupInfo = $db->fetchRow($sql);	
}


//获取该用户组功能设置
$viewCodeStr = "";
$editCodeStr = "";
$query = $db->query("SELECT Code,View,Edit FROM power WHERE GroupID='".$id."'");
while($r = $db->fetchRows($query)){
	if($r['View']==1){
		$viewCodeStr .= $r['Code']."|";
	}
	if($r['Edit']==1){
		$editCodeStr .= $r['Code']."|";
	}				
}


//权限设置
require_once(SYS_ROOT . 'config/power_config.inc.php');
$viewPowerArr = array();
$editPowerArr = array();
foreach ($power_arr as $power){
	$isView = checkObject($viewCodeStr,$power['code']);
	$isEdit = checkObject($editCodeStr,$power['code']);
	
	$viewPowerArr[] = array('code'=>$power['code'],'name'=>$power['name'],'checked'=>$isView);
	$editPowerArr[] = array('code'=>$power['code'],'name'=>$power['name'],'checked'=>$isEdit);
}

$smarty->assign("backUrl", empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']);
$smarty->assign("userGroupInfo", $userGroupInfo);
$smarty->assign("viewPowerArr", $viewPowerArr);
$smarty->assign("editPowerArr", $editPowerArr);
$smarty->view('usergroup_form.tpl');
?>