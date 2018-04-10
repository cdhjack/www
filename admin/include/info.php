<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>信息提示</title>
<script language="Javascript">function Hide(divid){divid.filters.revealTrans.apply();divid.style.visibility="hidden";divid.filters.revealTrans.play();}</script>
<SCRIPT language=javascript>
var secs=3;//3秒
for(i=1;i<=secs;i++) 
{ window.setTimeout("update(" + i + ")", i * 1000);} 
function update(num){ 
	if(num == secs)	{ 
		<?php echo $gotourl_js;?>;
		Hide(msgboard); 
	} 
	else{
	} 
}
</SCRIPT>
<style type="text/css">
<!--
td {
	font-size:12px;
	color:#000000;
	line-height:15px;
}
a:link {
	font-size:12px;
	color:#003366;
	line-height:15px;
	text-decoration: none;
}
a:visited {
	font-size:12px;
	color:#003366;
	line-height:15px;
	text-decoration: none;
}
a:hover {
	font-size:12px;
	color:#003366;
	line-height:15px;
	text-decoration: underline;
}
a:active {
	font-size:12px;
	color:#003366;
	line-height:15px;
	text-decoration: none;
}
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
</head>
<body>
<br>
<br>
<br>
<br>
<br>
<div id="msgboard" style="FILTER:revealTrans(transition=23,duration=0.5)blendTrans(duration=0.5);position:absolute;width:100%;height:100%;z-index:100;visibility:visible">
<table width="500" border="0" align="center" cellpadding="3" cellspacing="1"  style="background: #D6E0EF; border: 1px solid #505F94">
  <tr style="font: 9pt Tahoma, Verdana; color: #FFFFFF; font-weight: bold; background-color: #505F94;"> 
    <td height="25"><div align="center" class="style1">信息提示</div></td>
  </tr>
  <tr> 
    <td height="80" align="center" valign="top" bgcolor="#ffffff"><br>
        <b><?php echo $error;?></b><br>
        <br><a href="<?php echo $gotourl;?>">如果您的浏览器没有自动跳转，请点击这里</a>
  	  <br>	 </td>
  </tr>
</table></div>
</body>
</html>