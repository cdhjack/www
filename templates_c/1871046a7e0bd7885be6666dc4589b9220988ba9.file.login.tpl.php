<?php /* Smarty version Smarty-3.1.5, created on 2017-08-02 11:25:08
         compiled from "D:\www\www.rainbow.com//templates/user\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8421595323dde9d257-29592278%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1871046a7e0bd7885be6666dc4589b9220988ba9' => 
    array (
      0 => 'D:\\www\\www.rainbow.com//templates/user\\login.tpl',
      1 => 1501644241,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8421595323dde9d257-29592278',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_595323de03f1c',
  'variables' => 
  array (
    'come_url' => 0,
    'member_username' => 0,
    'site_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_595323de03f1c')) {function content_595323de03f1c($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style type="text/css">
.error {
    color: #ffffff;
}
</style>
<div class="login">
	<form action="#" method="post">
    	<Input type="hidden" name="isweb" id="isweb" value="1">
        <Input type="hidden" name="come_url" id="come_url" value="<?php echo $_smarty_tpl->tpl_vars['come_url']->value;?>
">
    	<p class="box-one"><label class="phone"></label><input type="text" id="username" name="username" placeholder="请输入手机号" value="<?php echo $_smarty_tpl->tpl_vars['member_username']->value;?>
" onBlur="checkInput(this.id)"/></p>
        <span id="form-username-error" class="error"></span>
        <p class="box-one"><label class="pwds"></label><input type="password" id="password" name="password" placeholder="请输入密码" onBlur="checkInput(this.id)"/></p>
        <span id="form-password-error" class="error"></span>
        <p class="box-two"><input type="text" class="text" placeholder="请输入验证码" id="checkcode_1" name="checkcode_1" onBlur="checkInput(this.id)"/><input type="button" value="56982" onClick="javascript:reloadcode_1();return false;" id="captcha_1" class="code" style="cursor:pointer;"/></p>
        <span id="form-checkcode_1-error" class="error"></span>
        <script type=""text/javascript"">
		function reloadcode_1(){
			$.ajax({
				url: "<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
public/captcha_login.php?" + Math.random(),
				type: 'post',
				dataType: 'json',
				data:{},
				beforeSend: function() {
					
				},
				complete: function() {
					
				},
				success: function(data) {
					$('#captcha_1').val(data);
				}
			});
		}
		reloadcode_1();
		</script>
        <input type="button" value="登&emsp;录" class="btn" id="button-login-1" style="cursor:pointer;"/>
    </form>
    <div class="link"><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
user/reg.php">注&emsp;&emsp;册</a>    |    <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
user/pwd.php">忘记密码</a></div>
</div><!--/login-->
<script type="text/javascript">
//各个输入框js验证
function checkInput(id){
	var obj = $('#'+id);
	var error_obj = $('#form-'+id+'-error');
	switch(id){
		case 'username':
			//var patten = /(^(0?86-)?\d{3,4}-\d{7,9}(-\d{1,6})?$)|(^((1[1-9][0-9]{1})+\d{8})$)/i;
			var patten = /(^((1[1-9][0-9]{1})+\d{8})$)/i;
			if(obj.val()==''){				
				error_obj.html('请输入手机号');
				//obj.focus();
				return false;
			}
			else if(!patten.test(obj.val())){
				error_obj.html('手机号格式错误');
				return false;
			}
			else{
				error_obj.html('');
				return true;
			}			
			break;		
		case 'password':
			if(obj.val()==''){				
				error_obj.html('请输入密码');
				return false;
			}
			else if(obj.val().length < 8){
				error_obj.html('密码不能少于8个字符');
				return false;
			}
			else if(obj.val().length > 18){
				error_obj.html('密码不能超过18个字符');
				return false;
			}
			else{
				error_obj.html('');
				return true;
			}			
			break;
		case 'checkcode_1':
			if(obj.val()==''){
				error_obj.html('请输入验证码');
				return false;
			}
			else{
				error_obj.html('');
				return true;
			}			
			break;	
		default:
			return true;
			break;	
	}
}
function checkButtonLoginOne(){
	var flag = 0;
	if(!checkInput('username')){
		flag = flag + 1;
	}	
	if(!checkInput('password')){
		flag = flag + 1;
	}
	if(!checkInput('checkcode_1')){
		flag = flag + 1;
	}
	if(flag > 0){
		return false;
	}
	return true;
}
//会员登录
$('#button-login-1').bind('click', function() {
	if(!checkButtonLoginOne()){
		return false;
	}
	var username_value = $('#username').val();
	var password_value = $('#password').val();
	var checkcode_1_value = $('#checkcode_1').val();
	var isweb_value = $('#isweb').val();
	var come_url_value = $('#come_url').val();
	$.ajax({
		url: '<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
user/loginAction.php',
		type: 'post',
		dataType: 'json',
		data:{"username":username_value,
		"password":password_value,
		"checkcode_1":checkcode_1_value,
		"isweb":isweb_value
		},
		beforeSend: function() {
			$('#button-login-1').attr('disabled', true);
			//$('#button-login-1').before('<div class="attention"><img src="view/image/loading.gif" alt="" /> 请等待！</div>');
		},
		complete: function() {
			$('#button-login-1').attr('disabled', false);
		},
		success: function(json) {
			if(json.REV == 1){
				//判断是否存在come_url，有则跳转至come_url
				if(come_url_value!=''){
					window.location.href = come_url_value;
				}
				else{
					$('#member_type_select').show();
					if(json.DATA.is_member==1){//用户有玩家身份
						$('#use_member_login').show();
					}
					if(json.DATA.is_owner==1){//用户有房主身份
						$('#use_owner_login').show();
					}
					if(json.DATA.is_agent==1){//用户有代理商身份
						$('#use_agent_login').show();
					}
				}
			}
			else{
				$('#form-'+json.INPUTID+'-error').html(json.MSG);
				reloadcode_1();//刷新验证码
			}
		}
	});
});
</script>
<div id="member_type_select" style="display:none;"><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
member/index.php" id="use_member_login" style="display:none;">玩家身份登录</a> <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
owner/index.php" id="use_owner_login" style="display:none;">房主身份登录</a> <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
agent/index.php" id="use_agent_login" style="display:none;">代理商身份登录 </a></div>
</body>
</html>


<?php }} ?>