{*include file="header.tpl"*}
<style type="text/css">
.error {
    color: #e22;
}
</style>
<div class="agent-public-header">
    <a href="index.html" class="return"></a>
    <div class="headline">房主充币</div>
</div>
    
<div class="agent-recharge">
    <dl class="agent-recharge-top">
    	<dt><img src="{*$owner_arr['avatar']*}" /></dt>
        <dd>{*$owner_arr['nickname']*}</dd>
    </dl>
    
    <form action="#" method="post">
    	<div class="amount"><input type="text" name="amount_1" id="amount_1" placeholder="输入彩红币数量" onBlur="checkInput(this.id)"/>个</div>
        <span id="form-amount_1-error" class="error"></span>
        <div class="amount"><input type="text" name="reamount_1" id="reamount_1" placeholder="确认输入彩红币数量" onBlur="checkInput(this.id)"/>个</div>
        <span id="form-reamount_1-error" class="error"></span>
        <input type="hidden" name="owner_id" id="owner_id" value="{*$owner_arr['owner_id']*}" />
        <input type="button" value="确认充币" class="btn" id="button-regcharge-1"/>
    </form>
    
    <div class="agent-recharge-recoder">
    	<div class="title"><span>上次充币记录</span></div>
		{*foreach from=$rechargeArr key=key item=item*}
        <dl>
        	<dt><img src="{*$item['avatar']*}" /></dt>
            <dd>
            	<ul>
                	<li><span>房&emsp;&emsp;主：</span>{*$item['nickname']*}</li>
                    <li><span>手&emsp;&emsp;机：</span>{*$item['mobile']*}</li>
                    <li><span>充币数量：</span>{*$item['amount']*}个彩虹币</li>
                    <li><span>状&emsp;&emsp;态：</span><i>{*$item['status_name']*}</i></li>
                    <li><span>{*$item['order_time_name']*}：</span>{*$item['order_time']*}</li>
                </ul>
            </dd>
        </dl>
        {*/foreach*}
    </div>
    
</div><!--/agent-recharge-->
<script type="text/javascript">
//各个输入框js验证
function checkInput(id){
	var obj = $('#'+id);
	var error_obj = $('#form-'+id+'-error');
	switch(id){		
		case 'amount_1':
			if(obj.val()==''){				
				error_obj.html('请输入彩红币数量');
				return false;
			}
			else if(isNaN(obj.val())){
				error_obj.html('彩虹币必须为数字');
				return false;
			}
			else if(obj.val()<=0){
				error_obj.html('彩虹币数量必须大于0');
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
//房主充值
$('#button-regcharge-1').bind('click', function() {
	if(!checkButtonRechargeForm()){
		return false;
	}
	var owner_id_value = $('#owner_id').val();
	var amount_1_value = $('#amount_1').val();
	$.ajax({
		url: '{*$site_url*}agent/ownerRechargeAction.php',
		type: 'post',
		dataType: 'json',
		data:{"owner_id":owner_id_value,
		"amount_1":amount_1_value
		},
		beforeSend: function() {
			$('#button-regcharge-1').attr('disabled', true);
			//$('#button-regcharge-1').before('<div class="attention"><img src="view/image/loading.gif" alt="" /> 请等待！</div>');
		},
		complete: function() {
			$('#button-regcharge-1').attr('disabled', false);
		},
		success: function(data) {
			if(data.REV == 1){
				alert(data.MSG);
				window.location.reload(); 
			}
			else{
				$('#form-'+data.INPUTID+'-error').html(data.MSG);
			}
		}
	});
});

</script>
</body>
</html>


