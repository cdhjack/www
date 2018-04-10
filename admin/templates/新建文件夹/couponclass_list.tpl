{*include file="header.tpl"*}
<div id="content">
  <div class="breadcrumb">
		{*foreach from=$breadcrumbs key=key item=item*}
		{*$item['separator']*}<a href="{*$item['href']*}">{*$item['text']*}</a>
		{*/foreach*}       
      </div>
      <div class="box">
    <div class="heading">
      <h1><img src="view/image/category.png" alt="" /> {*$title*}</h1>
      <div class="buttons"><!--<a onclick="doAction('isshow');" class="button">启用</a><a onclick="doAction('notshow');" class="button">停用</a>--><a href="{*$site_url*}admin/couponclassform.php" class="button">新增</a><a onclick="doAction('delete');" class="button">删除</a></div>
    </div>
    <div class="content">
        <table class="list">
          <thead>
            <tr>
              <td width="5%" style="text-align: center;">选择</td>
			  <td class="left" width="15%">优惠券名称</td>
              <td class="left" width="15%">优惠券类型</td>
              <td class="right" width="12%">面额</td>
			  <td class="right" width="12%">过期日期</td>
              <td class="right" width="12%">生成数量</td>
              <td class="right">备注</td>
              <td class="center" width="12%">编辑</td>
            </tr>
			<tr>
		   <form action="{*$site_url*}admin/couponclass.php" method="post" id="search">
              <td style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" title="全选"/></td>
			  <td class="left"><input type="text" name="filter_name" id="filter_name" value="{*$filter_name*}" /></td>
			  <td class="left"><input type="text" name="filter_idesc" id="filter_idesc" value="{*$filter_idesc*}" /></td>
              <td class="right"><input type="text" name="filter_price" id="filter_price" value="{*$filter_price*}" size="12" style="text-align:right;"/></td>
			  <td class="right"><input type="text" name="filter_yxq" id="filter_yxq" value="{*$filter_yxq*}" size="12" style="text-align:right;" class="date"/></td>
              <td class="right"><input type="text" name="filter_total" id="filter_total" value="{*$filter_total*}" size="12" style="text-align:right;"/></td>
			  <td class="right"><input type="text" name="filter_note" id="filter_note" value="{*$filter_note*}" /></td>
              <td align="center"><a onclick="$('#search').submit();" class="button">筛选</a></td>
			</form>
            </tr>
          </thead>
		  <form action="{*$site_url*}admin/couponclassaction.php" method="post" enctype="multipart/form-data" id="form">
          <tbody>
			{*foreach from=$couponClassArr key=key item=item*}
            <tr>
              <td style="text-align: center;"><input type="checkbox" name="selected[]" value="{*$item['i_type']*}" /></td>
			  <td class="left">{*$item['name']*}</td>
			  <td class="left"><a href="{*$site_url*}admin/coupon.php?filter_type={*$item['i_type']*}">{*$item['idesc']*}</a></td>
              <td class="right">{*$item['price']*}</td>
			  <td class="right">{*$item['yxq']*}</td>
              <td class="right">{*$item['total']*}</td>
			  <td class="right">{*$item['note']*}</td>
              <td class="center">[ <a href="{*$site_url*}admin/coupon.php?filter_type={*$item['i_type']*}">查看</a> ][ <a href="{*$site_url*}admin/couponclassform.php?i_type={*$item['i_type']*}">编辑</a> ]</td>
            </tr>
			{*foreachelse*}
			<tr><td colspan="8" class="left">暂无分类信息</td></tr>
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