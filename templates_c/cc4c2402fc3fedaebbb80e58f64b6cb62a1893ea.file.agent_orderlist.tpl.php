<?php /* Smarty version Smarty-3.1.5, created on 2017-08-06 17:51:56
         compiled from "E:\www\www.rainbow.com//templates/agent\agent_orderlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:214965986e6bc9ff884-68500979%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc4c2402fc3fedaebbb80e58f64b6cb62a1893ea' => 
    array (
      0 => 'E:\\www\\www.rainbow.com//templates/agent\\agent_orderlist.tpl',
      1 => 1501128667,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '214965986e6bc9ff884-68500979',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order_pending_arr' => 0,
    'item' => 0,
    'order_complete_arr' => 0,
    'order_cancle_arr' => 0,
    'site_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5986e6bcb81f8',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5986e6bcb81f8')) {function content_5986e6bcb81f8($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="agent-public-header">
    <a href="index.html" class="return"></a>
    <div class="headline">群订单</div>
</div>
    
<div class="agent-indent">
    <ul class="agent-indent-tab">
    	<li>待处理</li>
        <li>已完成</li>
        <li>已取消</li>
    </ul>
    
    <!--待处理订单-->
    <div class="agent-indent-cont">
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['order_pending_arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
        <dl>
        	<dt><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" /></dt>
            <dd class="dd-one">
                <ul>
                    <li>房&emsp;主：<?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</li>
                    <li>手机号：<?php echo $_smarty_tpl->tpl_vars['item']->value['mobile'];?>
</li>
                    <li>充值币：<span><?php echo $_smarty_tpl->tpl_vars['item']->value['amount'];?>
个</span></li>
                    <li><?php echo $_smarty_tpl->tpl_vars['item']->value['order_time_name'];?>
：</span><?php echo $_smarty_tpl->tpl_vars['item']->value['order_time'];?>
</li>
                    <li>状&emsp;态：<span><?php echo $_smarty_tpl->tpl_vars['item']->value['status_name'];?>
</span></li>
                </ul>
            </dd>
            <dd class="dd-two">
            	<a href="#" onclick="javascript:rechargeOrder(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
,'pay');return false;">充值</a><a href="#" onclick="javascript:rechargeOrder(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
,'cancle');return false;">取消</a>
            </dd>
        </dl>
       <?php } ?> 
    </div><!--/agent-indent-cont-->
    
    
    <!--已完成订单-->
    <div class="agent-indent-cont">
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['order_complete_arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
        <dl>
        	<dt><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" /></dt>
            <dd class="dd-one">
                <ul>
                    <li>房&emsp;主：<?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</li>
                    <li>手机号：<?php echo $_smarty_tpl->tpl_vars['item']->value['mobile'];?>
</li>
                    <li>充值币：<span><?php echo $_smarty_tpl->tpl_vars['item']->value['amount'];?>
个</span></li>
                    <li><?php echo $_smarty_tpl->tpl_vars['item']->value['order_time_name'];?>
：</span><?php echo $_smarty_tpl->tpl_vars['item']->value['order_time'];?>
</li>
                    <!--<li>状&emsp;态：<span><?php echo $_smarty_tpl->tpl_vars['item']->value['status_name'];?>
</span></li>-->
                </ul>
            </dd>
            <dd class="dd-two">
            	<a href="#" class="gray">已完成</a>
            </dd>
        </dl>
       <?php } ?> 
    </div><!--/agent-indent-cont-->
    
    <!--已取消订单-->
    <div class="agent-indent-cont">
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['order_cancle_arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
        <dl>
        	<dt><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" /></dt>
            <dd class="dd-one">
                <ul>
                    <li>房&emsp;主：<?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</li>
                    <li>手机号：<?php echo $_smarty_tpl->tpl_vars['item']->value['mobile'];?>
</li>
                    <li>充值币：<span><?php echo $_smarty_tpl->tpl_vars['item']->value['amount'];?>
个</span></li>
                    <li><?php echo $_smarty_tpl->tpl_vars['item']->value['order_time_name'];?>
：</span><?php echo $_smarty_tpl->tpl_vars['item']->value['order_time'];?>
</li>
                    <!--<li>状&emsp;态：<span><?php echo $_smarty_tpl->tpl_vars['item']->value['status_name'];?>
</span></li>-->
                </ul>
            </dd>
            <dd class="dd-two">
            	<a href="#" class="gray">已取消</a>
            </dd>
        </dl>
       <?php } ?> 
    </div><!--/agent-indent-cont-->
    
    
</div><!--/agent-list-->
<script type="text/javascript">
//充值订单处理
function rechargeOrder(order_id,act_type){
	if(!order_id || !act_type){
		alert("参数错误");
		return false;
	}
	$.ajax({
		url: '<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
agent/ownerOrderAction.php',
		type: 'post',
		dataType: 'json',
		data:{"order_id":order_id,"act_type":act_type},
		beforeSend: function() {
		},
		complete: function() {
		},
		success: function(data) {
			if(data.REV == 1){
				alert(data.MSG);
				window.location.reload(); 
			}
			else{
				alert(data.MSG);
			}
		}
	});
}
</script>
</body>
</html>


<?php }} ?>