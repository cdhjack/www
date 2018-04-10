<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 11;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode,'Edit');//功能区权限检测

$act = isset($_POST['act'])?$_POST['act']:$_GET['act'];
switch($act){
	case 'save':
		$id = isset($_POST["id"])?(int)$_POST["id"]:(int)$_GET["id"];
		$title = trim($_POST['title']);
		$date_start = trim($_POST['date_start']);
		$date_end = trim($_POST['date_end']);
		$total = (float)trim($_POST['total']);
		$give = (float)trim($_POST['give']);
		$status = (int)trim($_POST['status']);
		$addtime = time();
		
		//验证提交信息
		$time_start = toTime($date_start.' 00:00:00');
		$time_end = toTime($date_end.' 23:59:59');
		if($time_end<$time_start){
			redirectAdmin ('错误:结束日期不能小于开始日期！', 'history.go(-1)',false);
		}		
		//查询充值金额在起止时间能是否已有设置
		$sql = "SELECT id FROM charge WHERE total='".$total."' and ((date_start<='".$date_start."' and date_end>='".$date_start."') or (date_start<='".$date_end."' and date_end>='".$date_end."'))";
		$num = $db->num($sql);
		if($num){
			redirectAdmin ('错误:充值金额为"'.$total.'"的活动,起止时间存在重叠设置！', 'history.go(-1)',false);
		}		
		if($total<$give){
			redirectAdmin ('错误:赠送金额不能大于充值金额！', 'history.go(-1)',false);
		}
		
		if($id){//更新
			$db->query("UPDATE charge SET title='".$title."',total='".$total."',give='".$give."',date_start='".$date_start."',date_end='".$date_end."',status='".$status."' WHERE id='".$id."'");
			$msgInfo = "修改信息\"".$title."\"成功";
		}
		else{//新增
			$db->query("INSERT INTO charge(`title`,`total`,`give`,`date_start`,`date_end`,`status`,`adduser`,`addtime`) VALUES('".$title."','".$total."','".$give."','".$date_start."','".$date_end."','".$status."','".($admin->u_name)."','".$addtime."');");
			$msgInfo = "添加信息\"".$title."\"成功";
		}			
		redirectAdmin ($msgInfo, SITE_URL.'admin/charge.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);		
		break;
	case 'delete':
		if (isset($_POST['selected']) && !empty($_POST['selected'])) {
			$selectedId = (count($_POST ['selected'])>1)?implode ( ",", $_POST ['selected'] ):$_POST ['selected'][0];
			$condition = (strstr($selectedId,','))?"id in(".$selectedId.")":"id='".$selectedId."'";
			$db->query("DELETE FROM charge WHERE ".$condition);
			$msgInfo = "删除选中的信息成功!";
		}
		else{
			$msgInfo = "错误:请您先选择要删除的信息！";
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/charge.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		break;
	case 'isshow':
		if (isset($_POST['selected']) && !empty($_POST['selected'])) {
			$selectedId = (count($_POST ['selected'])>1)?implode ( ",", $_POST ['selected'] ):$_POST ['selected'][0];
			$condition = (strstr($selectedId,','))?"id in(".$selectedId.")":"id='".$selectedId."'";
			$db->query("UPDATE charge SET status=1 WHERE ".$condition);
			$msgInfo = "启用选中的信息成功!";
		}
		else{
			$msgInfo = "错误:请您先选择要启用的信息！";
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/charge.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		break;
	case 'notshow':
		if (isset($_POST['selected']) && !empty($_POST['selected'])) {
			$selectedId = (count($_POST ['selected'])>1)?implode ( ",", $_POST ['selected'] ):$_POST ['selected'][0];
			$condition = (strstr($selectedId,','))?"id in(".$selectedId.")":"id='".$selectedId."'";
			$db->query("UPDATE charge SET status=0 WHERE ".$condition);
			$msgInfo = "停用选中的信息成功!";
		}
		else{
			$msgInfo = "错误:请您先选择要停用的信息！";
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/charge.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		break;
	default:
		redirectAdmin ('IllegalError', SITE_URL.'admin/charge.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']));
		break;
}



?>