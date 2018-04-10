{*include file="header.tpl"*}
<div id="content">
  <div class="breadcrumb">
		{*foreach from=$breadcrumbs key=key item=item*}
		{*$item['separator']*}<a href="{*$item['href']*}">{*$item['text']*}</a>
		{*/foreach*}       
      </div>
    <div class="box">
    <div class="heading">
      <h1><img src="view/image/user-group.png" alt="" /> {*$title*}</h1>
      <div class="buttons"><a onclick="$('#form').submit();" class="button">保存</a><a href="{*$site_url*}admin/usergroup.php{*$backUrl*}" class="button">取消</a></div>
    </div>
    <div class="content">
      <form action="{*$site_url*}admin/usergroupaction.php" method="post" enctype="multipart/form-data" id="form">
	  <input type="hidden" name="id" value="{*$userGroupInfo['ID']*}" />
	  <input type="hidden" name="act" value="save" />
        <table class="form">
          <tr>
            <td><span class="required">*</span> 用户群组名称：</td>
            <td><input type="text" name="groupname" value="{*$userGroupInfo['Name']*}" />
              </td>
          </tr>
          <tr>
            <td>查看权限：</td>
            <td><div class="scrollbox">
				{*foreach from=$viewPowerArr key=key item=item*}
				<div {*if $key is div by 2*}class="even"{*else*}class="odd"{*/if*}>
				<input type="checkbox" name="power_view[]" value="{*$item['code']*}"  {*$item['checked']*}/>
				{*$item['name']*}
				</div>
				{*/foreach*}
			  </div>
              <a onclick="$(this).parent().find(':checkbox').attr('checked', true);">全选</a> / <a onclick="$(this).parent().find(':checkbox').attr('checked', false);">取消选择</a></td>
          </tr>
          <tr>
            <td>修改权限：<br /><span class="help">新增、修改、删除等操作</td>
            <td><div class="scrollbox">
				{*foreach from=$editPowerArr key=key item=item*}
				<div {*if $key is div by 2*}class="even"{*else*}class="odd"{*/if*}>
				<input type="checkbox" name="power_edit[]" value="{*$item['code']*}"  {*$item['checked']*}/>
				{*$item['name']*}
				</div>
				{*/foreach*}
			  </div>
              <a onclick="$(this).parent().find(':checkbox').attr('checked', true);">全选</a> / <a onclick="$(this).parent().find(':checkbox').attr('checked', false);">取消选择</a></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div> 
{*include file="footer.tpl"*}