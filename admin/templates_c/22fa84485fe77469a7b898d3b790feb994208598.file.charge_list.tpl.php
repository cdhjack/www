<?php /* Smarty version Smarty-3.1.5, created on 2014-10-11 11:40:39
         compiled from "D:\www\www.yoti-app.com\trunk\admin/templates/charge_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:322895438a63baddae5-06924847%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22fa84485fe77469a7b898d3b790feb994208598' => 
    array (
      0 => 'D:\\www\\www.yoti-app.com\\trunk\\admin/templates/charge_list.tpl',
      1 => 1412998836,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '322895438a63baddae5-06924847',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5438a63bc1bca',
  'variables' => 
  array (
    'breadcrumbs' => 0,
    'item' => 0,
    'title' => 0,
    'site_url' => 0,
    'filter_id' => 0,
    'filter_title' => 0,
    'filter_total' => 0,
    'filter_give' => 0,
    'filter_date_start' => 0,
    'filter_date_end' => 0,
    'filter_status' => 0,
    'chargeArr' => 0,
    'pageHtml' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5438a63bc1bca')) {function content_5438a63bc1bca($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
      <div class="buttons"><a onclick="doAction('isshow');" class="button">启用</a><a onclick="doAction('notshow');" class="button">停用</a><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/chargeform.php" class="button">新增</a><a onclick="doAction('delete');" class="button">删除</a></div>
    </div>
    <div class="content">
        <table class="list">
          <thead>
            <tr>
              <td width="5%" style="text-align: center;">选择</td>
              <td class="center" width="5%">ID号</td>
			  <td class="left">活动名称</td>
              <td class="right" width="12%">充值金额</td>
			  <td class="right" width="12%">赠送金额</td>
			  <td class="right" width="12%">开始时间</td>
			  <td class="right" width="12%">结束时间</td>
			  <td class="right" width="10%">状态</td>
              <td class="right" width="10%">编辑</td>
            </tr>
			<tr>
		   <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/charge.php" method="post" id="search">
              <td style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" title="全选"/></td>
              <td><input type="text" size="8" name="filter_id" id="filter_id" value="<?php echo $_smarty_tpl->tpl_vars['filter_id']->value;?>
"></td>
			  <td><input type="text" name="filter_title" id="filter_title" value="<?php echo $_smarty_tpl->tpl_vars['filter_title']->value;?>
" /></td>
			  <td class="right"><input type="text" size="12" name="filter_total" id="filter_total" style="text-align:right;" value="<?php echo $_smarty_tpl->tpl_vars['filter_total']->value;?>
" /></td>
			  <td class="right"><input type="text" size="12" name="filter_give" id="filter_give" style="text-align:right;" value="<?php echo $_smarty_tpl->tpl_vars['filter_give']->value;?>
" /></td>
              <td class="right"><input type="text" name="filter_date_start" id="filter_date_start" value="<?php echo $_smarty_tpl->tpl_vars['filter_date_start']->value;?>
" size="12" style="text-align:right;" class="date"/></td>
              <td class="right"><input type="text" name="filter_date_end" id="filter_date_end" value="<?php echo $_smarty_tpl->tpl_vars['filter_date_end']->value;?>
" size="12" style="text-align:right;" class="date"/></td>
              <td class="right">
			  		<select name="filter_status">
					<option value="">全部</option>
					<option value="1" <?php if ($_smarty_tpl->tpl_vars['filter_status']->value=='1'){?> selected="selected"<?php }?>>启用</option>
					<option value="0" <?php if ($_smarty_tpl->tpl_vars['filter_status']->value=='0'){?> selected="selected"<?php }?>>停用</option>
					</select>
				</td>
              <td align="right"><a onclick="$('#search').submit();" class="button">筛选</a></td>
			</form>
            </tr>
          </thead>
		  <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/chargeaction.php" method="post" enctype="multipart/form-data" id="form">
          <tbody>
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['chargeArr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
            <tr>
              <td style="text-align: center;"><input type="checkbox" name="selected[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" /></td>
			  <td class="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
              <td class="left"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</td>
              <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['total'];?>
</td>
			  <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['give'];?>
</td>
			  <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['date_start'];?>
</td>
			  <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['date_end'];?>
</td>
			  <td class="right"><?php if ($_smarty_tpl->tpl_vars['item']->value['status']=='1'){?>启用<?php }else{ ?>停用<?php }?></td>
              <td class="right">[ <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/chargeform.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">编辑</a> ]</td>
            </tr>
			<?php }
if (!$_smarty_tpl->tpl_vars['item']->_loop) {
?>
			<tr><td colspan="9" class="left">暂无相关信息</td></tr>
			<?php } ?>	
		  </tbody>
		  </form>
        </table>
      <div class="pagination">
	  <?php echo $_smarty_tpl->tpl_vars['pageHtml']->value;?>

	  </div>
    </div>
  </div>
</div> 
<script type="text/javascript"><!--
$(document).ready(function() {
	$('.date').datepicker({dateFormat: 'yy-mm-dd'});
});
//--></script> 
<script type="text/javascript"><!--
function doAction(act){
	var actionUrl = $('#form').attr('action');
	actionUrl = actionUrl+'?act='+act;
	$('#form').attr('action',actionUrl);
	$('#form').submit();}
//--></script> 


<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>