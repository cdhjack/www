<?php /* Smarty version Smarty-3.1.5, created on 2017-06-01 06:53:59
         compiled from "E:\www\www.rainbow.com/admin/templates/user_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17632592f49875bd282-12284768%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f339c7f6b2b86a7bb1f30ea244c178a0f2f2d7ab' => 
    array (
      0 => 'E:\\www\\www.rainbow.com/admin/templates/user_list.tpl',
      1 => 1403086943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17632592f49875bd282-12284768',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'breadcrumbs' => 0,
    'item' => 0,
    'title' => 0,
    'site_url' => 0,
    'filter_id' => 0,
    'filter_name' => 0,
    'filter_realname' => 0,
    'filter_mail' => 0,
    'groupArr' => 0,
    'filter_group' => 0,
    'filter_logintime' => 0,
    'filter_status' => 0,
    'userArr' => 0,
    'pageHtml' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_592f498775e5b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592f498775e5b')) {function content_592f498775e5b($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\www\\www.rainbow.com\\class\\Smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
      <h1><img src="view/image/user.png" alt="" /> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
      <div class="buttons"><a onclick="doAction('isshow');" class="button">启用</a><a onclick="doAction('notshow');" class="button">停用</a><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/userform.php" class="button">新增</a><a onclick="doAction('delete');" class="button">删除</a></div>
    </div>
    <div class="content">
        <table class="list">
          <thead>
            <tr>
              <td width="5%" style="text-align: center;">选择</td>
              <td class="center" width="5%">ID号</td>
			  <td class="left" width="15%">用户名</td>
              <td class="right" width="15%">姓名</td>
			  <td class="right" width="15%">邮箱</td>
			  <td class="right" width="15%">用户组</td>
			  <td class="right" width="15%">登陆时间</td>
			  <td class="right" width="10%">状态</td>
              <td class="right" width="10%">编辑</td>
            </tr>
			<tr>
		   <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/user.php" method="post" id="search">
              <td style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" title="全选"/></td>
              <td><input type="text" size="8" name="filter_id" id="filter_id" value="<?php echo $_smarty_tpl->tpl_vars['filter_id']->value;?>
" style="text-align:center;"></td>
			  <td><input type="text" name="filter_name" id="filter_name" value="<?php echo $_smarty_tpl->tpl_vars['filter_name']->value;?>
" /></td>
			  <td class="right">
			  		<input type="text" name="filter_realname" id="filter_realname" value="<?php echo $_smarty_tpl->tpl_vars['filter_realname']->value;?>
" />
			  </td>
			  <td class="right"><input type="text" name="filter_mail" id="filter_mail" value="<?php echo $_smarty_tpl->tpl_vars['filter_mail']->value;?>
" /></td>
			  <td class="right">
			  		<select name="filter_group">
					<option value="">全部</option>
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['groupArr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['ID'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['ID']==$_smarty_tpl->tpl_vars['filter_group']->value){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['Name'];?>
</option>
					<?php } ?>
					</select>		  
			  </td>
              <td class="right"><input type="text" name="filter_logintime" id="filter_logintime" value="<?php echo $_smarty_tpl->tpl_vars['filter_logintime']->value;?>
" size="12" style="text-align:right;" class="date"/>
			  </td>
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
admin/useraction.php" method="post" enctype="multipart/form-data" id="form">
          <tbody>
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userArr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
            <tr>
              <td style="text-align: center;"><input type="checkbox" name="selected[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['ID'];?>
" /></td>
			  <td class="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['ID'];?>
</td>
              <td class="left"><?php echo $_smarty_tpl->tpl_vars['item']->value['Name'];?>
</td>
              <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['RealName'];?>
</td>
			  <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['Mail'];?>
</td>
			  <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['GroupName'];?>
</td>
			  <td class="right"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['LoginTime'],'%Y-%m-%d %H:%M:%S');?>
</td>
			  <td class="right"><?php if ($_smarty_tpl->tpl_vars['item']->value['Checked']=='1'){?>启用<?php }else{ ?>停用<?php }?></td>
              <td class="right">[ <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/userform.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['ID'];?>
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