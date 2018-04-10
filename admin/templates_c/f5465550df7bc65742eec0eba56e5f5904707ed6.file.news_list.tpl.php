<?php /* Smarty version Smarty-3.1.5, created on 2017-05-20 00:51:04
         compiled from "E:\www\www.chitugame.com\admin/templates/news_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20584591f227841bd15-19098843%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5465550df7bc65742eec0eba56e5f5904707ed6' => 
    array (
      0 => 'E:\\www\\www.chitugame.com\\admin/templates/news_list.tpl',
      1 => 1407397505,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20584591f227841bd15-19098843',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'breadcrumbs' => 0,
    'item' => 0,
    'title' => 0,
    'site_url' => 0,
    'filter_id' => 0,
    'filter_title' => 0,
    'newClassArr' => 0,
    'filter_class' => 0,
    'filter_submitdate' => 0,
    'filter_onclick' => 0,
    'filter_isindex' => 0,
    'filter_status' => 0,
    'newsArr' => 0,
    'pageHtml' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_591f2278554c9',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_591f2278554c9')) {function content_591f2278554c9($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
      <div class="buttons"><a onclick="doAction('isshow');" class="button">启用</a><a onclick="doAction('notshow');" class="button">停用</a><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/newsform.php" class="button">新增</a><a onclick="doAction('delete');" class="button">删除</a></div>
    </div>
    <div class="content">
        <table class="list">
          <thead>
            <tr>
              <td width="5%" style="text-align: center;">选择</td>
              <td class="center" width="5%">ID号</td>
			  <td class="left">标题</td>
              <td class="right" width="10%">文章分类</td>
			  <td class="right" width="10%">发布时间</td>
			  <td class="right" width="10%">点击数</td>
			  <td class="right" width="10%">焦点</td>
			  <td class="right" width="10%">状态</td>
              <td class="right" width="10%">编辑</td>
            </tr>
			<tr>
		   <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/news.php" method="post" id="search">
              <td style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" title="全选"/></td>
              <td><input type="text" size="8" name="filter_id" id="filter_id" value="<?php echo $_smarty_tpl->tpl_vars['filter_id']->value;?>
"></td>
			  <td><input type="text" name="filter_title" id="filter_title" value="<?php echo $_smarty_tpl->tpl_vars['filter_title']->value;?>
" /></td>
			  <td class="right">
			  		<select name="filter_class">
					<option value="">全部</option>
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['newClassArr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['ID'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['ID']==$_smarty_tpl->tpl_vars['filter_class']->value){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['Name'];?>
</option>
					<?php } ?>
					</select>
			  </td>
			  <td class="right"><input type="text" name="filter_submitdate" id="filter_submitdate" value="<?php echo $_smarty_tpl->tpl_vars['filter_submitdate']->value;?>
" size="12" style="text-align:right;" class="date"/></td>
			  <td class="right"><input type="text" size="8" name="filter_onclick" id="filter_onclick" value="<?php echo $_smarty_tpl->tpl_vars['filter_onclick']->value;?>
" /></td>
              <td class="right">
			  		<select name="filter_isindex">
					<option value=""></option>
					<option value="1" <?php if ($_smarty_tpl->tpl_vars['filter_isindex']->value=='1'){?> selected="selected"<?php }?>>是</option>
					<option value="0" <?php if ($_smarty_tpl->tpl_vars['filter_isindex']->value=='0'){?> selected="selected"<?php }?>>否</option>
					</select>
			  </td>
              <td class="right">
			  		<select name="filter_status">
					<option value="">全部</option>
					<option value="1" <?php if ($_smarty_tpl->tpl_vars['filter_status']->value=='1'){?> selected="selected"<?php }?>>启用</option>
					<option value="0" <?php if ($_smarty_tpl->tpl_vars['filter_status']->value=='0'){?> selected="selected"<?php }?>>停用</option>
					</select>
				</td>
              <td align="right"><a onclick="$('#search').submit();" class="button">筛选</a></td>
			</form>
            </tr>
          </thead>
		  <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/newsaction.php" method="post" enctype="multipart/form-data" id="form">
          <tbody>
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['newsArr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
            <tr>
              <td style="text-align: center;"><input type="checkbox" name="selected[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['ID'];?>
" /></td>
			  <td class="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['ID'];?>
</td>
              <td class="left"><?php echo $_smarty_tpl->tpl_vars['item']->value['Title'];?>
</td>
              <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['ClassName'];?>
</td>
			  <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['SubmitDate'];?>
</td>
			  <td class="right"><span style="color: #008000;"><?php echo $_smarty_tpl->tpl_vars['item']->value['Onclick'];?>
</span></td>
			  <td class="right"><?php if ($_smarty_tpl->tpl_vars['item']->value['IsIndex']=='1'){?>是<?php }else{ ?>否<?php }?></td>
			  <td class="right"><?php if ($_smarty_tpl->tpl_vars['item']->value['IsShow']=='1'){?>启用<?php }else{ ?>停用<?php }?></td>
              <td class="right">[ <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/newsform.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['ID'];?>
">编辑</a> ]</td>
            </tr>
			<?php }
if (!$_smarty_tpl->tpl_vars['item']->_loop) {
?>
			<tr><td colspan="9" class="left">暂无相关信息</td></tr>
			<?php } ?>	
		  </tbody>
		  </form>
        </table>
      <div class="pagination">
	  <?php echo $_smarty_tpl->tpl_vars['pageHtml']->value;?>

	  </div>
    </div>
  </div>
</div> 
<script type="text/javascript"><!--
$(document).ready(function() {
	$('.date').datepicker({dateFormat: 'yy-mm-dd'});
});
//--></script> 
<script type="text/javascript"><!--
function doAction(act){
	var actionUrl = $('#form').attr('action');
	actionUrl = actionUrl+'?act='+act;
	$('#form').attr('action',actionUrl);
	$('#form').submit();}
//--></script> 


<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>