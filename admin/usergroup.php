<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 4;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode);//功能区权限检测
$smarty->assign("title", "用户群组");

$breadcrumbs = array();
$breadcrumbs[] = array(
	'text'      => '首页',
	'href'      => SITE_URL.'admin',
	'separator' => false
);

$breadcrumbs[] = array(
	'text'      => '用户群组',
	'href'      => SITE_URL.'admin/usergroup.php',
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


$addurl = '';
$sql = "SELECT a.ID,a.Name,(SELECT count(b.ID) FROM `admin` b WHERE b.GroupID=a.ID) as AdminNum FROM `group` a WHERE 1=1 ";

if(!empty($filter_id)){
	$sql .=" and a.ID='".(int)$filter_id."' ";
	$addurl .='&filter_id='.$filter_id;
}
if(!empty($filter_name)){
	$sql .=" and a.Name like '%".$filter_name."%' ";
	$addurl .='&filter_name='.urlencode($filter_name);
}
$num = $db->num($sql);
$sql .=" ORDER BY a.ID desc LIMIT ".$pagination->get_begin().",".$pagination->perpage;
$query = $db->query($sql);
$userGroupArr = $db->fetch($query);


//分页处理	
$pagination->rows = $num;		
$pagination->href = $addurl;
$pageHtml = $pagination->create();

//返回列表页参数值
$addurl = empty($addurl)?'':substr($addurl,1);
setcookie ('backurl', empty($addurl)?'':$addurl, 0, '/', '');

$smarty->assign("filter_id", $filter_id);
$smarty->assign("filter_name", $filter_name);
$smarty->assign("userGroupArr", $userGroupArr);
$smarty->assign("pageHtml", $pageHtml);
$smarty->view('usergroup_list.tpl');
?>