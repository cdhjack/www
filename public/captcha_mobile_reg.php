<?php
//生成验证码
require_once("../class/class_captcha.php");
require_once("../class/class_session.php");
$captcha = new Captcha();
$session = new Session();
$session->data['captcha_mobile'] = $captcha->getCode();
$captcha->showImage();
?>