{*include file="header.tpl"*}
<div id="content">
  <div class="breadcrumb">
		{*foreach from=$breadcrumbs key=key item=item*}
		{*$item['separator']*}<a href="{*$item['href']*}">{*$item['text']*}</a>
		{*/foreach*}       
      </div>
      <div class="box">
    <div class="heading">
      <h1><img src="view/image/information.png" alt="" /> {*$title*}</h1>
      <div class="buttons"><!--<a onclick="doAction('isshow');" class="button">启用</a><a onclick="doAction('notshow');" class="button">停用</a><a href="{*$site_url*}admin/regsmsform.php" class="button">新增</a>--><a onclick="doAction('delete');" class="button">删除</a></div>
    </div>
    <div class="content">
        <table class="list">
          <thead>
            <tr>
              <td width="5%" style="text-align: center;">选择</td>
              <td class="center" width="10%">ID号</td>
			  <td class="center">发送时间</td>
              <td class="right" width="18%">手机号</td>
			  <td class="right" width="18%">短信类型</td>
			  <td class="right" width="18%">验证码</td>
              <td class="center" width="10%">编辑</td>
            </tr>
			<tr>
		   <form action="{*$site_url*}admin/regsms.php" method="post" id="search">
              <td style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" title="全选"/></td>
              <td class="right"><input type="text" name="filter_id" id="filter_id" value="{*$filter_id*}"></td>
              <td class="center">
              	<input type="text" name="filter_send_start_date"  id="filter_send_start_date" value="{*$filter_send_start_date*}"  style="text-align:center;" class="date" />
                <br />至<br />
              	<input type="text" name="filter_send_end_date" id="filter_send_end_date" value="{*$filter_send_end_date*}"  style="text-align:center;" class="date" />
              </td>
              <td class="right"><input type="text" name="filter_phone" id="filter_phone" value="{*$filter_phone*}" style="text-align:right;" /></td>
			  <td class="right">
			  		<select name="filter_class">
					<option value="">全部</option>
					{*foreach from=$smsClassArr key=key item=item*}
					<option value="{*$key*}" {*if $key==$filter_class*} selected="selected"{*/if*}>{*$item*}</option>
					{*/foreach*}
					</select>
			  </td>
			  <td class="right"><input type="text" size="8" name="filter_code" id="filter_code" style="text-align:right;" value="{*$filter_code*}" /></td>
              <td align="center"><a onclick="$('#search').submit();" class="button">筛选</a></td>
			</form>
            </tr>
          </thead>
		  <form action="{*$site_url*}admin/regsmsaction.php" method="post" enctype="multipart/form-data" id="form">
          <tbody>
			{*foreach from=$regsmsArr key=key item=item*}
            <tr>
              <td style="text-align: center;"><input type="checkbox" name="selected[]" value="{*$item['id']*}" /></td>
			  <td class="center">{*$item['id']*}</td>
              <td class="center">{*$item['i_datetime']*}</td>
              <td class="right">{*$item['phone']*}</td>
			  <td class="right">{*$smsClassArr[$item['optype']]*}</td>
			  <td class="right">{*$item['smscode']*}</td>
              <td class="center">[ <a href="{*$site_url*}admin/regsmsaction.php?act=deleteone&id={*$item['id']*}" onClick="return confirm('删除或卸载后您将不能恢复，请确定要这么做吗？');">删除</a> ]</td>
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
	var actionUrl = $('#form').attr('action');
	actionUrl = actionUrl+'?act='+act;
	$('#form').attr('action',actionUrl);
	$('#form').submit();}
//--></script> 


{*include file="footer.tpl"*}