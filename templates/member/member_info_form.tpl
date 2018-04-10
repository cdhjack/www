{*include file="header.tpl"*}
<style type="text/css">
.error {
    color: #e22;
}
</style>
<div class="user-public-header">
    <a href="index.html" class="return"></a>
    <div class="headline">我的信息</div>
    <a href="#" class="ctrul" id="button-memberinfo-1">保存</a>
</div>
    
<div class="user-roomMyInfor">
	<form action="#" method="post">
    	<dl class="owner-infor-top">
            <dt><img id='tx_preview' src="{*$member_arr.avatar*}" /></dt>
            <dd>
            	<a href="javascript:;" class="upload1" style="cursor:pointer;">
                	上传头像
                    <input class="change1" type="file" multiple style="cursor:pointer;" name="tx" id="tx" accept="image/*"/>
                </a>
            </dd>
        </dl>
        <span id="form-tx-error" class="error"></span>
        <input type="hidden" id="tx_base_64" name="tx_base_64" value=""/>
        
        
   	    <p><label>玩家名：</label><input type="text" id="nickname" name="nickname" value="{*$member_arr.nickname*}" placeholder="请输入您的名称" onBlur="checkInput(this.id)"/></p>
        <span id="form-nickname-error" class="error"></span>
    	<p><label>手机号：</label><input type="text" value="{*$member_arr.mobile*}" readonly style=" color: #999;"/></p>
        <p><label>身份证：</label><input type="text" value="{*$member_arr.identity*}" name="identity_1" id="identity_1" placeholder="请输入您的身份证号" onBlur="checkInput(this.id)"/></p>
        <span id="form-identity_1-error" class="error"></span>
        <!--<p><label>群成员：</label><input type="text" value="{*$member_arr.friend_count*}" readonly style=" color: #999;"/></p>-->
        <p><label>注册时间：</label><input type="text" value="{*$member_arr.reg_time|date_format:'%Y-%m-%d %H:%M:%S'*}" readonly style=" color: #999;"/></p>
        <p><label>二维码分享：</label><a href="share.html" class="code-shine"></a></p>
        <p><a href="collect.html" class="room-collect">我收藏的房间</a></p>
        <dl class="owner-infor-top">
            <dt>{*if $member_arr.identity_pic neq ''*}<a href="{*$site_url*}{*$member_arr.identity_pic*}" target="_blank"><img src="{*$site_url*}{*$member_arr.identity_pic*}" /></a>{*else*}暂无图片{*/if*}</dt>
            <dd>
            	<a href="javascript:;" class="upload1" style="cursor:pointer;">
                	手持身份证照片
                    <input class="change1" type="file" multiple style="cursor:pointer;" name="identity_2" id="identity_2" accept="image/*"/>
                </a>
            </dd>
        </dl>
        <span><img id='identity_2_preview' /></span>
        <span id="form-identity_2-error" class="error"></span>
        <input type="hidden" id="identity_2_base_64" name="identity_2_base_64" value=""/>
        <dl class="owner-infor-top">
            <dt>{*if $member_arr.wx_pay_qrcode neq ''*}<a href="{*$site_url*}{*$member_arr.wx_pay_qrcode*}" target="_blank"><img src="{*$site_url*}{*$member_arr.wx_pay_qrcode*}" /></a>{*else*}暂无图片{*/if*}</dt>
            <dd>
            	<a href="javascript:;" class="upload1" style="cursor:pointer;">
                	微信收款二维码图片
                    <input class="change1" type="file" multiple style="cursor:pointer;" name="wx_pay_qrcode" id="wx_pay_qrcode" accept="image/*"/>
                </a>
            </dd>
        </dl>
        <span><img id='wx_pay_qrcode_preview' /></span>
        <span id="form-wx_pay_qrcode-error" class="error"></span>
        <input type="hidden" id="wx_pay_qrcode_base_64" name="wx_pay_qrcode_base_64" value=""/>
        
        
        
        <!--<dl class="owner-infor-top">
            <dt>{*if $member_arr.wx_group_qrcode neq ''*}<a href="{*$site_url*}{*$member_arr.wx_group_qrcode*}" target="_blank"><img src="{*$site_url*}{*$member_arr.wx_group_qrcode*}" /></a>{*else*}暂无图片{*/if*}</dt>
            <dd>
            	<a href="javascript:;" class="upload1" style="cursor:pointer;">
                	微信群二维码图片
                    <input class="change1" type="file" multiple style="cursor:pointer;" name="wx_group_qrcode" id="wx_group_qrcode" accept="image/*"/>
                </a>
            </dd>
        </dl>
        <span><img id='wx_group_qrcode_preview' /></span>
        <span id="form-wx_group_qrcode-error" class="error"></span>
        <input type="hidden" id="wx_group_qrcode_base_64" name="wx_group_qrcode_base_64" value=""/>-->
        
        
    </form>
