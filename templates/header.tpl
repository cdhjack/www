<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>{*$title*}</title>
<meta name="description" content="{*$description*}"/>
<meta name="keywords" content="{*$keywords*}">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<link href="{*$site_url*}css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="{*$site_url*}js/jquery-1.11.3.min.js"></script>
<script src="{*$site_url*}js/tab.js"></script>
</head>
<body style="width:10rem !important; margin:0 auto;">
<script>
/*取设备宽度*/
function rem(){
	var iWidth=document.documentElement.getBoundingClientRect().width;
	iWidth=iWidth>640?640:iWidth;
	document.getElementsByTagName("html")[0].style.fontSize=iWidth/10+"px";
};
rem();
window.onorientationchange=window.onresize=rem      
</script>