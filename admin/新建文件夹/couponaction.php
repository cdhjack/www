<?php
require_once('global.php');

$admin->u_is_login();
$powerCode = 8;//config/power_config.inc.php中手动定义
$admin->u_check_power($powerCode,'Edit');//功能区权限检测

$act = isset($_POST['act'])?$_POST['act']:$_GET['act'];
switch($act){	
	case 'delete':
		if (isset($_POST['selected']) && !empty($_POST['selected'])) {
			$deleteCouponId = "";
			$notDeleteCouponName = "";
			foreach($_POST ['selected'] as $couponId){
				$couponInfo = $db->fetchRow("SELECT id,name FROM coupon WHERE id='".$couponId."' and (isget=1 or used=1)");
				if($couponInfo){
					$notDeleteCouponName .= "[".$couponInfo['name']."]";
				}
				else{
					$deleteCouponId .= $couponId.',';
				}
			}
			if($deleteCouponId!=""){
				$deleteCouponId = substr($deleteCouponId,0,-1);
				$condition = (strstr($deleteCouponId,','))?"id in(".$deleteCouponId.")":"id='".$deleteCouponId."'";
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
		redirectAdmin ($msgInfo, SITE_URL.'admin/coupon.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		break;
	case 'deleteone':
		$id = isset($_POST["id"])?(int)$_POST["id"]:(int)$_GET["id"];		
		if ($id) {	
			$couponInfo = $db->fetchRow("SELECT id,name FROM coupon WHERE id='".$id."' and (isget=1 or used=1)");
			if($couponInfo){
				$msgInfo = "册除失败,优惠券已经被兑换或使用,不允许删除!";
			}
			else{
				$condition = "id='".$id."'";
				$db->query("DELETE FROM coupon WHERE ".$condition);
				$msgInfo = "删除信息成功!";
			}
		}
		else{
			$msgInfo = "错误:请您先选择要删除的信息！";
		}
		redirectAdmin ($msgInfo, SITE_URL.'admin/coupon.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']),false);
		break;	
	case 'excel':
		if (PHP_SAPI == 'cli'){//表示php在命令行下执行
			redirectAdmin ('This example should only be run from a Web Browser', 'history.go(-1)',false);
		}
		//查询值
		$filter_id = isset($_POST["filter_id"])?$_POST["filter_id"]:$_GET["filter_id"];
		$filter_type = isset($_POST["filter_type"])?$_POST["filter_type"]:$_GET["filter_type"];
		$filter_cdkey = isset($_POST["filter_cdkey"])?$_POST["filter_cdkey"]:$_GET["filter_cdkey"];
		$filter_price = isset($_POST["filter_price"])?$_POST["filter_price"]:$_GET["filter_price"];
		$filter_yxq = isset($_POST["filter_yxq"])?$_POST["filter_yxq"]:$_GET["filter_yxq"];
		$filter_gettime = isset($_POST["filter_gettime"])?$_POST["filter_gettime"]:$_GET["filter_gettime"];
		$filter_username = isset($_POST["filter_username"])?$_POST["filter_username"]:urldecode($_GET["filter_username"]);
		$filter_status = isset($_POST["filter_status"])?$_POST["filter_status"]:$_GET["filter_status"];
		
		$addurl = '';
		$sql = "SELECT a.*,b.name as username FROM coupon a LEFT JOIN user b ON a.uid=b.id WHERE 1=1";
		
		if(!empty($filter_id)){
			$sql .=" and a.id='".(int)$filter_id."' ";
			$addurl .='&filter_id='.$filter_id;
		}
		if($filter_type!=""){
			$sql .=" and a.i_type='".(int)$filter_type."' ";
			$addurl .='&filter_type='.$filter_type;
		}
		if(!empty($filter_cdkey)){
			$sql .=" and a.cdkey='".$filter_cdkey."' ";
			$addurl .='&filter_cdkey='.$filter_cdkey;
		}
		if(!empty($filter_price)){
			$sql .=" and a.price='".(float)$filter_price."' ";
			$addurl .='&filter_price='.$filter_price;
		}
		if(!empty($filter_yxq)){
			$sql .=" and a.yxq='".$filter_yxq."' ";
			$addurl .='&filter_yxq='.$filter_yxq;
		}
		if(!empty($filter_gettime)){
			$sql .=" and a.gettime='".$filter_gettime."' ";
			$addurl .='&filter_gettime='.$filter_gettime;
		}
		if(!empty($filter_username)){
			$sql .=" and b.name like '%".$filter_username."%' ";
			$addurl .='&filter_username='.urlencode($filter_username);
		}
		if($filter_status!=''){
			switch($filter_status){
				case 1://未兑换(未兑换：指用户未兑换，也未使用)
					$sql .=" and a.isget=0 and a.used=0";
					break;
				case 2://已兑换(已兑换：指用户已兑换，但未使用)
					$sql .=" and a.isget=1 and  a.used=0 ";
					break;
				case 3://已使用(已使用：指用户已兑换，已使用)
					$sql .=" and a.isget=1 and  a.used=1 ";
					break;
				case 4://已过期(已过期：指用户未兑换，未使用，已过期)
					$now_date = date('Y-m-d');
					$sql .=" and a.isget=0 and a.used=0 and a.yxq<'".$now_date."' ";
					break;	
				default:
					$sql .="";
					break;
			}
			$addurl .='&filter_status='.$filter_status;
		}
		
		//echo $sql;
		$count = $db->num($sql);		
		if(!$count){
			redirectAdmin ('错误：筛选结果为空,导出失败!', 'history.go(-1)',false);
		}		
		$sql .="  ORDER BY a.id desc";
		$query = $db->query($sql);
		$couponArr = $db->fetch($query);
		
		require_once(SYS_ROOT . 'class/Excel/PHPExcel.php');
		// Create new PHPExcel object
		$objectPHPExcel = new PHPExcel();
	
		// Set document properties
        $objProps = $objectPHPExcel->getProperties();
        $objProps->setCreator('App System'); //作者
        $objProps->setLastModifiedBy('App System'); //修订
        $objProps->setTitle("Office 2007 XLSX Document"); //标题
        $objProps->setSubject("Office 2007 XLSX Document"); //主题
        $objProps->setDescription("Test document for Office 2007 XLSX, generated using PHP classes."); //备注
        $objProps->setKeywords("Office 2007 openxml php"); //标记
        $objProps->setCategory("Test result file"); //类别
		
		//设置当前的sheet索引，用于后续的内容操作。  
        //一般只有在使用多个sheet的时候才需要显示调用。  
        //缺省情况下，PHPExcel会自动创建第一个sheet被设置SheetIndex=0  
        $objectPHPExcel->setActiveSheetIndex(0);
		
		
		//每页条数
        $page_size = 20;
        //总页数的算出
        $page_count = (int) ($count / $page_size) + 1;
        $current_page = 0;
 
        $n = 0;
        $spm = 0;
        foreach ($couponArr as $product) {
 
            if ($n % $page_size === 0) {
                if ($n) {
                    $objectPHPExcel->createSheet();
                    $current_page = $current_page + 1;
                    $spm = 0;
                }
                //报表头的输出
                //$objectPHPExcel->getActiveSheet()->mergeCells('B1:G1');
                //$objectPHPExcel->getActiveSheet()->setCellValue('B1', 'App平台优惠券');
				$objectPHPExcel->setActiveSheetIndex($current_page)->mergeCells('B1:H1');
                $objectPHPExcel->setActiveSheetIndex($current_page)->setCellValue('B1', 'App平台优惠券');
 
                $objectPHPExcel->setActiveSheetIndex($current_page)->getStyle('B1')->getFont()->setSize(24);
                $objectPHPExcel->setActiveSheetIndex($current_page)->getStyle('B1')
                        ->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 
                $objectPHPExcel->setActiveSheetIndex($current_page)->setCellValue('B2', '日期：' . date("Y年m月j日"));
                $objectPHPExcel->setActiveSheetIndex($current_page)->setCellValue('H2', '第' . ($current_page + 1) . '/' . $page_count . '页');
                $objectPHPExcel->setActiveSheetIndex($current_page)->getStyle('H2')
                        ->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
 
                //表格头的输出
                $objectPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
                $objectPHPExcel->setActiveSheetIndex($current_page)->setCellValue('B3', '优惠券类型');
                $objectPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(17);
                $objectPHPExcel->setActiveSheetIndex($current_page)->setCellValue('C3', '兑换码');
                $objectPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(17);
                $objectPHPExcel->setActiveSheetIndex($current_page)->setCellValue('D3', '面额');
                $objectPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
                $objectPHPExcel->setActiveSheetIndex($current_page)->setCellValue('E3', '过期日期');
                $objectPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
                $objectPHPExcel->setActiveSheetIndex($current_page)->setCellValue('F3', '兑换时间');
                $objectPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
                $objectPHPExcel->setActiveSheetIndex($current_page)->setCellValue('G3', '归属用户');
                $objectPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
				$objectPHPExcel->setActiveSheetIndex($current_page)->setCellValue('H3', '状态');
                $objectPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
 
                //设置居中
                $objectPHPExcel->getActiveSheet()->getStyle('B3:H3')
                        ->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 
                //设置边框
                $objectPHPExcel->getActiveSheet()->getStyle('B3:H3')
                        ->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
                $objectPHPExcel->getActiveSheet()->getStyle('B3:H3')
                        ->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
                $objectPHPExcel->getActiveSheet()->getStyle('B3:H3')
                        ->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
                $objectPHPExcel->getActiveSheet()->getStyle('B3:H3')
                        ->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
                $objectPHPExcel->getActiveSheet()->getStyle('B3:H3')
                        ->getBorders()->getVertical()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
 
                //设置颜色
                $objectPHPExcel->getActiveSheet()->getStyle('B3:H3')->getFill()
                        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FF66CCCC');
            }
 
            //由PHPExcel根据传入内容自动判断单元格内容类型  setCellValue('A1', '字符串内容');  
            //显式指定内容类型  setCellValueExplicit('A1', '字符串内容', PHPExcel_Cell_DataType::TYPE_STRING)
 
            //明细的输出
            $objectPHPExcel->getActiveSheet()->setCellValueExplicit('B' . ($spm + 4), $product['idesc'], PHPExcel_Cell_DataType::TYPE_STRING);
            $objectPHPExcel->getActiveSheet()->setCellValueExplicit('C' . ($spm + 4), $product['cdkey'], PHPExcel_Cell_DataType::TYPE_STRING);
            $objectPHPExcel->getActiveSheet()->setCellValueExplicit('D' . ($spm + 4), $product['price'],PHPExcel_Cell_DataType::TYPE_STRING);
            $objectPHPExcel->getActiveSheet()->setCellValueExplicit('E' . ($spm + 4), $product['yxq'],PHPExcel_Cell_DataType::TYPE_STRING);
            $objectPHPExcel->getActiveSheet()->setCellValueExplicit('F' . ($spm + 4), empty($product['gettime'])?'':$product['gettime'],PHPExcel_Cell_DataType::TYPE_STRING);
            $objectPHPExcel->getActiveSheet()->setCellValueExplicit('G' . ($spm + 4), empty($product['username'])?'':$product['username'],PHPExcel_Cell_DataType::TYPE_STRING);
			if ($product['isget']=='0' && $product['used']=='0'){
				$status = "未兑换";//(未兑换：指用户未兑换，也未使用);				
				$yxqTime = toTime($product['yxq'].' 23:59:59');
				if(time()>$yxqTime){//(已过期：指用户未兑换，未使用，已过期)
					$status = "已过期";
				}
			}
			if ($product['isget']=='1' && $product['used']=='0'){
				$status = "已兑换";//(已兑换：指用户已兑换，但未使用);
			}
			if ($product['isget']=='1' && $product['used']=='1'){
				$status = "已使用";//(已使用：指用户已兑换，已使用)
			}
			$objectPHPExcel->getActiveSheet()->setCellValueExplicit('H' . ($spm + 4), $status,PHPExcel_Cell_DataType::TYPE_STRING);
			
            $currentRowNum = $spm + 4;
			//设置居中
			$objectPHPExcel->getActiveSheet()->getStyle('B'. ($spm + 4) .':H'. $currentRowNum)
					->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            //设置边框
            $objectPHPExcel->getActiveSheet()->getStyle('B' . ($spm + 4) . ':H' . $currentRowNum)
                    ->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
            $objectPHPExcel->getActiveSheet()->getStyle('B' . ($spm + 4) . ':H' . $currentRowNum)
                    ->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
            $objectPHPExcel->getActiveSheet()->getStyle('B' . ($spm + 4) . ':H' . $currentRowNum)
                    ->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
            $objectPHPExcel->getActiveSheet()->getStyle('B' . ($spm + 4) . ':H' . $currentRowNum)
                    ->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
            $objectPHPExcel->getActiveSheet()->getStyle('B' . ($spm + 4) . ':H' . $currentRowNum)
                    ->getBorders()->getVertical()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
            $n = $n + 1;
            $spm +=1;
        }
 
        //设置分页显示
        // $objectPHPExcel->getActiveSheet()->setBreak( 'I55' , PHPExcel_Worksheet::BREAK_ROW );
        //$objectPHPExcel->getActiveSheet()->setBreak( 'I10' , PHPExcel_Worksheet::BREAK_COLUMN );
        $objectPHPExcel->getActiveSheet()->getPageSetup()->setHorizontalCentered(true);
        $objectPHPExcel->getActiveSheet()->getPageSetup()->setVerticalCentered(true);
 
 
        ob_end_clean();
        ob_start();
 
        header('Content-Type : application/vnd.ms-excel');
        header('Content-Disposition:attachment;filename="' . '优惠券列表-' . date("Y年m月j日") . '.xls"');
        $objWriter = PHPExcel_IOFactory::createWriter($objectPHPExcel, 'Excel5');
        $objWriter->save('php://output');
		break;
	default:
		redirectAdmin ('IllegalError', SITE_URL.'admin/coupon.php'.(empty($_COOKIE['backurl'])?'':'?'.$_COOKIE['backurl']));
		break;
}



?>