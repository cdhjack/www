<?php
error_reporting(7);
// Version
define('VERSION', '1.0'); 

// Configuration
if (file_exists('../config/config.inc.php')) {
	require_once('../config/config.inc.php');
}

//header("content-type/html;charset=utf-8");
// Application Classes
require_once(SYS_ROOT . "class/class_mysql.php");
require_once(SYS_ROOT . "class/class_smarty.php");
require_once(SYS_ROOT . "class/class_admininfo.php");
require_once(SYS_ROOT . 'public/function.php');
require_once(SYS_ROOT . 'public/utf8.php');//utf8编码的定义的公共函数

// Database 
$db=new MysqlQuery(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
//print_r($db);exit;

//Smarty
$smarty=new MySmarty('admin');

//Admin
$admin=new AdminInfo($db);

//导航css
$headerLiClass = array(
	'index' => (strpos($_SERVER['REQUEST_URI'], 'index.php')!==false || strpos($_SERVER['REQUEST_URI'], '.php')===false)?'class="selected"':'',
	'accountname' => (strpos($_SERVER['REQUEST_URI'], 'coach')!==false || strpos($_SERVER['REQUEST_URI'], 'member')!==false)?'class="selected"':'',
	'rank' => (strpos($_SERVER['REQUEST_URI'], 'rank')!==false)?'class="selected"':'',
	'coupon' => (strpos($_SERVER['REQUEST_URI'], 'coupon')!==false)?'class="selected"':'',
	'sms' => (strpos($_SERVER['REQUEST_URI'], 'sms')!==false && strpos($_SERVER['REQUEST_URI'], 'messagesms')===false)?'class="selected"':'',
	'admin' => (strpos($_SERVER['REQUEST_URI'], 'user')!==false)?'class="selected"':'',
	'order' => (strpos($_SERVER['REQUEST_URI'], 'order')!==false)?'class="selected"':'',
	'report' => (strpos($_SERVER['REQUEST_URI'], 'report')!==false)?'class="selected"':'',
	'system' => (strpos($_SERVER['REQUEST_URI'], 'log')!==false  || strpos($_SERVER['REQUEST_URI'], 'charge')!==false  || strpos($_SERVER['REQUEST_URI'], 'information')!==false  || strpos($_SERVER['REQUEST_URI'], 'message')!==false)?'class="selected"':'',
);


$smarty->assign('adminObj', $admin);
$smarty->assign('site_url', SITE_URL);
$smarty->assign("site_name", SITE_NAME);
$smarty->assign('headerLiClass', $headerLiClass);
?>