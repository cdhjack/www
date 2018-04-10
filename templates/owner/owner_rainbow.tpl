{*include file="header.tpl"*}
<style type="text/css">
.error {
    color: #e22;
}
</style>
<div class="owner-public-header">
    <a href="index.html" class="return"></a>
    <div class="headline">我的彩虹币</div>
</div>
    
<div class="owner-rainbow">
    <dl class="owner-rainbow-top">
    	<dt><img src="{*$owner_arr['avatar']*}" /></dt>
        <dd class="dd-one">我的彩虹币</dd>
        <dd class="dd-two">{*$owner_arr['balance']*}</dd>
    </dl>
    
    
    <form action="#" method="post">
    	<div>
        <select id="agent_id" name="agent_id">
            <option value="">请选择代理商</option>
            {*foreach from=$agent_list_arr key=key item=item*}
            <option value="{*$item['member_agent_id']*}">{*$item['nickname']*}({*$item['mobile']*})</option>
           {*/foreach*} 
        </select>        
        </div>
        <span id="form-agent_id-error" class="error"></span>
    	<div class="amount"><input type="text" name="amount_1" id="amount_1" placeholder="输入彩红币数量" onBlur="checkInput(this.id)"/>个</div>
        <span id="form-amount_1-error" class="error"></span>
        <div class="amount"><input type="text" name="reamount_1" id="reamount_1" placeholder="确认输入彩红币数量" onBlur="checkInput(this.id)"/>个</div>
        <span id="form-reamount_1-error" class="error"></span>
        <input type="button" value="请求充币" class="btn" id="button-regcharge-1"/>
    </form>
    
    <div class="owner-rainbow-recoder">
    	<div class="title"><span>上次充币记录</span></div>
        {*foreach from=$rechargeArr key=key item=item*}
        <dl>
        	<dt><img src="{*$item['avatar']*}" /></dt>
            <dd class="dd-one">
            	<ul>
                    <li>代理商：{*$new_agent_list_arr[$item['agent_id']]*}</li>
                    <li>充币：{*$item['amount']*}</li>
                    <li>状态：<span {*if $item['status'] neq 0*}class="red"{*/if*}>{*$item['status_name']*}</span></li>
                    <li>{*$item['order_time_name']*}：{*$item['order_time']*}</li>
                </ul>
            </dd>
            <!--<dd class="dd-two"><a href="#">确认订单</a></dd>-->
        </dl>
       {*/foreach*} 
    </div>
    
</div><!--/owner-rainbow-->

<!--确认充币弹出-->
<div class="rainbow-popup-two">
	<ul>
    	<li><span>充币数量</span></li>
        <li><b id="confirm_rainbow_num"></b></li>
        <li id="confirm_agent_name"></li>
        <li>房主名：{*$owner_arr['nickname']*}</li>
        <li>手机号：{*$owner_arr['mobile']*}<!--  微信号：1856458222--></li>
    </ul>
    <input type="button" value="确认订单" class="btn close-two" style="cursor:pointer;" id="button-confirm-1"/>
</div><!--/rainbow-popup-two-->
<script type="text/javascript">
//各个输入框js验证
function checkInput(id){
	var obj = $('#'+id);
	var error_obj = $('#form-'+id+'-error');
	switch(id){		
		case 'agent_id':
			if(obj.val()==''){				
				error_obj.html('请选择代理商');
				return false;
			}
			else{
				error_obj.html('');
				return true;
			}			
			break;
		case 'amount_1':
			if(obj.val()==''){				
				error_obj.html('请输入彩红币数量');
				return false;
			}
			else if(isNaN(obj.val())){
				error_obj.html('彩虹币必须为数字');
				return false;
			}
			else if(obj.val()<0){
				error_obj.html('彩虹币不能为负数');
				return false;
			}
			else{
				error_obj.html('');
				return true;
			}			
			break;
		case 'reamount_1':
			if(obj.val()==''){				
				error_obj.html('请输入确认彩红币数量');
				return false;
			}
			else if(obj.val()!==$('#amount_1').val()){
				error_obj.html('两次输入的彩红币数量不一致');
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
function checkButtonRechargeForm(){
	var flag = 0;
	if(!checkInput('agent_id')){
		flag = flag + 1;
	}
	if(!checkInput('amount_1')){
		flag = flag + 1;
	}
	if(!checkInput('reamount_1')){
		flag = flag + 1;
	}
	if(flag > 0){
		return false;
	}
	return true;
}
//房主请求充值
$('#button-regcharge-1').bind('click', function() {
	if(!checkButtonRechargeForm()){
		return false;
	}
	else{
		//给确认订单中彩虹币赋值
		$('#confirm_rainbow_num').html($('#amount_1').val());
		var select_text = $("#agent_id").find("option:selected").text();
		$('#confirm_agent_name').html("代理商："+select_text);
		//显示确认订单	
		$(".rainbow-popup-two").show();
	}
});

//房主请求充值确认提交
$('#button-confirm-1').bind('click', function() {
	if(!checkButtonRechargeForm()){
		return false;
	}
	var agent_id_value = $('#agent_id').val();
	var owner_id_value = $('#owner_id').val();
	var amount_1_value = $('#amount_1').val();
	$.ajax({
		url: '{*$site_url*}owner/ownerRechargeAction.php',
		type: 'post',
		dataType: 'json',
		data:{"agent_id":agent_id_value,
		"owner_id":owner_id_value,
		"amount_1":amount_1_value
		},
		beforeSend: function() {
			$('#button-confirm-1').attr('disabled', true);
			//$('#button-confirm-1').before('<div class="attention"><img src="view/image/loading.gif" alt="" /> 请等待！</div>');
		},
		complete: function() {
			$('#button-confirm-1').attr('disabled', false);
		},
		success: function(data) {
			if(data.REV == 1){
				alert(data.MSG);
				window.location.reload(); 
			}
			else{
				$(".rainbow-popup-two").hide();//隐藏确认订单层，显示错误信息
				$('#form-'+data.INPUTID+'-error').html(data.MSG);
			}
		}
	});
});
</script>
</body>
</html>


