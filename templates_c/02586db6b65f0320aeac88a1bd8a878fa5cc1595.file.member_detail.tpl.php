<?php /* Smarty version Smarty-3.1.5, created on 2017-08-07 22:09:34
         compiled from "E:\www\www.rainbow.com//templates/owner\member_detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29513598873be687df9-08704159%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '02586db6b65f0320aeac88a1bd8a878fa5cc1595' => 
    array (
      0 => 'E:\\www\\www.rainbow.com//templates/owner\\member_detail.tpl',
      1 => 1502114938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29513598873be687df9-08704159',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_598873be7055d',
  'variables' => 
  array (
    'member_arr' => 0,
    'site_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_598873be7055d')) {function content_598873be7055d($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\www\\www.rainbow.com\\class\\Smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="owner-public-header">
    <a href="index.html" class="return"></a>
    <div class="headline">玩家详情</div>
</div>
    
<div class="agent-show">
    <p><span>玩家名：</span><i><?php echo $_smarty_tpl->tpl_vars['member_arr']->value['nickname'];?>
</i></p>
    <p><span>手机号：</span><i><?php echo $_smarty_tpl->tpl_vars['member_arr']->value['mobile'];?>
</i></p>
    <p><span>余&nbsp;&nbsp;额：</span><i><?php echo $_smarty_tpl->tpl_vars['member_arr']->value['balance'];?>
</i></p>
    <p><span>注册时间：</span><i><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['member_arr']->value['reg_time'],'%Y-%m-%d %H:%M:%S');?>
</i></p>
    <p><span>身份证号：</span><i><?php echo $_smarty_tpl->tpl_vars['member_arr']->value['identity'];?>
</i></p>
    <p><span>手持身份证：</span></p>
    <span>
    <?php if ($_smarty_tpl->tpl_vars['member_arr']->value['identity_pic']!=''){?><img src="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['member_arr']->value['identity_pic'];?>
" /><?php }else{ ?>暂无图片<?php }?>    
    </span>
</div><!--/agent-add-->
</body>
</html>


<?php }} ?>