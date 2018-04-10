<?php /* Smarty version Smarty-3.1.5, created on 2014-10-14 16:14:42
         compiled from "D:\www\www.yoti-app.com\trunk\admin/templates/orderrefund_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23698543cdb72c09a65-97459957%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0349ec8b97b0cfd38826dc1fa800f6cf8225b356' => 
    array (
      0 => 'D:\\www\\www.yoti-app.com\\trunk\\admin/templates/orderrefund_form.tpl',
      1 => 1413274468,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23698543cdb72c09a65-97459957',
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
    'orderInfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_543cdb72cc904',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_543cdb72cc904')) {function content_543cdb72cc904($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
      <h1><img src="view/image/order.png" alt="" /> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
      <div class="buttons"><a onclick="$('#form').submit();" class="button">保存</a><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/order.php<?php echo $_smarty_tpl->tpl_vars['backUrl']->value;?>
" class="button">取消</a></div>
    </div>
    
    
    
    <div class="content">
      <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/orderaction.php" method="post" enctype="multipart/form-data" id="form">
	  <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['orderInfo']->value['id'];?>
" />
	  <input type="hidden" name="act" value="refund" />
        <table class="form">
          <tr>
            <td> 用户名称：</td>
            <td><?php echo $_smarty_tpl->tpl_vars['orderInfo']->value['name'];?>

              </td>
          </tr>
          <tr>
            <td> 退款金额：</td>
            <td><?php echo $_smarty_tpl->tpl_vars['orderInfo']->value['rprice'];?>

              </td>
          </tr>
          <tr>
            <td><span class="required">*</span> 退款原因：</td>
            <td><textarea name="reason" style="width:650px;height:100px;"></textarea>
              </td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div> 
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>