{*include file="header.tpl"*}
<div id="content">
  <div class="breadcrumb">
		{*foreach from=$breadcrumbs key=key item=item*}
		{*$item['separator']*}<a href="{*$item['href']*}">{*$item['text']*}</a>
		{*/foreach*}       
      </div>
    <div class="box">
    <div class="heading">
      <h1><img src="view/image/information.png" alt="" /> {*$title*}</h1>
      <div class="buttons"><a onclick="$('#form').submit();" class="button">保存</a><a href="{*$site_url*}admin/information.php{*$backUrl*}" class="button">取消</a></div>
    </div>
    <div class="content">
      <form action="{*$site_url*}admin/informationaction.php" method="post" enctype="multipart/form-data" id="form">
	  <input type="hidden" name="id" value="{*$informationInfo['id']*}" />
	  <input type="hidden" name="act" value="save" />
        <table class="form">
          	 <tr>
                <td><span class="required">*</span> 文章标题：</td>
                <td><input type="text" name="title" size="100" value="{*$informationInfo['title']*}" />
                  </td>
              </tr>
			  <tr>
                <td><span class="required">*</span> 文章分类：</td>
                <td>
					<select name="classid">
					{*foreach from=$informationClassArr key=key item=item*}
					<option value="{*$item['id']*}" {*if $item['id']==$informationInfo['classid']*} selected="selected"{*/if*}>{*$item['name']*}</option>
					{*/foreach*}
					</select>
				</td>
              </tr>
              <tr>
                <td><span class="required">*</span> 文章内容：</td>
                <td><textarea name="content" style="width:100%;height:350px;">{*$informationInfo['content']*}</textarea>
                  </td>
              </tr>
          	<tr>
            <td>状态：</td>
            <td><select name="isshow">
				<option value="1" {*if $coachInfo['status'] eq '1'*}  selected="selected" {*/if*}>启用</option>
				<option value="0" {*if $coachInfo['status'] eq '0'*}  selected="selected" {*/if*}>停用</option>
				</select>
              </td>
          	</tr>
        </table>
      </form>
    </div>
  </div>
</div> 
<script type="text/javascript"><!--
$(document).ready(function() {
	$('.date').datepicker({dateFormat: 'yy-mm-dd'});
});
//--></script> 
<link rel="stylesheet" href="{*$site_url*}public/kindeditor-4.1.7/themes/default/default.css" />
<script charset="utf-8" src="{*$site_url*}public/kindeditor-4.1.7/kindeditor-min.js"></script>
<script charset="utf-8" src="{*$site_url*}public/kindeditor-4.1.7/lang/zh_CN.js"></script>
<script>
	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('textarea[name="content"]', {
					allowFileManager : true,
					afterBlur: function(){this.sync();}
				});
	});
</script>
{*include file="footer.tpl"*}