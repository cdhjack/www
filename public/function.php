<?php
/*function redirect($msg,$url, $status = 302) {
    header('Status: ' . $status);
    $link_url = SITE_URL."tishi.php?msg=".urlencode($msg)."&url=".urlencode($url);
    header('Location: ' . str_replace(array('&amp;', "\n", "\r"), array('&', '', ''), $link_url));
    exit();
}*/
//前台信息提示
function redirect($error, $gotourl = 'index.php',$type=true){
	require_once (SYS_ROOT . "admin/include/message.php");
	$error = ($type)?$message_r[$error]:$error;
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
	echo "<script language='javascript'>"; 
	echo " alert('".$error."');"; 
	echo " window.location.href='".$gotourl."';"; 
	//echo " javascript:history.go(-1);"; 
	echo "</script>"; 	
	exit;
}
//后台信息提示
function redirectAdmin($error, $gotourl = 'index.php',$type=true){
	global $admin;
	require_once (SYS_ROOT . "admin/include/message.php");
	$error = ($type)?$message_r[$error]:$error;
	//记录相关日志
	writeLog(' '.(empty($admin->u_name)?'':'user:【'.$admin->u_name.'】').' content:【'.$error.'】; '.(empty($_POST)?'':'DATA:【'.json_encode($_POST).'】'));	
	//$error = mb_convert_encoding($message_r[$error],"UTF-8","GBK,GB2312,UTF-8");
	if (strstr ($gotourl, '('))
	{
		$gotourl_js = 'history.go(-1)';
		$gotourl = 'javascript:history.go(-1)';
	}
	else
	{
		$gotourl_js = (((''.'self.location.href=\'').$gotourl).'\';');
	}	
	require_once (SYS_ROOT . "admin/include/info.php");
	exit ();
}

function checkObject($bigvalue,$value){//$bigvalue：集合,$value:检查字符
	$current_value = substr($bigvalue,0,(strlen($bigvalue)-1));
	$tmp_arr = explode ('|', $current_value);
	if(in_array($value,$tmp_arr)){
		$temp_str="checked=\"checked\"";
	}
	else{	
		$temp_str="";
	} 
	return $temp_str;
}
/**
 * 转义特殊字符 根据php配置文件或者设置的本函数参数确定是否处理
 *
 * @param string/array $string
 * @param int $force
 * @return string/array
 */
function doAddslashes($string, $force = 0) {
	if(!get_magic_quotes_gpc() || $force) {
		if(is_array($string)) {
			foreach($string as $key => $val) {
				$string[$key] = doAddslashes($val, $force);
			}
		} else {
			$string = addslashes($string);
		}
	}
	return $string;
}

/**
 * 反转义特殊字符 根据php配置文件或者设置的本函数参数确定是否处理
 *
 * @param string/array $string
 * @param int $force
 * @return string/array
 */
function doStripslashes($string, $force = 0) {
	if(get_magic_quotes_gpc() || $force) {		
		if(is_array($string)) {
			foreach($string as $key => $val) {
				$string[$key] = doStripslashes($val, $force);
			}
		} else {
			$string = stripslashes($string);
		}
	}
	return $string;
}

/**
 * 获取IP地址
 *
 * @return string ip
 */
function getIP()
{ 
	if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && eregi("^[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}$",$_SERVER['HTTP_X_FORWARDED_FOR']))
	{
		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	} 
	else 
	{ 
		$ip=$_SERVER["REMOTE_ADDR"];
	} 
	return $ip;
} 

/**
 * 将字符<%、<?替换成&lt;?、&lt;%
 * @param string $string
 * @return string or array $string	  
 */
function repPhpAspJspCode($string) {
	$string = str_replace ('<?', '&lt;?', $string);
    $string = str_replace ('<%', '&lt;%', $string);
    return $string;
}

