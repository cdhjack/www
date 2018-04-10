<?php
error_reporting(7);
// Version
define('VERSION', '1.0'); 

// DIR
define("SYS_ROOT", substr(dirname(__FILE__), 0, -3));//如：D:\www\framework\

// Configuration
if (file_exists(SYS_ROOT.'config/config.inc.php')) {
	require_once(SYS_ROOT.'config/config.inc.php');
}

//header("content-type/html;charset=utf-8");
// Application Classes
require_once(SYS_ROOT . "class/class_mysql.php");
require_once(SYS_ROOT . "class/class_smarty.php");
require_once(SYS_ROOT . "class/class_memberinfo.php");
require_once(SYS_ROOT . "class/class_session.php");
require_once(SYS_ROOT . 'public/function.php');
require_once(SYS_ROOT . 'public/utf8.php');//utf8编码的定义的公共函数

// Database 
$db=new MysqlQuery(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
//print_r($db);exit;

//Smarty
$smarty=new MySmarty('web');

//Member
$memberObj=new MemberInfo($db);

//Session
$lifeTime = 30*60;
$sessionObj=new Session($lifeTime);

/*/导航css
$headerLiClass = array(
	'index' => (strpos($_SERVER['REQUEST_URI'], 'index.php')!==false || strpos($_SERVER['REQUEST_URI'], '.php')===false)?'class="navCurt"':'',
	'download' => (strpos($_SERVER['REQUEST_URI'], 'download')!==false)?'class="navCurt"':'',
	'about' => (strpos($_SERVER['REQUEST_URI'], 'about')!==false)?'class="navCurt"':'',
	'job' => (strpos($_SERVER['REQUEST_URI'], 'job')!==false)?'class="navCurt"':'',
	'news' => (strpos($_SERVER['REQUEST_URI'], 'news')!==false)?'class="navCurt"':''
);*/
//汽车搜索信息
//获取品牌列表
$sql = "SELECT ID,Name FROM CarBrand ORDER BY OrderNum asc";
$query = $db->query($sql);
$searchCarBrandArr = $db->fetch($query);
$smarty->assign('searchCarBrandArr', $searchCarBrandArr);
$smarty->assign('filter_brand', isset($_POST["filter_brand"])?$_POST["filter_brand"]:$_GET["filter_brand"]);
$smarty->assign("searchGearBoxArr", CarConfig::$gearBox);
$smarty->assign('filter_gearbox', isset($_POST["filter_gearbox"])?$_POST["filter_gearbox"]:$_GET["filter_gearbox"]);
$smarty->assign("searchPrice", CarConfig::$price);
$smarty->assign('filter_price', isset($_POST["filter_price"])?$_POST["filter_price"]:$_GET["filter_price"]);
$smarty->assign('filter_start_date', isset($_POST["filter_start_date"])?$_POST["filter_start_date"]:$_GET["filter_start_date"]);
$smarty->assign("searchDateHourArr", CarConfig::$hour);
$smarty->assign('filter_start_hour', isset($_POST["filter_start_hour"])?$_POST["filter_start_hour"]:$_GET["filter_start_hour"]);


$smarty->assign('memberObj', $memberObj);
$smarty->assign('site_url', SITE_URL);
$smarty->assign("site_name", SITE_NAME);
//$smarty->assign('site_logo', (strpos($_SERVER['REQUEST_URI'], 'index.php')!==false || strpos($_SERVER['REQUEST_URI'], '.php')===false)?'home_20140922.png':'web_20140922.png');//logo图片首页和内页不一样
//$smarty->assign('headerLiClass', $headerLiClass);
?>