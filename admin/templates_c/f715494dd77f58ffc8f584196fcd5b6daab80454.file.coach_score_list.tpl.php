<?php /* Smarty version Smarty-3.1.5, created on 2014-09-17 19:00:46
         compiled from "D:\www\www.yoti-app.com\trunk\admin/templates/coach_score_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:208335419306cdd4ad7-88746620%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f715494dd77f58ffc8f584196fcd5b6daab80454' => 
    array (
      0 => 'D:\\www\\www.yoti-app.com\\trunk\\admin/templates/coach_score_list.tpl',
      1 => 1410951601,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '208335419306cdd4ad7-88746620',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5419306cf2d07',
  'variables' => 
  array (
    'coachScoreArr' => 0,
    'item' => 0,
    'pageHtml' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5419306cf2d07')) {function content_5419306cf2d07($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\www\\www.yoti-app.com\\trunk\\class\\Smarty\\plugins\\modifier.date_format.php';
?><table class="list">
  <thead>
    <tr>
      <td class="left">添加时间</td>
      <td class="right">扣分</td>
      <td class="right">原因</td>
    </tr>
  </thead>
  <tbody>
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['coachScoreArr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
    <tr>
      <td class="left"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['addtime'],'%Y/%m/%d %H:%M:%S');?>
</td>
      <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['score'];?>
</td>
      <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['reason'];?>
</td>
    </tr>
    <?php }
if (!$_smarty_tpl->tpl_vars['item']->_loop) {
?>
    <tr><td colspan="3" class="left">暂无相关信息</td></tr>
    <?php } ?>	
  </tbody>
</table>
<div class="pagination">
<?php echo $_smarty_tpl->tpl_vars['pageHtml']->value;?>

</div>
<?php }} ?>