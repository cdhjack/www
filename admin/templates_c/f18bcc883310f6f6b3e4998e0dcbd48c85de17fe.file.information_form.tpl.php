<?php /* Smarty version Smarty-3.1.5, created on 2014-10-11 14:53:17
         compiled from "D:\www\www.yoti-app.com\trunk\admin/templates/information_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:61215438d1c1ae47d0-96314350%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f18bcc883310f6f6b3e4998e0dcbd48c85de17fe' => 
    array (
      0 => 'D:\\www\\www.yoti-app.com\\trunk\\admin/templates/information_form.tpl',
      1 => 1413010371,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '61215438d1c1ae47d0-96314350',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5438d1c1bf075',
  'variables' => 
  array (
    'breadcrumbs' => 0,
    'item' => 0,
    'title' => 0,
    'site_url' => 0,
    'backUrl' => 0,
    'informationInfo' => 0,
    'informationClassArr' => 0,
    'coachInfo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5438d1c1bf075')) {function content_5438d1c1bf075($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
admin/information.php<?php echo $_smarty_tpl->tpl_vars['backUrl']->value;?>
" class="button">取消</a></div>
    </div>
    <div class="content">
      <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/informationaction.php" method="post" enctype="multipart/form-data" id="form">
	  <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['informationInfo']->value['id'];?>
" />
	  <input type="hidden" name="act" value="save" />
        <table class="form">
          	 <tr>
                <td><span class="required">*</span> 文章标题：</td>
                <td><input type="text" name="title" size="100" value="<?php echo $_smarty_tpl->tpl_vars['informationInfo']->value['title'];?>
" />
                  </td>
              </tr>
			  <tr>
                <td><span class="required">*</span> 文章分类：</td>
                <td>
					<select name="classid">
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['informationClassArr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->tpl_vars['informationInfo']->value['classid']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
					<?php } ?>
					</select>
				</td>
              </tr>
              <tr>
                <td><span class="required">*</span> 文章内容：</td>
                <td><textarea name="content" style="width:100%;height:350px;"><?php echo $_smarty_tpl->tpl_vars['informationInfo']->value['content'];?>
</textarea>
                  </td>
              </tr>
          	<tr>
            <td>状态：</td>
            <td><select name="isshow">
				<option value="1" <?php if ($_smarty_tpl->tpl_vars['coachInfo']->value['status']=='1'){?>  selected="selected" <?php }?>>启用</option>
				<option value="0" <?php if ($_smarty_tpl->tpl_vars['coachInfo']->value['status']=='0'){?>  selected="selected" <?php }?>>停用</option>
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
</script>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>