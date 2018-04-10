<?php /* Smarty version Smarty-3.1.5, created on 2014-09-23 10:35:42
         compiled from "D:\www\www.yoti-app.com\trunk\admin/templates/member_pay_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:167275420dc7eb83a09-86242834%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0847df1c546cd8096dc1357c0c563d32a589519a' => 
    array (
      0 => 'D:\\www\\www.yoti-app.com\\trunk\\admin/templates/member_pay_form.tpl',
      1 => 1411380133,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '167275420dc7eb83a09-86242834',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'breadcrumbs' => 0,
    'item' => 0,
    'memberInfo' => 0,
    'title' => 0,
    'site_url' => 0,
    'backUrl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5420dc7f02428',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5420dc7f02428')) {function content_5420dc7f02428($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style type="text/css">
#content .list td img{padding: 1px; border: 1px solid #DDDDDD; width:40px; height:40px;}
</style>
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
      <h1><img src="view/image/user.png" alt="" /> <?php echo $_smarty_tpl->tpl_vars['memberInfo']->value['rname'];?>
用户&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
      <div class="buttons"><!--<a onclick="$('#form').submit();" class="button">保存</a>--><a class="button" id="button-transaction"><span>保存</span></a><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/member.php<?php echo $_smarty_tpl->tpl_vars['backUrl']->value;?>
" class="button">返回</a></div>
    </div>
    <div class="content">
    	  <div id="tab-transaction">
          <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['memberInfo']->value['id'];?>
" />
          <input type="hidden" name="act" value="addpay" />
          <table class="form">
            <tbody><tr>
              <td>操作：</td>
                <td><input type="radio" name="optype" value="1">&nbsp;充值&nbsp;&nbsp;&nbsp;<input type="radio" name="optype" value="0">&nbsp;扣款
              </td>
            </tr>
            <tr>
              <td>金额：</td>
              <td><input type="text" value="" id="money" name="money"></td>
            </tr>
			<tr>
              <td>原因：</td>
              <td><textarea name="idesc" id="idesc" style="width:350px;height:100px;"></textarea></td>
            </tr>
            <!--<tr>
              <td style="text-align: right;" colspan="2"><a class="button" id="button-transaction"><span>保存</span></a></td>
            </tr>-->
          </tbody>
          </table>
         </div>
        <div id="transaction">
        </div>
    </div>
  </div>
</div> 
<script type="text/javascript"><!--
//判断单选按钮是否选中
function isRadio(radioName){
	var isChecked = false;
	$("input:radio[name='"+radioName+"']").each(function(index){	
		if($(this).attr("checked") == 'checked'){
			isChecked = true;
		}
	});
	return isChecked;
}
//单选按钮选中状态取消掉
function cancleRadio(radioName){
	$("input:radio[name='"+radioName+"']").each(function(index){	
		$(this).attr("checked",false);
	});
}

$('#transaction .pagination a').live('click', function() {
	$('#transaction').load(this.href);
	return false;
});			

$('#transaction').load("<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/memberpay.php?id=<?php echo $_smarty_tpl->tpl_vars['memberInfo']->value['id'];?>
");

$('#button-transaction').bind('click', function() {
	if(!isRadio('optype')){
		alert("请选择操作类型!");
		return false;
	}
	if($.trim($("#money").val())==''){
		alert("请输入金额!");
		return false;
	}
	if($.trim($("#idesc").val())==''){
		alert("请填写原因!");
		return false;
	
	}
	$.ajax({
		url: '<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/ajax/memberpay.php',
		type: 'post',
		dataType: 'json',
		data: 'act=' + encodeURIComponent($('#tab-transaction input[name=\'act\']').val()) + '&id=' + encodeURIComponent($('#tab-transaction input[name=\'id\']').val()) + '&optype=' + encodeURIComponent($('#tab-transaction input[name=\'optype\']:checked').val()) + '&money=' + encodeURIComponent($('#tab-transaction input[name=\'money\']').val())+ '&idesc=' + encodeURIComponent($('#tab-transaction textarea[name=\'idesc\']').val()),
		beforeSend: function() {
			$('.success, .warning').remove();
			$('#button-transaction').attr('disabled', true);
			$('#transaction').before('<div class="attention"><img src="view/image/loading.gif" alt="" /> 请等待！</div>');
		},
		complete: function() {
			$('#button-transaction').attr('disabled', false);
			$('.attention').remove();
		},
		success: function(data) {
			$('#transaction').load("<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/memberpay.php?id=<?php echo $_smarty_tpl->tpl_vars['memberInfo']->value['id'];?>
");
			//$('#tab-transaction input[name=\'optype\']').val('');
			cancleRadio('optype');
			$('#tab-transaction input[name=\'money\']').val('');
			$('#tab-transaction textarea[name=\'idesc\']').val('');
			//console.info(data);
			//alert(data.msg);
			if(data.msg==1){				
				$('#transaction').before('<div class="success">'+data.info+'</div>');
			}
			else{
				$('#transaction').before('<div class="warning">'+data.info+'</div>');
			}
		}
	});
});
//--></script>  
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>