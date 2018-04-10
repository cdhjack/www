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
      <div class="buttons"><a onclick="doAction('isshow');" class="button">启用</a><a onclick="doAction('notshow');" class="button">停用</a><a href="{*$site_url*}admin/newsclassform.php" class="button">新增</a><a onclick="doAction('delete');" class="button">删除</a></div>
    </div>
    <div class="content">
        <table class="list">
          <thead>
            <tr>
              <td width="5%" style="text-align: center;">选择</td>
              <td class="center" width="5%">ID号</td>
			  <td class="left">分类名称</td>
              <td class="right" width="15%">分类顺序</td>
			  <td class="right" width="15%">状态</td>
              <td class="right" width="15%">编辑分类</td>
            </tr>
			<tr>
		   <form action="{*$site_url*}admin/newsclass.php" method="post" id="search">
              <td style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" title="全选"/></td>
              <td><input type="text" size="8" name="filter_id" id="filter_id" value="{*$filter_id*}"></td>
			  <td><input type="text" name="filter_name" id="filter_name" value="{*$filter_name*}" /></td>
              <td class="right"><input type="text" name="filter_order_num" id="filter_order_num" value="{*$filter_order_num*}" size="8"/></td>
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
		  <form action="{*$site_url*}admin/newsclassaction.php" method="post" enctype="multipart/form-data" id="form">
          <tbody>
			{*foreach from=$newsClassArr key=key item=item*}
            <tr>
              <td style="text-align: center;"><input type="checkbox" name="selected[]" value="{*$item['ID']*}" /></td>
			  <td class="center">{*$item['ID']*}</td>
              <td class="left">{*$item['Name']*}</td>
              <td class="right">{*$item['OrderNum']*}</td>
			  <td class="right">{*if $item['IsShow'] eq '1'*}启用{*else*}停用{*/if*}</td>
              <td class="right">[ <a href="{*$site_url*}admin/newsclassform.php?id={*$item['ID']*}">编辑</a> ]</td>
            </tr>
			{*foreachelse*}
			<tr><td colspan="6" class="left">暂无分类信息</td></tr>
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