<?php /* Smarty version Smarty-3.1.5, created on 2017-05-21 02:31:45
         compiled from "E:\www\www.chitugame.com//templates/login_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3252359208ad07a1de2-51142963%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69f377c081681a19a96e11686e96baa5113d410a' => 
    array (
      0 => 'E:\\www\\www.chitugame.com//templates/login_form.tpl',
      1 => 1495305100,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3252359208ad07a1de2-51142963',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_59208ad07d81a',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59208ad07d81a')) {function content_59208ad07d81a($_smarty_tpl) {?><div class="loginBox">
    <div class="lgbg"></div>
    <div class="lgdiv">
        <form id="LOGIN" class="lgform" name="LOGIN" onSubmit="return checkForm(this);" action="loginAction.php" method="post">
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
</div><?php }} ?>