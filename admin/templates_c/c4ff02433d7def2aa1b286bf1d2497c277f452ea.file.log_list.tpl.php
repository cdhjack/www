<?php /* Smarty version Smarty-3.1.5, created on 2017-05-23 11:40:39
         compiled from "/data/home/byu1865080001/htdocs/admin/templates/log_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12170105855923af37cd6941-10568607%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4ff02433d7def2aa1b286bf1d2497c277f452ea' => 
    array (
      0 => '/data/home/byu1865080001/htdocs/admin/templates/log_list.tpl',
      1 => 1402880012,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12170105855923af37cd6941-10568607',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'breadcrumbs' => 0,
    'item' => 0,
    'title' => 0,
    'site_url' => 0,
    'log' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5923af37d3af8',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5923af37d3af8')) {function content_5923af37d3af8($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="content">
  <div class="breadcrumb">
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['breadcrumbs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		<?php echo $_smarty_tpl->tpl_vars['item']->value['separator'];?>
<a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['href'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['text'];?>
</a>
		<?php } ?>       
      </div>
    <div class="box">
    <div class="heading">
      <h1><img src="view/image/log.png" alt="" /> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
      <div class="buttons"><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/logaction.php?act=clear" class="button">清除日志</a></div>
    </div>
    <div class="content">
      <textarea wrap="off" style="width: 98%; height: 300px; padding: 5px; border: 1px solid #CCCCCC; background: #FFFFFF; overflow: scroll;">
<?php echo $_smarty_tpl->tpl_vars['log']->value;?>

</textarea>
    </div>
  </div>
</div> 
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>