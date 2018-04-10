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
      <div class="buttons"><a onclick="$('#form').submit();" class="button">保存</a><a href="{*$site_url*}admin/member.php{*$backUrl*}" class="button">取消</a></div>
    </div>
    <div class="content">
      <form action="{*$site_url*}admin/memberaction.php" method="post" enctype="multipart/form-data" id="form">
	  <input type="hidden" name="id" value="{*$memberInfo['id']*}" />
	  <input type="hidden" name="act" value="updatepassword" />
        <table class="form">
          <tr>
            <td> &nbsp;&nbsp;&nbsp;用户：</td>
            <td>{*if $memberInfo['mobile']*}{*$memberInfo['mobile']*}{*else*}{*$memberInfo['email']*}{*/if*}</td>
          </tr>
          <tr>
            <td><span class="required">*</span> 新密码：</td>
            <td><input type="password" name="password" value=""  />
              </td>
          </tr>
          <tr>
            <td><span class="required">*</span> 确认密码：</td>
            <td><input type="password" name="confirm" value="" />
              </td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div> 
{*include file="footer.tpl"*}