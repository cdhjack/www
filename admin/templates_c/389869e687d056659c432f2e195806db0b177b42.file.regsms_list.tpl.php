<?php /* Smarty version Smarty-3.1.5, created on 2014-10-10 16:06:34
         compiled from "D:\www\www.yoti-app.com\trunk\admin/templates/regsms_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1011254378d8dc640c5-30330457%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '389869e687d056659c432f2e195806db0b177b42' => 
    array (
      0 => 'D:\\www\\www.yoti-app.com\\trunk\\admin/templates/regsms_list.tpl',
      1 => 1412928374,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1011254378d8dc640c5-30330457',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_54378d8dd9d9f',
  'variables' => 
  array (
    'breadcrumbs' => 0,
    'item' => 0,
    'title' => 0,
    'site_url' => 0,
    'filter_id' => 0,
    'filter_send_start_date' => 0,
    'filter_send_end_date' => 0,
    'filter_phone' => 0,
    'smsClassArr' => 0,
    'key' => 0,
    'filter_class' => 0,
    'filter_code' => 0,
    'regsmsArr' => 0,
    'pageHtml' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54378d8dd9d9f')) {function content_54378d8dd9d9f($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
      <h1><img src="view/image/information.png" alt="" /> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
      <div class="buttons"><!--<a onclick="doAction('isshow');" class="button">启用</a><a onclick="doAction('notshow');" class="button">停用</a><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/regsmsform.php" class="button">新增</a>--><a onclick="doAction('delete');" class="button">删除</a></div>
    </div>
    <div class="content">
        <table class="list">
          <thead>
            <tr>
              <td width="5%" style="text-align: center;">选择</td>
              <td class="center" width="10%">ID号</td>
			  <td class="center">发送时间</td>
              <td class="right" width="18%">手机号</td>
			  <td class="right" width="18%">短信类型</td>
			  <td class="right" width="18%">验证码</td>
              <td class="center" width="10%">编辑</td>
            </tr>
			<tr>
		   <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/regsms.php" method="post" id="search">
              <td style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" title="全选"/></td>
              <td class="right"><input type="text" name="filter_id" id="filter_id" value="<?php echo $_smarty_tpl->tpl_vars['filter_id']->value;?>
"></td>
              <td class="center">
              	<input type="text" name="filter_send_start_date"  id="filter_send_start_date" value="<?php echo $_smarty_tpl->tpl_vars['filter_send_start_date']->value;?>
"  style="text-align:center;" class="date" />
                <br />至<br />
              	<input type="text" name="filter_send_end_date" id="filter_send_end_date" value="<?php echo $_smarty_tpl->tpl_vars['filter_send_end_date']->value;?>
"  style="text-align:center;" class="date" />
              </td>
              <td class="right"><input type="text" name="filter_phone" id="filter_phone" value="<?php echo $_smarty_tpl->tpl_vars['filter_phone']->value;?>
" style="text-align:right;" /></td>
			  <td class="right">
			  		<select name="filter_class">
					<option value="">全部</option>
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['smsClassArr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['key']->value==$_smarty_tpl->tpl_vars['filter_class']->value){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
					<?php } ?>
					</select>
			  </td>
			  <td class="right"><input type="text" size="8" name="filter_code" id="filter_code" style="text-align:right;" value="<?php echo $_smarty_tpl->tpl_vars['filter_code']->value;?>
" /></td>
              <td align="center"><a onclick="$('#search').submit();" class="button">筛选</a></td>
			</form>
            </tr>
          </thead>
		  <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/regsmsaction.php" method="post" enctype="multipart/form-data" id="form">
          <tbody>
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['regsmsArr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
            <tr>
              <td style="text-align: center;"><input type="checkbox" name="selected[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" /></td>
			  <td class="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
              <td class="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['i_datetime'];?>
</td>
              <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['phone'];?>
</td>
			  <td class="right"><?php echo $_smarty_tpl->tpl_vars['smsClassArr']->value[$_smarty_tpl->tpl_vars['item']->value['optype']];?>
</td>
			  <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['smscode'];?>
</td>
              <td class="center">[ <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/regsmsaction.php?act=deleteone&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
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
	var actionUrl = $('#form').attr('action');
	actionUrl = actionUrl+'?act='+act;
	$('#form').attr('action',actionUrl);
	$('#form').submit();}
//--></script> 


<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>