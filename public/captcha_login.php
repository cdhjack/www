<?php
//生成验证码
require_once("../class/class_captcha.php");
require_once("../class/class_session.php");
$captcha = new Captcha();
$session = new Session();
$captcha_code = $captcha->getCode();
$captcha_code = substr($captcha_code,0,5);
$session->data['captcha_login'] = $captcha_code;
//$captcha->showImage();
echo json_encode($captcha_code);exit;
?>