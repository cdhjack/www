<?php /* Smarty version Smarty-3.1.5, created on 2017-06-28 21:50:08
         compiled from "E:\www\www.rainbow.com//templates/user\pwd.tpl" */ ?>
<?php /*%%SmartyHeaderCode:68095953b4100385a2-58589502%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b6fdfaec78e52deb8411f8bcfcb11d8499c6e1a9' => 
    array (
      0 => 'E:\\www\\www.rainbow.com//templates/user\\pwd.tpl',
      1 => 1498640157,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '68095953b4100385a2-58589502',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'site_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5953b4101aade',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5953b4101aade')) {function content_5953b4101aade($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style type="text/css">
.error {
    color: #e22;
}
</style>
<div class="pwd-public-header">
    <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
index.html" class="return"></a>
    <div class="headline">找回密码</div>
    <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
user/login.php" class="ctrul">登录</a>
</div>
<div class="pwd">
    <form action="#" method="post">
   	    <p><label>手机号</label><input type="text" name="mobile"  id="mobile"/></p>
        <span id="form-mobile-error" class="error"></span>
        <p><label>验证码</label><input type="text" name="checkmobile" id="checkmobile" onblur="checkInput(this.id)"/><input type="button"  id="mobile-button-1" class="verification" value="获取验证码" /></p>
        <span id="form-checkmobile-error" class="error"></span>
        <p><label>新密码</label><input id="passwd_1" name="passwd_1" type="password"  value="" onBlur="checkInput(this.id)"/></p>
        <span id="form-passwd_1-error" class="error"></span>
        <p><label>确认密码</label><input id="repasswd_1" name="repasswd_1" type="password" value="" onBlur="checkInput(this.id)"/></p>
        <span id="form-repasswd_1-error" class="error"></span>
        <input type="button" class="btn" id="button-pwd-1" value="提交" />
    </form>
</div><!--/owner-add-->
<script type="text/javascript">
//各个输入框js验证
function checkInput(id){
	var obj = $('#'+id);
	var error_obj = $('#form-'+id+'-error');
	switch(id){
		case 'mobile':
			//var patten = /(^(0?86-)?\d{3,4}-\d{7,9}(-\d{1,6})?$)|(^((1[1-9][0-9]{1})+\d{8})$)/i;
			var patten = /(^((1[1-9][0-9]{1})+\d{8})$)/i;
			if(obj.val()==''){				
				error_obj.html('请输入手机号码');
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
		case 'passwd_1':
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
		case 'repasswd_1':
			if(obj.val()==''){				
				error_obj.html('请输入确认密码');
				return false;
			}
			else if(obj.val()!==$('#passwd_1').val()){
				error_obj.html('两次输入的密码不一致');
				return false;
			}
			else{
				error_obj.html('');
				return true;
			}		
			break;
		case 'checkmobile':
			if(obj.val()==''){
				error_obj.html('请输入手机短信验证码');
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
function checkButtonPwdOne(){
	var flag = 0;
	if(!checkInput('mobile')){
		flag = flag + 1;
	}	
	if(!checkInput('passwd_1')){
		flag = flag + 1;
	}
	if(!checkInput('repasswd_1')){
		flag = flag + 1;
	}
	if(!checkInput('checkmobile')){
		flag = flag + 1;
	}
	if(flag > 0){
		return false;
	}
	return true;
}
//手机帐号找回密码
$('#button-pwd-1').bind('click', function() {
	if(!checkButtonPwdOne()){
		return false;
	}
	var mobile_value = $('#mobile').val();
	var passwd_1_value = $('#passwd_1').val();
	var checkmobile_value = $('#checkmobile').val();
	$.ajax({
		url: '<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
user/pwdAction.php',
		type: 'post',
		dataType: 'json',
		data:{"mobile":mobile_value,
		"passwd_1":passwd_1_value,
		"checkmobile":checkmobile_value
		},
		beforeSend: function() {
			$('#button-pwd-1').attr('disabled', true);
			//$('#button-pwd-1').before('<div class="attention"><img src="view/image/loading.gif" alt="" /> 请等待！</div>');
		},
		complete: function() {
			$('#button-pwd-1').attr('disabled', false);
		},
		success: function(data) {
			if(data.REV == 1){
				alert(data.MSG);
			}
			else{
				$('#form-'+data.INPUTID+'-error').html(data.MSG);
			}
		}
	});
});

//手机帐号检测
$('#mobile').bind('blur', function() {
	if(!checkInput('mobile')){
		return false;
	}
	var mobile_value = $('#mobile').val();
	$.ajax({
		url: '<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
user/checkLoginName.php?act=pwd',
		type: 'post',
		dataType: 'json',
		data:{"mobile":mobile_value},
		beforeSend: function() {
		},
		complete: function() {
		},
		success: function(data) {
			if(data.REV == 1){
				$('#form-mobile-error').html('');
			}
			else{
				$('#form-mobile-error').html(data.MSG);
			}
		}
	});
});
//手机找回密码发送短信
$('#mobile-button-1').bind('click', function() {
	if(!checkInput('mobile')){
		return false;
	}
	var mobile_value = $('#mobile').val();
	$.ajax({
		url: '<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
user/smsAction.php?act=pwd',
		type: 'post',
		dataType: 'json',
		data:{"mobile":mobile_value},
		success: function(data) {
			if(data.REV == 1){
				//发送短信按钮倒计时				
				hsTime('mobile-button-1');
			}
			else{
				$('#form-checkmobile-error').html(data.MSG);
			}
		}
	});
});

var wait=10;
//发送短信按钮倒计时
function hsTime(id) {
	if (wait == 0) {
		$('#'+id).attr('disabled', false); 
		$('#'+id).val('重新发送');
		wait = 10;
	} 
	else {
		$('#'+id).attr('disabled', true); 
		//$('#'+id).val(wait+'秒后重新获取');
		$('#'+id).val(wait+'秒');
		wait--;
		setTimeout(function() {
			hsTime(id)
		},1000)
	}
}
</script>
</body>
</html>


<?php }} ?>