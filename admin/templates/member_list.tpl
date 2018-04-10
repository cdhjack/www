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
      <h1><img src="view/image/user.png" alt="" /> {*$title*}</h1>
      <div class="buttons"><a onclick="doAction('pass');" class="button">启用</a><a onclick="doAction('notpass');" class="button">禁用</a><!--<a href="{*$site_url*}admin/memberform.php" class="button">新增</a>--><a onclick="doAction('delete');" class="button">删除</a></div>
    </div>
    <div class="content">
        <table class="list">
          <thead>
            <tr>
              <td width="5%" style="text-align: center;">选择</td>
              <td class="center" width="5%">ID号</td>
              <td class="center" width="10%">头像</td>
              <td class="center" width="10%">手机号码</td>
              <td class="center" width="10%">邮箱</td>
              <td class="center" width="10%">姓名</td>
			  <!--<td class="center" width="10%">昵称</td>
			  <td class="center" width="8%">性别</td>
			  <td class="right" width="8%">消费次数</td>-->
			  <td class="center" width="15%">注册时间</td>
              <td class="center" width="15%">登录时间</td>
			  <td class="center" width="8%">状态</td>
              <td class="center">编辑</td>
            </tr>
			<tr>
		   <form action="{*$site_url*}admin/member.php" method="post" id="search">
              <td style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" title="全选"/></td>
              <td class="center"><input type="text" size="8" name="filter_id" id="filter_id" value="{*$filter_id*}"></td>
              <td></td>
			  <td class="center"><input type="text" size="11" name="filter_mobile" id="filter_mobile" value="{*$filter_mobile*}" /></td>
              <td class="center"><input type="text" size="11" name="filter_email" id="filter_email" value="{*$filter_email*}" /></td>
			  <td class="center"><input type="text" size="11" name="filter_rname" id="filter_rname" value="{*$filter_rname*}" /></td>
			  <!--<td class="center">
                <select name="filter_sex">
                <option value="">全部</option>
                <option value="1" {*if $filter_sex eq '1'*} selected="selected"{*/if*}>男</option>
                <option value="0" {*if $filter_sex eq '0'*} selected="selected"{*/if*}>女</option>
                </select>
              </td>
			  <td class="right">大于等于<br /><input type="text" size="11" style="text-align:right;" name="filter_order_num" id="filter_order_num" value="{*$filter_order_num*}" /></td>-->
              <td class="center">
              	<input type="text" name="filter_reg_start_date" size="15" id="filter_reg_start_date" value="{*$filter_reg_start_date*}" size="12" style="text-align:center;" class="date"/>
                <br />至<br />
              	<input type="text" name="filter_reg_end_date" size="15" id="filter_reg_end_date" value="{*$filter_reg_end_date*}" size="12" style="text-align:center;" class="date"/>
                </td>
                <td class="center">
              	<input type="text" name="filter_login_start_date" size="15" id="filter_login_start_date" value="{*$filter_login_start_date*}" size="12" style="text-align:center;" class="date"/>
                <br />至<br />
              	<input type="text" name="filter_login_end_date" size="15" id="filter_login_end_date" value="{*$filter_login_end_date*}" size="12" style="text-align:center;" class="date"/>
                </td>
              <td class="center">
			  		<select name="filter_pass">
					<option value="">全部</option>
					<option value="1" {*if $filter_pass eq '1'*} selected="selected"{*/if*}>启用</option>
					<option value="0" {*if $filter_pass eq '0'*} selected="selected"{*/if*}>禁用</option>
					</select>
				</td>
              <td align="center"><a onclick="$('#search').submit();" class="button">筛选</a></td>
			</form>
            </tr>
          </thead>
		  <form action="{*$site_url*}admin/memberaction.php" method="post" enctype="multipart/form-data" id="form">
          <tbody>
			{*foreach from=$memberArr key=key item=item*}
            <tr>
              <td style="text-align: center;"><input type="checkbox" name="selected[]" value="{*$item['id']*}" /></td>
			  <td class="center">{*$item['id']*}</td>
              <td class="center"><img alt="头像" src="{*$item['avatar']*}"></td>
              <td class="center">{*$item['mobile']*}</td>
              <td class="center">{*$item['email']*}</td>
              <td class="center">{*$item['rname']*}</td>
			  <!--<td class="center">
              	{*if $item['sex'] eq '1'*}男{*/if*}
              	{*if $item['sex'] eq '0'*}女{*/if*}
               </td>
			  <td class="right">{*$item['order_num']*}</td>-->
			  <td class="center">{*$item['reg_time']*}</td>
              <td class="center">{*$item['login_time']*}</td>
			  <td class="center">{*if $item['status'] eq '1'*}启用{*else*}禁用{*/if*}</td>
              <td class="center">[ <a href="{*$site_url*}admin/memberpasswordform.php?id={*$item['id']*}">修改密码</a> ][ <a href="{*$site_url*}admin/memberpayform.php?id={*$item['id']*}" onclick="alert('功能暂未上线');return false;">充值记录</a> ]<!--[ <a href="{*$site_url*}admin/memberform.php?id={*$item['id']*}">信息编辑</a> ]--></td>
            </tr>
			{*foreachelse*}
			<tr><td colspan="15" class="left">暂无相关信息</td></tr>
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
	$('#form').submit();
}
//-->
</script> 
{*include file="footer.tpl"*}