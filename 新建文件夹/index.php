<?php
require_once('global.php');

$smarty->assign("title", "胡了三国官网 赤兔互动 手机游戏 单机游戏 休闲电竞游戏");
$smarty->assign("description", "胡了三国介绍,胡了三国教学,棋牌+卡牌,游戏,原创玩法,精品游戏,创新游戏,国内首款竞技+博彩游戏");
$smarty->assign("keywords", "胡了三国介绍,胡了三国教学,棋牌+卡牌,游戏,原创玩法,精品游戏,创新游戏,国内首款竞技+博彩游戏");

//检测是否登录
$is_login = 0;
if(!empty($memberObj->member_id) && !empty($memberObj->member_name)){
	$is_login = 1;
}

$smarty->assign("login_name", $memberObj->member_name);
$smarty->assign("is_login", $is_login);
$smarty->view('index.tpl');
?>