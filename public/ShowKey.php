<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
//------------------------------------------------------取得随机数
function domake_password($pw_length)
{
	$pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ';
	
	for($i = 0; $i < $pw_length; $i++) {
	
		$password1 .= $pattern{mt_rand(0, 61)};
	
	}
return $password1;
}



//------------------------------------------------------显示验证码
function ShowKey()
{
$key=strtolower(domake_password(4));
$set=setcookie("checkkey",$key,0,'/');
	//是否支持gd库
if (function_exists("imagejpeg")) {
   header ("Content-type: image/jpeg");
   $img=imagecreate(69,20);
   $black=imagecolorallocate($img,255,255,255);
   $gray=imagecolorallocate($img,102,102,102);
   imagefill($img,0,0,$gray);
   imagestring($img,3,14,3,$key,$black);
   imagejpeg($img);
   imagedestroy($img);
}
elseif (function_exists("imagegif")) {
   header ("Content-type: image/gif");
   $img=imagecreate(69,20);
   $black=imagecolorallocate($img,255,255,255);
   $gray=imagecolorallocate($img,102,102,102);
   imagefill($img,0,0,$gray);
   imagestring($img,3,14,3,$key,$black);
   imagegif($img);
   imagedestroy($img);
}
elseif (function_exists("imagepng")) {
	header ("Content-type: image/png");
   $img=imagecreate(69,20);
   $black=imagecolorallocate($img,255,255,255);
   $gray=imagecolorallocate($img,102,102,102);
   imagefill($img,0,0,$gray);
   imagestring($img,3,14,3,$key,$black);
   imagepng($img);
   imagedestroy($img);
}
elseif (function_exists("imagewbmp")) {
	header ("Content-type: image/vnd.wap.wbmp");
   $img=imagecreate(69,20);
   $black=imagecolorallocate($img,255,255,255);
   $gray=imagecolorallocate($img,102,102,102);
   imagefill($img,0,0,$gray);
   imagestring($img,3,14,3,$key,$black);
   imagewbmp($img);
   imagedestroy($img);
}
else {
	/*$set=setcookie("checkkey","ecms");
	include("../class/functions.php");
	echo ReadFiletext("../data/images/ecms.jpg");
	*/
}
}
ShowKey();
?>