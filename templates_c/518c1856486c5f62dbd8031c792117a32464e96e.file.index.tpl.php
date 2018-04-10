<?php /* Smarty version Smarty-3.1.5, created on 2017-07-31 17:46:42
         compiled from "D:\www\www.rainbow.com//templates/house\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5904597eedfba60162-82266059%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '518c1856486c5f62dbd8031c792117a32464e96e' => 
    array (
      0 => 'D:\\www\\www.rainbow.com//templates/house\\index.tpl',
      1 => 1501494394,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5904597eedfba60162-82266059',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_597eedfbb6827',
  'variables' => 
  array (
    'site_url' => 0,
    'member_arr' => 0,
    'member_type_name_arr' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_597eedfbb6827')) {function content_597eedfbb6827($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
                <dd class="dd-two"><a href="owner_infor.html">编辑信息</a></dd>
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
        	<a href="owner_event.html">
                <dt><img src="../images/icon012.png" /></dt>
                <dd>我的比赛</dd>
            </a>
        </dl>
        <dl>
        	<a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
house/member_list.php">
                <dt><img src="../images/icon013.png" /></dt>
                <dd>房间成员</dd>
            </a>
        </dl>
        <dl>
        	<a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
house/owner_invite.php?code=<?php echo $_smarty_tpl->tpl_vars['member_arr']->value['invite_code'];?>
">
                <dt><img src="../images/icon014.png" /></dt>
                <dd>邀请码</dd>
            </a>
        </dl>
        <dl>
        	<a href="owner_rainbow.html">
                <dt><img src="../images/icon015.png" /></dt>
                <dd>我的彩红币</dd>
            </a>
        </dl>
        <dl>
        	<a href="owner_indent.html">
                <dt><img src="../images/icon016.png" /></dt>
                <dd>群订单</dd>
            </a>
        </dl>
        <dl>
        	<a href="owner_apply.html">
                <dt><img src="../images/icon017.png" /></dt>
                <dd>申请代理商</dd>
            </a>
        </dl>
    </div>
    
    <div class="owner-footer">
        <dl>
        	<a href="owner_indent.html">
                <dt></dt>
                <dd>最新订单</dd>
            </a>
        </dl>
        <dl class="gold">
        	<a href="owner_addEvent.html">
                <dt></dt>
                <dd>发起比赛</dd>
            </a>
        </dl>
        <dl>
        	<a href="owner_addMember.html">
                <dt></dt>
                <dd>添加成员</dd>
            </a>
        </dl>
    </div><!--/owner-footer-->
</div>
</body>
</html>


<?php }} ?>