<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 3;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode);//功能区权限检测
$smarty->assign("title", "用户管理");

$breadcrumbs = array();
$breadcrumbs[] = array(
	'text'      => '首页',
	'href'      => SITE_URL.'admin',
	'separator' => false
);

$breadcrumbs[] = array(
	'text'      => '用户管理',
	'href'      => SITE_URL.'admin/user.php',
	'separator' => ' :: '
);
$smarty->assign("breadcrumbs", $breadcrumbs);

//获取群组列表
$sql = "SELECT ID,Name FROM `group` ORDER BY Number asc";
$query = $db->query($sql);
$groupArr = $db->fetch($query);


//分页信息
require_once(SYS_ROOT . "class/class_adminpagination.php");
$pagination=new MYPagination();
$page = intval($_GET['page']);
$pagination->page = $page ? $page : 1;
$pagination->perpage = 20;


//查询值
$filter_id = isset($_POST["filter_id"])?$_POST["filter_id"]:$_GET["filter_id"];
$filter_name = isset($_POST["filter_name"])?$_POST["filter_name"]:urldecode($_GET["filter_name"]);
$filter_realname = isset($_POST["filter_realname"])?$_POST["filter_realname"]:urldecode($_GET["filter_realname"]);
$filter_mail = isset($_POST["filter_mail"])?$_POST["filter_mail"]:$_GET["filter_mail"];
$filter_group = isset($_POST["filter_group"])?$_POST["filter_group"]:$_GET["filter_group"];
$filter_logintime = isset($_POST["filter_logintime"])?$_POST["filter_logintime"]:$_GET["filter_logintime"];
$filter_status = isset($_POST["filter_status"])?$_POST["filter_status"]:$_GET["filter_status"];


$addurl = '';
$sql = "SELECT a.ID,a.Name,a.GroupID,a.RealName,a.Mail,a.Checked,a.LoginTime,b.Name as GroupName FROM `admin` a LEFT JOIN `group` b ON a.GroupID=b.ID WHERE 1=1 ";

if(!empty($filter_id)){
	$sql .=" and a.ID='".(int)$filter_id."' ";
	$addurl .='&filter_id='.$filter_id;
}
if(!empty($filter_name)){
	$sql .=" and a.Name like '%".$filter_name."%' ";
	$addurl .='&filter_name='.urlencode($filter_name);
}
if(!empty($filter_realname)){
	$sql .=" and a.RealName like '%".$filter_realname."%' ";
	$addurl .='&filter_realname='.urlencode($filter_realname);
}
if(!empty($filter_mail)){
	$sql .=" and a.Mail like '%".$filter_mail."%' ";
	$addurl .='&filter_mail='.$filter_mail;
}
if(!empty($filter_group)){
	$sql .=" and a.GroupID='".(int)$filter_group."' ";
	$addurl .='&filter_group='.$filter_group;
}
if(!empty($filter_logintime)){
	$s_mktime = toTime($filter_logintime.' 00:00:00');
	$e_mktime = toTime($filter_logintime.' 23:59:59');	
	$sql .=" and a.LoginTime>=".$s_mktime." and a.LoginTime<=".$e_mktime." ";
	$addurl .='&filter_logintime='.$filter_logintime;
}
if($filter_status!=''){
	$sql .=" and a.Checked='".(int)$filter_status."' ";
	$addurl .='&filter_status='.$filter_status;
}
$num = $db->num($sql);
$sql .=" ORDER BY a.ID desc LIMIT ".$pagination->get_begin().",".$pagination->perpage;
$query = $db->query($sql);
$userArr = $db->fetch($query);


//分页处理	
$pagination->rows = $num;		
$pagination->href = $addurl;
$pageHtml = $pagination->create();

//返回列表页参数值
$addurl = empty($addurl)?'':substr($addurl,1);
setcookie ('backurl', empty($addurl)?'':$addurl, 0, '/', '');

$smarty->assign("filter_id", $filter_id);
$smarty->assign("filter_name", $filter_name);
$smarty->assign("filter_realname", $filter_realname);
$smarty->assign("filter_mail", $filter_mail);
$smarty->assign("filter_group", $filter_group);
$smarty->assign("filter_logintime", $filter_logintime);
$smarty->assign("filter_status", $filter_status);
$smarty->assign("groupArr", $groupArr);
$smarty->assign("userArr", $userArr);
$smarty->assign("pageHtml", $pageHtml);
$smarty->view('user_list.tpl');
?>