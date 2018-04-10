<?php /* Smarty version Smarty-3.1.5, created on 2017-07-31 16:34:58
         compiled from "D:\www\www.rainbow.com//templates/agent\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:69955959b77f0c0453-15964379%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '982e19521e255b8c0206e990e12dec5f8633dd9f' => 
    array (
      0 => 'D:\\www\\www.rainbow.com//templates/agent\\index.tpl',
      1 => 1501490092,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '69955959b77f0c0453-15964379',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5959b77f13798',
  'variables' => 
  array (
    'site_url' => 0,
    'member_arr' => 0,
    'member_type_name_arr' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5959b77f13798')) {function content_5959b77f13798($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="agent">
    <div class="agent-header">
        <div class="agent-top">
            <div class="headline">
                <h1>代理商管理</h1><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
user/loginAction.php?isweb=2" class="quit"><i></i>退出</a>
            </div>
            
            <dl>
                <dt><img src="<?php echo $_smarty_tpl->tpl_vars['member_arr']->value['avatar'];?>
" /></dt>
                <dd class="dd-one">
                	<h1><?php echo $_smarty_tpl->tpl_vars['member_arr']->value['nickname'];?>
</h1>
                    <p>身份： <?php echo $_smarty_tpl->tpl_vars['member_type_name_arr']->value[$_smarty_tpl->tpl_vars['member_arr']->value['member_type']];?>
</p>
                </dd>
                <dd class="dd-two"><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
agent/agent_info_form.php">编辑信息</a></dd>
            </dl>   
        </div><!--/agent-top-->
        <ul>
            <li><b><?php echo $_smarty_tpl->tpl_vars['member_arr']->value['balance'];?>
</b>我的金币</li>
            <li><b><?php echo $_smarty_tpl->tpl_vars['member_arr']->value['friend_count'];?>
</b>所有房主</li>
            <li><b><?php echo $_smarty_tpl->tpl_vars['member_arr']->value['order_num'];?>
</b>充币订单</li>
        </ul>
    </div><!--/agent-header-->
    
    <div class="agent-cont">
    	<ul>
            <li><span><i></i></span><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
agent/agent_rainbow.php">我的彩红币</a></li>
            <li><span><i></i></span><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
agent/owner_list.php">所有房主</a></li>
            <li><span><i></i></span><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
agent/agent_orderlist.php">充币订单</a></li>
            <li><span><i></i></span><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
agent/agent_passwd_form.php">账号管理</a></li>
        </ul>
    </div><!--/agent-cont-->
    
    <div class="agent-footer">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
agent/agent_orderlist.php">充币订单</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
agent/owner_form.php">添加房主</a></li>
        </ul>
    </div><!--/agent-footer-->
</div>
</body>
</html>


<?php }} ?>