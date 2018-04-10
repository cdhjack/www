<?php /* Smarty version Smarty-3.1.5, created on 2017-05-22 11:53:51
         compiled from "/data/home/byu1865080001/htdocs//templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1236960922592260cfaf7753-74110936%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6cd3d62020ea1242dee361da1d2037fd3ff3f151' => 
    array (
      0 => '/data/home/byu1865080001/htdocs//templates/login.tpl',
      1 => 1495277476,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1236960922592260cfaf7753-74110936',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'is_login' => 0,
    'login_name' => 0,
    'site_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_592260cfb402e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592260cfb402e')) {function content_592260cfb402e($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['is_login']->value==1){?>
<div class="loginBox">
    <div class="lgbg"></div>
    <div class="lgdiv">
        <div class="ot_a"><br /><br />你好，<?php echo $_smarty_tpl->tpl_vars['login_name']->value;?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
loginAction.php?isweb=2">退出</a>
        </div>
    </div>
</div>
<?php }else{ ?>
<div class="loginBox">
    <div class="lgbg"></div>
    <div class="lgdiv">
        <form id="LOGIN" class="lgform" name="LOGIN" onSubmit="return checkForm(this);" action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
loginAction.php" method="post">
        <Input type="hidden" name="isweb" value="1">
        <Input type="hidden" name="come_url" value="">
            <input type="text" value="" name="username" placeholder="邮箱/手机号"/>
            <input type="password" value="" name="password" placeholder="密码"/>
            <button>登录</button>
            <a href="xiazai.html" class="an1">登录</a>
        </form>
        <script language="javascript">
        // JavaScript Document
        function checkForm(theForm){
            if(theForm.username.value==""){
                alert("请输入邮箱/手机号！");
                theForm.username.focus();
                return false;
            }
            if(theForm.password.value==""){
                alert("请输入您的密码！");
                theForm.password.focus();
                return false;
            }
            return true;
        }
        </script>
        <div class="ot_a">
            <a href="reg.php">注册账号</a>|<a href="doc/agree.docx">会员协议</a>
        </div>
    </div>
</div>
<?php }?><?php }} ?>