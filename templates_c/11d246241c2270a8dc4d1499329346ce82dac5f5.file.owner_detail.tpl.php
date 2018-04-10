<?php /* Smarty version Smarty-3.1.5, created on 2017-08-07 21:46:07
         compiled from "E:\www\www.rainbow.com//templates/agent\owner_detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1300159886f1f4fcc83-61553270%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '11d246241c2270a8dc4d1499329346ce82dac5f5' => 
    array (
      0 => 'E:\\www\\www.rainbow.com//templates/agent\\owner_detail.tpl',
      1 => 1501490454,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1300159886f1f4fcc83-61553270',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'owner_arr' => 0,
    'site_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_59886f1fa9663',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59886f1fa9663')) {function content_59886f1fa9663($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="agent-public-header">
    <a href="index.html" class="return"></a>
    <div class="headline">详情</div>
</div>
    
<div class="agent-show">
    <p><span>用户名：</span><i><?php echo $_smarty_tpl->tpl_vars['owner_arr']->value['nickname'];?>
</i></p>
    <p><span>手机号：</span><i><?php echo $_smarty_tpl->tpl_vars['owner_arr']->value['mobile'];?>
</i></p>
    <p><span>余&nbsp;&nbsp;额：</span><i><?php echo $_smarty_tpl->tpl_vars['owner_arr']->value['balance'];?>
</i></p>
    <p><span>玩家数：</span><i><?php echo $_smarty_tpl->tpl_vars['owner_arr']->value['friend_count'];?>
</i></p>
    <p><span>注册时间：</span><i><?php echo $_smarty_tpl->tpl_vars['owner_arr']->value['reg_time'];?>
</i></p>
    <p><span>身份证号：</span><i><?php echo $_smarty_tpl->tpl_vars['owner_arr']->value['identity'];?>
</i></p>
    <p><span>手持身份证：</span></p>
    <span>
    <?php if ($_smarty_tpl->tpl_vars['owner_arr']->value['identity_pic']!=''){?><img src="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['owner_arr']->value['identity_pic'];?>
" /><?php }else{ ?>暂无图片<?php }?>    
    </span>
</div><!--/agent-add-->
</body>
</html>


<?php }} ?>