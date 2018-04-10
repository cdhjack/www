<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 7;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode);//功能区权限检测
$smarty->assign("title", "文章管理");

$breadcrumbs = array();
$breadcrumbs[] = array(
	'text'      => '首页',
	'href'      => SITE_URL.'admin',
	'separator' => false
);

$breadcrumbs[] = array(
	'text'      => '文章管理',
	'href'      => SITE_URL.'admin/news.php',
	'separator' => ' :: '
);
$smarty->assign("breadcrumbs", $breadcrumbs);

//获取类别列表
$sql = "SELECT ID,Name FROM NewsClass ORDER BY OrderNum asc";
$query = $db->query($sql);
$newClassArr = $db->fetch($query);


//分页信息
require_once(SYS_ROOT . "class/class_adminpagination.php");
$pagination=new MYPagination();
$page = intval($_GET['page']);
$pagination->page = $page ? $page : 1;
$pagination->perpage = 20;


//查询值
$filter_id = isset($_POST["filter_id"])?$_POST["filter_id"]:$_GET["filter_id"];
$filter_title = isset($_POST["filter_title"])?$_POST["filter_title"]:urldecode($_GET["filter_title"]);
$filter_class = isset($_POST["filter_class"])?$_POST["filter_class"]:$_GET["filter_class"];
$filter_submitdate = isset($_POST["filter_submitdate"])?$_POST["filter_submitdate"]:$_GET["filter_submitdate"];
$filter_onclick = isset($_POST["filter_onclick"])?$_POST["filter_onclick"]:$_GET["filter_onclick"];
$filter_isindex = isset($_POST["filter_isindex"])?$_POST["filter_isindex"]:$_GET["filter_isindex"];
$filter_status = isset($_POST["filter_status"])?$_POST["filter_status"]:$_GET["filter_status"];


$addurl = '';
$sql = "SELECT a.ID,a.Title,a.ClassID,a.IsIndex,a.Onclick,a.SubmitDate,a.IsShow,b.Name as ClassName FROM News a LEFT JOIN NewsClass b ON a.ClassID=b.ID WHERE 1=1 ";

if(!empty($filter_id)){
	$sql .=" and a.ID='".(int)$filter_id."' ";
	$addurl .='&filter_id='.$filter_id;
}
if(!empty($filter_title)){
	$sql .=" and a.Title like '%".$filter_title."%' ";
	$addurl .='&filter_title='.urlencode($filter_title);
}
if(!empty($filter_class)){
	$sql .=" and a.ClassID='".(int)$filter_class."' ";
	$addurl .='&filter_class='.$filter_class;
}
if(!empty($filter_submitdate)){
	$sql .=" and a.SubmitDate='".$filter_submitdate."' ";
	$addurl .='&filter_submitdate='.$filter_submitdate;
}
if(!empty($filter_onclick)){
	$sql .=" and a.Onclick='".$filter_onclick."' ";
	$addurl .='&filter_onclick='.$filter_onclick;
}
if($filter_isindex!=''){
	$sql .=" and a.IsIndex='".(int)$filter_isindex."' ";
	$addurl .='&filter_isindex='.$filter_isindex;
}
if($filter_status!=''){
	$sql .=" and a.IsShow='".(int)$filter_status."' ";
	$addurl .='&filter_status='.$filter_status;
}
$num = $db->num($sql);
$sql .=" ORDER BY a.ID desc LIMIT ".$pagination->get_begin().",".$pagination->perpage;
$query = $db->query($sql);
$newsArr = $db->fetch($query);


//分页处理	
$pagination->rows = $num;		
$pagination->href = $addurl;
$pageHtml = $pagination->create();

//返回列表页参数值
$addurl = empty($addurl)?'':substr($addurl,1);
setcookie ('backurl', empty($addurl)?'':$addurl, 0, '/', '');

$smarty->assign("filter_id", $filter_id);
$smarty->assign("filter_title", $filter_title);
$smarty->assign("filter_class", $filter_class);
$smarty->assign("filter_submitdate", $filter_submitdate);
$smarty->assign("filter_isindex", $filter_isindex);
$smarty->assign("filter_status", $filter_status);
$smarty->assign("newClassArr", $newClassArr);
$smarty->assign("newsArr", $newsArr);
$smarty->assign("pageHtml", $pageHtml);
$smarty->view('news_list.tpl');
?>