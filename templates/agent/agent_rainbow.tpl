{*include file="header.tpl"*}
<style type="text/css">
.error {
    color: #e22;
}
</style>
<div class="agent-public-header">
    <a href="index.html" class="return"></a>
    <div class="headline">我的彩虹币</div>
</div>
    
<div class="agent-rainbow">
    <dl class="agent-rainbow-top">
    	<dt><img src="{*$agent_arr['avatar']*}" /></dt>
        <dd class="dd-one">我的彩虹币</dd>
        <dd class="dd-two">{*$agent_arr['balance']*}</dd>
    </dl>
    
    
    <!--<form action="#" method="post">
    	<div class="amount"><input type="text" placeholder="输入充币数量" />个</div>
        <input type="button" value="确认充币" class="btn affirm-indent" />
    </form>-->
    
    <form action="#" method="post">
    	<div class="amount"><input type="text" name="amount_1" id="amount_1" placeholder="输入彩红币数量" onBlur="checkInput(this.id)"/>个</div>
        <span id="form-amount_1-error" class="error"></span>
        <div class="amount"><input type="text" name="reamount_1" id="reamount_1" placeholder="确认输入彩红币数量" onBlur="checkInput(this.id)"/>个</div>
        <span id="form-reamount_1-error" class="error"></span>
        <input type="button" value="请求充币" class="btn" id="button-regcharge-1"/>
    </form>
    
    <div class="agent-rainbow-recoder">
    	<div class="title"><span>上次充币记录</span></div>
        {*foreach from=$rechargeArr key=key item=item*}
        <dl>
        	<dt><img src="{*$item['avatar']*}" /></dt>
            <dd class="dd-one">
            	<ul>
                	<li>充币：{*$item['amount']*}</li>
                    <li>状态：<span {*if $item['status'] neq 0*}class="red"{*/if*}>{*$item['status_name']*}</span></li>
                    <li>{*$item['order_time_name']*}：{*$item['order_time']*}</li>
                </ul>
            </dd>
            <!--<dd class="dd-two"><a href="#">确认订单</a></dd>-->
        </dl>
       {*/foreach*} 
        <!--<dl>
        	<dt><img src="../images/img001.png" /></dt>
            <dd class="dd-one">
            	<ul>
                	<li>充币：15000</li>
                    <li>状态：<span class="red">已完成</span></li>
                    <li>时间：2017.12.12 15:30</li>
                </ul>
            </dd>
            <dd class="dd-two"><a href="#" class="gray">完成订单</a></dd>
        </dl>-->
    </div>
    
</div><!--/agent-rainbow-->

<!--确认充币弹出-->
<div class="rainbow-popup">
	<ul>
    	<li><span>充币数量</span></li>
        <li><b id="confirm_rainbow_num"></b></li>
        <li>代理商：{*$agent_arr['nickname']*}</li>
        <li>手机号：{*$agent_arr['mobile']*}<!--  微信号：1856458222--></li>
    </ul>
    <input type="button" value="确认订单" class="btn" style="cursor:pointer;" id="button-confirm-1"/>
</div><!--/rainbow-popup-->
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
//代理商请求充值
$('#button-regcharge-1').bind('click', function() {
	if(!checkButtonRechargeForm()){
		return false;
	}
	else{
		//给确认订单中彩虹币赋值
		$('#confirm_rainbow_num').html($('#amount_1').val());
		//显示确认订单	
		$(".rainbow-popup").show();
	}
});

//代理商请求充值确认提交
$('#button-confirm-1').bind('click', function() {
	if(!checkButtonRechargeForm()){
		return false;
	}
	var agent_id_value = $('#agent_id').val();
	var amount_1_value = $('#amount_1').val();
	$.ajax({
		url: '{*$site_url*}agent/agentRechargeAction.php',
		type: 'post',
		dataType: 'json',
		data:{"agent_id":agent_id_value,
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
				$(".rainbow-popup").hide();//隐藏确认订单层，显示错误信息
				$('#form-'+data.INPUTID+'-error').html(data.MSG);
			}
		}
	});
});
</script>
</body>
</html>