function toTime ($datetime)
{
    $r = explode (' ', $datetime);
    $t = explode ('-', $r[0]);

    $k = explode (':', $r[1]);
    $dbtime = mktime ($k[0], $k[1], $k[2], $t[1], $t[2], $t[0]);
    return $dbtime;
}

function htmlStrdisp($str){
	$str=str_replace("\r\n","<br>",$str);
	return $str;
} 
function getRealSize($size){
   $kb = 1024;         // Kilobyte
   $mb = 1024 * $kb;   // Megabyte
   $gb = 1024 * $mb;   // Gigabyte
   $tb = 1024 * $gb;   // Terabyte

   if($size < $kb) {
      return $size." B";
   }else if($size < $mb) {
      return round($size/$kb,2)." KB";
   }else if($size < $gb) {
      return round($size/$mb,2)." MB";
   }else if($size < $tb) {
      return round($size/$gb,2)." GB";
   }else {
      return round($size/$tb,2)." TB";
   }
}

function writeFileText ($filepath, $string) {
	$fp = fopen ($filepath, 'w');
	fputs ($fp, $string);
	fclose ($fp);	
}
function writeLog($message) {
	$file = SYS_ROOT . 'uploadfile/log.txt';
	$fileBack = SYS_ROOT .'uploadfile/log_'.date('YmdHis').'.txt';

	if(is_file($file)&&filesize($file)>1024*1024*5){
		copy($file,$fileBack); 
		$handle = fopen($file, 'w+'); 
	}else{
		$handle = fopen($file, 'a+');
	}
	
	fwrite($handle, date('Y-m-d G:i:s') . ' - ' . $message . "【".$_SERVER['REQUEST_URI']."】\n");	
	fclose($handle); 
}

function titleStyle($color,$option,$title){
	$show = !empty($color)?"<font style=\"color:".$color."\">":"";
	$show .= (strstr($option, 'b'))?"<STRONG>":"";//加粗
	$show .= (strstr($option, 'i'))?"<EM>":"";//斜体
	$show .= (strstr($option, 's'))?"<STRIKE>":"";//删除线
	$show .= (strstr($option, 'u'))?"<U>":"";//下划线
	$show .= $title;
	$show .= (strstr($option, 'b'))?"</STRONG>":"";//加粗
	$show .= (strstr($option, 'i'))?"</EM>":"";//斜体
	$show .= (strstr($option, 's'))?"</STRIKE>":"";//删除线
	$show .= (strstr($option, 'u'))?"</U>":"";//下划线
	$show .= !empty($color)?"</font>":"";
	return $show;	
}

function getFiletype ($filename){
	$filer = explode ('.', $filename);
	$count = (count ($filer) - 1);
	//return strtolower ($filer[$count]);
	return strtoupper ($filer[$count]);
}


function getaddSql($arr,$tableName){
	$sql = "insert into {$tableName} (";
	//print_r($arr);
	if(!empty($arr)){
		$kLis = '';
		$value = '';
		foreach($arr as $k => $v){
			//echo $k;
			$kLis .= '`'.$k.'`,';
			$value .= "'".$v."'".',';
		}
		$kLis = substr($kLis,0,-1);
		$value = substr($value,0,-1);
		$sql .= $kLis . ') values ('.$value.')';
	}
	return $sql;
}
function getModfiySql($arr,$tableName){
	$sql = "UPDATE {$tableName} SET ";
	if(!empty($arr)){
		$kLis = '';
		foreach($arr as $k => $v){
			//echo $k;
			$kLis .= '`'.$k.'` = '."'".$v."'".',';
	}
		$kLis = substr($kLis,0,-1);
		$sql .= $kLis;
	}
	return $sql;
}
//链接生成二维码（GoogleApi）
function getQRCodefromGoogle($url,$widhtHeight ='103',$EC_level='L',$margin='0'){ 
	$url = urlencode($url); 
	//google api
	//return  '<img src="http://chart.apis.google.com/chart?chs='.$widhtHeight.'x'.$widhtHeight.'&cht=qr&chld='.$EC_level.'|'.$margin.'&chl='.$url.'choe=UTF-8" alt="QR code" width="'.$widhtHeight.'" height="'.$widhtHeight.'"/>'; 
	//快拍api (http://www.kuaipai.cn)
	return  '<img src="http://api.kuaipai.cn/qr?chs='.$widhtHeight.'x'.$widhtHeight.'&margin=0&chl='.$url.'" alt="QR code" width="'.$widhtHeight.'" height="'.$widhtHeight.'"/>'; 
	//草料api (http://cli.im/)
	//return  '<img src="http://cli.im/api/qrcode/img?go='.$url.'&key=24607e4aaa270134e3293d29bb288c70" alt="QR code" width="'.$widhtHeight.'" height="'.$widhtHeight.'"/>'; 
} 

