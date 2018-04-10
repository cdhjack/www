<?php /* Smarty version Smarty-3.1.5, created on 2017-05-22 12:29:47
         compiled from "/data/home/byu1865080001/htdocs/admin/templates/member_password_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:281030045922693b71f434-30584463%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f66a4cb2a5b10db8125532ec9b7e63e8150336bf' => 
    array (
      0 => '/data/home/byu1865080001/htdocs/admin/templates/member_password_form.tpl',
      1 => 1495229738,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '281030045922693b71f434-30584463',
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
  'unifunc' => 'content_5922693b7ae98',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5922693b7ae98')) {function content_5922693b7ae98($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
	  <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['memberInfo']->value['id'];?>
" />
	  <input type="hidden" name="act" value="updatepassword" />
        <table class="form">
          <tr>
            <td> &nbsp;&nbsp;&nbsp;用户：</td>
            <td><?php if ($_smarty_tpl->tpl_vars['memberInfo']->value['mobile']){?><?php echo $_smarty_tpl->tpl_vars['memberInfo']->value['mobile'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['memberInfo']->value['email'];?>
<?php }?></td>
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