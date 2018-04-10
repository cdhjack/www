<?php /* Smarty version Smarty-3.1.5, created on 2014-10-11 12:46:25
         compiled from "D:\www\www.yoti-app.com\trunk\admin/templates/charge_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:245805437c5d94e3e60-78586811%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5fabe3e5f5697ef3847d7d65d9c46af662b32391' => 
    array (
      0 => 'D:\\www\\www.yoti-app.com\\trunk\\admin/templates/charge_form.tpl',
      1 => 1413002708,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '245805437c5d94e3e60-78586811',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5437c5d95dbfe',
  'variables' => 
  array (
    'breadcrumbs' => 0,
    'item' => 0,
    'title' => 0,
    'site_url' => 0,
    'backUrl' => 0,
    'chargeInfo' => 0,
    'coachInfo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5437c5d95dbfe')) {function content_5437c5d95dbfe($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
      <h1><img src="view/image/payment.png" alt="" /> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
      <div class="buttons"><a onclick="$('#form').submit();" class="button">保存</a><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/charge.php<?php echo $_smarty_tpl->tpl_vars['backUrl']->value;?>
" class="button">取消</a></div>
    </div>
    
    
    
    <div class="content">
      <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/chargeaction.php" method="post" enctype="multipart/form-data" id="form">
	  <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['chargeInfo']->value['id'];?>
" />
	  <input type="hidden" name="act" value="save" />
        <table class="form">
          <tr>
              <td>活动名称：</td>
                <td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['chargeInfo']->value['title'];?>
" name="title" style="width:270px;">
              </td>
            </tr>
            <tr>
              <td>起止时间：</td>
              <td><input type="text" name="date_start" class="date" value="<?php echo $_smarty_tpl->tpl_vars['chargeInfo']->value['date_start'];?>
" />&nbsp;&nbsp;至&nbsp;&nbsp;<input type="text" name="date_end" class="date" value="<?php echo $_smarty_tpl->tpl_vars['chargeInfo']->value['date_end'];?>
" /></td>
            </tr>
            <tr>
              <td>充送金额：</td>
              <td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['chargeInfo']->value['total'];?>
" name="total">&nbsp;&nbsp;送&nbsp;&nbsp;<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['chargeInfo']->value['give'];?>
" name="give"></td>
            </tr>
          	<tr>
            <td>活动状态：</td>
            <td><select name="status">
				<option value="1" <?php if ($_smarty_tpl->tpl_vars['coachInfo']->value['status']=='1'){?>  selected="selected" <?php }?>>启用</option>
				<option value="0" <?php if ($_smarty_tpl->tpl_vars['coachInfo']->value['status']=='0'){?>  selected="selected" <?php }?>>停用</option>
				</select>
              </td>
          	</tr>
        </table>
      </form>
    </div>
    
    
  </div>
</div> 
<script type="text/javascript"><!--
$(document).ready(function() {
	$('.date').datepicker({dateFormat: 'yy-mm-dd'});
});
//--></script> 
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>