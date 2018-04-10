<?php /* Smarty version Smarty-3.1.5, created on 2017-05-19 22:25:53
         compiled from "E:\www\www.yotiapp.com\trunk\admin/templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18918591f0071d4b394-58468413%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db730539d23311b9fc807789844d75483dd7ae20' => 
    array (
      0 => 'E:\\www\\www.yotiapp.com\\trunk\\admin/templates/login.tpl',
      1 => 1406882449,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18918591f0071d4b394-58468413',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error_warning' => 0,
    'site_url' => 0,
    'remember_username' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_591f0071ddb2a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_591f0071ddb2a')) {function content_591f0071ddb2a($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="content">
  <div class="box" style="width: 400px; min-height: 300px; margin-top: 40px; margin-left: auto; margin-right: auto;">
    <div class="heading">
      <h1><img src="view/image/lockscreen.png" alt="" /> 请输入您的登录信息。</h1>
    </div>
    <div class="content" style="min-height: 150px; overflow: hidden;">
	  <?php if ($_smarty_tpl->tpl_vars['error_warning']->value!=''){?>
      <div class="warning"><?php echo $_smarty_tpl->tpl_vars['error_warning']->value;?>
</div>
      <?php }?>
	  <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/login.php" method="post" enctype="multipart/form-data" id="form">
	  <Input type="hidden" name="isweb" value="1">
        <table style="width: 100%;">
          <tr>
            <td style="text-align: center;" rowspan="4"><img src="view/image/login.png" alt="请输入您的登录信息。" /></td>
          </tr>
          <tr>
            <td>管理帐户：<br />
              <input type="text" name="username" value="<?php echo $_smarty_tpl->tpl_vars['remember_username']->value;?>
" style="margin-top: 4px;" />
              <br />
              <br />
              安全密码：<br />
              <input type="password" name="password" value="" style="margin-top: 4px;" />
                            <!--<br />
              <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/index.php?route=common/forgotten">忘记密码</a>-->
                            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td style="text-align: right;"><a onclick="$('#form').submit();" class="button">登录</a></td>
          </tr>
        </table>
	  </form>
    </div>
  </div>
</div>
<script type="text/javascript"><!--
$('#form input').keydown(function(e) {
	if (e.keyCode == 13) {
		$('#form').submit();
	}
});
//--></script> 
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>