<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 15;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode);//功能区权限检测
$smarty->assign("title", "数据报表");

$breadcrumbs = array();
$breadcrumbs[] = array(
	'text'      => '首页',
	'href'      => SITE_URL.'admin',
	'separator' => false
);

$breadcrumbs[] = array(
	'text'      => '数据报表',
	'href'      => SITE_URL.'admin/report.php',
	'separator' => ' :: '
);
$smarty->assign("breadcrumbs", $breadcrumbs);

//查询年月值
$year = isset($_POST["year"])?(int)$_POST["year"]:(int)$_GET["year"];
$month = isset($_POST["month"])?$_POST["month"]:$_GET["month"];
//echo $month;
$nowYear = date('Y');
$nowMonth = date('m');
//echo $nowMonth;

//查询条件验证
if(!empty($year) && !empty($month)){
	if($year>$nowYear){
		redirectAdmin ('暂无'.$year.'年的数据报表！', SITE_URL.'admin/report.php',false);
	}
	if($year==$nowYear && $month>$nowMonth){
		redirectAdmin ('暂无'.$year.'年'.$month.'月的数据报表！', SITE_URL.'admin/report.php',false);
	} 
}
$year = empty($year)?$nowYear:$year;
$month = empty($month)?$nowMonth:$month;


//年份显示
$yearArr = array();
$i=0;
do{
	$yearArr[] = $nowYear-$i;
	$i++;
}
while($i<1);


//12个月
$monthArr = array();
$i=0;
do{
	$i_format = (($i+1)<10)?'0'.($i+1):($i+1);
	$monthArr[] = $i_format;
	$i++;
}
while($i<12);


//获取月份应有的天数
$date = $year.'-'.$month.'-01';
$timestamp=strtotime($date);
$mdays=date('t',$timestamp);
//echo $mdays;


$mdays = ($year==$nowYear && $month==$nowMonth)?date('j'):$mdays;//date('j')无前导0
$mdaysArr = array();//显示日期的数组(要求显示01,02....)
//echo $mdays;exit;
for($i=1;$i<=$mdays;$i++){
	$i_format = ($i<10)?'0'.$i:$i;
	$mdaysArr[] = $i_format; 
}

//查询起止日期
$start_date = $year."-".$month."-01";
$end_date = $year."-".$month."-".$mdays;

//查询报表的属性名称数组定义
$reportNameArr = array('userReg'=>'个人注册数','coachReg'=>'教练注册数','validOrderNum'=>'有效订单数','validOrderMoney'=>'有效订单金额','completeOrderNum'=>'完成订单数','completeOrderMoney'=>'完成订单金额','rechargeNum'=>'充值人数','rechargeMoney'=>'充值金额');

//查询sql
$sqlUserReg = "SELECT reg_date,count(id) as reg_num FROM user WHERE reg_date>='".$start_date."' and reg_date<='".$end_date."' GROUP BY reg_date";
//echo $sqlUserReg;exit;
//20141017:要求审核过的教练
$sqlCoachReg = "SELECT reg_date,count(id) as reg_num FROM coach WHERE reg_date>='".$start_date."' and reg_date<='".$end_date."' and pass=1 GROUP BY reg_date";
//echo $sqlCoachReg;
$sqlValidOrderNum = "SELECT `date`,count(id) as valid_order_num FROM orders WHERE `date`>='".$start_date."' and `date`<='".$end_date."' and type in(1,2,3,8) GROUP BY `date`";
$sqlValidOrderMoney = "SELECT `date`,sum(rprice) as valid_order_money FROM orders WHERE `date`>='".$start_date."' and `date`<='".$end_date."' and type in(1,2,3,8) GROUP BY `date`";
$sqlCompleteOrderNum = "SELECT `date`,count(id) as complete_order_num FROM orders WHERE `date`>='".$start_date."' and `date`<='".$end_date."' and type=8 GROUP BY `date`";
$sqlCompleteOrderMoney = "SELECT `date`,sum(rprice) as complete_order_money FROM orders WHERE `date`>='".$start_date."' and `date`<='".$end_date."' and type=8 GROUP BY `date`";
$sqlRechargeNum = "SELECT DATE_FORMAT(`datetime`,'%Y-%m-%d') as recharge_date,count(id) as recharge_num FROM paydetail WHERE `datetime`>='".$start_date." 00:00:00' and `datetime`<='".$end_date." 23:59:59' and istate=1 and paytype=1 and optype=1 GROUP BY DATE_FORMAT(`datetime`,'%Y-%m-%d')";
$sqlRechargeMoney = "SELECT DATE_FORMAT(`datetime`,'%Y-%m-%d') as recharge_date,sum(money) as recharge_money FROM paydetail WHERE `datetime`>='".$start_date." 00:00:00' and `datetime`<='".$end_date." 23:59:59' and istate=1 and paytype=1 and optype=1 GROUP BY DATE_FORMAT(`datetime`,'%Y-%m-%d')";