//生成图片
function resize($path,$name, $width, $height, $type = "") {
	require_once SYS_ROOT.'class/class_image.php';
	
	$filename = $path.$name;
	
	if (!file_exists(SYS_ROOT . $filename) || !is_file(SYS_ROOT . $filename)) {
		return;
	} 
	
	$info = pathinfo($filename);
	
	$extension = $info['extension'];
	
	$old_image = $filename;
	//$new_image = 'cache/' . utf8_substr($filename, 0, utf8_strrpos($filename, '.')) . '-' . $width . 'x' . $height . $type .'.' . $extension;
	$new_image = 'cache/' . $path . $width . 'x' . $height . $type .'-' . $name;
	
	if (!file_exists(SYS_ROOT . $new_image) || (filemtime(SYS_ROOT . $old_image) > filemtime(SYS_ROOT . $new_image))) {
		$path = '';
		
		$directories = explode('/', dirname(str_replace('../', '', $new_image)));
		
		foreach ($directories as $directory) {
			$path = $path . '/' . $directory;
			
			if (!file_exists(SYS_ROOT . $path)) {
				@mkdir(SYS_ROOT . $path, 0777);
			}		
		}

		list($width_orig, $height_orig) = getimagesize(SYS_ROOT . $old_image);

		if ($width_orig != $width || $height_orig != $height) {
			//echo SYS_ROOT . $old_image;exit;
			$image = new Image(SYS_ROOT . $old_image);
			$image->resize($width, $height, $type);
			$image->save(SYS_ROOT . $new_image);
		} else {
			copy(SYS_ROOT . $old_image, SYS_ROOT . $new_image);
		}
	}
	
	return $new_image;
	
	/*if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
		return $this->config->get('config_ssl') . 'image/' . $new_image;
	} else {
		return $this->config->get('config_url') . 'image/' . $new_image;
	}*/
}

/*根据评分值获取星星的html,可以为半颗星
$imageArr['half']:半颗星的图片地址
$imageArr['off']:全灰色星的图片地址
$imageArr['on']:全亮星的图片地址
*/
function getStarHtml($average=0,$imageArr=array()) {
	if($average>5){
		return '错误:评分值不能大于5!';
	}
	
	if(empty($imageArr)){
		$imageArr = array('half'=>SITE_URL.'public/star/star-half.png','on'=>SITE_URL.'public/star/star-on.png','off'=>SITE_URL.'public/star/star-off.png');
	}
	//评分
	$max = floor($average);
	$star = "";
	for ($i = 0; $i < $max; $i++)
	{
		$star .= '<img src="'.$imageArr['on'].'" style="cursor:pointer;" title="'.round($average,1).'"/>';
	}	
	if ($max < $average && ($average-$max)>=0.5)
	{
		//20141013修改要求评分四舍五入,4.125为4星;4.6为4.5星	
		$max = $max + 1;
		$star .= '<img src="'.$imageArr['half'].'" style="cursor:pointer;" title="'.round($average,1).'"/>';
	}
	for ($j = 0; $j < 5 - $max; $j++)
	{
		$star .= '<img src="'.$imageArr['off'].'" style="cursor:pointer;" title="'.round($average,1).'"/>';
	}
	return $star;
}

