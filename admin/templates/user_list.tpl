{*include file="header.tpl"*}
<div id="content">
  <div class="breadcrumb">
		{*foreach from=$breadcrumbs key=key item=item*}
		{*$item['separator']*}<a href="{*$item['href']*}">{*$item['text']*}</a>
		{*/foreach*}       
      </div>
      <div class="box">
    <div class="heading">
      <h1><img src="view/image/user.png" alt="" /> {*$title*}</h1>
      <div class="buttons"><a onclick="doAction('isshow');" class="button">启用</a><a onclick="doAction('notshow');" class="button">停用</a><a href="{*$site_url*}admin/userform.php" class="button">新增</a><a onclick="doAction('delete');" class="button">删除</a></div>
    </div>
    <div class="content">
        <table class="list">
          <thead>
            <tr>
              <td width="5%" style="text-align: center;">选择</td>
              <td class="center" width="5%">ID号</td>
			  <td class="left" width="15%">用户名</td>
              <td class="right" width="15%">姓名</td>
			  <td class="right" width="15%">邮箱</td>
			  <td class="right" width="15%">用户组</td>
			  <td class="right" width="15%">登陆时间</td>
			  <td class="right" width="10%">状态</td>
              <td class="right" width="10%">编辑</td>
            </tr>
			<tr>
		   <form action="{*$site_url*}admin/user.php" method="post" id="search">
              <td style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" title="全选"/></td>
              <td><input type="text" size="8" name="filter_id" id="filter_id" value="{*$filter_id*}" style="text-align:center;"></td>
			  <td><input type="text" name="filter_name" id="filter_name" value="{*$filter_name*}" /></td>
			  <td class="right">
			  		<input type="text" name="filter_realname" id="filter_realname" value="{*$filter_realname*}" />
			  </td>
			  <td class="right"><input type="text" name="filter_mail" id="filter_mail" value="{*$filter_mail*}" /></td>
			  <td class="right">
			  		<select name="filter_group">
					<option value="">全部</option>
					{*foreach from=$groupArr key=key item=item*}
					<option value="{*$item['ID']*}" {*if $item['ID']==$filter_group*} selected="selected"{*/if*}>{*$item['Name']*}</option>
					{*/foreach*}
					</select>		  
			  </td>
              <td class="right"><input type="text" name="filter_logintime" id="filter_logintime" value="{*$filter_logintime*}" size="12" style="text-align:right;" class="date"/>
			  </td>
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
		  <form action="{*$site_url*}admin/useraction.php" method="post" enctype="multipart/form-data" id="form">
          <tbody>
			{*foreach from=$userArr key=key item=item*}
            <tr>
              <td style="text-align: center;"><input type="checkbox" name="selected[]" value="{*$item['ID']*}" /></td>
			  <td class="center">{*$item['ID']*}</td>
              <td class="left">{*$item['Name']*}</td>
              <td class="right">{*$item['RealName']*}</td>
			  <td class="right">{*$item['Mail']*}</td>
			  <td class="right">{*$item['GroupName']*}</td>
			  <td class="right">{*$item['LoginTime']|date_format:'%Y-%m-%d %H:%M:%S'*}</td>
			  <td class="right">{*if $item['Checked'] eq '1'*}启用{*else*}停用{*/if*}</td>
              <td class="right">[ <a href="{*$site_url*}admin/userform.php?id={*$item['ID']*}">编辑</a> ]</td>
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