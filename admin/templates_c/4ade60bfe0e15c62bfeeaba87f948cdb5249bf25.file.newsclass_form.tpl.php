<?php /* Smarty version Smarty-3.1.5, created on 2017-05-21 02:57:07
         compiled from "E:\www\www.chitugame.com/admin/templates/newsclass_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2924459209183e68b17-74718706%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ade60bfe0e15c62bfeeaba87f948cdb5249bf25' => 
    array (
      0 => 'E:\\www\\www.chitugame.com/admin/templates/newsclass_form.tpl',
      1 => 1402908811,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2924459209183e68b17-74718706',
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
    'newsClassInfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5920918400e40',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5920918400e40')) {function content_5920918400e40($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
      <h1><img src="view/image/category.png" alt="" /> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
      <div class="buttons"><a onclick="$('#form').submit();" class="button">保存</a><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/newsclass.php<?php echo $_smarty_tpl->tpl_vars['backUrl']->value;?>
" class="button">取消</a></div>
    </div>
    <div class="content">
      <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/newsclassaction.php" method="post" enctype="multipart/form-data" id="form">
	  <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['newsClassInfo']->value['ID'];?>
" />
	  <input type="hidden" name="act" value="save" />
        <table class="form">
          <tr>
            <td><span class="required">*</span> 分类名称：</td>
            <td><input type="text" name="classname" style="width:350px;" value="<?php echo $_smarty_tpl->tpl_vars['newsClassInfo']->value['Name'];?>
" />
              </td>
          </tr>
          <tr>
            <td>分类描述：</td>
            <td><textarea name="introduce" style="width:350px;height:100px;"><?php echo $_smarty_tpl->tpl_vars['newsClassInfo']->value['Introduce'];?>
</textarea>
              </td>
          </tr>
          <tr>
            <td>分类顺序：</td>
            <td><input type="text" name="ordernum" value="<?php echo $_smarty_tpl->tpl_vars['newsClassInfo']->value['OrderNum'];?>
" />
              </td>
          </tr>
          <tr>
            <td>状态：</td>
            <td><select name="isshow">
				<option value="1" <?php if ($_smarty_tpl->tpl_vars['newsClassInfo']->value['IsShow']=='1'){?>  selected="selected" <?php }?>>启用</option>
				<option value="0" <?php if ($_smarty_tpl->tpl_vars['newsClassInfo']->value['IsShow']=='0'){?>  selected="selected" <?php }?>>停用</option>
				</select></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div> 
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>