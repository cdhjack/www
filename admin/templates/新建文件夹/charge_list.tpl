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
      <div class="buttons"><a onclick="doAction('isshow');" class="button">启用</a><a onclick="doAction('notshow');" class="button">停用</a><a href="{*$site_url*}admin/chargeform.php" class="button">新增</a><a onclick="doAction('delete');" class="button">删除</a></div>
    </div>
    <div class="content">
        <table class="list">
          <thead>
            <tr>
              <td width="5%" style="text-align: center;">选择</td>
              <td class="center" width="5%">ID号</td>
			  <td class="left">活动名称</td>
              <td class="right" width="12%">充值金额</td>
			  <td class="right" width="12%">赠送金额</td>
			  <td class="right" width="12%">开始时间</td>
			  <td class="right" width="12%">结束时间</td>
			  <td class="right" width="10%">状态</td>
              <td class="right" width="10%">编辑</td>
            </tr>
			<tr>
		   <form action="{*$site_url*}admin/charge.php" method="post" id="search">
              <td style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" title="全选"/></td>
              <td><input type="text" size="8" name="filter_id" id="filter_id" value="{*$filter_id*}"></td>
			  <td><input type="text" name="filter_title" id="filter_title" value="{*$filter_title*}" /></td>
			  <td class="right"><input type="text" size="12" name="filter_total" id="filter_total" style="text-align:right;" value="{*$filter_total*}" /></td>
			  <td class="right"><input type="text" size="12" name="filter_give" id="filter_give" style="text-align:right;" value="{*$filter_give*}" /></td>
              <td class="right"><input type="text" name="filter_date_start" id="filter_date_start" value="{*$filter_date_start*}" size="12" style="text-align:right;" class="date"/></td>
              <td class="right"><input type="text" name="filter_date_end" id="filter_date_end" value="{*$filter_date_end*}" size="12" style="text-align:right;" class="date"/></td>
              <td class="right">
			  		<select name="filter_status">
					<option value="">全部</option>
					<option value="1" {*if $filter_status eq '1'*} selected="selected"{*/if*}>启用</option>
					<option value="0" {*if $filter_status eq '0'*} selected="selected"{*/if*}>停用</option>
					</select>
				</td>
              <td align="right"><a onclick="$('#search').submit();" class="button">筛选</a></td>
			</form>
            </tr>
          </thead>
		  <form action="{*$site_url*}admin/chargeaction.php" method="post" enctype="multipart/form-data" id="form">
          <tbody>
			{*foreach from=$chargeArr key=key item=item*}
            <tr>
              <td style="text-align: center;"><input type="checkbox" name="selected[]" value="{*$item['id']*}" /></td>
			  <td class="center">{*$item['id']*}</td>
              <td class="left">{*$item['title']*}</td>
              <td class="right">{*$item['total']*}</td>
			  <td class="right">{*$item['give']*}</td>
			  <td class="right">{*$item['date_start']*}</td>
			  <td class="right">{*$item['date_end']*}</td>
			  <td class="right">{*if $item['status'] eq '1'*}启用{*else*}停用{*/if*}</td>
              <td class="right">[ <a href="{*$site_url*}admin/chargeform.php?id={*$item['id']*}">编辑</a> ]</td>
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