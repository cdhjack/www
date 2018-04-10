<?php /* Smarty version Smarty-3.1.5, created on 2017-05-19 22:31:01
         compiled from "E:\www\www.yotiapp.com\trunk\admin/templates/order_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5009591f01a5edd274-63726703%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69f950373c1aae34a1958f3a563b9bd68c6f5ba0' => 
    array (
      0 => 'E:\\www\\www.yotiapp.com\\trunk\\admin/templates/order_list.tpl',
      1 => 1413963296,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5009591f01a5edd274-63726703',
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
    'filter_name' => 0,
    'filter_phone' => 0,
    'filter_cname' => 0,
    'filter_kcname' => 0,
    'filter_hour' => 0,
    'filter_perprice' => 0,
    'filter_price' => 0,
    'filter_coupon' => 0,
    'filter_rprice' => 0,
    'filter_date' => 0,
    'filter_type' => 0,
    'orderArr' => 0,
    'pageHtml' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_591f01a616259',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_591f01a616259')) {function content_591f01a616259($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
      <div class="buttons"><font style="color:#FF0000">订单状态：待服务【学员申请课程开始】；服务中【教练确认课程开始】；已完成【课程结束】</font><!--<a onclick="doAction('isshow');" class="button">启用</a><a onclick="doAction('notshow');" class="button">停用</a><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/orderform.php" class="button">新增</a><a onclick="doAction('delete');" class="button">删除</a>--></div>
    </div>
    <div class="content">
        <table class="list">
          <thead>
            <tr>
              <td width="5%" style="text-align: center;">选择</td>
              <td class="center" width="5%">ID号</td>
			  <td class="right">用户</td>
              <td class="right" width="10%">手机号</td>
			  <td class="right" width="10%">教练</td>
			  <td class="right" width="10%">课程名</td>
			  <td class="right" width="5%">时长</td>
			  <td class="right" width="5%">单价</td>
              <td class="right" width="5%">总价</td>
              <td class="right" width="5%">优惠券</td>
              <td class="right" width="5%">最终价</td>
              <td class="right" width="5%">下单时间</td>
              <td class="right" width="5%">状态</td>
              <td class="center" width="14%">编辑</td>
            </tr>
			<tr>
		   <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/order.php" method="post" id="search">
              <td style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" title="全选"/></td>
              <td><input type="text" size="8" name="filter_id" id="filter_id" value="<?php echo $_smarty_tpl->tpl_vars['filter_id']->value;?>
"></td>
			  <td class="right"><input type="text" name="filter_name" id="filter_name" value="<?php echo $_smarty_tpl->tpl_vars['filter_name']->value;?>
" size="10"/></td>
			  <td class="right"><input type="text" name="filter_phone" id="filter_phone" value="<?php echo $_smarty_tpl->tpl_vars['filter_phone']->value;?>
" size="10"/></td>
			  <td class="right"><input type="text" name="filter_cname" id="filter_cname" value="<?php echo $_smarty_tpl->tpl_vars['filter_cname']->value;?>
" size="10"/></td>
			  <td class="right"><input type="text" name="filter_kcname" id="filter_kcname" value="<?php echo $_smarty_tpl->tpl_vars['filter_kcname']->value;?>
" size="10"/></td>
			  <td class="right"><input type="text" size="8" name="filter_hour" id="filter_hour" style="text-align:right;" value="<?php echo $_smarty_tpl->tpl_vars['filter_hour']->value;?>
" /></td>
			  <td class="right"><input type="text" size="8" name="filter_perprice" id="filter_perprice" style="text-align:right;" value="<?php echo $_smarty_tpl->tpl_vars['filter_perprice']->value;?>
" /></td>
			  <td class="right"><input type="text" size="8" name="filter_price" id="filter_price" style="text-align:right;" value="<?php echo $_smarty_tpl->tpl_vars['filter_price']->value;?>
" /></td>
			  <td class="right"><input type="text" size="8" name="filter_coupon" id="filter_coupon" style="text-align:right;" value="<?php echo $_smarty_tpl->tpl_vars['filter_coupon']->value;?>
" /></td>
			  <td class="right"><input type="text" size="8" name="filter_rprice" id="filter_rprice" style="text-align:right;" value="<?php echo $_smarty_tpl->tpl_vars['filter_rprice']->value;?>
" /></td>
			  <td class="right"><input type="text" name="filter_date" id="filter_date" value="<?php echo $_smarty_tpl->tpl_vars['filter_date']->value;?>
" size="8" style="text-align:right;" class="date"/></td>
              <td class="right">
			  		<select name="filter_type">
					<option value="">全部</option>
					<option value="0" <?php if ($_smarty_tpl->tpl_vars['filter_type']->value=='0'){?> selected="selected"<?php }?>>未支付</option>
					<option value="1" <?php if ($_smarty_tpl->tpl_vars['filter_type']->value=='1'){?> selected="selected"<?php }?>>已支付</option>
					<option value="2" <?php if ($_smarty_tpl->tpl_vars['filter_type']->value=='2'){?> selected="selected"<?php }?>>待服务</option>
					<option value="3" <?php if ($_smarty_tpl->tpl_vars['filter_type']->value=='3'){?> selected="selected"<?php }?>>服务中</option>
                    
					<option value="8" <?php if ($_smarty_tpl->tpl_vars['filter_type']->value=='8'){?> selected="selected"<?php }?>>已完成</option>
					<option value="9" <?php if ($_smarty_tpl->tpl_vars['filter_type']->value=='9'){?> selected="selected"<?php }?>>已取消</option>
					<option value="10" <?php if ($_smarty_tpl->tpl_vars['filter_type']->value=='10'){?> selected="selected"<?php }?>>已删除</option>
                    </select>
				</td>
              <td align="center"><a onclick="$('#search').submit();" class="button">筛选</a></td>
			</form>
            </tr>
          </thead>
		  <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/orderaction.php" method="post" enctype="multipart/form-data" id="form">
          <tbody>
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['orderArr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
            <tr>
              <td style="text-align: center;"><input type="checkbox" name="selected[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" /></td>
			  <td class="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
              <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
              <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['phone'];?>
</td>
              <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['cname'];?>
</td>
              <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['kcname'];?>
</td>
              <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['hour'];?>
</td>
			  <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['perprice'];?>
</td>
			  <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
</td>
			  <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['coupon'];?>
</td>
			  <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['rprice'];?>
</td>
			  <td class="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['date'];?>
 <?php echo $_smarty_tpl->tpl_vars['item']->value['time'];?>
</td>
			  <td class="right">
              	<?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='0'){?>未支付<?php }?>
              	<?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='1'){?>已支付<?php }?>
              	<?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='2'){?>待服务<?php }?>
              	<?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='3'){?>服务中<?php }?>
              	<?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='8'){?>已完成<?php }?>
              	<?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='9'){?>已取消<?php }?>
              	<?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='10'){?>已删除<?php }?>
              </td>
              <td class="center"><?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='8'){?>[ <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/orderform.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">编辑评论</a> ]<?php }?><!--[ <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/ordermeta.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">聊天记录</a> ]-->
              <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='0'){?>[ <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/orderaction.php?act=cancle&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">取消</a> ]<?php }?>
              <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=='1'||$_smarty_tpl->tpl_vars['item']->value['type']=='2'||$_smarty_tpl->tpl_vars['item']->value['type']=='3'||$_smarty_tpl->tpl_vars['item']->value['type']=='8'){?>[ <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/orderrefundform.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">退款</a> ]<?php }?>
              </td>
            </tr>
			<?php }
if (!$_smarty_tpl->tpl_vars['item']->_loop) {
?>
			<tr><td colspan="15" class="left">暂无相关信息</td></tr>
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