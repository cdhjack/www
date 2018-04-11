<?php
//分支rose
//测试分支合并
error_reporting(7);
// Version
define('VERSION', '1.0'); 

// Configuration
if (file_exists(dirname(__FILE__).'/config/config.inc.php')) {
	require_once(dirname(__FILE__).'/config/config.inc.php');
}
//header("content-type/html;charset=utf-8");
// Application Classes
require_once(SYS_ROOT . "class/class_mysql.php");
require_once(SYS_ROOT . "class/class_smarty.php");
require_once(SYS_ROOT . "class/class_memberinfo.php");
require_once(SYS_ROOT . "class/class_session.php");
require_once(SYS_ROOT . 'public/function.php');
require_once(SYS_ROOT . 'public/utf8.php');//utf8编码的定义的公共函数
require_once(SYS_ROOT . 'config/match_config.inc.php');//彩虹包比赛配置信息

// Database 
$db=new MysqlQuery(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
//print_r($db);exit;

//Smarty
$smarty=new MySmarty();

//Member
$memberObj=new MemberInfo($db);

//Session
$lifeTime = 30*60;
$sessionObj=new Session($lifeTime);

/*/导航css
$headerLiClass = array(
	'index' => (strpos($_SERVER['REQUEST_URI'], 'index.php')!==false || strpos($_SERVER['REQUEST_URI'], '.php')===false)?'id="curr"':'',
	'about' => (strpos($_SERVER['REQUEST_URI'], 'about')!==false)?'id="curr"':'',
	'company' => (strpos($_SERVER['REQUEST_URI'], 'company')!==false)?'id="curr"':'',
	'news' => (strpos($_SERVER['REQUEST_URI'], 'news')!==false)?'id="curr"':''
);*/


$smarty->assign('memberObj', $memberObj);
$smarty->assign('site_url', SITE_URL);
$smarty->assign("site_name", SITE_NAME);
$smarty->assign("description", "彩虹屋 抢红包");
$smarty->assign("keywords", "彩虹屋 抢红包");
//$smarty->assign('headerLiClass', $headerLiClass);
?>
