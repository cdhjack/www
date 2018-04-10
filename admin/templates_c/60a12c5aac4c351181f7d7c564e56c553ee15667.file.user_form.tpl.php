<?php /* Smarty version Smarty-3.1.5, created on 2017-05-20 13:47:46
         compiled from "E:\www\www.chitugame.com\admin/templates/user_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23951591fd88270d102-15884111%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60a12c5aac4c351181f7d7c564e56c553ee15667' => 
    array (
      0 => 'E:\\www\\www.chitugame.com\\admin/templates/user_form.tpl',
      1 => 1403177498,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23951591fd88270d102-15884111',
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
    'userInfo' => 0,
    'groupArr' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_591fd88285c29',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_591fd88285c29')) {function content_591fd88285c29($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
admin/user.php<?php echo $_smarty_tpl->tpl_vars['backUrl']->value;?>
" class="button">取消</a></div>
    </div>
    <div class="content">
      <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/useraction.php" method="post" enctype="multipart/form-data" id="form">
	  <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['ID'];?>
" />
	  <input type="hidden" name="act" value="save" />
        <table class="form">
          <tr>
            <td><span class="required">*</span> 用户名：</td>
            <td><input type="text" name="username" value="<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['Name'];?>
" />
              </td>
          </tr>
          <tr>
            <td><span class="required">*</span> 名字：</td>
            <td><input type="text" name="realname" value="<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['RealName'];?>
" />
              </td>
          </tr>
          <tr>
            <td><span class="required">*</span> 性别：</td>
            <td><input type="radio" name="sex" value="1" <?php if ($_smarty_tpl->tpl_vars['userInfo']->value['Sex']=='1'||!$_smarty_tpl->tpl_vars['userInfo']->value['Sex']){?>  checked="checked" <?php }?>>&nbsp;男&nbsp;&nbsp;&nbsp;
    <input type="radio" name="sex" value="2" <?php if ($_smarty_tpl->tpl_vars['userInfo']->value['Sex']=='2'){?>  checked="checked" <?php }?>>&nbsp;女
              </td>
          </tr>
          <tr>
            <td>邮箱：</td>
            <td><input type="text" name="mail" value="<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['Mail'];?>
" /></td>
          </tr>
          <tr>
            <td>用户群组：</td>
            <td><select name="groupid">
				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['groupArr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['ID'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['ID']==$_smarty_tpl->tpl_vars['userInfo']->value['GroupID']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['Name'];?>
</option>
				<?php } ?>
			  </select></td>
          </tr>
          <tr>
            <td>密码：</td>
            <td><input type="password" name="password" value=""  />
              </td>
          </tr>
          <tr>
            <td>确认密码：</td>
            <td><input type="password" name="confirm" value="" />
              </td>
          </tr>
          <tr>
            <td>状态：</td>
            <td><select name="checked">
				<option value="1" <?php if ($_smarty_tpl->tpl_vars['userInfo']->value['Checked']=='1'){?>  selected="selected" <?php }?>>启用</option>
				<option value="0" <?php if ($_smarty_tpl->tpl_vars['userInfo']->value['Checked']=='0'){?>  selected="selected" <?php }?>>停用</option>
				</select></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div> 
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>