</div><!--/user-roomMyInfor-->
<script type="text/javascript">
//canvas上传头像图片处理
//document.getElementById('identity_2').addEventListener('change', function () {
$('#tx').bind('change', function() { 
	var files = this.files,
		len =  files.length;
	if(len === 1){
		var reader = new FileReader();
		reader.readAsDataURL(files[0]);
		reader.onload = function (e) {
			var img = new Image();
			img.src = this.result;
			img.onload = function () {
				var cvs = document.createElement('canvas');
				cvs.width = 100;
				cvs.height = 100;
				var context = cvs.getContext('2d');
				//console.log(cvs, img);
				context.drawImage(img, 0, 0, 100, 100);
				var dataurl = cvs.toDataURL("image/png");
				var base_64 = encodeURIComponent(dataurl);
				$("#tx_preview").attr('src',cvs.toDataURL()); 		
				$("#tx_base_64").val(base_64);
				$('#form-tx-error').html('');
			}
		}
	}
	//console.log(files);
//}, false);
});

//canvas上传手持身份证图片处理
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
				$("#identity_2_base_64").val(base_64);
				$('#form-identity_2-error').html('');
			}
		}
	}
});

//canvas上传微信收款二维码图片处理
$('#wx_pay_qrcode').bind('change', function() { 
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
				$("#wx_pay_qrcode_preview").attr('src',cvs.toDataURL()); 		
				$("#wx_pay_qrcode_base_64").val(base_64);
				$('#form-wx_pay_qrcode-error').html('');
			}
		}
	}
});

/*/canvas上传玩家微信群二维码图片处理
$('#wx_group_qrcode').bind('change', function() { 
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
				$("#wx_group_qrcode_preview").attr('src',cvs.toDataURL()); 		
				$("#wx_group_qrcode_base_64").val(base_64);
				$('#form-wx_group_qrcode-error').html('');
			}
		}
	}
});*/


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
		case 'identity_1':
			if(obj.val()==''){	
				error_obj.html('请输入您的身份证号码');
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
		/*case 'identity_2':
			if(obj.val()==''){
				error_obj.html('请上传手持身份证照');
				return false;
			}
			else{
				error_obj.html('');
				return true;
			}			
			break;*/
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
	if(!checkInput('identity_1')){
		flag = flag + 1;
	}
	/*if(!checkInput('identity_2')){
		flag = flag + 1;
	}*/
	if(flag > 0){
		return false;
	}
	return true;
}
 //修改玩家信息异步提交表单
$('#button-memberinfo-1').bind('click', function() { 
	if(!checkButtonOwnerForm()){
		return false;
	}
	var nickname_value = $('#nickname').val();
	var identity_1_value = $('#identity_1').val();
	var tx_base_64_value = $('#tx_base_64').val();
	var identity_2_base_64_value = $('#identity_2_base_64').val();
	var wx_pay_qrcode_base_64_value = $('#wx_pay_qrcode_base_64').val();
	var wx_group_qrcode_base_64_value = $('#wx_group_qrcode_base_64').val();
	$.ajax({
		url: '{*$site_url*}member/memberInfoAction.php',
		type: 'post',
		dataType: 'json',
		data: {
			'nickname': nickname_value,
			'identity_1': identity_1_value,
			'tx_base_64': tx_base_64_value,
			'identity_2_base_64': identity_2_base_64_value,
			'wx_pay_qrcode_base_64': wx_pay_qrcode_base_64_value,
			'wx_group_qrcode_base_64': wx_group_qrcode_base_64_value
		},
		beforeSend: function() {
			$('#button-memberinfo-1').attr('disabled', true);
			//$('#button-memberinfo-1').before('<div class="attention"><img src="view/image/loading.gif" alt="" /> 请等待！</div>');
		},
		complete: function() {
			$('#button-memberinfo-1').attr('disabled', false);
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


