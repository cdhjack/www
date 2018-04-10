<?php /* Smarty version Smarty-3.1.5, created on 2014-10-15 11:21:36
         compiled from "D:\www\www.yoti-app.com\trunk\admin/templates/coupon_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27210542a2f8c5cf368-68124818%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '475cbac0c5bf7407af572dc5c7e30ce52f9b2ce6' => 
    array (
      0 => 'D:\\www\\www.yoti-app.com\\trunk\\admin/templates/coupon_list.tpl',
      1 => 1412928388,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27210542a2f8c5cf368-68124818',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_542a2f8c7a4dd',
  'variables' => 
  array (
    'breadcrumbs' => 0,
    'item' => 0,
    'title' => 0,
    'site_url' => 0,
    'filter_id' => 0,
    'couponClassArr' => 0,
    'filter_type' => 0,
    'filter_cdkey' => 0,
    'filter_price' => 0,
    'filter_yxq' => 0,
    'filter_gettime' => 0,
    'filter_username' => 0,
    'filter_status' => 0,
    'couponArr' => 0,
    'pageHtml' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542a2f8c7a4dd')) {function content_542a2f8c7a4dd($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
      <h1><img src="view/image/customer.png" alt="" /> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
      <div class="buttons"><!--<a onclick="doAction('isshow');" class="button">启用</a>--><a onclick="doAction('excel','search');" class="button">导出筛选结果</a><a onclick="doAction('delete');" class="button">删除</a></div>
    </div>
    <div class="content">
        <table class="list">
          <thead>
            <tr>
              <td width="5%" style="text-align: center;">选择</td>
              <td class="center" width="5%">ID号</td>
              <td class="right" width="14%">优惠券类型</td>
			  <td class="right" width="14%">兑换码</td>
              <td class="right" width="10%">面额</td>
			  <td class="right" width="10%">过期日期</td>
			  <td class="right" width="10%">兑换时间</td>
              <td class="right" width="10%">归属用户</td>
			  <td class="right" width="10%">状态</td>
              <td class="center">编辑</td>
            </tr>
			<tr>
		   <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/coupon.php" method="post" id="search">
              <td style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" title="全选"/></td>
			  <td class="center"><input type="text" size="8" name="filter_id" id="filter_id" value="<?php echo $_smarty_tpl->tpl_vars['filter_id']->value;?>
"></td>
              <td class="right">
			  		<select name="filter_type">
					<option value="">全部</option>
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['couponClassArr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['i_type'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['i_type']==$_smarty_tpl->tpl_vars['filter_type']->value){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['idesc'];?>
</option>
					<?php } ?>
					</select>
              </td>
              <td class="right"><input type="text" name="filter_cdkey" id="filter_cdkey" value="<?php echo $_smarty_tpl->tpl_vars['filter_cdkey']->value;?>
"  style="text-align:right;"/></td>
              <td class="right"><input type="text" name="filter_price" id="filter_price" value="<?php echo $_smarty_tpl->tpl_vars['filter_price']->value;?>
" size="12" style="text-align:right;"/></td>
			  <td class="right"><input type="text" name="filter_yxq" id="filter_yxq" value="<?php echo $_smarty_tpl->tpl_vars['filter_yxq']->value;?>
" size="12" style="text-align:right;" class="date"/></td>
			  <td class="right"><input type="text" name="filter_gettime" id="filter_gettime" value="<?php echo $_smarty_tpl->tpl_vars['filter_gettime']->value;?>
" size="12" style="text-align:right;" class="date"/></td>
              <td class="right"><input type="text" name="filter_username" id="filter_username" value="<?php echo $_smarty_tpl->tpl_vars['filter_username']->value;?>
" style="text-align:right;"/></td>
              <td class="right">
			  		<select name="filter_status">
					<option value="">全部</option>
					<option value="1" <?php if ($_smarty_tpl->tpl_vars['filter_status']->value=='1'){?> selected="selected"<?php }?>>未兑换</option>
					<option value="2" <?php if ($_smarty_tpl->tpl_vars['filter_status']->value=='2'){?> selected="selected"<?php }?>>已兑换</option>
					<option value="3" <?php if ($_smarty_tpl->tpl_vars['filter_status']->value=='3'){?> selected="selected"<?php }?>>已使用</option>
					<option value="4" <?php if ($_smarty_tpl->tpl_vars['filter_status']->value=='4'){?> selected="selected"<?php }?>>已过期</option>
					</select>
				</td>
              <td align="center"><a onclick="$('#search').submit();" class="button">筛选</a></td>
			</form>
            </tr>
          </thead>
		  <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/couponaction.php" method="post" enctype="multipart/form-data" id="form">
          <tbody>
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['couponArr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
            <tr>
              <td style="text-align: center;"><input type="checkbox" name="selected[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" /></td>
			  <td class="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
              <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['idesc'];?>
</td>
			  <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['cdkey'];?>
</td>
              <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
</td>
			  <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['yxq'];?>
</td>
              <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['gettime'];?>
</td>
			  <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['username'];?>
</td>
			  <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</td>
              <td class="center">[ <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/couponaction.php?act=deleteone&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" onClick="return confirm('删除或卸载后您将不能恢复，请确定要这么做吗？');">删除</a> ]</td>
            </tr>
			<?php }
if (!$_smarty_tpl->tpl_vars['item']->_loop) {
?>
			<tr><td colspan="10" class="left">暂无相关信息</td></tr>
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
function doAction(act,postFormId){		
	var actionUrl = $('#form').attr('action');
	actionUrl = actionUrl+'?act='+act;
	
	var postFormId = (typeof postFormId != 'undefined' && postFormId != null && postFormId != '')?postFormId:'form';
	$('#'+postFormId).attr('action',actionUrl);
	$('#'+postFormId).submit();
}
//--></script> 
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>