<?php /* Smarty version Smarty-3.1.5, created on 2014-10-11 11:41:36
         compiled from "D:\www\www.yoti-app.com\trunk\admin/templates/couponclass_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28659542a601b42c8c8-53409359%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2a899e8718e483da802a616fac9b1f7d55beaca' => 
    array (
      0 => 'D:\\www\\www.yoti-app.com\\trunk\\admin/templates/couponclass_form.tpl',
      1 => 1412941629,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28659542a601b42c8c8-53409359',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_542a601b6635d',
  'variables' => 
  array (
    'breadcrumbs' => 0,
    'item' => 0,
    'title' => 0,
    'site_url' => 0,
    'backUrl' => 0,
    'couponClassInfo' => 0,
    'couponClassArr' => 0,
    'couponClassNum' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542a601b6635d')) {function content_542a601b6635d($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
admin/couponclass.php<?php echo $_smarty_tpl->tpl_vars['backUrl']->value;?>
" class="button">取消</a></div>
    </div>
    
    
    
    <div class="content">
      <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/couponclassaction.php" method="post" enctype="multipart/form-data" id="form">
	  <input type="hidden" name="update_i_type" value="<?php echo $_smarty_tpl->tpl_vars['couponClassInfo']->value['i_type'];?>
" />
      <input type="hidden" name="update_idesc" value="<?php echo $_smarty_tpl->tpl_vars['couponClassInfo']->value['idesc'];?>
" />
	  <input type="hidden" name="act" value="save" />
        <table class="form">
          <tr>
            <td><span class="required">*</span> 优惠券类型：</td>
            <td>
			  		<select name="i_type" onchange="">
					<option value="">请选择</option>
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['couponClassArr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['i_type'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['i_type']==$_smarty_tpl->tpl_vars['couponClassInfo']->value['i_type']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['idesc'];?>
</option>
					<?php } ?>
                    <option value="new">以上没有需要新建类型</option>
					</select>
                    <span id="new_idesc" style="display:none;"><input type="text" value="" name="idesc"></span>
              </td>
          </tr>
          <tr>
            <td><span class="required">*</span> 优惠券名称：</td>
            <td>
          		<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['couponClassInfo']->value['name'];?>
" style="width:350px;" name="title">
              </td>
          </tr>          
          <tr>
            <td><span class="required">*</span>面额：</td>
            <td><input type="text" name="price" value="<?php echo $_smarty_tpl->tpl_vars['couponClassInfo']->value['price'];?>
" />
              </td>
          </tr>
          <tr>
            <td><span class="required">*</span>生成数量：</td>
            <td><?php if ($_smarty_tpl->tpl_vars['couponClassInfo']->value['i_type']>=0&&$_smarty_tpl->tpl_vars['couponClassNum']->value>0){?> <?php echo $_smarty_tpl->tpl_vars['couponClassNum']->value;?>
<?php }else{ ?><input type="text" name="total" value="" /><?php }?>
              </td>
          </tr>
            <tr>
              <td><span class="required">*</span> 过期日期：</td>
              <td><input type="text" name="yxq" class="date" value="<?php echo $_smarty_tpl->tpl_vars['couponClassInfo']->value['yxq'];?>
" /></td>
            </tr>
          <tr>
            <td>&nbsp;&nbsp;备注：</td>
            <td><textarea name="note" style="width:650px;height:200px;"><?php echo $_smarty_tpl->tpl_vars['couponClassInfo']->value['note'];?>
</textarea>
              </td>
          </tr>
        </table>
      </form>
    </div>
    
    
  </div>
</div> 
<script type="text/javascript"><!--
//满送或满减选择切换jack_2013-11-20
$('select[name=\'i_type\']').change(function(){
	var i_type_value = $(this).val();
	if(i_type_value=='new'){
		$("#new_idesc").show();
		$('input[name=\'idesc\']').val('');
		$('input[name=\'title\']').val('');
		$('input[name=\'title\']').attr('readonly', false);
	}
	else{
		$("#new_idesc").hide();
		$('input[name=\'idesc\']').val('');
		//获取该类型优惠券的名称
		if(i_type_value==""){			
			$('input[name=\'title\']').val('');
			$('input[name=\'title\']').attr('readonly', false);
		}
		else{
			$.ajax({
				url: '<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/ajax/coupon.php',
				type: 'post',
				dataType: 'json',
				data: 'act=getitypeinfo&i_type=' + encodeURIComponent(i_type_value),
				beforeSend: function() {
				},
				complete: function() {
				},
				success: function(data) {
					if(data.msg==1){						
						$('input[name=\'title\']').val(data.info.name);	
						$('input[name=\'title\']').attr('readonly', true);		
					}
					else{
						alert(data.info)
					}
				}
			});
		}
	}
});

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
		editor = K.create('textarea[name="note"]', {
			resizeType : 1,
			allowPreviewEmoticons : false,
			allowImageUpload : false,
			afterBlur:function(){
			   this.sync();
			},
			items : [
				'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
				'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
				'insertunorderedlist', '|', 'emoticons', 'image', 'link']
		});
	});
</script>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>