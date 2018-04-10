<?php /* Smarty version Smarty-3.1.5, created on 2014-10-10 17:09:06
         compiled from "D:\www\www.yoti-app.com\trunk\admin/templates/marketsms_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5797543664ad7267d7-26353723%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '132087551b4d4b9aa8afe63c85bce7bdddbb48bd' => 
    array (
      0 => 'D:\\www\\www.yoti-app.com\\trunk\\admin/templates/marketsms_form.tpl',
      1 => 1412932142,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5797543664ad7267d7-26353723',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_543664ad8260d',
  'variables' => 
  array (
    'breadcrumbs' => 0,
    'item' => 0,
    'title' => 0,
    'site_url' => 0,
    'backUrl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_543664ad8260d')) {function content_543664ad8260d($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
admin/marketsms.php<?php echo $_smarty_tpl->tpl_vars['backUrl']->value;?>
" class="button">取消</a></div>
    </div>
    
    
    
    <div class="content">
      <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/marketsmsaction.php" method="post" enctype="multipart/form-data" id="form">
	  <input type="hidden" name="act" value="save" />
        <table class="form">
          <tr>
            <td><span class="required">*</span> 用户类型：</td>
            <td>
			  		<select name="user_type" onchange="">
					<option value="">请选择</option>
                    <option value="user">个人用户</option>
                    <option value="coach">教练用户</option>
                    <option value="all">所有用户</option>
                    <option value="new">输入手机号码</option>
					</select>
              </td>
          </tr>
          <tr id="new_phone" style="display:none;">
            <td><span class="required">*</span> 手机号码：<br /><span class="help">多个手机号请用分号隔开";"</span></td>
            <td>
          		<textarea name="phone" style="width:350px;height:100px;"></textarea>
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


$('select[name=\'user_type\']').change(function(){
	var user_type_value = $(this).val();	
	if(user_type_value=='new'){		
		$('textarea[name=\'phone\']').val('');
		$('textarea[name=\'phone\']').attr('readonly', false);
		$("#new_phone").show();
	}
	else{		
		$('textarea[name=\'phone\']').attr('readonly', true);
		$("#new_phone").hide();
	}
});

$(document).ready(function() {
	$('.date').datepicker({dateFormat: 'yy-mm-dd'});
});
//--></script> 
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>