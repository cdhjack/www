<?php /* Smarty version Smarty-3.1.5, created on 2017-08-11 19:39:38
         compiled from "D:\www\www.rainbow.com//templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22492595323d99c2f23-77223110%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b130702abc746df9c3acb94883e43ba85e4616b9' => 
    array (
      0 => 'D:\\www\\www.rainbow.com//templates/header.tpl',
      1 => 1502451370,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22492595323d99c2f23-77223110',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_595323d99e8d6',
  'variables' => 
  array (
    'title' => 0,
    'description' => 0,
    'keywords' => 0,
    'site_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_595323d99e8d6')) {function content_595323d99e8d6($_smarty_tpl) {?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
"/>
<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<link href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
js/jquery-1.11.3.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
js/tab.js"></script>
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
</script><?php }} ?>