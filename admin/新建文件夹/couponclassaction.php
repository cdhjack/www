<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 7;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode,'Edit');//功能区权限检测

$act = isset($_POST['act'])?$_POST['act']:$_GET['act'];
switch($act){
	case 'save':
		$update_i_type = $_POST["update_i_type"];
		$update_idesc = $_POST['update_idesc'];
		$new_i_type = $_POST['i_type'];
		$idesc = trim($_POST['idesc']);
		$title = trim($_POST['title']);
		$price = (float)trim($_POST['price']);
		$total = (int)trim($_POST['total']);
		$yxq = trim($_POST['yxq']);	
		$note = $_POST['note'];			
		$adddate = date('Y-m-d');
		
		if($new_i_type==''){
			redirectAdmin ('错误:请选择优惠券类型！', 'history.go(-1)',false);
		}
		
		if($update_i_type!="" && $update_idesc!=""){//更新
			//判断生成的优惠券是否有已开始兑换或使用的，有，则不允许更新操作
			$tmpSql = "SELECT id FROM coupon WHERE i_type='".$update_i_type."' and (isget=1 or used=1)";
			$tmpNum = $db->num($tmpSql);
			if($tmpNum){
				$msgInfo = "\"".$update_idesc."\"优惠券已经被兑换或使用,不允许修改!";
			}
			else{
				$sql = "UPDATE coupon SET `name`='".$title."'";				
				if($new_i_type=='new' && !empty($idesc)){//优惠券类型新建，并名称为idesc
					$sql .= ",`idesc`='".$idesc."',`i_type`='".$update_i_type."'";		
				}
				$sql .=",`price`='".$price."',`yxq`='".$yxq."',`note`='".$note."' WHERE i_type='".$update_i_type."'";
				$db->query($sql);
				$msgInfo = "修改\"".$update_idesc."\"优惠券成功";
			}
		}
		else{//新增优惠券
			if($new_i_type=='new' && !empty($idesc)){//优惠券类型新建，并名称为idesc
				//获取数据库中最大的i_type值，新建类型为此max值加1				
				$tmpSql = "SELECT max(i_type) as max_type FROM coupon";
				$tmpInfo = $db->fetchRow($tmpSql);
				$maxType = "";
				if($tmpInfo){$maxType = $tmpInfo['max_type'];}
				$set_i_type = ($maxType=="")?0:($maxType+1);
				$set_idesc = $idesc;				
			}
			else{
				$set_i_type = $new_i_type;
				//获取选中的类型值
				$tmpSql = "SELECT idesc FROM coupon WHERE i_type='".$set_i_type."' limit 1";
				$tmpInfo = $db->fetchRow($tmpSql);
				$set_idesc = "";
				if($tmpInfo){$set_idesc = $tmpInfo['idesc'];}
			}			
			
			$sql = "INSERT INTO coupon(`cdkey`,`name`,`idesc`,`price`,`yxq`,`i_type`,`note`) VALUES";
			if($total>0){
				$i = 0;
				for($j=0;$j<$total;$j++){
					$cdkey = uniqid();//13位(数据库唯一性检测,暂省略)					
					$sql .= "('".$cdkey."','".$title."','".$set_idesc."','".$price."','".$yxq."','".$set_i_type."','".$note."'),";
					$i++;
					if($i>1000){
						$sql = substr($sql,0,-1);
						$db->query($sql);
						
						$i=0;
						$sql = "INSERT INTO coupon(`cdkey`,`name`,`idesc`,`price`,`yxq`,`i_type`,`note`) VALUES";
					}
				}
				if($i>0){
					//echo $sql;exit;
					$sql = substr($sql,0,-1);
					$db->query($sql);
				}
				$msgInfo = "添加\"".$set_idesc."\"优惠券成功";
			
			}
			else{
				$msgInfo = "错误:优惠券生成数量必须大于0!";
			}
		}			
		redirectAdmin ($msgInfo, SITE_URL.'admin/couponclass.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);		
		break;
	case 'delete':
		if (isset($_POST['selected']) && !empty($_POST['selected'])) {
			$deleteCouponId = "";
			$notDeleteCouponName = "";
			foreach($_POST ['selected'] as $couponId){
				$couponInfo = $db->fetchRow("SELECT id,idesc FROM coupon WHERE i_type='".$couponId."' and (isget=1 or used=1)");
				if($couponInfo){
					$notDeleteCouponName .= "[".$couponInfo['idesc']."]";
				}
				else{
					$deleteCouponId .= $couponId.',';
				}
			}
			if($deleteCouponId!=""){
				$deleteCouponId = substr($deleteCouponId,0,-1);
				$condition = (strstr($deleteCouponId,','))?"i_type in(".$deleteCouponId.")":"i_type='".$deleteCouponId."'";
				$db->query("DELETE FROM `coupon` WHERE ".$condition);
				$msgInfo = "删除选中的优惠券成功";
				$msgInfo .= ($notDeleteCouponName=="")?"!":",附：优惠券".$notDeleteCouponName."已经被兑换或使用,不允许删除!";
			}
			else{
				$msgInfo = "册除失败,优惠券已经被兑换或使用,不允许删除!";
			}
		}
		else{
			$msgInfo = "错误:请您先选择要删除的信息！";
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/couponclass.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		break;
	default:
		redirectAdmin ('IllegalError', SITE_URL.'admin/couponclass.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']));
		break;
}



?>