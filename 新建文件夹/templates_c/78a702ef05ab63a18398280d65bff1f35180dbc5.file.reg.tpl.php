<?php /* Smarty version Smarty-3.1.5, created on 2017-05-22 11:58:25
         compiled from "/data/home/byu1865080001/htdocs//templates/reg.tpl" */ ?>
<?php /*%%SmartyHeaderCode:580458257592261e1cc3415-32942651%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '78a702ef05ab63a18398280d65bff1f35180dbc5' => 
    array (
      0 => '/data/home/byu1865080001/htdocs//templates/reg.tpl',
      1 => 1495321280,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '580458257592261e1cc3415-32942651',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'site_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_592261e20180d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592261e20180d')) {function content_592261e20180d($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="js/jquery.SuperSlide.2.1.1.js"></script>
<style type="text/css">
.error {
    color: #e22;
}
</style>
</head>
<body>
<div class="kp-page" style="background-image: url(images/wbg.jpg);padding-top: 358px;">
  <div class="aMain bg1">
    <div class="zhc">
      <div class="hd"><span class="line1">|</span>
        <ul>
          <li>手机注册</li>
          <li>邮箱注册</li>
        </ul>
      </div>
      <div class="bd">
        <div class="form1">
          <ul>
            <li>
              <input name="mobile" id="mobile" type="text" value="手机号码（必须填写）" onFocus="if(this.value=='手机号码（必须填写）'){this.value='';}" />
              <span id="form-mobile-error" class="error"></span>
            </li>
            <li><span class="yzm"><!--<img src="images/yzm.jpg"/>--><img id="captcha_1" alt="" src=""></span><a href="#" onClick="javascript:reloadcode_1();return false;"><img src="images/tb01.jpg"/></a>
              <input class="in1" id="checkcode_1" name="checkcode_1" type="text" value="验证码（必须填写）" onFocus="if(this.value=='验证码（必须填写）'){this.value='';}"  onblur="if(this.value==''){this.value='验证码（必须填写）';}" />
              <span id="form-checkcode_1-error" class="error"></span>
				<script type=""text/javascript"">
				document.getElementById("captcha_1").src = "<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
public/captcha_mobile_reg.php?" + Math.random();
				function reloadcode_1(){ 
				  document.getElementById("captcha_1").src = "<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
public/captcha_mobile_reg.php?" + Math.random();
				}
				</script>
            </li>
            <li>
              <!--<input id="passwd_1" name="passwd_1" type="text" value="请输入密码" onFocus="if(this.value=='请输入密码'){this.value='';}"  onblur="if(this.value==''){this.value='请输入密码';}" />-->
              <input id="passwd_1" name="passwd_1" type="password" placeholder="请输入密码" value="" />
              <span id="form-passwd_1-error" class="error"></span>
            </li>
            <li>
              <!--<input class="in2" name="" type="text" value="短信验证码（必须填写）" onFocus="if(this.value=='短信验证码（必须填写）'){this.value='';}"  onblur="if(this.value==''){this.value='短信验证码（必须填写）';}" />
              <a class="link1" href="#">免费获取验证码</a> </li>-->
              <!--<input id="repasswd_1" name="repasswd_1" type="text" value="请再次输入密码" onFocus="if(this.value=='请再次输入密码'){this.value='';}"  onblur="if(this.value==''){this.value='请再次输入密码';}" />-->
              <input id="repasswd_1" name="repasswd_1" type="password" placeholder="请再次输入密码" value=""/>
              <span id="form-repasswd_1-error" class="error"></span>
            <li class="li1"><span class="f_r"><a href="#">暂不开通注册</a></span>实名及防沉迷信息填写</li>
            <li>
              <input name="rname_1" id="rname_1" type="text" value="真实姓名（必须填写）" onFocus="if(this.value=='真实姓名（必须填写）'){this.value='';}"  onblur="if(this.value==''){this.value='真实姓名（必须填写）';}" />
              <span id="form-rname_1-error" class="error"></span>
            </li>
            <li>
              <input name="identity_1" id="identity_1" type="text" value="身份证号码（必须填写）" onFocus="if(this.value=='身份证号码（必须填写）'){this.value='';}"  onblur="if(this.value==''){this.value='身份证号码（必须填写）';}" />
              <span id="form-identity_1-error" class="error"></span>
            </li>
          </ul>
          <div class="in3">
            <input name="userselect_1" id="userselect_1" type="checkbox">
            已阅读并同意用户协议
          <span id="form-userselect_1-error" class="error"></span>
            </div>
          <div class="in4">
            <input type="button" id="button-reg-1" value=""/>
          </div>
        </div>    
        
        <div class="form1">
          <ul>
            <li>
              <input name="email" id="email" type="text" value="邮箱地址（必须填写）" onFocus="if(this.value=='邮箱地址（必须填写）'){this.value='';}" />
              <span id="form-email-error" class="error"></span>
            </li>
            <li><span class="yzm"><!--<img src="images/yzm.jpg"/>--><img id="captcha_2" alt="" src=""></span><a href="#" onClick="javascript:reloadcode_2();return false;"><img src="images/tb01.jpg"/></a>
              <input class="in1" id="checkcode_2" name="checkcode_2" type="text" value="验证码（必须填写）" onFocus="if(this.value=='验证码（必须填写）'){this.value='';}"  onblur="if(this.value==''){this.value='验证码（必须填写）';}" />
              <span id="form-checkcode_2-error" class="error"></span>
				<script type=""text/javascript"">
				document.getElementById("captcha_2").src = "<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
public/captcha_email_reg.php?" + Math.random();
				function reloadcode_2(){ 
				  document.getElementById("captcha_2").src = "<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
public/captcha_email_reg.php?" + Math.random();
				}
				</script>
            </li>
            <li>
              <!--<input id="passwd_2" name="passwd_2" type="text" value="请输入密码" onFocus="if(this.value=='请输入密码'){this.value='';}"  onblur="if(this.value==''){this.value='请输入密码';}" />-->
              <input id="passwd_2" name="passwd_2" type="password" placeholder="请输入密码" value="" />
              <span id="form-passwd_2-error" class="error"></span>
            </li>
            <li>
              <!--<input class="in2" name="" type="text" value="短信验证码（必须填写）" onFocus="if(this.value=='短信验证码（必须填写）'){this.value='';}"  onblur="if(this.value==''){this.value='短信验证码（必须填写）';}" />
              <a class="link1" href="#">免费获取验证码</a> </li>-->
              <!--<input id="repasswd_2" name="repasswd_2" type="text" value="请再次输入密码" onFocus="if(this.value=='请再次输入密码'){this.value='';}"  onblur="if(this.value==''){this.value='请再次输入密码';}" />-->
              <input id="repasswd_2" name="repasswd_2" type="password" placeholder="请再次输入密码" value="" />
              <span id="form-repasswd_2-error" class="error"></span>
            <li class="li1"><span class="f_r"><a href="#">暂不开通注册</a></span>实名及防沉迷信息填写</li>
            <li>
              <input name="rname_2" id="rname_2" type="text" value="真实姓名（必须填写）" onFocus="if(this.value=='真实姓名（必须填写）'){this.value='';}"  onblur="if(this.value==''){this.value='真实姓名（必须填写）';}" />
              <span id="form-rname_2-error" class="error"></span>
            </li>
            <li>
              <input name="identity_2" id="identity_2" type="text" value="身份证号码（必须填写）" onFocus="if(this.value=='身份证号码（必须填写）'){this.value='';}"  onblur="if(this.value==''){this.value='身份证号码（必须填写）';}" />
              <span id="form-identity_2-error" class="error"></span>
            </li>
          </ul>
          <div class="in3">
            <input name="userselect_2" id="userselect_2" type="checkbox">
            已阅读并同意用户协议
          <span id="form-userselect_2-error" class="error"></span>
            </div>
          <div class="in4">
            <input type="button" id="button-reg-2" value=""/>
          </div>
        </div>    
        
         
      </div>
    </div>
    <script type="text/javascript">jQuery(".zhc").slide({mainCell:".bd"});</script> 
  </div>
  <?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<script type="text/javascript">
//各个输入框js验证
function checkInput(id){
	var obj = $('#'+id);
	var error_obj = $('#form-'+id+'-error');
	switch(id){
		case 'mobile':
			//var patten = /(^(0?86-)?\d{3,4}-\d{7,9}(-\d{1,6})?$)|(^((1[1-9][0-9]{1})+\d{8})$)/i;
			var patten = /(^((1[1-9][0-9]{1})+\d{8})$)/i;
			if(obj.val()=='' || obj.val()=='手机号码（必须填写）'){				
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
		case 'email':
			var patten = /^([a-zA-Z0-9_-]\.*)+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)*(\.[a-zA-Z0-9_-]{2,3})$/;
			if(obj.val()=='' || obj.val()=='邮箱地址（必须填写）'){				
				error_obj.html('请输入邮箱地址');
				return false;
			}
			else if(!patten.test(obj.val())){
				error_obj.html('邮箱格式错误');
				return false;
			}
			else{
				error_obj.html('');
				return true;
			}			
			break;
		case 'passwd_1':case 'passwd_2':
			if(obj.val()=='' || obj.val()=='请输入密码'){				
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
			if(obj.val()=='' || obj.val()=='请再次输入密码'){				
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
		case 'repasswd_2':
			if(obj.val()=='' || obj.val()=='请再次输入密码'){				
				error_obj.html('请输入确认密码');
				return false;
			}
			else if(obj.val()!==$('#passwd_2').val()){
				error_obj.html('两次输入的密码不一致');
				return false;
			}
			else{
				error_obj.html('');
				return true;
			}			
			break;
		case 'checkcode_1':case 'checkcode_2':
			if(obj.val()=='' || obj.val()=='验证码（必须填写）'){		
				error_obj.html('请输入验证码');
				return false;
			}
			else{
				error_obj.html('');
				return true;
			}			
			break;
		/*case 'checkmobile':
			if(obj.val()=='' || obj.val()=='短信验证码（必须填写）'){	
				error_obj.html('请输入手机短信验证码');
				return false;
			}
			else{
				error_obj.html('');
				return true;
			}			
			break;*/
		case 'rname_1':case 'rname_2':
			if(obj.val()=='' || obj.val()=='真实姓名（必须填写）'){		
				error_obj.html('请输入真实姓名');
				return false;
			}
			else{
				error_obj.html('');
				return true;
			}			
			break;			
		case 'identity_1':case 'identity_2':
			if(obj.val()=='' || obj.val()=='身份证号码（必须填写）'){				
				error_obj.html('请输入身份证号码');
				return false;
			}
			else if(!IdCardValidate(obj.val())){
				error_obj.html('身份证号码错误');
				return false;
			}
			else{
				error_obj.html('');
				return true;
			}			
			break;
		case 'userselect_1':case 'userselect_2':
			if(obj.length > 0 && obj.attr("checked")){
				error_obj.html('');
				return true;
			}
			else{
				error_obj.html('请同意协议并勾选');
				return false;
			}
			break;	
		default:
			return true;
			break;	
	}
}
function checkButtonRegOne(){
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
	if(!checkInput('checkcode_1')){
		flag = flag + 1;
	}
	/*if(!checkInput('checkmobile')){
		flag = flag + 1;
	}*/
	if(!checkInput('rname_1')){
		flag = flag + 1;
	}
	if(!checkInput('identity_1')){
		flag = flag + 1;
	}	
	if(!checkInput('userselect_1')){
		flag = flag + 1;
	}
	if(flag > 0){
		return false;
	}
	return true;
}
function checkButtonRegTwo(){
	var flag = 0;
	if(!checkInput('email')){
		flag = flag + 1;
	}	
	if(!checkInput('passwd_2')){
		flag = flag + 1;
	}
	if(!checkInput('repasswd_2')){
		flag = flag + 1;
	}
	if(!checkInput('checkcode_2')){
		flag = flag + 1;
	}
	if(!checkInput('rname_2')){
		flag = flag + 1;
	}
	if(!checkInput('identity_2')){
		flag = flag + 1;
	}	
	if(!checkInput('userselect_2')){
		flag = flag + 1;
	}
	if(flag > 0){
		return false;
	}
	return true;
}
//手机注册
$('#button-reg-1').bind('click', function() {
	if(!checkButtonRegOne()){
		return false;
	}
	var mobile_value = $('#mobile').val();
	var passwd_1_value = $('#passwd_1').val();
	var checkcode_1_value = $('#checkcode_1').val();	
	//var checkmobile_value = $('#checkmobile').val();
	var rname_1_value = $('#rname_1').val();
	var identity_1_value = $('#identity_1').val();
	$.ajax({
		url: '<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
regAction.php?membertype=1',
		type: 'post',
		dataType: 'json',
		data:{"mobile":mobile_value,
		"passwd_1":passwd_1_value,
		"checkcode_1":checkcode_1_value,
		"rname_1":rname_1_value,
		"identity_1":identity_1_value,
		//"checkmobile":checkmobile_value
		},
		beforeSend: function() {
			$('#button-reg-1').attr('disabled', true);
			//$('#button-reg-1').before('<div class="attention"><img src="view/image/loading.gif" alt="" /> 请等待！</div>');
		},
		complete: function() {
			$('#button-reg-1').attr('disabled', false);
		},
		success: function(data) {
			if(data.REV == 1){
				alert(data.MSG);
				window.location.href = '<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
index.php';
			}
			else{
				$('#form-'+data.INPUTID+'-error').html(data.MSG);
			}
		}
	});
});

