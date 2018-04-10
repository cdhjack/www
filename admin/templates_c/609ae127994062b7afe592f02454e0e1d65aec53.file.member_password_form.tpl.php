<?php /* Smarty version Smarty-3.1.5, created on 2014-09-22 17:30:22
         compiled from "D:\www\www.yoti-app.com\trunk\admin/templates/member_password_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17182541fec2ed77f47-08428836%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '609ae127994062b7afe592f02454e0e1d65aec53' => 
    array (
      0 => 'D:\\www\\www.yoti-app.com\\trunk\\admin/templates/member_password_form.tpl',
      1 => 1411378209,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17182541fec2ed77f47-08428836',
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
    'memberInfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_541fec2ee242f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541fec2ee242f')) {function content_541fec2ee242f($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
      <div class="buttons"><a onclick="$('#form').submit();" class="button">保存</a><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/member.php<?php echo $_smarty_tpl->tpl_vars['backUrl']->value;?>
" class="button">取消</a></div>
    </div>
    <div class="content">
      <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/memberaction.php" method="post" enctype="multipart/form-data" id="form">
	  <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['memberInfo']->value['ID'];?>
" />
	  <input type="hidden" name="act" value="updatepassword" />
        <table class="form">
          <tr>
            <td> &nbsp;&nbsp;&nbsp;用户：</td>
            <td><?php echo $_smarty_tpl->tpl_vars['memberInfo']->value['rname'];?>
</td>
          </tr>
          <tr>
            <td><span class="required">*</span> 新密码：</td>
            <td><input type="password" name="password" value=""  />
              </td>
          </tr>
          <tr>
            <td><span class="required">*</span> 确认密码：</td>
            <td><input type="password" name="confirm" value="" />
              </td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div> 
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>