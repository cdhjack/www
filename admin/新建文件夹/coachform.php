<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 2;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode);//功能区权限检测
$smarty->assign("title", "信息编辑");

$breadcrumbs = array();
$breadcrumbs[] = array(
	'text'      => '首页',
	'href'      => SITE_URL.'admin',
	'separator' => false
);
$breadcrumbs[] = array(
	'text'      => '教练列表',
	'href'      => SITE_URL.'admin/coach.php',
	'separator' => ' :: '
);
$id = isset($_POST["id"])?(int)$_POST["id"]:(int)$_GET["id"];
$breadcrumbs[] = array(
	'text'      => '信息编辑',
	'href'      => SITE_URL.'admin/coachform.php?id='.$id,
	'separator' => ' :: '
);
$smarty->assign("breadcrumbs", $breadcrumbs);


//获取类型列表
$sql = "SELECT id,val FROM coachtype ORDER BY id asc";
$query = $db->query($sql);
$coachTypeArr = $db->fetch($query);
//print_r($coachTypeArr);

$coachInfo = array();
if($id){
	$sql = "SELECT a.*,b.price,b.photo,b.sign,b.adv,b.flow FROM coach a LEFT JOIN course b ON a.id=b.uid WHERE a.id='".$id."'";
	//$coachInfo = $db->fetchRow($sql);
	$coachInfo = $db->fetchRow($sql,MYSQL_ASSOC);	
}
//print_r($coachInfo);

//头像信息处理
$newCoachInfo = array();
if($coachInfo){
	foreach($coachInfo as $k=>$v){
		
		if($k=='tx'){
			if(strpos($v, 'http://api.holylandsports.com.cn/')!==false){
				$avatar = str_replace("http://api.holylandsports.com.cn/",SITE_URL,$v);
			}
			else if(strpos($v, 'http://www.website.com/')!==false){
				$avatar = str_replace("http://www.website.com/",SITE_URL,$v);
			}
			else{
				//$avatar = SITE_URL.substr($v,1);
				$avatar = $v;
			}
			$newCoachInfo['avatar'] = '<img src="'.$avatar.'" alt="" />';
			//echo $newCoachInfo['avatar'];exit;
		}	
		if($k=='star'){
			$newCoachInfo['star_html'] = getStarHtml($v);
		}
		if($k=='tdstar'){
			$newCoachInfo['tdstar_html'] = getStarHtml($v);
		}
		if($k=='zlstar'){
			$newCoachInfo['zlstar_html'] = getStarHtml($v);
		}
		if($k=='nrstar' ){
			$newCoachInfo['nrstar_html'] = getStarHtml($v);
		}
		if($k=='photo'){
			if(empty($v)){
				$newCoachInfo['photo_list'] = '';
			}
			else{
				/*[{"id":1,"url":"/upload/2014/09/17/20140917173825_91952_thumb.jpg"},{"id":2,"url":"/upload/2014/09/17/20140917173858_47311_thumb.jpg"},{"id":3,"url":"/upload/2014/09/17/20140917173907_55847_thumb.jpg"},{"id":4,"url":"/upload/2014/09/17/20140917173929_10093_thumb.jpg"},{"id":5,"url":"/upload/2014/09/17/20140917174043_26655_thumb.jpg"},{"id":6,"url":"/upload/2014/09/17/20140917174219_37480_thumb.jpg"}]*/
				$photoArr = json_decode($v);
				//echo $photoArr[0]->id.'<br>';
				//echo $photoArr[0]->url;
				//exit;
				$photoList = '';
				if($photoArr){
					foreach($photoArr as $key=>$value){
						//$photoList .= '<img src="'.SITE_URL.substr($photoArr[$key]->url,1).'" alt="" /><br>';
						$photoList .= '<img src="'.$photoArr[$key]->url.'" alt="" /><br>';
					}
				}	
				$newCoachInfo['photo_list'] = $photoList;			
			}		
		}
		$newCoachInfo[$k] = $v;
	}
}
//print_r($newCoachInfo);


$smarty->assign("backUrl", empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']);
$smarty->assign("coachTypeArr", $coachTypeArr);
$smarty->assign("coachInfo", $newCoachInfo);
$smarty->view('coach_form.tpl');
?>