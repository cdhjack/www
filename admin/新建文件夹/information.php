<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 12;//config/power_config.inc.php中手动定义
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
	'href'      => SITE_URL.'admin/information.php',
	'separator' => ' :: '
);
$smarty->assign("breadcrumbs", $breadcrumbs);

//获取类别列表
$sql = "SELECT id,name FROM informationclass ORDER BY ordernum asc";
$query = $db->query($sql);
$informationClassArr = $db->fetch($query);

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
$filter_status = isset($_POST["filter_status"])?$_POST["filter_status"]:$_GET["filter_status"];


$addurl = '';
$sql = "SELECT a.id,a.title,a.classid,a.isshow,b.name as classname FROM information a LEFT JOIN informationclass b ON a.classid=b.id WHERE 1=1 ";

if(!empty($filter_id)){
	$sql .=" and a.id='".(int)$filter_id."' ";
	$addurl .='&filter_id='.$filter_id;
}
if(!empty($filter_title)){
	$sql .=" and a.title like '%".$filter_title."%' ";
	$addurl .='&filter_title='.urlencode($filter_title);
}
if(!empty($filter_class)){
	$sql .=" and a.classid='".(int)$filter_class."' ";
	$addurl .='&filter_class='.$filter_class;
}
if($filter_status!=''){
	$sql .=" and a.isshow='".(int)$filter_status."' ";
	$addurl .='&filter_status='.$filter_status;
}
$num = $db->num($sql);
$sql .=" ORDER BY a.id desc LIMIT ".$pagination->get_begin().",".$pagination->perpage;
$query = $db->query($sql);
$informationArr = $db->fetch($query);


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
$smarty->assign("filter_status", $filter_status);
$smarty->assign("informationClassArr", $informationClassArr);
$smarty->assign("informationArr", $informationArr);
$smarty->assign("pageHtml", $pageHtml);
$smarty->view('information_list.tpl');
?>