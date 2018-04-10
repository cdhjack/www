<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 1;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode);//功能区权限检测
$smarty->assign("title", "用户列表");

$breadcrumbs = array();
$breadcrumbs[] = array(
	'text'      => '首页',
	'href'      => SITE_URL.'admin',
	'separator' => false
);

$breadcrumbs[] = array(
	'text'      => '用户列表',
	'href'      => SITE_URL.'admin/member.php',
	'separator' => ' :: '
);
$smarty->assign("breadcrumbs", $breadcrumbs);

//分页信息
require_once(SYS_ROOT . "class/class_adminpagination.php");
$pagination=new MYPagination();
$page = intval($_GET['page']);
$pagination->page = $page ? $page : 1;
$pagination->perpage = 20;


//查询值
$filter_id = isset($_POST["filter_id"])?$_POST["filter_id"]:$_GET["filter_id"];
$filter_mobile = isset($_POST["filter_mobile"])?$_POST["filter_mobile"]:$_GET["filter_mobile"];
$filter_email = isset($_POST["filter_email"])?$_POST["filter_email"]:$_GET["filter_email"];
$filter_rname = isset($_POST["filter_rname"])?$_POST["filter_rname"]:urldecode($_GET["filter_rname"]);
/*$filter_sex = isset($_POST["filter_sex"])?$_POST["filter_sex"]:$_GET["filter_sex"];
$filter_order_num = isset($_POST["filter_order_num"])?$_POST["filter_order_num"]:$_GET["filter_order_num"];*/
$filter_reg_start_date = isset($_POST["filter_reg_start_date"])?$_POST["filter_reg_start_date"]:$_GET["filter_reg_start_date"];
$filter_reg_end_date = isset($_POST["filter_reg_end_date"])?$_POST["filter_reg_end_date"]:$_GET["filter_reg_end_date"];
$filter_login_start_date = isset($_POST["filter_login_start_date"])?$_POST["filter_login_start_date"]:$_GET["filter_login_start_date"];
$filter_login_end_date = isset($_POST["filter_login_end_date"])?$_POST["filter_login_end_date"]:$_GET["filter_login_end_date"];
$filter_pass = isset($_POST["filter_pass"])?$_POST["filter_pass"]:$_GET["filter_pass"];


$addurl = '';

//$sql = "SELECT a.*,count(b.id) as order_num FROM member a LEFT JOIN orders b ON a.id=b.uid and b.type=8 WHERE 1=1 ";
$sql = "SELECT a.* FROM member a WHERE 1=1 ";
if(!empty($filter_id)){
	$sql .=" and a.id='".(int)$filter_id."' ";
	$addurl .='&filter_id='.$filter_id;
}
if(!empty($filter_mobile)){
	$sql .=" and a.mobile='".$filter_mobile."' ";
	$addurl .='&filter_mobile='.$filter_mobile;
}
if(!empty($filter_email)){
	$sql .=" and a.email='".$filter_email."' ";
	$addurl .='&filter_email='.$filter_email;
}
if(!empty($filter_rname)){
	$sql .=" and a.name like '%".$filter_rname."%' ";
	$addurl .='&filter_rname='.urlencode($filter_rname);
}
/*if($filter_sex!=''){
	$sql .=" and a.sex='".(int)$filter_sex."' ";
	$addurl .='&filter_sex='.$filter_sex;
}*/
if(!empty($filter_reg_start_date) && !empty($filter_reg_end_date)){
	$filter_reg_start_time = strtotime($filter_reg_start_date.' 00:00:00');
	$filter_reg_end_time = strtotime($filter_reg_end_date.' 23:59:59');
	$sql .=" and a.reg_time>='".$filter_reg_start_time."' and a.reg_time<='".$filter_reg_end_time."'";
	$addurl .='&filter_reg_start_date='.$filter_reg_start_date.'&filter_reg_end_date='.$filter_reg_end_date;
}
if(!empty($filter_login_start_date) && !empty($filter_login_end_date)){
	$filter_login_start_time = strtotime($filter_login_start_date.' 00:00:00');
	$filter_login_end_time = strtotime($filter_login_end_date.' 23:59:59');
	$sql .=" and a.login_time>='".$filter_login_start_time."' and a.login_time<='".$filter_login_end_time."'";
	$addurl .='&filter_login_start_date='.$filter_login_start_date.'&filter_login_end_date='.$filter_login_end_date;
}
if($filter_pass!=''){
	$sql .=" and a.status='".(int)$filter_pass."' ";
	$addurl .='&filter_pass='.$filter_pass;
}
/*if(!empty($filter_order_num)){	
	$sql .=" group by a.id  having count(b.id)>='".(int)$filter_order_num."' ";
	$addurl .='&filter_order_num='.$filter_order_num;
}
else{
	$sql .=" group by a.id  having count(b.id)>=0 ";
}*/

//echo $sql;
$num = $db->num($sql);
$sql .=" ORDER BY ";
$sql .=" a.id desc LIMIT ".$pagination->get_begin().",".$pagination->perpage;

$query = $db->query($sql);
$memberArr = $db->fetch($query);
//echo '<pre>';
//print_r($memberArr);

//头像信息处理
$newMemberArr = $memberArr;
if($memberArr){
	foreach($memberArr as $key=>$member){
		$avatar = empty($member['tx'])?'uploadfile/avatar.jpg':(substr($member['tx'], 0, 1) == '/' ? substr($member['tx'],1) : $member['tx']);;
		$newMemberArr[$key]['avatar'] = SITE_URL.$avatar;
		$newMemberArr[$key]['reg_time'] = date('Y-m-d H:i:s',$member['reg_time']);
		$newMemberArr[$key]['login_time'] = date('Y-m-d H:i:s',$member['login_time']);		
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
$smarty->assign("filter_mobile", $filter_mobile);
$smarty->assign("filter_email", $filter_email);
$smarty->assign("filter_rname", $filter_rname);
/*$smarty->assign("filter_sex", $filter_sex);
$smarty->assign("filter_order_num", $filter_order_num);*/
$smarty->assign("filter_reg_start_date", $filter_reg_start_date);
$smarty->assign("filter_reg_end_date", $filter_reg_end_date);
$smarty->assign("filter_login_start_date", $filter_login_start_date);
$smarty->assign("filter_login_end_date", $filter_login_end_date);
$smarty->assign("filter_pass", $filter_pass);
$smarty->assign("memberArr", $newMemberArr);
$smarty->assign("pageHtml", $pageHtml);
$smarty->view('member_list.tpl');
?>