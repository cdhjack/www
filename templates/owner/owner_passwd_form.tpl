{*include file="header.tpl"*}
<style type="text/css">
.error {
    color: #e22;
}
</style>
<div class="owner-public-header">
    <a href="index.html" class="return"></a>
    <div class="headline">账号管理</div>
    <a href="#" class="ctrul" id="button-ownerinfo-1">保存</a>
</div>
<div class="owner-infor">
    <form action="#" method="post">
   	    <p><label>帐号：</label><span>{*$member_arr.mobile*}</span></p>
   	    <p><label>名称：</label><input type="text" id="nickname" name="nickname" value="{*$member_arr.nickname*}" placeholder="请输入您的名称" onBlur="checkInput(this.id)"/></p>
        <span id="form-nickname-error" class="error"></span>
    	<p><label>原密码：</label><input id="passwd_old" name="passwd_old" type="password"  value="" onBlur="checkInput(this.id)"/></p>
        <span id="form-passwd_old-error" class="error"></span>
        <p><label>设置新密码：</label><input id="passwd_1" name="passwd_1" type="password"  value="" onBlur="checkInput(this.id)"/></p>
        <span id="form-passwd_1-error" class="error"></span>
        <p><label>确认新密码：</label><input id="repasswd_1" name="repasswd_1" type="password"  value="" onBlur="checkInput(this.id)"/></p>
        <span id="form-repasswd_1-error" class="error"></span>
    </form>
</div><!--/owner-add-->
<script type="text/javascript">
//各个输入框js验证
function checkInput(id){
	var obj = $('#'+id);
	var error_obj = $('#form-'+id+'-error');
	switch(id){
		case 'nickname':
			if(obj.val()==''){
				error_obj.html('请输入您的名称');
				return false;
			}
			else{
				error_obj.html('');
				return true;
			}			
			break;
		case 'passwd_old':
			if(obj.val()==''){				
				error_obj.html('请输入原密码');
				return false;
			}
			else if(obj.val().length < 8){
				error_obj.html('原密码不能少于8个字符');
				return false;
			}
			else if(obj.val().length > 18){
				error_obj.html('原密码不能超过18个字符');
				return false;
			}
			else{
				error_obj.html('');
				return true;
			}			
			break;
		case 'passwd_1':
			if(obj.val()==''){				
				error_obj.html('请输入新密码');
				return false;
			}
			else if(obj.val().length < 8){
				error_obj.html('新密码不能少于8个字符');
				return false;
			}
			else if(obj.val().length > 18){
				error_obj.html('新密码不能超过18个字符');
				return false;
			}
			else{
				error_obj.html('');
				return true;
			}			
			break;
		case 'repasswd_1':
			if(obj.val()==''){				
				error_obj.html('请输入确认新密码');
				return false;
			}
			else if(obj.val()!==$('#passwd_1').val()){
				error_obj.html('两次输入的新密码不一致');
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
function checkButtonOwnerForm(){
	var flag = 0;
	if(!checkInput('nickname')){
		flag = flag + 1;
	}	
	if(!checkInput('passwd_old')){
		flag = flag + 1;
	}
	if(!checkInput('passwd_1')){
		flag = flag + 1;
	}
	if(!checkInput('repasswd_1')){
		flag = flag + 1;
	}
	if(flag > 0){
		return false;
	}
	return true;
}
 //房主帐号管理异步提交表单
$('#button-ownerinfo-1').bind('click', function() { 
	if(!checkButtonOwnerForm()){
		return false;
	}
	var nickname_value = $('#nickname').val();
	var passwd_old_value = $('#passwd_old').val();
	var passwd_1_value = $('#passwd_1').val();
	$.ajax({
		url: '{*$site_url*}owner/ownerPasswdAction.php',
		type: 'post',
		dataType: 'json',
		data: {
			'nickname': nickname_value,
			'passwd_old': passwd_old_value,
			'passwd_1': passwd_1_value
		},
		beforeSend: function() {
			$('#button-ownerinfo-1').attr('disabled', true);
		},
		complete: function() {
			$('#button-ownerinfo-1').attr('disabled', false);
		},
		success: function(data) {
			if(data.REV == 1){
				alert(data.MSG);
				window.location.reload();
			}
			else{
				//alert(data.MSG);
				$('#form-'+data.INPUTID+'-error').html(data.MSG);
			} 
		}
	});
});
</script>
</body>
</html>


