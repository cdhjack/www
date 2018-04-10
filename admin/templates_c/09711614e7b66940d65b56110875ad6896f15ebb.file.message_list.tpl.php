<?php /* Smarty version Smarty-3.1.5, created on 2014-10-11 18:45:49
         compiled from "D:\www\www.yoti-app.com\trunk\admin/templates/message_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:286835438fd68876df8-29266855%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '09711614e7b66940d65b56110875ad6896f15ebb' => 
    array (
      0 => 'D:\\www\\www.yoti-app.com\\trunk\\admin/templates/message_list.tpl',
      1 => 1413023044,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '286835438fd68876df8-29266855',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5438fd6898ac1',
  'variables' => 
  array (
    'breadcrumbs' => 0,
    'item' => 0,
    'title' => 0,
    'site_url' => 0,
    'filter_id' => 0,
    'filter_content' => 0,
    'filter_tel' => 0,
    'filter_adddate' => 0,
    'messageArr' => 0,
    'pageHtml' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5438fd6898ac1')) {function content_5438fd6898ac1($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
      <h1><img src="view/image/review.png" alt="" /> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
      <div class="buttons"><!--<a onclick="doAction('isshow');" class="button">启用</a><a onclick="doAction('notshow');" class="button">停用</a><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/newsform.php" class="button">新增</a>--><a onclick="doAction('sms');" class="button">短信回复</a><a onclick="doAction('delete');" class="button">删除</a></div>
    </div>
    <div class="content">
        <table class="list">
          <thead>
            <tr>
              <td width="5%" style="text-align: center;">选择</td>
              <td class="center" width="5%">ID号</td>
			  <td class="left">留言内容</td>
			  <td class="right" width="12%">手机号</td>
			  <td class="right" width="12%">提交时间</td>
              <td class="center" width="12%">编辑</td>
            </tr>
			<tr>
		   <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/message.php" method="post" id="search">
              <td style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" title="全选"/></td>
              <td><input type="text" size="8" name="filter_id" id="filter_id" value="<?php echo $_smarty_tpl->tpl_vars['filter_id']->value;?>
" style="text-align:center;"></td>
			  <td><input type="text" name="filter_content" id="filter_content" value="<?php echo $_smarty_tpl->tpl_vars['filter_content']->value;?>
" /></td>
			  <td class="right"><input type="text" name="filter_tel" id="filter_tel" value="<?php echo $_smarty_tpl->tpl_vars['filter_tel']->value;?>
" style="text-align:right;"/></td>
              <td class="right">
			  		<input type="text" name="filter_adddate" id="filter_adddate" value="<?php echo $_smarty_tpl->tpl_vars['filter_adddate']->value;?>
" size="12" style="text-align:right;" class="date"/>
			  </td>
              <td align="center"><a onclick="$('#search').submit();" class="button">筛选</a></td>
			</form>
            </tr>
          </thead>
		  <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/messageaction.php" method="post" enctype="multipart/form-data" id="form">
          <tbody>
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['messageArr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
            <tr>
              <td style="text-align: center;"><input type="checkbox" name="selected[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" /></td>
			  <td class="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
              <td class="left"><?php echo $_smarty_tpl->tpl_vars['item']->value['i_value'];?>
</td>
              <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['i_reserved_2'];?>
</td>
			  <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['i_datetime'];?>
</td>
              <td class="center">[ <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/messagesmsform.php?act=smsone&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">短信回复</a> ][ <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/messageaction.php?act=deleteone&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" onClick="return confirm('删除或卸载后您将不能恢复，请确定要这么做吗？');">删除</a> ]</td>
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
	if(act=='sms'){
		var actionUrl = '<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/messagesmsform.php';
		actionUrl = actionUrl+'?act='+act;
	}
	else{
		var actionUrl = $('#form').attr('action');
		actionUrl = actionUrl+'?act='+act;		
	}
	$('#form').attr('action',actionUrl);
	$('#form').submit();
}
//--></script> 
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>