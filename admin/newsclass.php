<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 6;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode);//功能区权限检测
$smarty->assign("title", "文章分类");

$breadcrumbs = array();
$breadcrumbs[] = array(
	'text'      => '首页',
	'href'      => SITE_URL.'admin',
	'separator' => false
);

$breadcrumbs[] = array(
	'text'      => '文章分类',
	'href'      => SITE_URL.'admin/newsclass.php',
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
$filter_name = isset($_POST["filter_name"])?$_POST["filter_name"]:urldecode($_GET["filter_name"]);
$filter_order_num = isset($_POST["filter_order_num"])?$_POST["filter_order_num"]:$_GET["filter_order_num"];
$filter_status = isset($_POST["filter_status"])?$_POST["filter_status"]:$_GET["filter_status"];


$addurl = '';
$sql = "SELECT a.ID,a.Name,a.OrderNum,a.IsShow,(SELECT count(b.ID) FROM News b WHERE b.ClassID=a.ID) as NewsNum FROM NewsClass a WHERE 1=1 ";

if(!empty($filter_id)){
	$sql .=" and a.ID='".(int)$filter_id."' ";
	$addurl .='&filter_id='.$filter_id;
}
if(!empty($filter_name)){
	$sql .=" and a.Name like '%".$filter_name."%' ";
	$addurl .='&filter_name='.urlencode($filter_name);
}
if(!empty($filter_order_num)){
	$sql .=" and a.OrderNum='".$filter_order_num."' ";
	$addurl .='&filter_order_num='.$filter_order_num;
}
if($filter_status!=''){
	$sql .=" and a.IsShow='".(int)$filter_status."' ";
	$addurl .='&filter_status='.$filter_status;
}
$num = $db->num($sql);
$sql .=" ORDER BY a.ID desc LIMIT ".$pagination->get_begin().",".$pagination->perpage;
$query = $db->query($sql);
$newsClassArr = $db->fetch($query);


//分页处理	
$pagination->rows = $num;		
$pagination->href = $addurl;
$pageHtml = $pagination->create();

//返回列表页参数值
$addurl = empty($addurl)?'':substr($addurl,1);
setcookie ('backurl', empty($addurl)?'':$addurl, 0, '/', '');

$smarty->assign("filter_id", $filter_id);
$smarty->assign("filter_name", $filter_name);
$smarty->assign("filter_order_num", $filter_order_num);
$smarty->assign("filter_status", $filter_status);
$smarty->assign("newsClassArr", $newsClassArr);
$smarty->assign("pageHtml", $pageHtml);
$smarty->view('newsclass_list.tpl');
?>