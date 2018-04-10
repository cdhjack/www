<?php
//error_reporting(7);
require_once('global.php');

$admin->u_is_login();
$smarty->assign("title", "管理首页");


if (function_exists('ini_get')){
	$onoff = ini_get('register_globals');
	$upload = ini_get('file_uploads');
	$upload_max_filesize = ini_get('upload_max_filesize');
}
else {
	$onoff = get_cfg_var('register_globals');
	$upload = get_cfg_var('file_uploads');
	$upload_max_filesize = get_cfg_var('upload_max_filesize');
}

//查询sql
$sqlUserReg = "SELECT count(id) as num FROM member";
$newsClassNum = $db->num("SELECT ID FROM NewsClass");
$newsNum = $db->num("SELECT ID FROM News");
/*/要求审核过的教练
$sqlCoachReg = "SELECT count(id) as num FROM coach WHERE pass=1";
$sqlValidOrderNum = "SELECT count(id) as num FROM orders WHERE type in(1,2,3,8)";
$sqlValidOrderMoney = "SELECT sum(rprice) as valid_order_money FROM orders WHERE type in(1,2,3,8)";
$sqlCompleteOrderNum = "SELECT count(id) as num FROM orders WHERE type=8";
$sqlCompleteOrderMoney = "SELECT sum(rprice) as complete_order_money FROM orders WHERE type=8";
$sqlRechargeNum = "SELECT count(id) as num FROM paydetail WHERE istate=1 and paytype=1 and optype=1";
$sqlRechargeMoney = "SELECT sum(money) as recharge_money FROM paydetail WHERE istate=1 and paytype=1 and optype=1";*/


$userRegArr = $db->fetchRow($sqlUserReg);
$newsClassNum = $db->num("SELECT ID FROM NewsClass");
$newsNum = $db->num("SELECT ID FROM News");
/*$coachRegArr = $db->fetchRow($sqlCoachReg);
$validOrderNumArr = $db->fetchRow($sqlValidOrderNum);
$validOrderMoneyArr = $db->fetchRow($sqlValidOrderMoney);
$completeOrderNumArr = $db->fetchRow($sqlCompleteOrderNum);
$completeOrderMoneyArr = $db->fetchRow($sqlCompleteOrderMoney);
$rechargeNumArr = $db->fetchRow($sqlRechargeNum);
$rechargeMoneyArr = $db->fetchRow($sqlRechargeMoney);*/

$userReg = empty($userRegArr['num'])?0:$userRegArr['num'];
/*$coachReg = empty($coachRegArr['num'])?0:$coachRegArr['num'];
$validOrderNum = empty($validOrderNumArr['num'])?0:$validOrderNumArr['num'];
$validOrderMoney = empty($validOrderMoneyArr['valid_order_money'])?0:$validOrderMoneyArr['valid_order_money'];
$completeOrderNum = empty($completeOrderNumArr['num'])?0:$completeOrderNumArr['num'];
$completeOrderMoney = empty($completeOrderMoneyArr['complete_order_money'])?0:$completeOrderMoneyArr['complete_order_money'];
$rechargeNum = empty($rechargeNumArr['num'])?0:$rechargeNumArr['num'];
$rechargeMoney = empty($rechargeMoneyArr['recharge_money'])?0:$rechargeMoneyArr['recharge_money'];*/



$smarty->assign("sever_software", $_SERVER["SERVER_SOFTWARE"]);
$smarty->assign("php_os", defined('PHP_OS') ? PHP_OS : '未知');
$smarty->assign("phpversion", phpversion());
$smarty->assign("mysqlversion", mysql_get_server_info());
$smarty->assign("server_addr", $_SERVER[SERVER_ADDR]);
$smarty->assign("server_time", date("T",time()));
$smarty->assign("now_time", date("Y-m-d H:i:s"));
$smarty->assign("onoff", ($onoff)?"打开":"关闭");
$smarty->assign("upload", ($upload)?"可以":"不可以");
$smarty->assign("upload_max_filesize", $upload_max_filesize);

$smarty->assign("userReg", $userReg);
$smarty->assign("newsClassNum", $newsClassNum);
$smarty->assign("newsNum", $newsNum);
$smarty->assign("coachReg", $coachReg);
$smarty->assign("validOrderNum", $validOrderNum);
$smarty->assign("validOrderMoney", round($validOrderMoney,2));
$smarty->assign("completeOrderNum", $completeOrderNum);
$smarty->assign("completeOrderMoney",  round($completeOrderMoney,2));
$smarty->assign("rechargeNum", $rechargeNum);
$smarty->assign("rechargeMoney",  round($rechargeMoney,2));
$smarty->view('home.tpl');
?>