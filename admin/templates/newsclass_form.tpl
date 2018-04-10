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
      <div class="buttons"><a onclick="$('#form').submit();" class="button">保存</a><a href="{*$site_url*}admin/newsclass.php{*$backUrl*}" class="button">取消</a></div>
    </div>
    <div class="content">
      <form action="{*$site_url*}admin/newsclassaction.php" method="post" enctype="multipart/form-data" id="form">
	  <input type="hidden" name="id" value="{*$newsClassInfo['ID']*}" />
	  <input type="hidden" name="act" value="save" />
        <table class="form">
          <tr>
            <td><span class="required">*</span> 分类名称：</td>
            <td><input type="text" name="classname" style="width:350px;" value="{*$newsClassInfo['Name']*}" />
              </td>
          </tr>
          <tr>
            <td>分类描述：</td>
            <td><textarea name="introduce" style="width:350px;height:100px;">{*$newsClassInfo['Introduce']*}</textarea>
              </td>
          </tr>
          <tr>
            <td>分类顺序：</td>
            <td><input type="text" name="ordernum" value="{*$newsClassInfo['OrderNum']*}" />
              </td>
          </tr>
          <tr>
            <td>状态：</td>
            <td><select name="isshow">
				<option value="1" {*if $newsClassInfo['IsShow'] eq '1'*}  selected="selected" {*/if*}>启用</option>
				<option value="0" {*if $newsClassInfo['IsShow'] eq '0'*}  selected="selected" {*/if*}>停用</option>
				</select></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div> 
{*include file="footer.tpl"*}