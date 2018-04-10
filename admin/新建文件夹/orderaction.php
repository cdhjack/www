<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 14;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode,'Edit');//功能区权限检测

$act = isset($_POST['act'])?$_POST['act']:$_GET['act'];
switch($act){	
	case 'save':
		$id = isset($_POST["id"])?(int)$_POST["id"]:(int)$_GET["id"];
		$old_tdstar = trim($_POST['old_tdstar']);
		$old_tdstar = empty($old_tdstar)?0:$old_tdstar;
		$old_zlstar = trim($_POST['old_zlstar']);
		$old_zlstar = empty($old_zlstar)?0:$old_zlstar;
		$old_nrstar = trim($_POST['old_nrstar']);
		$old_nrstar = empty($old_nrstar)?0:$old_nrstar;	
		
		$new_tdstar = trim($_POST['tdstar']);
		$new_tdstar = empty($new_tdstar)?0:$new_tdstar;
		$new_zlstar = trim($_POST['zlstar']);
		$new_zlstar = empty($new_zlstar)?0:$new_zlstar;
		$new_nrstar = trim($_POST['nrstar']);
		$new_nrstar = empty($new_nrstar)?0:$new_nrstar;		
		$user_comment_id = (int)trim($_POST['user_comment_id']);
		$coach_comment_id = (int)trim($_POST['coach_comment_id']);
		$user_comment_content = htmlspecialchars($_POST['user_comment_content']);
		$coach_comment_content = htmlspecialchars($_POST['coach_comment_content']);
		$addtime = date('Y-m-d H:i:s');
		
		//验证提交信息
		if($new_tdstar<0 || $new_tdstar>5 || $new_zlstar<0 || $new_zlstar>5 || $new_nrstar<0 || $new_nrstar>5){
			redirectAdmin ('错误:星级必须是大于0小于5之间的数字，支持半颗星！', 'history.go(-1)',false);
		}
		
		//更新订单评分信息
		$new_score = (float)(($new_tdstar+$new_zlstar+$new_nrstar)/3);		
		$db->query("UPDATE orders SET `tdstar`='".$new_tdstar."',`zlstar`='".$new_zlstar."',`nrstar`='".$new_nrstar."',`score`='".$new_score."' WHERE id='".$id."'");
		//echo $new_score;exit;		
		
		
		//获取该订单的教练的信息
		$sql = "SELECT a.cid,b.* FROM orders a,coach b WHERE a.cid=b.id and a.id='".$id."'";
		$coachInfo = $db->fetchRow($sql,MYSQL_ASSOC);
		$new_coach_tdstar = (float)($coachInfo['tdstar'] - ($old_tdstar-$new_tdstar)/$coachInfo['order_num']);
		$new_coach_tdstar = ($new_coach_tdstar>5)?5:$new_coach_tdstar;
		$new_coach_zlstar = (float)($coachInfo['zlstar'] - ($old_zlstar-$new_zlstar)/$coachInfo['order_num']);
		$new_coach_zlstar = ($new_coach_zlstar>5)?5:$new_coach_zlstar;
		$new_coach_nrstar = (float)($coachInfo['nrstar'] - ($old_nrstar-$new_nrstar)/$coachInfo['order_num']);
		$new_coach_nrstar = ($new_coach_nrstar>5)?5:$new_coach_nrstar;
		$new_coach_star = (float)(($new_coach_tdstar+$new_coach_zlstar+$new_coach_nrstar)/3);
		$new_coach_star = ($new_coach_star>5)?5:$new_coach_star;
		//排名得分=评论得分*60(60%)+订单数量*20(20%)+赞数量*10(10%)+被收藏次数*10(10%)+发帖数量*0(0%)+回帖数量*0(0%);
		$new_i_rank = round($new_coach_star*60+$coachInfo['order_num']*20+$coachInfo['thumb']*10+$coachInfo['fav']*10);
		//更新教练评分、教练排名
		$db->query("UPDATE coach SET `tdstar`='".$new_coach_tdstar."',`zlstar`='".$new_coach_zlstar."',`nrstar`='".$new_coach_nrstar."',`star`='".$new_coach_star."',`i_rank`='".$new_i_rank."' WHERE id='".$coachInfo['cid']."'");
		
		
		//更新或添加评论信息
		if(!empty($user_comment_content)){
			if($user_comment_id){
				$db->query("UPDATE ordermeta SET `text`='".$user_comment_content."' WHERE id='".$user_comment_id."'");
				$pid = $user_comment_id;
			}
			else{
				$db->query("INSERT INTO ordermeta(`oid`,`pid`,`utype`,`text`,`time`) VALUES('".$id."',0,0,'".$user_comment_content."','".$addtime."');");
				$pid = $db->getLastId();
			}
		}
		if(!empty($coach_comment_content)){
			if($coach_comment_id){
				$db->query("UPDATE ordermeta SET `text`='".$coach_comment_content."' WHERE id='".$coach_comment_id."'");
			}
			else{
				$db->query("INSERT INTO ordermeta(`oid`,`pid`,`utype`,`text`,`time`) VALUES('".$id."','".$pid."',1,'".$user_comment_content."','".$addtime."');");
			}
		}
		$msgInfo = "修改评论信息成功";		
		redirectAdmin ($msgInfo, SITE_URL.'admin/order.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);		
		break;
	case 'cancle'://取消订单
		$id = isset($_POST["id"])?(int)$_POST["id"]:(int)$_GET["id"];
		$result = $db->query("UPDATE orders SET `type`=9 WHERE id='".$id."'");
		if ($result) {
			$msgInfo = "取消订单\"#".$id."\"成功!";
		}
		else{
			$msgInfo = "错误:取消订单\"#".$id."\"失败！";
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/order.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		break;
	case 'refund'://退款
		$id = isset($_POST["id"])?(int)$_POST["id"]:(int)$_GET["id"];		
		$reason = htmlspecialchars($_POST['reason']);
		$addtime = date('Y-m-d H:i:s');
		
		//获取订单信息
		$sql = "SELECT * FROM orders WHERE id='".$id."'";
		$orderInfo = $db->fetchRow($sql);
		
		//优惠券处理，优惠券状态改为未用(used = 0)
		if($orderInfo['yhqid']){
			$db->query("UPDATE coupon SET `used`=0 WHERE id='".$orderInfo['yhqid']."'");
		}
		
		//用户余额处理
		if($orderInfo['uid']){
			$userInfo = $db->fetchRow("SELECT ye FROM user WHERE id='".$orderInfo['uid']."'");
			$new_ye = (float)($userInfo['ye'] + $orderInfo['rprice']);
			$db->query("UPDATE user SET `ye`='".$new_ye."' WHERE id='".$orderInfo['uid']."'");		
		
			//消费记录日志入库（optype:操作类型，0为支出，1为收入）(充值类型,1为支付宝手机网页2为结课收入。3为订课消费4为课程退款)
			$idesc = "订单#".$id."退款：".$reason;
			$result = $db->query("INSERT INTO paydetail(`uid`,`utype`,`optype`,`money`,`orderid`,`idesc`,`paytype`,`datetime`,`adduser`) VALUES('".$orderInfo['uid']."',0,1,'".$orderInfo['rprice']."','".$id."','".$idesc."',4,'".$addtime."','".($admin->u_name)."');");
		}
		
		//给用户发送短信提醒
		$sms = "您的订单\"#".$id."\"已取消";
		$sms .= ($orderInfo['rprice']>0)?",订单金额￥".$orderInfo['rprice']."已退回到您的个人帐户中,谢谢":"";
		$sms .= "！";
		$smsResult = sendSms($orderInfo['phone'], $sms);
		
		//更新订单状态为取消
		$db->query("UPDATE orders SET `type`=9 WHERE id='".$id."'");
		
		$msgInfo = "订单\"#".$id."\"退款处理成功!";
		redirectAdmin ($msgInfo, SITE_URL.'admin/order.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		break;	
	default:
		redirectAdmin ('IllegalError', SITE_URL.'admin/order.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']));
		break;
}
?>