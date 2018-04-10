{*include file="header.tpl"*}
<div id="content">
  <div class="breadcrumb">
		{*foreach from=$breadcrumbs key=key item=item*}
		{*$item['separator']*}<a href="{*$item['href']*}">{*$item['text']*}</a>
		{*/foreach*}       
      </div>
      <div class="box">
    <div class="heading">
      <h1><img src="view/image/review.png" alt="" /> {*$title*}</h1>
      <div class="buttons"><!--<a onclick="doAction('isshow');" class="button">启用</a><a onclick="doAction('notshow');" class="button">停用</a><a href="{*$site_url*}admin/newsform.php" class="button">新增</a>--><a onclick="doAction('sms');" class="button">短信回复</a><a onclick="doAction('delete');" class="button">删除</a></div>
    </div>
    <div class="content">
        <table class="list">
          <thead>
            <tr>
              <td width="5%" style="text-align: center;">选择</td>
              <td class="center" width="5%">ID号</td>
			  <td class="left">留言内容</td>
			  <td class="right" width="12%">手机号</td>
			  <td class="right" width="12%">提交时间</td>
              <td class="center" width="12%">编辑</td>
            </tr>
			<tr>
		   <form action="{*$site_url*}admin/message.php" method="post" id="search">
              <td style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" title="全选"/></td>
              <td><input type="text" size="8" name="filter_id" id="filter_id" value="{*$filter_id*}" style="text-align:center;"></td>
			  <td><input type="text" name="filter_content" id="filter_content" value="{*$filter_content*}" /></td>
			  <td class="right"><input type="text" name="filter_tel" id="filter_tel" value="{*$filter_tel*}" style="text-align:right;"/></td>
              <td class="right">
			  		<input type="text" name="filter_adddate" id="filter_adddate" value="{*$filter_adddate*}" size="12" style="text-align:right;" class="date"/>
			  </td>
              <td align="center"><a onclick="$('#search').submit();" class="button">筛选</a></td>
			</form>
            </tr>
          </thead>
		  <form action="{*$site_url*}admin/messageaction.php" method="post" enctype="multipart/form-data" id="form">
          <tbody>
			{*foreach from=$messageArr key=key item=item*}
            <tr>
              <td style="text-align: center;"><input type="checkbox" name="selected[]" value="{*$item['id']*}" /></td>
			  <td class="center">{*$item['id']*}</td>
              <td class="left">{*$item['i_value']*}</td>
              <td class="right">{*$item['i_reserved_2']*}</td>
			  <td class="right">{*$item['i_datetime']*}</td>
              <td class="center">[ <a href="{*$site_url*}admin/messagesmsform.php?act=smsone&id={*$item['id']*}">短信回复</a> ][ <a href="{*$site_url*}admin/messageaction.php?act=deleteone&id={*$item['id']*}" onClick="return confirm('删除或卸载后您将不能恢复，请确定要这么做吗？');">删除</a> ]</td>
            </tr>
			{*foreachelse*}
			<tr><td colspan="9" class="left">暂无相关信息</td></tr>
			{*/foreach*}	
		  </tbody>
		  </form>
        </table>
      <div class="pagination">
	  {*$pageHtml*}
	  </div>
    </div>
  </div>
</div> 
<script type="text/javascript"><!--
$(document).ready(function() {
	$('.date').datepicker({dateFormat: 'yy-mm-dd'});
});
//--></script> 
<script type="text/javascript"><!--
function doAction(act){
	if(act=='sms'){
		var actionUrl = '{*$site_url*}admin/messagesmsform.php';
		actionUrl = actionUrl+'?act='+act;
	}
	else{
		var actionUrl = $('#form').attr('action');
		actionUrl = actionUrl+'?act='+act;		
	}
	$('#form').attr('action',actionUrl);
	$('#form').submit();
}
//--></script> 
{*include file="footer.tpl"*}