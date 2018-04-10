{*include file="header.tpl"*}
<div id="content">
  <div class="breadcrumb">
		{*foreach from=$breadcrumbs key=key item=item*}
		{*$item['separator']*}<a href="{*$item['href']*}">{*$item['text']*}</a>
		{*/foreach*}       
      </div>
      <div class="box">
    <div class="heading">
      <h1><img src="view/image/customer.png" alt="" /> {*$title*}</h1>
      <div class="buttons"><!--<a onclick="doAction('isshow');" class="button">启用</a>--><a onclick="doAction('excel','search');" class="button">导出筛选结果</a><a onclick="doAction('delete');" class="button">删除</a></div>
    </div>
    <div class="content">
        <table class="list">
          <thead>
            <tr>
              <td width="5%" style="text-align: center;">选择</td>
              <td class="center" width="5%">ID号</td>
              <td class="right" width="14%">优惠券类型</td>
			  <td class="right" width="14%">兑换码</td>
              <td class="right" width="10%">面额</td>
			  <td class="right" width="10%">过期日期</td>
			  <td class="right" width="10%">兑换时间</td>
              <td class="right" width="10%">归属用户</td>
			  <td class="right" width="10%">状态</td>
              <td class="center">编辑</td>
            </tr>
			<tr>
		   <form action="{*$site_url*}admin/coupon.php" method="post" id="search">
              <td style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" title="全选"/></td>
			  <td class="center"><input type="text" size="8" name="filter_id" id="filter_id" value="{*$filter_id*}"></td>
              <td class="right">
			  		<select name="filter_type">
					<option value="">全部</option>
					{*foreach from=$couponClassArr key=key item=item*}
					<option value="{*$item['i_type']*}" {*if $item['i_type']==$filter_type*} selected="selected"{*/if*}>{*$item['idesc']*}</option>
					{*/foreach*}
					</select>
              </td>
              <td class="right"><input type="text" name="filter_cdkey" id="filter_cdkey" value="{*$filter_cdkey*}"  style="text-align:right;"/></td>
              <td class="right"><input type="text" name="filter_price" id="filter_price" value="{*$filter_price*}" size="12" style="text-align:right;"/></td>
			  <td class="right"><input type="text" name="filter_yxq" id="filter_yxq" value="{*$filter_yxq*}" size="12" style="text-align:right;" class="date"/></td>
			  <td class="right"><input type="text" name="filter_gettime" id="filter_gettime" value="{*$filter_gettime*}" size="12" style="text-align:right;" class="date"/></td>
              <td class="right"><input type="text" name="filter_username" id="filter_username" value="{*$filter_username*}" style="text-align:right;"/></td>
              <td class="right">
			  		<select name="filter_status">
					<option value="">全部</option>
					<option value="1" {*if $filter_status eq '1'*} selected="selected"{*/if*}>未兑换</option>
					<option value="2" {*if $filter_status eq '2'*} selected="selected"{*/if*}>已兑换</option>
					<option value="3" {*if $filter_status eq '3'*} selected="selected"{*/if*}>已使用</option>
					<option value="4" {*if $filter_status eq '4'*} selected="selected"{*/if*}>已过期</option>
					</select>
				</td>
              <td align="center"><a onclick="$('#search').submit();" class="button">筛选</a></td>
			</form>
            </tr>
          </thead>
		  <form action="{*$site_url*}admin/couponaction.php" method="post" enctype="multipart/form-data" id="form">
          <tbody>
			{*foreach from=$couponArr key=key item=item*}
            <tr>
              <td style="text-align: center;"><input type="checkbox" name="selected[]" value="{*$item['id']*}" /></td>
			  <td class="center">{*$item['id']*}</td>
              <td class="right">{*$item['idesc']*}</td>
			  <td class="right">{*$item['cdkey']*}</td>
              <td class="right">{*$item['price']*}</td>
			  <td class="right">{*$item['yxq']*}</td>
              <td class="right">{*$item['gettime']*}</td>
			  <td class="right">{*$item['username']*}</td>
			  <td class="right">{*$item['status']*}</td>
              <td class="center">[ <a href="{*$site_url*}admin/couponaction.php?act=deleteone&id={*$item['id']*}" onClick="return confirm('删除或卸载后您将不能恢复，请确定要这么做吗？');">删除</a> ]</td>
            </tr>
			{*foreachelse*}
			<tr><td colspan="10" class="left">暂无相关信息</td></tr>
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
function doAction(act,postFormId){		
	var actionUrl = $('#form').attr('action');
	actionUrl = actionUrl+'?act='+act;
	
	var postFormId = (typeof postFormId != 'undefined' && postFormId != null && postFormId != '')?postFormId:'form';
	$('#'+postFormId).attr('action',actionUrl);
	$('#'+postFormId).submit();
}
//--></script> 
{*include file="footer.tpl"*}