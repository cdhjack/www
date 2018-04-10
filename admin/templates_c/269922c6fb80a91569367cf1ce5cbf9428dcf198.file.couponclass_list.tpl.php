<?php /* Smarty version Smarty-3.1.5, created on 2014-09-30 18:40:45
         compiled from "D:\www\www.yoti-app.com\trunk\admin/templates/couponclass_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:143405427e02478d566-43314907%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '269922c6fb80a91569367cf1ce5cbf9428dcf198' => 
    array (
      0 => 'D:\\www\\www.yoti-app.com\\trunk\\admin/templates/couponclass_list.tpl',
      1 => 1412073639,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '143405427e02478d566-43314907',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5427e02495fe9',
  'variables' => 
  array (
    'breadcrumbs' => 0,
    'item' => 0,
    'title' => 0,
    'site_url' => 0,
    'filter_name' => 0,
    'filter_idesc' => 0,
    'filter_price' => 0,
    'filter_yxq' => 0,
    'filter_total' => 0,
    'filter_note' => 0,
    'couponClassArr' => 0,
    'pageHtml' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5427e02495fe9')) {function content_5427e02495fe9($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
      <h1><img src="view/image/category.png" alt="" /> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
      <div class="buttons"><!--<a onclick="doAction('isshow');" class="button">启用</a><a onclick="doAction('notshow');" class="button">停用</a>--><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/couponclassform.php" class="button">新增</a><a onclick="doAction('delete');" class="button">删除</a></div>
    </div>
    <div class="content">
        <table class="list">
          <thead>
            <tr>
              <td width="5%" style="text-align: center;">选择</td>
			  <td class="left" width="15%">优惠券名称</td>
              <td class="left" width="15%">优惠券类型</td>
              <td class="right" width="12%">面额</td>
			  <td class="right" width="12%">过期日期</td>
              <td class="right" width="12%">生成数量</td>
              <td class="right">备注</td>
              <td class="center" width="12%">编辑</td>
            </tr>
			<tr>
		   <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/couponclass.php" method="post" id="search">
              <td style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" title="全选"/></td>
			  <td class="left"><input type="text" name="filter_name" id="filter_name" value="<?php echo $_smarty_tpl->tpl_vars['filter_name']->value;?>
" /></td>
			  <td class="left"><input type="text" name="filter_idesc" id="filter_idesc" value="<?php echo $_smarty_tpl->tpl_vars['filter_idesc']->value;?>
" /></td>
              <td class="right"><input type="text" name="filter_price" id="filter_price" value="<?php echo $_smarty_tpl->tpl_vars['filter_price']->value;?>
" size="12" style="text-align:right;"/></td>
			  <td class="right"><input type="text" name="filter_yxq" id="filter_yxq" value="<?php echo $_smarty_tpl->tpl_vars['filter_yxq']->value;?>
" size="12" style="text-align:right;" class="date"/></td>
              <td class="right"><input type="text" name="filter_total" id="filter_total" value="<?php echo $_smarty_tpl->tpl_vars['filter_total']->value;?>
" size="12" style="text-align:right;"/></td>
			  <td class="right"><input type="text" name="filter_note" id="filter_note" value="<?php echo $_smarty_tpl->tpl_vars['filter_note']->value;?>
" /></td>
              <td align="center"><a onclick="$('#search').submit();" class="button">筛选</a></td>
			</form>
            </tr>
          </thead>
		  <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/couponclassaction.php" method="post" enctype="multipart/form-data" id="form">
          <tbody>
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['couponClassArr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
            <tr>
              <td style="text-align: center;"><input type="checkbox" name="selected[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['i_type'];?>
" /></td>
			  <td class="left"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
			  <td class="left"><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/coupon.php?filter_type=<?php echo $_smarty_tpl->tpl_vars['item']->value['i_type'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['idesc'];?>
</a></td>
              <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
</td>
			  <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['yxq'];?>
</td>
              <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['total'];?>
</td>
			  <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['note'];?>
</td>
              <td class="center">[ <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/coupon.php?filter_type=<?php echo $_smarty_tpl->tpl_vars['item']->value['i_type'];?>
">查看</a> ][ <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/couponclassform.php?i_type=<?php echo $_smarty_tpl->tpl_vars['item']->value['i_type'];?>
">编辑</a> ]</td>
            </tr>
			<?php }
if (!$_smarty_tpl->tpl_vars['item']->_loop) {
?>
			<tr><td colspan="8" class="left">暂无分类信息</td></tr>
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