//手机帐号检测
$('#mobile').bind('blur', function() {	
	if($('#mobile').val()==''){
		$('#mobile').val('手机号码（必须填写）');
		$('#form-mobile-error').html('');
		return false;
	}	
	var mobile_value = $('#mobile').val();
	$.ajax({
		url: '<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
checkLoginName.php?membertype=1',
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

//邮箱帐号检测
$('#email').bind('blur', function() {	
	if($('#email').val()==''){
		$('#email').val('邮箱地址（必须填写）');
		$('#form-email-error').html('');
		return false;
	}	
	var email_value = $('#email').val();
	$.ajax({
		url: '<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
checkLoginName.php?membertype=2',
		type: 'post',
		dataType: 'json',
		data:{"email":email_value},
		beforeSend: function() {
		},
		complete: function() {
		},
		success: function(data) {
			if(data.REV == 1){
				$('#form-email-error').html('');
			}
			else{
				$('#form-email-error').html(data.MSG);
			}
		}
	});
});

//邮箱注册
$('#button-reg-2').bind('click', function() {
	if(!checkButtonRegTwo()){
		return false;
	}
	var email_value = $('#email').val();
	var passwd_2_value = $('#passwd_2').val();
	var checkcode_2_value = $('#checkcode_2').val();	
	var rname_2_value = $('#rname_2').val();
	var identity_2_value = $('#identity_2').val();
	$.ajax({
		url: '<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
regAction.php?membertype=2',
		type: 'post',
		dataType: 'json',
		data:{"email":email_value,
		"passwd_2":passwd_2_value,
		"checkcode_2":checkcode_2_value,
		"rname_2":rname_2_value,
		"identity_2":identity_2_value,
		},
		beforeSend: function() {
			$('#button-reg-2').attr('disabled', true);
			//$('#button-reg-2').before('<div class="attention"><img src="view/image/loading.gif" alt="" /> 请等待！</div>');
		},
		complete: function() {
			$('#button-reg-2').attr('disabled', false);
		},
		success: function(data) {			
			if(data.REV == 1){
				alert(data.MSG);
				window.location.href = '<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
index.php';
			}
			else{
				$('#form-'+data.INPUTID+'-error').html(data.MSG);
			}
		}
	});
});
//手机注册发送短信
$('#mobile-button-1').bind('click', function() {
	if(!checkInput('mobile')){
		return false;
	}
	var mobile_value = $('#mobile').val();
	$.ajax({
		url: '<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
smsAction.php',
		type: 'post',
		dataType: 'json',
		data:{"mobile":mobile_value},
		success: function(data) {
			if(data.REV == 1){
				//发送短信按钮倒计时				
				hsTime('mobile-button-1');
			}
			else{
				alert(data.MSG);
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

//检测身份证号码
var Wi = [ 7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2, 1 ];// 加权因子
var ValideCode = [ 1, 0, 10, 9, 8, 7, 6, 5, 4, 3, 2 ];// 身份证验证位值.10代表X
function IdCardValidate(idCard){
	//idCard = trim(idCard.replace(/ /g,""));
	if(idCard.length == 15)
	{   
		return isValidityBrithBy15IdCard(idCard);   
	}
	else if(idCard.length == 18)
	{   
		var a_idCard = idCard.split("");// 得到身份证数组   
		if(isValidityBrithBy18IdCard(idCard)&&isTrueValidateCodeBy18IdCard(a_idCard))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	else
	{   
		return false;
	}
}
/**  
* 判断身份证号码为18位时最后的验证位是否正确  
* @param a_idCard 身份证号码数组  
* @return  
*/  
function isTrueValidateCodeBy18IdCard(a_idCard){   
	var sum = 0; // 声明加权求和变量   
	if (a_idCard[17].toLowerCase() == 'x'){   
		a_idCard[17] = 10;// 将最后位为x的验证码替换为10方便后续操作   
	}   
	for( var i = 0; i < 17; i++){   
		sum += Wi[i] * a_idCard[i];// 加权求和   
	}   
	valCodePosition = sum % 11;// 得到验证码所位置   
	if (a_idCard[17] == ValideCode[valCodePosition]){   
		return true;   
	}
	else
	{   
		return false;   
	}
}   

/**  
* 验证18位数身份证号码中的生日是否是有效生日  
* @param idCard 18位书身份证字符串  
* @return  
*/  
function isValidityBrithBy18IdCard(idCard18){   
	var year =  idCard18.substring(6,10);   
	var month = idCard18.substring(10,12);   
	var day = idCard18.substring(12,14);   
	var temp_date = new Date(year,parseFloat(month)-1,parseFloat(day));   
	// 这里用getFullYear()获取年份，避免千年虫问题   
	if(temp_date.getFullYear()!=parseFloat(year) || temp_date.getMonth()!=parseFloat(month)-1 || temp_date.getDate()!=parseFloat(day)){   
		return false;
	}
	else
	{   
		return true;
	}
}
/**  
* 验证15位数身份证号码中的生日是否是有效生日  
* @param idCard15 15位书身份证字符串  
* @return  
*/  
function isValidityBrithBy15IdCard(idCard15){   
	var year =  idCard15.substring(6,8);   
	var month = idCard15.substring(8,10);   
	var day = idCard15.substring(10,12);   
	var temp_date = new Date(year,parseFloat(month)-1,parseFloat(day));   
	// 对于老身份证中的你年龄则不需考虑千年虫问题而使用getYear()方法   
	if(temp_date.getYear()!=parseFloat(year) || temp_date.getMonth()!=parseFloat(month)-1 || temp_date.getDate()!=parseFloat(day)){   
		return false;   
	}
	else
	{
		return true;
	}
}
</script>
</body>
</html><?php }} ?>