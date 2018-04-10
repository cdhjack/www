<?php /* Smarty version Smarty-3.1.5, created on 2017-08-12 15:21:35
         compiled from "E:\www\www.rainbow.com//templates/owner\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:297815985790362b7b0-31054494%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '771e69c6fb14648053662d3970934e869b01dc13' => 
    array (
      0 => 'E:\\www\\www.rainbow.com//templates/owner\\index.tpl',
      1 => 1502522491,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '297815985790362b7b0-31054494',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5985790373cf7',
  'variables' => 
  array (
    'site_url' => 0,
    'member_arr' => 0,
    'member_type_name_arr' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5985790373cf7')) {function content_5985790373cf7($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="owner">
    <div class="owner-header">
        <div class="owner-top">
            <div class="headline">
                <h1>房主管理</h1><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
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
owner/owner_info_form.php">编辑信息</a></dd>
            </dl>  
        </div><!--/owner-top-->
        <ul>
            <li><b><?php echo $_smarty_tpl->tpl_vars['member_arr']->value['balance'];?>
</b>我的金币</li>
            <li><b><?php echo $_smarty_tpl->tpl_vars['member_arr']->value['friend_count'];?>
</b>所有玩家</li>
            <li><b><?php echo $_smarty_tpl->tpl_vars['member_arr']->value['order_num'];?>
</b>充币订单</li>
        </ul>
    </div><!--/owner-header-->
    
    <div class="owner-cont">
    	<dl>
        	<a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
owner/owner_match.php">
                <dt><img src="../images/icon012.png" /></dt>
                <dd>我的比赛</dd>
            </a>
        </dl>
        <dl>
        	<a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
owner/member_list.php">
                <dt><img src="../images/icon013.png" /></dt>
                <dd>房间成员</dd>
            </a>
        </dl>
        <dl>
        	<a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
owner/owner_invite.php?code=<?php echo $_smarty_tpl->tpl_vars['member_arr']->value['invite_code'];?>
">
                <dt><img src="../images/icon014.png" /></dt>
                <dd>邀请码</dd>
            </a>
        </dl>
        <dl>
        	<a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
owner/owner_rainbow.php">
                <dt><img src="../images/icon015.png" /></dt>
                <dd>我的彩红币</dd>
            </a>
        </dl>
        <dl>
        	<a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
owner/owner_orderlist.php">
                <dt><img src="../images/icon016.png" /></dt>
                <dd>群订单</dd>
            </a>
        </dl>
        <dl>
        	<a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
owner/owner_passwd_form.php">
                <dt><img src="../images/icon017.png" /></dt>
                <dd>帐号管理</dd>
            </a>
        </dl>
    </div>
    
    <div class="owner-footer">
        <dl>
        	<a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
owner/owner_orderlist.php">
                <dt></dt>
                <dd>最新订单</dd>
            </a>
        </dl>
        <dl class="gold">
        	<a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
owner/owner_match_form.php">
                <dt></dt>
                <dd>发起比赛</dd>
            </a>
        </dl>
        <dl>
        	<a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
owner/member_form.php">
                <dt></dt>
                <dd>添加成员</dd>
            </a>
        </dl>
    </div><!--/owner-footer-->
</div>
</body>
</html>


<?php }} ?>