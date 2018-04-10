{*include file="header.tpl"*}
<div id="content">
  <div class="breadcrumb">
		{*foreach from=$breadcrumbs key=key item=item*}
		{*$item['separator']*}<a href="{*$item['href']*}">{*$item['text']*}</a>
		{*/foreach*}       
      </div>
      <div class="box">
    <div class="heading">
      <h1><img src="view/image/user-group" alt="" /> {*$title*}</h1>
      <div class="buttons"><a href="{*$site_url*}admin/usergroupform.php" class="button">新增</a><a onclick="doAction('delete');" class="button">删除</a></div>
    </div>
    <div class="content">
        <table class="list">
          <thead>
            <tr>
              <td width="5%" style="text-align: center;">选择</td>
              <td class="center" width="5%">ID号</td>
			  <td class="left">用户群组名称</td>
              <td class="right" width="20%">用户数量</td>
              <td class="right" width="20%">编辑</td>
            </tr>
			<tr>
		   <form action="{*$site_url*}admin/usergroup.php" method="post" id="search">
              <td style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" title="全选"/></td>
              <td><input type="text" size="8" name="filter_id" id="filter_id" value="{*$filter_id*}"></td>
			  <td><input type="text" name="filter_name" id="filter_name" value="{*$filter_name*}" /></td>
			  <td class="right"></td>
              <td align="right"><a onclick="$('#search').submit();" class="button">筛选</a></td>
			</form>
            </tr>
          </thead>
		  <form action="{*$site_url*}admin/usergroupaction.php" method="post" enctype="multipart/form-data" id="form">
          <tbody>
			{*foreach from=$userGroupArr key=key item=item*}
            <tr>
              <td style="text-align: center;"><input type="checkbox" name="selected[]" value="{*$item['ID']*}" /></td>
			  <td class="center">{*$item['ID']*}</td>
              <td class="left">{*$item['Name']*}</td>
              <td class="right">{*$item['AdminNum']*}</td>
              <td class="right">[ <a href="{*$site_url*}admin/usergroupform.php?id={*$item['ID']*}">编辑</a> ]</td>
            </tr>
			{*foreachelse*}
			<tr><td colspan="5" class="left">暂无相关信息</td></tr>
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