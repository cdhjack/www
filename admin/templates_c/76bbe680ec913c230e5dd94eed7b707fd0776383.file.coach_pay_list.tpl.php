<?php /* Smarty version Smarty-3.1.5, created on 2014-09-25 15:13:30
         compiled from "D:\www\www.yoti-app.com\trunk\admin/templates/coach_pay_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6725541be475617d76-44590376%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76bbe680ec913c230e5dd94eed7b707fd0776383' => 
    array (
      0 => 'D:\\www\\www.yoti-app.com\\trunk\\admin/templates/coach_pay_list.tpl',
      1 => 1411440711,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6725541be475617d76-44590376',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_541be475992f3',
  'variables' => 
  array (
    'coachPayArr' => 0,
    'item' => 0,
    'coachInfo' => 0,
    'pageHtml' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541be475992f3')) {function content_541be475992f3($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\www\\www.yoti-app.com\\trunk\\class\\Smarty\\plugins\\modifier.date_format.php';
?><table class="list">
  <thead>
    <tr>
      <td class="left">时间</td>
      <td class="right">操作</td>
      <td class="right">金额(元)</td>
      <td class="right">原因</td>
    </tr>
  </thead>
  <tbody>
  	<?php if ($_smarty_tpl->tpl_vars['coachPayArr']->value){?>
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['coachPayArr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
    <tr>
      <td class="left"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['addtime'],'%Y/%m/%d %H:%M:%S');?>
</td>
      <td class="right"><?php if ($_smarty_tpl->tpl_vars['item']->value['optype']=='1'){?>收入<?php }?><?php if ($_smarty_tpl->tpl_vars['item']->value['optype']=='0'){?>支出<?php }?></td>
      <td class="right">￥<?php echo $_smarty_tpl->tpl_vars['item']->value['money'];?>
</td>
      <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['idesc'];?>
</td>
    </tr>
    <?php } ?>
    <tr>
      <td class="left">合计</td>
      <td class="right"></td>
      <td class="right"></td>
      <td class="right">￥<?php echo $_smarty_tpl->tpl_vars['coachInfo']->value['ye'];?>
</td>
    </tr>
    <?php }else{ ?>
    <tr><td colspan="4" class="left">暂无相关信息</td></tr>
    <?php }?>
  </tbody>
</table>
<div class="pagination">
<?php echo $_smarty_tpl->tpl_vars['pageHtml']->value;?>

</div>
<?php }} ?>