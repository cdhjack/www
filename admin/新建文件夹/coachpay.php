<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 2;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode);//功能区权限检测

//获取教练信息
$id = isset($_POST["id"])?(int)$_POST["id"]:(int)$_GET["id"];
$sql = "SELECT id,ye FROM coach WHERE id='".$id."'";
$coachInfo = $db->fetchRow($sql);	


//分页信息
require_once(SYS_ROOT . "class/class_adminpagination.php");
$pagination=new MYPagination();
$page = intval($_GET['page']);
$pagination->page = $page ? $page : 1;
$pagination->perpage = 10;

$addurl = '&id='.$id;
$sql = "SELECT *,UNIX_TIMESTAMP(datetime) as addtime FROM paydetail WHERE uid='".$id."' and utype=1";//utype:0用户,1教练
$num = $db->num($sql);
$sql .=" ORDER BY id desc LIMIT ".$pagination->get_begin().",".$pagination->perpage;
$query = $db->query($sql);
$coachPayArr = $db->fetch($query);

//分页处理	
$pagination->rows = $num;		
$pagination->href = $addurl;
$pageHtml = $pagination->create();

$smarty->assign("coachInfo", $coachInfo);
$smarty->assign("coachPayArr", $coachPayArr);
$smarty->assign("pageHtml", $pageHtml);
$smarty->view('coach_pay_list.tpl');
?>