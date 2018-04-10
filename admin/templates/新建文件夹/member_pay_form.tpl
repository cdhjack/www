{*include file="header.tpl"*}
<style type="text/css">
#content .list td img{padding: 1px; border: 1px solid #DDDDDD; width:40px; height:40px;}
</style>
<div id="content">
  <div class="breadcrumb">
		{*foreach from=$breadcrumbs key=key item=item*}
		{*$item['separator']*}<a href="{*$item['href']*}">{*$item['text']*}</a>
		{*/foreach*}       
      </div>
      <div class="box">
    <div class="heading">
      <h1><img src="view/image/user.png" alt="" /> {*$memberInfo['rname']*}用户&nbsp;&nbsp;{*$title*}</h1>
      <div class="buttons"><!--<a onclick="$('#form').submit();" class="button">保存</a>--><a class="button" id="button-transaction"><span>保存</span></a><a href="{*$site_url*}admin/member.php{*$backUrl*}" class="button">返回</a></div>
    </div>
    <div class="content">
    	  <div id="tab-transaction">
          <input type="hidden" name="id" value="{*$memberInfo['id']*}" />
          <input type="hidden" name="act" value="addpay" />
          <table class="form">
            <tbody><tr>
              <td>操作：</td>
                <td><input type="radio" name="optype" value="1">&nbsp;充值&nbsp;&nbsp;&nbsp;<input type="radio" name="optype" value="0">&nbsp;扣款
              </td>
            </tr>
            <tr>
              <td>金额：</td>
              <td><input type="text" value="" id="money" name="money"></td>
            </tr>
			<tr>
              <td>原因：</td>
              <td><textarea name="idesc" id="idesc" style="width:350px;height:100px;"></textarea></td>
            </tr>
            <!--<tr>
              <td style="text-align: right;" colspan="2"><a class="button" id="button-transaction"><span>保存</span></a></td>
            </tr>-->
          </tbody>
          </table>
         </div>
        <div id="transaction">
        </div>
    </div>
  </div>
</div> 
<script type="text/javascript"><!--
//判断单选按钮是否选中
function isRadio(radioName){
	var isChecked = false;
	$("input:radio[name='"+radioName+"']").each(function(index){	
		if($(this).attr("checked") == 'checked'){
			isChecked = true;
		}
	});
	return isChecked;
}
//单选按钮选中状态取消掉
function cancleRadio(radioName){
	$("input:radio[name='"+radioName+"']").each(function(index){	
		$(this).attr("checked",false);
	});
}

$('#transaction .pagination a').live('click', function() {
	$('#transaction').load(this.href);
	return false;
});			

$('#transaction').load("{*$site_url*}admin/memberpay.php?id={*$memberInfo['id']*}");

$('#button-transaction').bind('click', function() {
	if(!isRadio('optype')){
		alert("请选择操作类型!");
		return false;
	}
	if($.trim($("#money").val())==''){
		alert("请输入金额!");
		return false;
	}
	if($.trim($("#idesc").val())==''){
		alert("请填写原因!");
		return false;
	
	}
	$.ajax({
		url: '{*$site_url*}admin/ajax/memberpay.php',
		type: 'post',
		dataType: 'json',
		data: 'act=' + encodeURIComponent($('#tab-transaction input[name=\'act\']').val()) + '&id=' + encodeURIComponent($('#tab-transaction input[name=\'id\']').val()) + '&optype=' + encodeURIComponent($('#tab-transaction input[name=\'optype\']:checked').val()) + '&money=' + encodeURIComponent($('#tab-transaction input[name=\'money\']').val())+ '&idesc=' + encodeURIComponent($('#tab-transaction textarea[name=\'idesc\']').val()),
		beforeSend: function() {
			$('.success, .warning').remove();
			$('#button-transaction').attr('disabled', true);
			$('#transaction').before('<div class="attention"><img src="view/image/loading.gif" alt="" /> 请等待！</div>');
		},
		complete: function() {
			$('#button-transaction').attr('disabled', false);
			$('.attention').remove();
		},
		success: function(data) {
			$('#transaction').load("{*$site_url*}admin/memberpay.php?id={*$memberInfo['id']*}");
			//$('#tab-transaction input[name=\'optype\']').val('');
			cancleRadio('optype');
			$('#tab-transaction input[name=\'money\']').val('');
			$('#tab-transaction textarea[name=\'idesc\']').val('');
			//console.info(data);
			//alert(data.msg);
			if(data.msg==1){				
				$('#transaction').before('<div class="success">'+data.info+'</div>');
			}
			else{
				$('#transaction').before('<div class="warning">'+data.info+'</div>');
			}
		}
	});
});
//--></script>  
{*include file="footer.tpl"*}