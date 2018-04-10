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
      <div class="buttons"><a onclick="$('#form').submit();" class="button">保存</a><a href="{*$site_url*}admin/user.php{*$backUrl*}" class="button">取消</a></div>
    </div>
    <div class="content">
      <form action="{*$site_url*}admin/useraction.php" method="post" enctype="multipart/form-data" id="form">
	  <input type="hidden" name="id" value="{*$userInfo['ID']*}" />
	  <input type="hidden" name="act" value="save" />
        <table class="form">
          <tr>
            <td><span class="required">*</span> 用户名：</td>
            <td><input type="text" name="username" value="{*$userInfo['Name']*}" />
              </td>
          </tr>
          <tr>
            <td><span class="required">*</span> 名字：</td>
            <td><input type="text" name="realname" value="{*$userInfo['RealName']*}" />
              </td>
          </tr>
          <tr>
            <td><span class="required">*</span> 性别：</td>
            <td><input type="radio" name="sex" value="1" {*if $userInfo['Sex'] eq '1' or !$userInfo['Sex']*}  checked="checked" {*/if*}>&nbsp;男&nbsp;&nbsp;&nbsp;
    <input type="radio" name="sex" value="2" {*if $userInfo['Sex'] eq '2'*}  checked="checked" {*/if*}>&nbsp;女
              </td>
          </tr>
          <tr>
            <td>邮箱：</td>
            <td><input type="text" name="mail" value="{*$userInfo['Mail']*}" /></td>
          </tr>
          <tr>
            <td>用户群组：</td>
            <td><select name="groupid">
				{*foreach from=$groupArr key=key item=item*}
				<option value="{*$item['ID']*}" {*if $item['ID']==$userInfo['GroupID']*} selected="selected"{*/if*}>{*$item['Name']*}</option>
				{*/foreach*}
			  </select></td>
          </tr>
          <tr>
            <td>密码：</td>
            <td><input type="password" name="password" value=""  />
              </td>
          </tr>
          <tr>
            <td>确认密码：</td>
            <td><input type="password" name="confirm" value="" />
              </td>
          </tr>
          <tr>
            <td>状态：</td>
            <td><select name="checked">
				<option value="1" {*if $userInfo['Checked'] eq '1'*}  selected="selected" {*/if*}>启用</option>
				<option value="0" {*if $userInfo['Checked'] eq '0'*}  selected="selected" {*/if*}>停用</option>
				</select></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div> 
{*include file="footer.tpl"*}