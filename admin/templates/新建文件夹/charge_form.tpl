{*include file="header.tpl"*}
<div id="content">
  <div class="breadcrumb">
		{*foreach from=$breadcrumbs key=key item=item*}
		{*$item['separator']*}<a href="{*$item['href']*}">{*$item['text']*}</a>
		{*/foreach*}       
      </div>
    <div class="box">
    <div class="heading">
      <h1><img src="view/image/payment.png" alt="" /> {*$title*}</h1>
      <div class="buttons"><a onclick="$('#form').submit();" class="button">保存</a><a href="{*$site_url*}admin/charge.php{*$backUrl*}" class="button">取消</a></div>
    </div>
    
    
    
    <div class="content">
      <form action="{*$site_url*}admin/chargeaction.php" method="post" enctype="multipart/form-data" id="form">
	  <input type="hidden" name="id" value="{*$chargeInfo['id']*}" />
	  <input type="hidden" name="act" value="save" />
        <table class="form">
          <tr>
              <td>活动名称：</td>
                <td><input type="text" value="{*$chargeInfo['title']*}" name="title" style="width:270px;">
              </td>
            </tr>
            <tr>
              <td>起止时间：</td>
              <td><input type="text" name="date_start" class="date" value="{*$chargeInfo['date_start']*}" />&nbsp;&nbsp;至&nbsp;&nbsp;<input type="text" name="date_end" class="date" value="{*$chargeInfo['date_end']*}" /></td>
            </tr>
            <tr>
              <td>充送金额：</td>
              <td><input type="text" value="{*$chargeInfo['total']*}" name="total">&nbsp;&nbsp;送&nbsp;&nbsp;<input type="text" value="{*$chargeInfo['give']*}" name="give"></td>
            </tr>
          	<tr>
            <td>活动状态：</td>
            <td><select name="status">
				<option value="1" {*if $coachInfo['status'] eq '1'*}  selected="selected" {*/if*}>启用</option>
				<option value="0" {*if $coachInfo['status'] eq '0'*}  selected="selected" {*/if*}>停用</option>
				</select>
              </td>
          	</tr>
        </table>
      </form>
    </div>
    
    
  </div>
</div> 
<script type="text/javascript"><!--
$(document).ready(function() {
	$('.date').datepicker({dateFormat: 'yy-mm-dd'});
});
//--></script> 
{*include file="footer.tpl"*}