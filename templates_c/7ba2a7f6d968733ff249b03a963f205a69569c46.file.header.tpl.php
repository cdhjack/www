<?php /* Smarty version Smarty-3.1.5, created on 2017-08-12 10:18:13
         compiled from "E:\www\www.rainbow.com//templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1186259463f34c8ff22-38853820%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ba2a7f6d968733ff249b03a963f205a69569c46' => 
    array (
      0 => 'E:\\www\\www.rainbow.com//templates/header.tpl',
      1 => 1502451370,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1186259463f34c8ff22-38853820',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_59463f34d2709',
  'variables' => 
  array (
    'title' => 0,
    'description' => 0,
    'keywords' => 0,
    'site_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59463f34d2709')) {function content_59463f34d2709($_smarty_tpl) {?><!doctype html>
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