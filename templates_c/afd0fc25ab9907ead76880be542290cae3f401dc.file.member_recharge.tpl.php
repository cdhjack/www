<?php /* Smarty version Smarty-3.1.5, created on 2017-08-06 07:25:00
         compiled from "E:\www\www.rainbow.com//templates/owner\member_recharge.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2339859857938b14095-10900374%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'afd0fc25ab9907ead76880be542290cae3f401dc' => 
    array (
      0 => 'E:\\www\\www.rainbow.com//templates/owner\\member_recharge.tpl',
      1 => 1501975438,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2339859857938b14095-10900374',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_59857938c51f6',
  'variables' => 
  array (
    'member_arr' => 0,
    'rechargeArr' => 0,
    'item' => 0,
    'site_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59857938c51f6')) {function content_59857938c51f6($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style type="text/css">
.error {
    color: #e22;
}
</style>
<div class="owner-public-header">
    <a href="index.html" class="return"></a>
    <div class="headline">玩家充币</div>
</div>
    
<div class="owner-recharge">
    <dl class="owner-recharge-top">
    	<dt><img src="<?php echo $_smarty_tpl->tpl_vars['member_arr']->value['avatar'];?>
" /></dt>
        <dd><?php echo $_smarty_tpl->tpl_vars['member_arr']->value['nickname'];?>
</dd>
    </dl>
    
    
    <form action="#" method="post">
    	<div class="amount"><input type="text" name="amount_1" id="amount_1" placeholder="输入彩红币数量" onBlur="checkInput(this.id)"/>个</div>
        <span id="form-amount_1-error" class="error"></span>
        <div class="amount"><input type="text" name="reamount_1" id="reamount_1" placeholder="确认输入彩红币数量" onBlur="checkInput(this.id)"/>个</div>
        <span id="form-reamount_1-error" class="error"></span>
        <input type="hidden" name="member_id" id="member_id" value="<?php echo $_smarty_tpl->tpl_vars['member_arr']->value['member_id'];?>
" />
        <input type="button" value="确认充币" class="btn" id="button-regcharge-1"/>
    </form>
    
    <div class="owner-recharge-recoder">
    	<div class="title"><span>上次充币记录</span></div>
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rechargeArr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
        <dl>
        	<dt><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" /></dt>
            <dd>
            	<ul>
                	<li><span>玩&emsp;&emsp;家：</span><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</li>
                    <li><span>手&emsp;&emsp;机：</span><?php echo $_smarty_tpl->tpl_vars['item']->value['mobile'];?>
</li>
                    <li><span>充币数量：</span><?php echo $_smarty_tpl->tpl_vars['item']->value['amount'];?>
个彩虹币</li>
                    <li><span>状&emsp;&emsp;态：</span><i><?php echo $_smarty_tpl->tpl_vars['item']->value['status_name'];?>
</i></li>
                    <li><span><?php echo $_smarty_tpl->tpl_vars['item']->value['order_time_name'];?>
：</span><?php echo $_smarty_tpl->tpl_vars['item']->value['order_time'];?>
</li>
                </ul>
            </dd>
        </dl>
        <?php } ?>
    </div>
    
</div><!--/owner-recharge-->
<script type="text/javascript">
//各个输入框js验证
function checkInput(id){
	var obj = $('#'+id);
	var error_obj = $('#form-'+id+'-error');
	switch(id){		
		case 'amount_1':
			if(obj.val()==''){				
				error_obj.html('请输入彩红币数量');
				return false;
			}
			else if(isNaN(obj.val())){
				error_obj.html('彩虹币必须为数字');
				return false;
			}
			else if(obj.val()<=0){
				error_obj.html('彩虹币数量必须大于0');
				return false;
			}
			else{
				error_obj.html('');
				return true;
			}			
			break;
		case 'reamount_1':
			if(obj.val()==''){				
				error_obj.html('请输入确认彩红币数量');
				return false;
			}
			else if(obj.val()!==$('#amount_1').val()){
				error_obj.html('两次输入的彩红币数量不一致');
				return false;
			}
			else{
				error_obj.html('');
				return true;
			}		
			break;
		default:
			return true;
			break;	
	}
}
function checkButtonRechargeForm(){
	var flag = 0;
	if(!checkInput('amount_1')){
		flag = flag + 1;
	}
	if(!checkInput('reamount_1')){
		flag = flag + 1;
	}
	if(flag > 0){
		return false;
	}
	return true;
}
//房主充值
$('#button-regcharge-1').bind('click', function() {
	if(!checkButtonRechargeForm()){
		return false;
	}
	var member_id_value = $('#member_id').val();
	var amount_1_value = $('#amount_1').val();
	$.ajax({
		url: '<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
owner/memberRechargeAction.php',
		type: 'post',
		dataType: 'json',
		data:{"member_id":member_id_value,
		"amount_1":amount_1_value
		},
		beforeSend: function() {
			$('#button-regcharge-1').attr('disabled', true);
			//$('#button-regcharge-1').before('<div class="attention"><img src="view/image/loading.gif" alt="" /> 请等待！</div>');
		},
		complete: function() {
			$('#button-regcharge-1').attr('disabled', false);
		},
		success: function(data) {
			if(data.REV == 1){
				alert(data.MSG);
				window.location.reload(); 
			}
			else{
				$('#form-'+data.INPUTID+'-error').html(data.MSG);
			}
		}
	});
});
</script>
</body>
</html>


<?php }} ?>