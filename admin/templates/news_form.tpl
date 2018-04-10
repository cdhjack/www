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
      <div class="buttons"><a onclick="$('#form').submit();" class="button">保存</a><a href="{*$site_url*}admin/news.php{*$backUrl*}" class="button">取消</a></div>
    </div>
    <div class="content">
      <div id="tabs" class="htabs"><a href="#tab-general">编辑项目</a><a href="#tab-data">基本信息</a><!--<a href="#tab-design">设计</a>--></div>
      <form action="{*$site_url*}admin/newsaction.php" method="post" enctype="multipart/form-data" id="form">
	  <input type="hidden" name="id" value="{*$newsInfo['ID']*}" />
	  <input type="hidden" name="act" value="save" />
        <div id="tab-general">
          <div id="languages" class="htabs">
                        <a href="#language1"><img src="view/image/flags/cn.png" title="简体中文" /> 简体中文</a>
                      </div>
                    <div id="language1">
            <table class="form">
              <tr>
                <td><span class="required">*</span> 文章标题：</td>
                <td><input type="text" name="title" size="100" value="{*$newsInfo['Title']*}" />
                  </td>
              </tr>
			  
			  <tr>
                <td><span class="required">*</span> 文章分类：</td>
                <td>
					<select name="classid">
					{*foreach from=$newClassArr key=key item=item*}
					<option value="{*$item['ID']*}" {*if $item['ID']==$newsInfo['ClassID']*} selected="selected"{*/if*}>{*$item['Name']*}</option>
					{*/foreach*}
					</select>
				</td>
              </tr>
			  
              <tr>
                <td><span class="required">*</span> 文章内容：</td>
                <td><textarea name="content" style="width:100%;height:350px;">{*$newsInfo['Content']*}</textarea>
                  </td>
              </tr>
            </table>
          </div>
                  </div>
        <div id="tab-data">
          <table class="form">
            <tr>
              <td>&nbsp;&nbsp;作者：</td>
              <td><input type="text" name="author" value="{*$newsInfo['Author']*}" /></td>
            </tr>
			<tr>
              <td>&nbsp;&nbsp;来源：</td>
              <td><input type="text" name="source" value="{*$newsInfo['Source']*}" /></td>
            </tr>
			<tr>
              <td>&nbsp;&nbsp;简介：</td>
              <td><textarea name="introduce" style="width:350px;height:100px;">{*$newsInfo['Introduce']*}</textarea></td>
            </tr>
            <tr>
              <td>&nbsp;&nbsp;缩略图:<br /><span class="help"><!--焦点图片请上传大小为980X361<br />置顶图片请上传大小为169X118--></span></td>
              <td><textarea id="newspic" name="newspic" style="width:350px;height:100px;">{*$newsInfo['NewsPic']*}</textarea></td>
            </tr>
            <tr>
              <td>&nbsp;&nbsp;标记</td>
              <td>
			  <input type="checkbox" name="isindex" {*if $newsInfo['IsIndex'] eq '1'*}  checked="checked" {*/if*} value="1" />
			  焦点
			  <input type="checkbox" name="ishot" value="1" {*if $newsInfo['IsHot'] eq '1'*}  checked="checked" {*/if*}/>
			  热点
			  </td>
            </tr>            
            <tr>
              <td>&nbsp;&nbsp;文章状态：</td>
              <td><select name="isshow">
				<option value="1" {*if $newsInfo['IsShow'] eq '1'*}  selected="selected" {*/if*}>启用</option>
				<option value="0" {*if $newsInfo['IsShow'] eq '0'*}  selected="selected" {*/if*}>停用</option>
				</select>
				</td>
            </tr>
            <tr>
              <td>&nbsp;&nbsp;发布日期：</td>
              <td><input type="text" name="submitdate" class="date" value="{*if $newsInfo['SubmitDate'] && $newsInfo['SubmitDate'] neq '0000-00-00'*}{*$newsInfo['SubmitDate']*}{*else*}{*$smarty.now|date_format:'%Y-%m-%d'*}{*/if*}" /></td>
            </tr>
          </table>
        </div>
        <!--<div id="tab-design">
          <table class="list">
            <thead>
              <tr>
                <td class="left">&nbsp;&nbsp;网店：</td>
                <td class="left">布局覆盖：</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="left">默认</td>
                <td class="left"><select name="information_layout[0][layout_id]">
                    <option value=""></option>
                                                            <option value="2">产品</option>
                                                                                <option value="11">信息</option>
                                                                                <option value="10">分销商</option>
                                                                                <option value="5">厂商</option>
                                                                                <option value="9">导航</option>
                                                                                <option value="6">帐户</option>
                                                                                <option value="3">目录</option>
                                                                                <option value="7">结账</option>
                                                                                <option value="8">联系</option>
                                                                                <option value="12">频道——新品推荐页</option>
                                                                                <option value="1">首页</option>
                                                                                <option value="4">默认</option>
                                                          </select></td>
              </tr>
            </tbody>
                      </table>
        </div>-->
      </form>
    </div>
  </div>
</div> 
<script type="text/javascript"><!--
$(document).ready(function() {
	$('.date').datepicker({dateFormat: 'yy-mm-dd'});
});
//--></script> 
<script type="text/javascript"><!--
$('#tabs a').tabs(); 
$('#languages a').tabs(); 
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
	var editor_newspic_url;
	KindEditor.ready(function(K) {
			editor_newspic_url = K.create('textarea[name="newspic"]', {
			allowImageUpload : true,
			filterMode: true,
			afterBlur: function(){this.sync();},
			items : [
				'source','justifyleft','justifycenter','justifyright','image'
			]
		});
	});
</script>
{*include file="footer.tpl"*}