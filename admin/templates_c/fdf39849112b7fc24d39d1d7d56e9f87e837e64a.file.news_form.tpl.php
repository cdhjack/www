<?php /* Smarty version Smarty-3.1.5, created on 2017-06-01 06:54:33
         compiled from "E:\www\www.rainbow.com/admin/templates/news_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:85592f49a9be12b6-28532162%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fdf39849112b7fc24d39d1d7d56e9f87e837e64a' => 
    array (
      0 => 'E:\\www\\www.rainbow.com/admin/templates/news_form.tpl',
      1 => 1495259225,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85592f49a9be12b6-28532162',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'breadcrumbs' => 0,
    'item' => 0,
    'title' => 0,
    'site_url' => 0,
    'backUrl' => 0,
    'newsInfo' => 0,
    'newClassArr' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_592f49a9de491',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592f49a9de491')) {function content_592f49a9de491($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\www\\www.rainbow.com\\class\\Smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="content">
  <div class="breadcrumb">
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['breadcrumbs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		<?php echo $_smarty_tpl->tpl_vars['item']->value['separator'];?>
<a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['href'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['text'];?>
</a>
		<?php } ?>       
      </div>
    <div class="box">
    <div class="heading">
      <h1><img src="view/image/information.png" alt="" /> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
      <div class="buttons"><a onclick="$('#form').submit();" class="button">保存</a><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/news.php<?php echo $_smarty_tpl->tpl_vars['backUrl']->value;?>
" class="button">取消</a></div>
    </div>
    <div class="content">
      <div id="tabs" class="htabs"><a href="#tab-general">编辑项目</a><a href="#tab-data">基本信息</a><!--<a href="#tab-design">设计</a>--></div>
      <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/newsaction.php" method="post" enctype="multipart/form-data" id="form">
	  <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['newsInfo']->value['ID'];?>
" />
	  <input type="hidden" name="act" value="save" />
        <div id="tab-general">
          <div id="languages" class="htabs">
                        <a href="#language1"><img src="view/image/flags/cn.png" title="简体中文" /> 简体中文</a>
                      </div>
                    <div id="language1">
            <table class="form">
              <tr>
                <td><span class="required">*</span> 文章标题：</td>
                <td><input type="text" name="title" size="100" value="<?php echo $_smarty_tpl->tpl_vars['newsInfo']->value['Title'];?>
" />
                  </td>
              </tr>
			  
			  <tr>
                <td><span class="required">*</span> 文章分类：</td>
                <td>
					<select name="classid">
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['newClassArr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['ID'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['ID']==$_smarty_tpl->tpl_vars['newsInfo']->value['ClassID']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['Name'];?>
</option>
					<?php } ?>
					</select>
				</td>
              </tr>
			  
              <tr>
                <td><span class="required">*</span> 文章内容：</td>
                <td><textarea name="content" style="width:100%;height:350px;"><?php echo $_smarty_tpl->tpl_vars['newsInfo']->value['Content'];?>
</textarea>
                  </td>
              </tr>
            </table>
          </div>
                  </div>
        <div id="tab-data">
          <table class="form">
            <tr>
              <td>&nbsp;&nbsp;作者：</td>
              <td><input type="text" name="author" value="<?php echo $_smarty_tpl->tpl_vars['newsInfo']->value['Author'];?>
" /></td>
            </tr>
			<tr>
              <td>&nbsp;&nbsp;来源：</td>
              <td><input type="text" name="source" value="<?php echo $_smarty_tpl->tpl_vars['newsInfo']->value['Source'];?>
" /></td>
            </tr>
			<tr>
              <td>&nbsp;&nbsp;简介：</td>
              <td><textarea name="introduce" style="width:350px;height:100px;"><?php echo $_smarty_tpl->tpl_vars['newsInfo']->value['Introduce'];?>
</textarea></td>
            </tr>
            <tr>
              <td>&nbsp;&nbsp;缩略图:<br /><span class="help"><!--焦点图片请上传大小为980X361<br />置顶图片请上传大小为169X118--></span></td>
              <td><textarea id="newspic" name="newspic" style="width:350px;height:100px;"><?php echo $_smarty_tpl->tpl_vars['newsInfo']->value['NewsPic'];?>
</textarea></td>
            </tr>
            <tr>
              <td>&nbsp;&nbsp;标记</td>
              <td>
			  <input type="checkbox" name="isindex" <?php if ($_smarty_tpl->tpl_vars['newsInfo']->value['IsIndex']=='1'){?>  checked="checked" <?php }?> value="1" />
			  焦点
			  <input type="checkbox" name="ishot" value="1" <?php if ($_smarty_tpl->tpl_vars['newsInfo']->value['IsHot']=='1'){?>  checked="checked" <?php }?>/>
			  热点
			  </td>
            </tr>            
            <tr>
              <td>&nbsp;&nbsp;文章状态：</td>
              <td><select name="isshow">
				<option value="1" <?php if ($_smarty_tpl->tpl_vars['newsInfo']->value['IsShow']=='1'){?>  selected="selected" <?php }?>>启用</option>
				<option value="0" <?php if ($_smarty_tpl->tpl_vars['newsInfo']->value['IsShow']=='0'){?>  selected="selected" <?php }?>>停用</option>
				</select>
				</td>
            </tr>
            <tr>
              <td>&nbsp;&nbsp;发布日期：</td>
              <td><input type="text" name="submitdate" class="date" value="<?php if ($_smarty_tpl->tpl_vars['newsInfo']->value['SubmitDate']&&$_smarty_tpl->tpl_vars['newsInfo']->value['SubmitDate']!='0000-00-00'){?><?php echo $_smarty_tpl->tpl_vars['newsInfo']->value['SubmitDate'];?>
<?php }else{ ?><?php echo smarty_modifier_date_format(time(),'%Y-%m-%d');?>
<?php }?>" /></td>
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
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
public/kindeditor-4.1.7/themes/default/default.css" />
<script charset="utf-8" src="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
public/kindeditor-4.1.7/kindeditor-min.js"></script>
<script charset="utf-8" src="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
public/kindeditor-4.1.7/lang/zh_CN.js"></script>
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
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>