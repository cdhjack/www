<?php /* Smarty version Smarty-3.1.5, created on 2017-05-23 11:39:10
         compiled from "/data/home/byu1865080001/htdocs/admin/templates/member_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1716457611592266cb7f29a2-82427870%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '125a7cb96f2d78ddd2c08833c8715189631988d2' => 
    array (
      0 => '/data/home/byu1865080001/htdocs/admin/templates/member_list.tpl',
      1 => 1495479322,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1716457611592266cb7f29a2-82427870',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_592266cb97455',
  'variables' => 
  array (
    'breadcrumbs' => 0,
    'item' => 0,
    'title' => 0,
    'site_url' => 0,
    'filter_id' => 0,
    'filter_mobile' => 0,
    'filter_email' => 0,
    'filter_rname' => 0,
    'filter_sex' => 0,
    'filter_order_num' => 0,
    'filter_reg_start_date' => 0,
    'filter_reg_end_date' => 0,
    'filter_login_start_date' => 0,
    'filter_login_end_date' => 0,
    'filter_pass' => 0,
    'memberArr' => 0,
    'pageHtml' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592266cb97455')) {function content_592266cb97455($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
      <h1><img src="view/image/user.png" alt="" /> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
      <div class="buttons"><a onclick="doAction('pass');" class="button">启用</a><a onclick="doAction('notpass');" class="button">禁用</a><!--<a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/memberform.php" class="button">新增</a>--><a onclick="doAction('delete');" class="button">删除</a></div>
    </div>
    <div class="content">
        <table class="list">
          <thead>
            <tr>
              <td width="5%" style="text-align: center;">选择</td>
              <td class="center" width="5%">ID号</td>
              <td class="center" width="10%">头像</td>
              <td class="center" width="10%">手机号码</td>
              <td class="center" width="10%">邮箱</td>
              <td class="center" width="10%">姓名</td>
			  <!--<td class="center" width="10%">昵称</td>
			  <td class="center" width="8%">性别</td>
			  <td class="right" width="8%">消费次数</td>-->
			  <td class="center" width="15%">注册时间</td>
              <td class="center" width="15%">登录时间</td>
			  <td class="center" width="8%">状态</td>
              <td class="center">编辑</td>
            </tr>
			<tr>
		   <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/member.php" method="post" id="search">
              <td style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" title="全选"/></td>
              <td class="center"><input type="text" size="8" name="filter_id" id="filter_id" value="<?php echo $_smarty_tpl->tpl_vars['filter_id']->value;?>
"></td>
              <td></td>
			  <td class="center"><input type="text" size="11" name="filter_mobile" id="filter_mobile" value="<?php echo $_smarty_tpl->tpl_vars['filter_mobile']->value;?>
" /></td>
              <td class="center"><input type="text" size="11" name="filter_email" id="filter_email" value="<?php echo $_smarty_tpl->tpl_vars['filter_email']->value;?>
" /></td>
			  <td class="center"><input type="text" size="11" name="filter_rname" id="filter_rname" value="<?php echo $_smarty_tpl->tpl_vars['filter_rname']->value;?>
" /></td>
			  <!--<td class="center">
                <select name="filter_sex">
                <option value="">全部</option>
                <option value="1" <?php if ($_smarty_tpl->tpl_vars['filter_sex']->value=='1'){?> selected="selected"<?php }?>>男</option>
                <option value="0" <?php if ($_smarty_tpl->tpl_vars['filter_sex']->value=='0'){?> selected="selected"<?php }?>>女</option>
                </select>
              </td>
			  <td class="right">大于等于<br /><input type="text" size="11" style="text-align:right;" name="filter_order_num" id="filter_order_num" value="<?php echo $_smarty_tpl->tpl_vars['filter_order_num']->value;?>
" /></td>-->
              <td class="center">
              	<input type="text" name="filter_reg_start_date" size="15" id="filter_reg_start_date" value="<?php echo $_smarty_tpl->tpl_vars['filter_reg_start_date']->value;?>
" size="12" style="text-align:center;" class="date"/>
                <br />至<br />
              	<input type="text" name="filter_reg_end_date" size="15" id="filter_reg_end_date" value="<?php echo $_smarty_tpl->tpl_vars['filter_reg_end_date']->value;?>
" size="12" style="text-align:center;" class="date"/>
                </td>
                <td class="center">
              	<input type="text" name="filter_login_start_date" size="15" id="filter_login_start_date" value="<?php echo $_smarty_tpl->tpl_vars['filter_login_start_date']->value;?>
" size="12" style="text-align:center;" class="date"/>
                <br />至<br />
              	<input type="text" name="filter_login_end_date" size="15" id="filter_login_end_date" value="<?php echo $_smarty_tpl->tpl_vars['filter_login_end_date']->value;?>
" size="12" style="text-align:center;" class="date"/>
                </td>
              <td class="center">
			  		<select name="filter_pass">
					<option value="">全部</option>
					<option value="1" <?php if ($_smarty_tpl->tpl_vars['filter_pass']->value=='1'){?> selected="selected"<?php }?>>启用</option>
					<option value="0" <?php if ($_smarty_tpl->tpl_vars['filter_pass']->value=='0'){?> selected="selected"<?php }?>>禁用</option>
					</select>
				</td>
              <td align="center"><a onclick="$('#search').submit();" class="button">筛选</a></td>
			</form>
            </tr>
          </thead>
		  <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/memberaction.php" method="post" enctype="multipart/form-data" id="form">
          <tbody>
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['memberArr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
            <tr>
              <td style="text-align: center;"><input type="checkbox" name="selected[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" /></td>
			  <td class="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
              <td class="center"><img alt="头像" src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
"></td>
              <td class="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['mobile'];?>
</td>
              <td class="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
</td>
              <td class="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['rname'];?>
</td>
			  <!--<td class="center">
              	<?php if ($_smarty_tpl->tpl_vars['item']->value['sex']=='1'){?>男<?php }?>
              	<?php if ($_smarty_tpl->tpl_vars['item']->value['sex']=='0'){?>女<?php }?>
               </td>
			  <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['order_num'];?>
</td>-->
			  <td class="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['reg_time'];?>
</td>
              <td class="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['login_time'];?>
</td>
			  <td class="center"><?php if ($_smarty_tpl->tpl_vars['item']->value['status']=='1'){?>启用<?php }else{ ?>禁用<?php }?></td>
              <td class="center">[ <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/memberpasswordform.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">修改密码</a> ][ <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/memberpayform.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" onclick="alert('功能暂未上线');return false;">充值记录</a> ]<!--[ <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/memberform.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">信息编辑</a> ]--></td>
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
	$('#form').submit();
}
//-->
</script> 
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>