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
      <h1><img src="view/image/user.png" alt="" /> {*$coachInfo['rname']*}教练&nbsp;&nbsp;{*$title*}</h1>
      <div class="buttons"><!--<a onclick="$('#form').submit();" class="button">保存</a>--><a class="button" id="button-transaction"><span>保存</span></a><a href="{*$site_url*}admin/coach.php{*$backUrl*}" class="button">返回</a></div>
    </div>
    <div class="content">
    	  <div id="tab-transaction">
          <input type="hidden" name="id" value="{*$coachInfo['id']*}" />
          <input type="hidden" name="act" value="addscore" />
          <table class="form">
            <tbody><tr>
              <td>扣分：</td>
              <td><input type="text" value="" id="score" name="score"></td>
            </tr>
            <tr>
              <td>原因：</td>
              <td><input type="text" value="" id="reason" name="reason"></td>
            </tr>
            <!--<tr>
              <td style="text-align: right;" colspan="2"><a class="button" id="button-transaction"><span>添加扣分</span></a></td>
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
$('#transaction .pagination a').live('click', function() {
	$('#transaction').load(this.href);
	return false;
});			

$('#transaction').load("{*$site_url*}admin/coachscore.php?id={*$coachInfo['id']*}");

$('#button-transaction').bind('click', function() {
	if($.trim($("#score").val())==''){
		alert("请输入扣分值!");
		return false;
	
	}
	if($.trim($("#reason").val())==''){
		alert("请填写扣分原因!");
		return false;
	
	}
	$.ajax({
		url: '{*$site_url*}admin/ajax/coachscore.php',
		type: 'post',
		dataType: 'json',
		data: 'act=' + encodeURIComponent($('#tab-transaction input[name=\'act\']').val()) + '&id=' + encodeURIComponent($('#tab-transaction input[name=\'id\']').val()) + '&score=' + encodeURIComponent($('#tab-transaction input[name=\'score\']').val()) + '&reason=' + encodeURIComponent($('#tab-transaction input[name=\'reason\']').val()),
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
			$('#transaction').load("{*$site_url*}admin/coachscore.php?id={*$coachInfo['id']*}");
			$('#tab-transaction input[name=\'score\']').val('');
			$('#tab-transaction input[name=\'reason\']').val('');
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