$queryUserReg = $db->query($sqlUserReg);
$userRegArr = $db->fetch($queryUserReg,MYSQL_ASSOC);
//print_r($userRegArr);exit;
$queryCoachReg = $db->query($sqlCoachReg);
$coachRegArr = $db->fetch($queryCoachReg,MYSQL_ASSOC);
$queryValidOrderNum = $db->query($sqlValidOrderNum);
$validOrderNumArr = $db->fetch($queryValidOrderNum,MYSQL_ASSOC);
$queryValidOrderMoney = $db->query($sqlValidOrderMoney);
$validOrderMoneyArr = $db->fetch($queryValidOrderMoney,MYSQL_ASSOC);
$queryCompleteOrderNum = $db->query($sqlCompleteOrderNum);
$completeOrderNumArr = $db->fetch($queryCompleteOrderNum,MYSQL_ASSOC);
$queryCompleteOrderMoney = $db->query($sqlCompleteOrderMoney);
$completeOrderMoneyArr = $db->fetch($queryCompleteOrderMoney,MYSQL_ASSOC);
$queryRechargeNum = $db->query($sqlRechargeNum);
$rechargeNumArr = $db->fetch($queryRechargeNum,MYSQL_ASSOC);
$queryRechargeMoney = $db->query($sqlRechargeMoney);
$rechargeMoneyArr = $db->fetch($queryRechargeMoney,MYSQL_ASSOC);


$userRegNewArr = array();
$coachRegNewArr = array();
$validOrderNumNewArr = array();
$validOrderMoneyNewArr = array();
$completeOrderNumNewArr = array();
$completeOrderMoneyNewArr = array();
$rechargeNumNewArr = array();
$rechargeMoneyNewArr = array();
if(!empty($userRegArr)){
	foreach($userRegArr as $key=>$value){
		$userRegNewArr[$value['reg_date']] = $value['reg_num'];
	}
}
if(!empty($coachRegArr)){
	foreach($coachRegArr as $key=>$value){
		$coachRegNewArr[$value['reg_date']] = $value['reg_num'];
	}
}
if(!empty($validOrderNumArr)){
	foreach($validOrderNumArr as $key=>$value){
		$validOrderNumNewArr[$value['date']] = $value['valid_order_num'];
	}
}
if(!empty($validOrderMoneyArr)){
	foreach($validOrderMoneyArr as $key=>$value){
		$validOrderMoneyNewArr[$value['date']] = $value['valid_order_money'];
	}
}
if(!empty($completeOrderNumArr)){
	foreach($completeOrderNumArr as $key=>$value){
		$completeOrderNumNewArr[$value['date']] = $value['complete_order_num'];
	}
}
if(!empty($completeOrderMoneyArr)){
	foreach($completeOrderMoneyArr as $key=>$value){
		$completeOrderMoneyNewArr[$value['date']] = $value['complete_order_money'];
	}
}
if(!empty($rechargeNumArr)){
	foreach($rechargeNumArr as $key=>$value){
		$rechargeNumNewArr[$value['recharge_date']] = $value['recharge_num'];
	}
}
if(!empty($rechargeMoneyArr)){
	foreach($rechargeMoneyArr as $key=>$value){
		$rechargeMoneyNewArr[$value['recharge_date']] = $value['recharge_money'];
	}
}


//报表数据数组整合
$reportArr = array();
foreach($reportNameArr as $key=>$value){
	for($i=1;$i<=$mdays;$i++){
		$i_format = ($i<10)?'0'.$i:$i;
		$temp_date = $year."-".$month."-".$i_format;
		
		switch($key){
			case 'userReg':
				$reportArr[$key][$i] = empty($userRegNewArr[$temp_date])?0:$userRegNewArr[$temp_date];
				break;
			case 'coachReg':
				$reportArr[$key][$i] = empty($coachRegNewArr[$temp_date])?0:$coachRegNewArr[$temp_date];
				break;
			case 'validOrderNum':
				$reportArr[$key][$i] = empty($validOrderNumNewArr[$temp_date])?0:$validOrderNumNewArr[$temp_date];
				break;
			case 'validOrderMoney':
				$reportArr[$key][$i] = '￥'.(empty($validOrderMoneyNewArr[$temp_date])?0:round($validOrderMoneyNewArr[$temp_date],2));
				break;
			case 'completeOrderNum':
				$reportArr[$key][$i] = empty($completeOrderNumNewArr[$temp_date])?0:$completeOrderNumNewArr[$temp_date];
				break;
			case 'completeOrderMoney':
				$reportArr[$key][$i] = '￥'.(empty($completeOrderMoneyNewArr[$temp_date])?0:round($completeOrderMoneyNewArr[$temp_date],2));
				break;
			case 'rechargeNum':
				$reportArr[$key][$i] = empty($rechargeNumNewArr[$temp_date])?0:$rechargeNumNewArr[$temp_date];
				break;
			case 'rechargeMoney':
				$reportArr[$key][$i] = '￥'.(empty($rechargeMoneyNewArr[$temp_date])?0:round($rechargeMoneyNewArr[$temp_date],2));
				break;
			default:
				break;		
		}
	}
}
$smarty->assign("yearArr", $yearArr);
$smarty->assign("monthArr", $monthArr);
$smarty->assign("searchYear", $year);
$smarty->assign("searchMonth", $month);
$smarty->assign("mdaysArr", $mdaysArr);
$smarty->assign("reportNameArr", $reportNameArr);
$smarty->assign("reportArr", $reportArr);
$smarty->view('report.tpl');
?>