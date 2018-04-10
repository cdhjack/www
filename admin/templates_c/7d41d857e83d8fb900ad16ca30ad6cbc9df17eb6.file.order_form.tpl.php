<?php /* Smarty version Smarty-3.1.5, created on 2014-10-13 18:33:13
         compiled from "D:\www\www.yoti-app.com\trunk\admin/templates/order_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6345543b89429b50b2-16988340%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d41d857e83d8fb900ad16ca30ad6cbc9df17eb6' => 
    array (
      0 => 'D:\\www\\www.yoti-app.com\\trunk\\admin/templates/order_form.tpl',
      1 => 1413196390,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6345543b89429b50b2-16988340',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_543b8942aca0b',
  'variables' => 
  array (
    'breadcrumbs' => 0,
    'item' => 0,
    'title' => 0,
    'site_url' => 0,
    'backUrl' => 0,
    'orderInfo' => 0,
    'newOrderCommentArr' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_543b8942aca0b')) {function content_543b8942aca0b($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
	  <input type="hidden" name="act" value="save" />
        <table class="form">
          <tr>
            <td> 服务态度：<span class="help">支持半颗星,如3.5</span></td>
            <td><?php echo $_smarty_tpl->tpl_vars['orderInfo']->value['tdstar_html'];?>
&nbsp;&nbsp;评星值：<input type="hidden" name="old_tdstar" value="<?php echo $_smarty_tpl->tpl_vars['orderInfo']->value['tdstar'];?>
" /><input type="text" name="tdstar" value="<?php echo $_smarty_tpl->tpl_vars['orderInfo']->value['tdstar'];?>
" size="12"/>
              </td>
          </tr>
          <tr>
            <td> 服务质量：<span class="help">支持半颗星,如3.5</span></td>
            <td><?php echo $_smarty_tpl->tpl_vars['orderInfo']->value['zlstar_html'];?>
&nbsp;&nbsp;评星值：<input type="hidden" name="old_zlstar" value="<?php echo $_smarty_tpl->tpl_vars['orderInfo']->value['zlstar'];?>
" /><input type="text" name="zlstar" value="<?php echo $_smarty_tpl->tpl_vars['orderInfo']->value['zlstar'];?>
" size="12"/>
              </td>
          </tr>
          <tr>
            <td> 服务内容：<span class="help">支持半颗星,如3.5</span></td>
            <td><?php echo $_smarty_tpl->tpl_vars['orderInfo']->value['nrstar_html'];?>
&nbsp;&nbsp;评星值：<input type="hidden" name="old_nrstar" value="<?php echo $_smarty_tpl->tpl_vars['orderInfo']->value['nrstar'];?>
" /><input type="text" name="nrstar" value="<?php echo $_smarty_tpl->tpl_vars['orderInfo']->value['nrstar'];?>
" size="12"/>
              </td>
          </tr>
          <tr>
            <td> 订单得分：<span class="help">三项评分的平均值</span></td>
            <td><?php echo $_smarty_tpl->tpl_vars['orderInfo']->value['score_html'];?>

              </td>
          </tr>
          <tr>
            <td><span class="required">*</span> 用户评论：</td>
            <td><input type="hidden" name="user_comment_id" value="<?php echo $_smarty_tpl->tpl_vars['newOrderCommentArr']->value['user']['id'];?>
" /><textarea name="user_comment_content" style="width:650px;height:100px;"><?php echo $_smarty_tpl->tpl_vars['newOrderCommentArr']->value['user']['content'];?>
</textarea>
              </td>
          </tr>
          <tr>
            <td><span class="required">*</span> 教练回复：</td>
            <td><input type="hidden" name="coach_comment_id" value="<?php echo $_smarty_tpl->tpl_vars['newOrderCommentArr']->value['coach']['id'];?>
" /><textarea name="coach_comment_content" style="width:650px;height:100px;"><?php echo $_smarty_tpl->tpl_vars['newOrderCommentArr']->value['coach']['content'];?>
</textarea>
              </td>
          </tr>
        </table>
      </form>
    </div>
    
    
  </div>
</div> 
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>