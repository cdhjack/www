<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 8;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode);//功能区权限检测
$smarty->assign("title", "优惠券列表");

$breadcrumbs = array();
$breadcrumbs[] = array(
	'text'      => '首页',
	'href'      => SITE_URL.'admin',
	'separator' => false
);

$breadcrumbs[] = array(
	'text'      => '优惠券列表',
	'href'      => SITE_URL.'admin/coupon.php',
	'separator' => ' :: '
);
$smarty->assign("breadcrumbs", $breadcrumbs);

//获取优惠券类型
$sql = "SELECT i_type,idesc FROM coupon GROUP BY i_type ORDER BY i_type asc";
$query = $db->query($sql);
$couponClassArr = $db->fetch($query);


//分页信息
require_once(SYS_ROOT . "class/class_adminpagination.php");
$pagination=new MYPagination();
$page = intval($_GET['page']);
$pagination->page = $page ? $page : 1;
$pagination->perpage = 20;


//查询值
$filter_id = isset($_POST["filter_id"])?$_POST["filter_id"]:$_GET["filter_id"];
$filter_type = isset($_POST["filter_type"])?$_POST["filter_type"]:$_GET["filter_type"];
$filter_cdkey = isset($_POST["filter_cdkey"])?$_POST["filter_cdkey"]:$_GET["filter_cdkey"];
$filter_price = isset($_POST["filter_price"])?$_POST["filter_price"]:$_GET["filter_price"];
$filter_yxq = isset($_POST["filter_yxq"])?$_POST["filter_yxq"]:$_GET["filter_yxq"];
$filter_gettime = isset($_POST["filter_gettime"])?$_POST["filter_gettime"]:$_GET["filter_gettime"];
$filter_username = isset($_POST["filter_username"])?$_POST["filter_username"]:urldecode($_GET["filter_username"]);
$filter_status = isset($_POST["filter_status"])?$_POST["filter_status"]:$_GET["filter_status"];

$addurl = '';
$sql = "SELECT a.*,b.name as username FROM coupon a LEFT JOIN user b ON a.uid=b.id WHERE 1=1";

if(!empty($filter_id)){
	$sql .=" and a.id='".(int)$filter_id."' ";
	$addurl .='&filter_id='.$filter_id;
}
if($filter_type!=""){
	$sql .=" and a.i_type='".(int)$filter_type."' ";
	$addurl .='&filter_type='.$filter_type;
}
if(!empty($filter_cdkey)){
	$sql .=" and a.cdkey='".$filter_cdkey."' ";
	$addurl .='&filter_cdkey='.$filter_cdkey;
}
if(!empty($filter_price)){
	$sql .=" and a.price='".(float)$filter_price."' ";
	$addurl .='&filter_price='.$filter_price;
}
if(!empty($filter_yxq)){
	$sql .=" and a.yxq='".$filter_yxq."' ";
	$addurl .='&filter_yxq='.$filter_yxq;
}
if(!empty($filter_gettime)){
	$sql .=" and a.gettime='".$filter_gettime."' ";
	$addurl .='&filter_gettime='.$filter_gettime;
}
if(!empty($filter_username)){
	$sql .=" and b.name like '%".$filter_username."%' ";
	$addurl .='&filter_username='.urlencode($filter_username);
}
if($filter_status!=''){
	switch($filter_status){
		case 1://未兑换(未兑换：指用户未兑换，也未使用)
			$sql .=" and a.isget=0 and a.used=0";
			break;
		case 2://已兑换(已兑换：指用户已兑换，但未使用)
			$sql .=" and a.isget=1 and  a.used=0 ";
			break;
		case 3://已使用(已使用：指用户已兑换，已使用)
			$sql .=" and a.isget=1 and  a.used=1 ";
			break;
		case 4://已过期(已过期：指用户未兑换，未使用，已过期)
			$now_date = date('Y-m-d');
			$sql .=" and a.isget=0 and a.used=0 and a.yxq<'".$now_date."' ";
			break;	
		default:
			$sql .="";
			break;
	}
	$addurl .='&filter_status='.$filter_status;
}

//echo $sql;
$num = $db->num($sql);
$sql .="  ORDER BY a.id desc LIMIT ".$pagination->get_begin().",".$pagination->perpage;
$query = $db->query($sql);
$couponArr = $db->fetch($query);


//状态处理
$newCouponArr = array();
if($couponArr){
	foreach($couponArr as $key=>$coupon){
		if ($coupon['isget']=='0' && $coupon['used']=='0'){
			$status = "未兑换";//(未兑换：指用户未兑换，也未使用);				
			$yxqTime = toTime($coupon['yxq'].' 23:59:59');
			if(time()>$yxqTime){//(已过期：指用户未兑换，未使用，已过期)
				$status = "已过期";
			}
		}
		if ($coupon['isget']=='1' && $coupon['used']=='0'){
			$status = "已兑换";//(已兑换：指用户已兑换，但未使用);
		}
		if ($coupon['isget']=='1' && $coupon['used']=='1'){
			$status = "已使用";//(已使用：指用户已兑换，已使用)
		}
		
		foreach($coupon as $k=>$v){
			$newCouponArr[$key]['status'] = $status;
			$newCouponArr[$key][$k] = $v;
		}
	}
}



//分页处理	
$pagination->rows = $num;		
$pagination->href = $addurl;
$pageHtml = $pagination->create();

//返回列表页参数值
$addurl = empty($addurl)?'':substr($addurl,1);
setcookie ('backurl', empty($addurl)?'':$addurl, 0, '/', '');

$smarty->assign("filter_id", $filter_id);
$smarty->assign("filter_type", $filter_type);
$smarty->assign("filter_cdkey", $filter_cdkey);
$smarty->assign("filter_price", $filter_price);
$smarty->assign("filter_yxq", $filter_yxq);
$smarty->assign("filter_gettime", $filter_gettime);
$smarty->assign("filter_username", $filter_username);
$smarty->assign("filter_status", $filter_status);
$smarty->assign("couponClassArr", $couponClassArr);
$smarty->assign("couponArr", $newCouponArr);
$smarty->assign("pageHtml", $pageHtml);
$smarty->view('coupon_list.tpl');
?>