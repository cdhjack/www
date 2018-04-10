{*include file="header.tpl"*}
<script type="text/javascript" src="{*$site_url*}admin/view/javascript/jquery/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="{*$site_url*}admin/view/javascript/jquery/ui/jquery-ui-1.8.16.custom.min.js"></script>
<link type="text/css" href="{*$site_url*}admin/view/javascript/jquery/ui/themes/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
<style type="text/css">
.error {
    color: #e22;
}
</style>
<div class="owner-public-header">
    <a href="index.html" class="return"></a>
    <div class="headline">添加新赛事</div>
</div>
    
<div class="owner-addEvent">
	<form action="#" method="post">
        <select id="match_type" name="match_type">
            <option value="">请选择赛事类型：</option>
            {*foreach from=$match_type_arr key=key item=item*}
            <option value="{*$item*}">{*$item*}彩虹币</option>
			{*/foreach*} 
        </select>
        <span id="form-match_type-error" class="error"></span>
        <span id="form-match_type-remark" style="display:none;"></span>
        <select id="match_num" name="match_num">
            <option value="">请选择彩包数量：</option>
            {*foreach from=$match_num_arr key=key item=item*}
            <option value="{*$item*}">{*$item*}</option>
			{*/foreach*} 
        </select>
        <span id="form-match_num-error" class="error"></span>
        <p style="padding-left:35px;margin-top: 0.53125rem;"><label>赛事结束时间：</label><input type="text" name="end_date"  id="end_date" onblur="checkInput(this.id)" value="" class="date"/></p>
        <span id="form-end_date-error" class="error"></span>
        <h1 class="consume" style="display:none;">本次需消耗彩红币<span id="owner_pay_amount"></span></h1>
        
        <input type="button" class="btn eventBtn" value="确认开赛" style="cursor:pointer;" id="button-match-1"/>
    </form>
</div><!--/owner-addEvent-->

<div class="succeed">
	<span class="succeed-colse"></span>
	<dl>
    	<dt></dt>
        <dd>开赛成功</dd>
    </dl>
    <p id="success_pay_amount"></p>
</div><!--/succeed-->
<script type="text/javascript">
$(document).ready(function() {
	$('.date').datepicker({dateFormat: 'yy-mm-dd'});
});

//各个输入框js验证
function checkInput(id){
	var obj = $('#'+id);
	var error_obj = $('#form-'+id+'-error');
	switch(id){		
		case 'match_type':
			if(obj.val()==''){				
				error_obj.html('请选择赛事类型');
				return false;
			}
			else{
				error_obj.html('');
				return true;
			}			
			break;
		case 'match_num':
			if(obj.val()==''){				
				error_obj.html('请选择彩包数量');
				return false;
			}
			else{
				error_obj.html('');
				return true;
			}			
			break;
		case 'end_date':
			if(obj.val()==''){				
				error_obj.html('请选择赛事结束时间');
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
function checkButtonMatchForm(){
	var flag = 0;
	if(!checkInput('match_type')){
		flag = flag + 1;
	}
	if(!checkInput('match_num')){
		flag = flag + 1;
	}
	if(!checkInput('end_date')){
		flag = flag + 1;
	}
	if(flag > 0){
		return false;
	}
	return true;
}
//房主添加比赛
$('#button-match-1').bind('click', function() {
	if(!checkButtonMatchForm()){
		return false;
	}
	var match_type_value = $('#match_type').val();
	var match_num_value = $('#match_num').val();
	var end_date_value = $('#end_date').val();
	$.ajax({
		url: '{*$site_url*}owner/ownerMatchAction.php',
		type: 'post',
		dataType: 'json',
		data:{"match_type":match_type_value,
		"match_num":match_num_value,
		"end_date":end_date_value
		},
		beforeSend: function() {
			//$('#button-match-1').attr('disabled', true);
			//$('#button-match-1').before('<div class="attention"><img src="view/image/loading.gif" alt="" /> 请等待！</div>');
		},
		complete: function() {
			//$('#button-match-1').attr('disabled', false);
		},
		success: function(json) {
			if(json.REV == 1){
				$('#success_pay_amount').html('本次消耗彩虹币：'+json.DATA.commissions+'个');
				$(".succeed").show(); 
			}
			else{
				$('#form-'+json.INPUTID+'-error').html(json.MSG);
			}
		}
	});
});




//选择赛事类型后获取其相应规则信息
$('select[name=\'match_type\']').change(function(){
	var match_type_value = $(this).val();
	//请求获取该
	$.ajax({
		url: '{*$site_url*}owner/getMatchRuleAction.php',
		type: 'post',
		dataType: 'json',
		data:{"match_type":match_type_value},
		beforeSend: function() {
		},
		complete: function() {
		},
		success: function(json) {
			if(json.REV == 1){
				$('#form-'+json.INPUTID+'-error').html('');
				var commissions = match_type_value * json.DATA.commissions;
				//显示选择类型的规则内容
				var rule_introduce = "实际投入抽奖币数:"+json.DATA.real_amount+",一等奖:"+json.DATA.one_prize+",二等奖:"+json.DATA.two_prize+",佣金:"+commissions;
				$("#form-match_type-remark").show();
				$('#form-match_type-remark').html(rule_introduce);
				var owner_pay_amount = parseInt(json.DATA.real_amount) + parseInt(commissions);
				$('#owner_pay_amount').html(owner_pay_amount);
				$(".consume").show();
			}
			else{
				$(".consume").hide();
				$("#form-match_type-remark").hide();//隐藏规则内容
				$('#form-'+json.INPUTID+'-error').html(json.MSG);
			}
		}
	});
});
</script>
</body>
</html>


