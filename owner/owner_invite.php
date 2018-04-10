<?php
error_reporting(7);
require_once('../global.php');
//检测是否登录，且是否为相应的登录类型用户
$memberObj->member_is_login(2);
$member_owner_id = $memberObj->member_id;
$member_owner_name = $memberObj->member_name;
$member_type_name_arr = $memberObj->member_type_name_arr;

$code = isset($_POST["code"])?$_POST["code"]:$_GET["code"];
$code_arr = array();
for($i=0;$i<strlen($code);$i++){
    //$code_arr[$i] = $code[$i];
	$code_arr[$i] = substr($code,$i,1);
}
//echo '<pre>';
//print_r($code_arr);
$smarty->assign("code_arr", $code_arr);
$smarty->assign("title", "房主");
$smarty->view('owner/owner_invite.tpl');
?>