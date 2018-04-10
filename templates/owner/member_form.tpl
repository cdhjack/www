{*include file="header.tpl"*}
<style type="text/css">
.error {
    color: #e22;
}
</style>
<div class="owner-public-header">
    <a href="index.html" class="return"></a>
    <div class="headline">添加成员</div>
</div>
    
<div class="owner-apply">
	<form id="form_member" method="post" action="#" enctype="multipart/form-data"> 
        <p><label>玩家手机号：</label><input type="text" name="mobile"  id="mobile" onblur="checkInput(this.id)" value=""/></p>
        <span id="form-mobile-error" class="error"></span>
        <p><label>玩家名称：</label><input type="text" id="nickname" name="nickname" onblur="checkInput(this.id)" value=""/></p>
        <span id="form-nickname-error" class="error"></span>
        <p><label>玩家身份证：</label><input type="text" name="identity_1" id="identity_1" onblur="checkInput(this.id)" value=""/></p>
        <span id="form-identity_1-error" class="error"></span>
        <p>
        	<label>手持身份证：</label>
        	<a href="javascript:;" class="upload2">
            	上传照片
                <input class="change2" type="file" multiple name="identity_2" id="identity_2" accept="image/*"/>
            </a>
        </p>
        <span><img id='identity_2_preview' /></span>
        <span id="form-identity_2-error" class="error"></span>
        <input type="hidden" id="identity_base_64" name="identity_base_64" value=""/>
        <input type="button" class="btn" value="确认添加" id="button-member-1"/>
    </form>
</div><!--/owner-apply-->
<script type="text/javascript">
//手机帐号检测是否已添加过该房主下的玩家
$('#mobile').bind('blur', function() {
	if(!checkInput('mobile')){
		return false;
	}
	var mobile_value = $('#mobile').val();
	$.ajax({
		url: '{*$site_url*}owner/checkMyMember.php',
		type: 'post',
		dataType: 'json',
		data:{"mobile":mobile_value},
		beforeSend: function() {
		},
		complete: function() {
		},
		success: function(json) {
			if(json.REV == 1){
				$('#form-mobile-error').html('');
				if(json.DATA.nickname != ""){
					$('#nickname').val(json.DATA.nickname);
					$('#nickname').attr('disabled', true);
				}
				if(json.DATA.identity != ""){
					$('#identity_1').val(json.DATA.identity);
					$('#identity_1').attr('disabled', true);
				}
			}
			else{
				$('#form-mobile-error').html(json.MSG);
			}
		}
	});
});

//canvas上传图片处理
//document.getElementById('identity_2').addEventListener('change', function () {
$('#identity_2').bind('change', function() { 
	var files = this.files,
		len =  files.length;
	if(len === 1){
		var reader = new FileReader();
		reader.readAsDataURL(files[0]);
		reader.onload = function (e) {
			var img = new Image();
			img.src = this.result;
			img.onload = function () {
				var old_width = img.width,old_height = img.height;
				var scale = old_width / old_height;
				var new_width = 300,new_height = parseInt(new_width / scale);
				
				
				var cvs = document.createElement('canvas');
				cvs.width = new_width;
				cvs.height = new_height;
				var context = cvs.getContext('2d');
				//console.log(cvs, img);
				context.drawImage(img, 0, 0, new_width, new_height);
				var dataurl = cvs.toDataURL("image/png");
				var base_64 = encodeURIComponent(dataurl);
				$("#identity_2_preview").attr('src',cvs.toDataURL()); 		
				$("#identity_base_64").val(base_64);
				$('#form-identity_2-error').html('');
			}
		}
	}
	//console.log(files);
//}, false);
});

//各个输入框js验证
function checkInput(id){
	var obj = $('#'+id);
	var error_obj = $('#form-'+id+'-error');
	switch(id){
		case 'nickname':
			if(obj.val()==''){
				error_obj.html('请输入玩家名称');
				return false;
			}
			else{
				error_obj.html('');
				return true;
			}			
			break;
		case 'mobile':
			//var patten = /(^(0?86-)?\d{3,4}-\d{7,9}(-\d{1,6})?$)|(^((1[1-9][0-9]{1})+\d{8})$)/i;
			var patten = /(^((1[1-9][0-9]{1})+\d{8})$)/i;
			if(obj.val()==''){				
				error_obj.html('请输入玩家手机号码');
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
		case 'identity_1':
			if(obj.val()==''){	
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
		case 'identity_2':
			if(obj.val()==''){
				error_obj.html('请上传手持身份证照');
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
	if(!checkInput('mobile')){
		flag = flag + 1;
	}	
	if(!checkInput('identity_1')){
		flag = flag + 1;
	}
	if(!checkInput('identity_2')){
		flag = flag + 1;
	}
	if(flag > 0){
		return false;
	}
	return true;
}
 //添加玩家异步提交表单
$('#button-member-1').bind('click', function() { 
	if(!checkButtonOwnerForm()){
		return false;
	}
	var mobile_value = $('#mobile').val();
	var nickname_value = $('#nickname').val();
	var identity_1_value = $('#identity_1').val();
	var identity_base_64_value = $('#identity_base_64').val();
	$.ajax({
		url: '{*$site_url*}owner/memberAction.php',
		type: 'post',
		dataType: 'json',
		data: {
			'mobile': mobile_value,
			'nickname': nickname_value,
			'identity_1': identity_1_value,
			'identity_base_64': identity_base_64_value
		},
		beforeSend: function() {
			$('#button-member-1').attr('disabled', true);
			//$('#button-member-1').before('<div class="attention"><img src="view/image/loading.gif" alt="" /> 请等待！</div>');
		},
		complete: function() {
			$('#button-member-1').attr('disabled', false);
		},
		success: function(data) {
			if(data.REV == 1){
				alert(data.MSG);
				window.location.href = '{*$site_url*}owner/member_list.php';
			}
			else{
				//alert(data.MSG);
				$('#form-'+data.INPUTID+'-error').html(data.MSG);
			} 
		}
	});
});
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
</html>


