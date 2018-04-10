<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 1;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode);//功能区权限检测

//获取用户信息
$id = isset($_POST["id"])?(int)$_POST["id"]:(int)$_GET["id"];
$sql = "SELECT id,ye FROM user WHERE id='".$id."'";
$memberInfo = $db->fetchRow($sql);	


//分页信息
require_once(SYS_ROOT . "class/class_adminpagination.php");
$pagination=new MYPagination();
$page = intval($_GET['page']);
$pagination->page = $page ? $page : 1;
$pagination->perpage = 10;

$addurl = '&id='.$id;
$sql = "SELECT *,UNIX_TIMESTAMP(datetime) as addtime FROM paydetail WHERE uid='".$id."' and utype=0";//utype:0用户,1教练
$num = $db->num($sql);
$sql .=" ORDER BY id desc LIMIT ".$pagination->get_begin().",".$pagination->perpage;
$query = $db->query($sql);
$memberPayArr = $db->fetch($query);

//分页处理	
$pagination->rows = $num;		
$pagination->href = $addurl;
$pageHtml = $pagination->create();

$smarty->assign("memberInfo", $memberInfo);
$smarty->assign("memberPayArr", $memberPayArr);
$smarty->assign("pageHtml", $pageHtml);
$smarty->view('member_pay_list.tpl');
?>