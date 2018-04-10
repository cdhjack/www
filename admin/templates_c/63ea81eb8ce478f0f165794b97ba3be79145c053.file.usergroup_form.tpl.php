<?php /* Smarty version Smarty-3.1.5, created on 2014-09-09 15:56:46
         compiled from "D:\www\www.yoti-app.com\trunk\admin/templates/usergroup_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29454540eb2be2371c1-47890190%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63ea81eb8ce478f0f165794b97ba3be79145c053' => 
    array (
      0 => 'D:\\www\\www.yoti-app.com\\trunk\\admin/templates/usergroup_form.tpl',
      1 => 1402908811,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29454540eb2be2371c1-47890190',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'breadcrumbs' => 0,
    'item' => 0,
    'title' => 0,
    'site_url' => 0,
    'backUrl' => 0,
    'userGroupInfo' => 0,
    'viewPowerArr' => 0,
    'key' => 0,
    'editPowerArr' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_540eb2be38951',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540eb2be38951')) {function content_540eb2be38951($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
      <h1><img src="view/image/user-group.png" alt="" /> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
      <div class="buttons"><a onclick="$('#form').submit();" class="button">保存</a><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/usergroup.php<?php echo $_smarty_tpl->tpl_vars['backUrl']->value;?>
" class="button">取消</a></div>
    </div>
    <div class="content">
      <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/usergroupaction.php" method="post" enctype="multipart/form-data" id="form">
	  <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['userGroupInfo']->value['ID'];?>
" />
	  <input type="hidden" name="act" value="save" />
        <table class="form">
          <tr>
            <td><span class="required">*</span> 用户群组名称：</td>
            <td><input type="text" name="groupname" value="<?php echo $_smarty_tpl->tpl_vars['userGroupInfo']->value['Name'];?>
" />
              </td>
          </tr>
          <tr>
            <td>查看权限：</td>
            <td><div class="scrollbox">
				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['viewPowerArr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
				<div <?php if (!($_smarty_tpl->tpl_vars['key']->value % 2)){?>class="even"<?php }else{ ?>class="odd"<?php }?>>
				<input type="checkbox" name="power_view[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['code'];?>
"  <?php echo $_smarty_tpl->tpl_vars['item']->value['checked'];?>
/>
				<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

				</div>
				<?php } ?>
			  </div>
              <a onclick="$(this).parent().find(':checkbox').attr('checked', true);">全选</a> / <a onclick="$(this).parent().find(':checkbox').attr('checked', false);">取消选择</a></td>
          </tr>
          <tr>
            <td>修改权限：<br /><span class="help">新增、修改、删除等操作</td>
            <td><div class="scrollbox">
				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['editPowerArr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
				<div <?php if (!($_smarty_tpl->tpl_vars['key']->value % 2)){?>class="even"<?php }else{ ?>class="odd"<?php }?>>
				<input type="checkbox" name="power_edit[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['code'];?>
"  <?php echo $_smarty_tpl->tpl_vars['item']->value['checked'];?>
/>
				<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

				</div>
				<?php } ?>
			  </div>
              <a onclick="$(this).parent().find(':checkbox').attr('checked', true);">全选</a> / <a onclick="$(this).parent().find(':checkbox').attr('checked', false);">取消选择</a></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div> 
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>