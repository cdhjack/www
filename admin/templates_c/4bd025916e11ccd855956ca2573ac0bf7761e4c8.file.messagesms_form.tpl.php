<?php /* Smarty version Smarty-3.1.5, created on 2014-10-11 18:45:55
         compiled from "D:\www\www.yoti-app.com\trunk\admin/templates/messagesms_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:323975439029c2e5d14-24222247%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4bd025916e11ccd855956ca2573ac0bf7761e4c8' => 
    array (
      0 => 'D:\\www\\www.yoti-app.com\\trunk\\admin/templates/messagesms_form.tpl',
      1 => 1413023361,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '323975439029c2e5d14-24222247',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5439029c3aa1e',
  'variables' => 
  array (
    'breadcrumbs' => 0,
    'item' => 0,
    'title' => 0,
    'site_url' => 0,
    'backUrl' => 0,
    'sendPhone' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5439029c3aa1e')) {function content_5439029c3aa1e($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
      <div class="buttons"><a onclick="$('#form').submit();" class="button">发送</a><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/message.php<?php echo $_smarty_tpl->tpl_vars['backUrl']->value;?>
" class="button">取消</a></div>
    </div>
    
    
    
    <div class="content">
      <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/messageaction.php" method="post" enctype="multipart/form-data" id="form">
	  <input type="hidden" name="act" value="save" />
        <table class="form">
          <tr>
            <td><span class="required">*</span> 手机号码：<br /><span class="help">多个手机号请用分号隔开";"</span></td>
            <td>
          		<textarea name="phone" style="width:350px;height:100px;"><?php echo $_smarty_tpl->tpl_vars['sendPhone']->value;?>
</textarea>
              </td>
          </tr>          
          <tr>
            <td><span class="required">*</span>短信内容：</td>
            <td><textarea name="content" style="width:350px;height:100px;"></textarea>
            <p id="gptu">            
            你已输入了<var style="color: #C00">0</var>个字符，共<varsms style="color: #C00">0</varsms>条短信。</p>
            <p>
              </td>
          </tr>
        </table>
      </form>
    </div>
    
    
  </div>
</div> 
<script type="text/javascript"><!--
$('textarea[name=\'content\']').keyup(function(){
	var counter = $('textarea[name=\'content\']').val().length; //获取文本域的字符串长度
	var smscounter = Math.ceil(counter/70);
	$("#gptu var").text(counter);
	$("#gptu varsms").text(smscounter);
});
//--></script> 
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>