//获取指定日期所在星期的开始时间与结束时间
function getWeekRange($date){
	$ret=array();
	$timestamp=strtotime($date);
	$w=strftime('%u',$timestamp);
	$ret['start_date']=date('Y-m-d 00:00:00',$timestamp-($w-1)*86400);
	$ret['end_date']=date('Y-m-d 23:59:59',$timestamp+(7-$w)*86400);
	return $ret;
}
 
//获取指定日期所在月的开始日期与结束日期
function getMonthRange($date){
	$ret=array();
	$timestamp=strtotime($date);
	$mdays=date('t',$timestamp);
	$ret['start_date']=date('Y-m-1 00:00:00',$timestamp);
	$ret['end_date']=date('Y-m-'.$mdays.' 23:59:59',$timestamp);
	return $ret;
}

//$phone:手机号 多个用英文的逗号隔开,一次最多对100个手机发送
//$result['REV'],0:验证失败,1:发送短信成功,2:发送短信失败
function sendSms($phone, $content){
	$result['REV'] = 0;
	
	/*发送手机号开始处理*/
	//将中文的逗号转换为英文的逗号
	$phone = str_replace('，',',',$phone);
	$phoneArr = explode(',',$phone);
	//将删除数组中所有等值为 FALSE 的条目
	$phoneArr = array_filter($phoneArr);
	//数组过滤重复号码
	$phoneArr = array_unique($phoneArr);
	
	//验证手机格式
	$errorPhone = "";
	foreach($phoneArr as $key=>$value){
		if(!empty($value) && !preg_match('/^((1[1-9][0-9]{1})+\d{8})$/i', $value)){
			$errorPhone .= "【".$value."】";
		}
	}
	if($errorPhone!=""){
		$result['MSG'] = '你输入的手机号'.$errorPhone.'格式错误';
		return $result;
	}	
	$smsMob = implode(",", $phoneArr);	
	/*手机号处理结束*/
	
	/*短信内容处理*/
	if(empty($content)){
		$result['MSG'] = '发送短信内容为空';
		return $result;
	}
	//$smsText = $content.'【嗨喽租车】';
	$smsText = $content;
	/*短信内容处理结束*/
	
	$Key = '9b05e33f3e6bb1f43caa';
	$Uid = 'cannabis';
	//$url = 'http://sms.webchinese.cn/web_api/?Uid='.$Uid.'&Key='.$Key.'&smsMob='.$smsMob.'&smsText='.$smsText;
	$url = 'http://utf8.sms.webchinese.cn/?Uid='.$Uid.'&Key='.$Key.'&smsMob='.$smsMob.'&smsText='.$smsText;
	//echo $url;exit;
	$response = getSmsResult($url);
	//echo $response;exit;
	/*短信发送后返回值 	说　明
	-1 	没有该用户账户
	-2 	接口密钥不正确 [查看密钥]
	不是账户登陆密码
	-21 	MD5接口密钥加密不正确
	-3 	短信数量不足
	-11 	该用户被禁用
	-14 	短信内容出现非法字符
	-4 	手机号格式不正确
	-41 	手机号码为空
	-42 	短信内容为空
	-51 	短信签名格式不正确
	接口签名格式为：【签名内容】
	-6 	IP限制
	大于0 	短信发送数量*/
	if($response>0){
		$result['REV'] = 1;	
	}
	else{
		$result['REV'] = 2;
		$result['MSG'] = '发送短信失败,接口返回值为"'.$response.'",请查看返回值对照表';
	}
	return $result;
}
function getSmsResult($url){
	if(function_exists('file_get_contents')){
		$file_contents = file_get_contents($url);
	}
	else{
		$ch = curl_init();
		$timeout = 5;
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$file_contents = curl_exec($ch);
		curl_close($ch);
	}
	return $file_contents;
}
?>