<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 14;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode);//功能区权限检测
$smarty->assign("title", "编辑评论");

$breadcrumbs = array();
$breadcrumbs[] = array(
	'text'      => '首页',
	'href'      => SITE_URL.'admin',
	'separator' => false
);

$breadcrumbs[] = array(
	'text'      => '订单列表',
	'href'      => SITE_URL.'admin/order.php',
	'separator' => ' :: '
);
$id = isset($_POST["id"])?(int)$_POST["id"]:(int)$_GET["id"];
$breadcrumbs[] = array(
	'text'      => '编辑评论',
	'href'      => SITE_URL.'admin/orderform.php?id='.$id,
	'separator' => ' :: '
);
$smarty->assign("breadcrumbs", $breadcrumbs);

$orderInfo = array();
if($id){
	$sql = "SELECT id,tdstar,zlstar,nrstar,score,iscmt,comment FROM orders WHERE id='".$id."'";
	$orderInfo = $db->fetchRow($sql);	
}

//评分星html处理
$newOrderInfo = array();
if($orderInfo){	
	foreach($orderInfo as $k=>$v){
		if($k=='score'){
			$newOrderInfo['score_html'] = getStarHtml($v);
		}
		if($k=='tdstar'){
			$newOrderInfo['tdstar_html'] = getStarHtml($v);
		}
		if($k=='zlstar'){
			$newOrderInfo['zlstar_html'] = getStarHtml($v);
		}
		if($k=='nrstar' ){
			$newOrderInfo['nrstar_html'] = getStarHtml($v);
		}
		$newOrderInfo[$k] = $v;
	}
}

//获取订单用户与教练的评论id及评论内容
$sql = "SELECT id,oid,pid,utype,text,time FROM ordermeta WHERE oid='".$id."'";
$query = $db->query($sql);
$orderCommentArr = $db->fetch($query);
$newOrderCommentArr = array();
if($orderCommentArr){	
	foreach($orderCommentArr as $k=>$v){
		if($v['utype']==0){//用户评论
			$newOrderCommentArr['user'] = array('id'=>$v['id'],'content'=>$v['text'],'time'=>$v['time']);
		}
		if($v['utype']==1){//教练评论
			$newOrderCommentArr['coach'] = array('id'=>$v['id'],'content'=>$v['text'],'time'=>$v['time']);
		}
	}
}

$smarty->assign("backUrl", empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']);
$smarty->assign("orderInfo", $newOrderInfo);
$smarty->assign("newOrderCommentArr", $newOrderCommentArr);
$smarty->view('order_form.tpl');
?>