{*include file="header.tpl"*}
<div id="content">
  <div class="breadcrumb">
		{*foreach from=$breadcrumbs key=key item=item*}
		{*$item['separator']*}<a href="{*$item['href']*}">{*$item['text']*}</a>
		{*/foreach*}       
      </div>
    <div class="box">
    <div class="heading">
      <h1><img src="view/image/order.png" alt="" /> {*$title*}</h1>
      <div class="buttons"><a onclick="$('#form').submit();" class="button">
      <!--20141016改:教练信息未审核则名称为：审核，否则为：保存-->
      {*if $coachInfo['pass'] eq '1'*}
      保存
      {*else*}
      审核
      {*/if*}
      </a><a href="{*$site_url*}admin/coach.php{*$backUrl*}" class="button">取消</a></div>
    </div>
    <div class="content">
      <div id="tabs" class="htabs"><a href="#tab-general">编辑项目</a><a href="#tab-data">查看信息</a><a href="#tab-image">图片设置</a><!--<a href="#tab-design">设计</a>--></div>
      <form action="{*$site_url*}admin/coachaction.php" method="post" enctype="multipart/form-data" id="form">
	  <input type="hidden" name="id" value="{*$coachInfo['id']*}" />
	  <input type="hidden" name="act" value="save" />
        <div id="tab-general">
          <div id="languages" class="htabs">
                        <a href="#language1"><img src="view/image/flags/cn.png" title="简体中文" /> 简体中文</a>
                      </div>
                    <div id="language1">
            <table class="form">
              <tr>
                <td><span class="required">*</span> 教练昵称：</td>
                <td><input type="text" name="nickname"  value="{*$coachInfo['name']*}" />
                  </td>
              </tr>
              <tr>
                <td><span class="required">*</span> 教练姓名：</td>
                <td><input type="text" name="rname"  value="{*$coachInfo['rname']*}" />
                  </td>
              </tr>
              <tr>
                <td><span class="required">*</span> 性别：</td>
                <td><input type="radio" name="sex" value="1" {*if $coachInfo['sex'] eq '1'*} checked="checked"{*/if*}>&nbsp;男&nbsp;&nbsp;&nbsp;<input type="radio" name="sex" {*if $coachInfo['sex'] eq '0'*} checked="checked"{*/if*} value="0">&nbsp;女</td>
              </tr>
              <tr>
                <td><span class="required">*</span> 教练属性：</td>
                <td>
                <select name="typeid">
					<option value="">请选择类型</option>
					{*foreach from=$coachTypeArr key=key item=item*}
					<option value="{*$item['id']*}" {*if $item['id']==$coachInfo['typeid']*} selected="selected"{*/if*}>{*$item['val']*}</option>
					{*/foreach*}
                </select>
                
                <select name="level">
                <option value="">请选择级别</option>
                <option value="1" {*if $coachInfo['level'] eq '1'*} selected="selected"{*/if*}>一星</option>
                <option value="2" {*if $coachInfo['level'] eq '2'*} selected="selected"{*/if*}>二星</option>
                <option value="3" {*if $coachInfo['level'] eq '3'*} selected="selected"{*/if*}>三星</option>
                <option value="4" {*if $coachInfo['level'] eq '4'*} selected="selected"{*/if*}>四星</option>
                <option value="5" {*if $coachInfo['level'] eq '5'*} selected="selected"{*/if*}>五星</option>
                </select>
                </td>
              </tr>
              <tr>
                <td><span class="required">*</span> 课程价格：</td>
                <td><input type="text" name="price"  value="{*$coachInfo['price']*}" />&nbsp;&nbsp;元/小时
                  </td>
              </tr>
              <tr>
                <td>&nbsp;&nbsp; 个性签名：</td>
                <td><textarea name="sign" style="width:350px;height:50px;">{*$coachInfo['sign']*}</textarea></td>
              </tr>
              <tr>
                <td>&nbsp;&nbsp; 个人优势：</td>
                <td><textarea name="adv" style="width:350px;height:50px;">{*$coachInfo['adv']*}</textarea></td>
              </tr>
              <tr>
                <td>&nbsp;&nbsp; 服务流程：</td>
                <td><textarea name="flow" style="width:350px;height:50px;">{*$coachInfo['flow']*}</textarea></td>
              </tr>
            <tr>
              <td>&nbsp;&nbsp;头像:<br /><span class="help">图片请上传大小为300X300<br /></span></td>
              <td><textarea id="headpic" name="headpic" style="width:350px;height:200px;">{*$coachInfo['avatar']*}</textarea></td>
            </tr>
            <tr>
              <td>&nbsp;&nbsp;状态：</td>
              <td><select name="status">
				<option value="1" {*if $coachInfo['status'] eq '1'*}  selected="selected" {*/if*}>启用</option>
				<option value="0" {*if $coachInfo['status'] eq '0'*}  selected="selected" {*/if*}>禁用</option>
				</select>
				</td>
            </tr>
            </table>
          </div>
                  </div>
                  
         <div id="tab-data">
          <table class="form">
              <tr>
                <td>&nbsp;&nbsp; 收藏量：</td>
                <td>{*$coachInfo['fav']*}</td>
              </tr>
              <tr>
                <td>&nbsp;&nbsp; 点赞量：</td>
                <td>{*$coachInfo['thumb']*}</td>
              </tr>
              <tr>
                <td>&nbsp;&nbsp; 订单量：</td>
                <td>{*$coachInfo['order_num']*}</td>
              </tr>
              <tr>
                <td>&nbsp;&nbsp; 服务态度：</td>
                <td>{*$coachInfo['tdstar_html']*}</td>
              </tr>
              <tr>
                <td>&nbsp;&nbsp; 服务质量：</td>
                <td>{*$coachInfo['zlstar_html']*}</td>
                  </td>
              </tr>
              <tr>
                <td>&nbsp;&nbsp; 服务内容：</td>
                <td>{*$coachInfo['nrstar_html']*}</td>
                  </td>
              </tr>
              <tr>
                <td>&nbsp;&nbsp; 口碑：</td>
                <td>{*$coachInfo['star_html']*}</td>
                  </td>
              </tr>
           
          </table>
        </div>         
                  
         <div id="tab-image">
          <table class="list" id="images">
            <thead>
              <tr>
                <td class="left">&nbsp;&nbsp;图片：</td>
              </tr>
            </thead>
            
            <tbody>
              <tr>
                <td class="left"><textarea id="photo" name="photo" style="width:100%;height:600px;">{*$coachInfo['photo_list']*}</textarea></td>
              </tr>
            </tbody>
			<!--
                                   
                                    <tbody id="image-row0">
              <tr>
                <td class="left"><div class="image"><img id="thumb0" alt="" src="http://mall.ikang.com/image/cache/data/H001152/_DSC0061-100x100.jpg">
                    <input type="hidden" id="image0" value="data/H001152/_DSC0061.jpg" name="product_image[0][image]">
                    </div>
                </td>
                <td class="left"><a class="button" onclick="$('#image-row0').remove();">移除</a></td>
              </tr>
            </tbody>
            
                                    <tfoot>
              <tr>
                <td></td>
                <td class="left"><a class="button" onclick="addImage();">添加图片</a></td>
              </tr>
            </tfoot>-->
          </table>
        </div>         
                  
        <!--
        <div id="tab-design">
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
			editor = K.create('textarea[name="photo"]', {
			allowImageUpload : true,
			filterMode: true,
			afterBlur: function(){this.sync();},
			items : [
				'source','justifyleft','justifycenter','justifyright','image'
			]
		});
	});
	var editor_headpic_url;
	KindEditor.ready(function(K) {
			editor_headpic_url = K.create('textarea[name="headpic"]', {
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