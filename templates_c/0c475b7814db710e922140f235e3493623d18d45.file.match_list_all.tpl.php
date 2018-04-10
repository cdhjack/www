<?php /* Smarty version Smarty-3.1.5, created on 2017-08-17 18:04:58
         compiled from "D:\www\www.rainbow.com//templates/member\match_list_all.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1168259956a4a2a9128-84921613%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c475b7814db710e922140f235e3493623d18d45' => 
    array (
      0 => 'D:\\www\\www.rainbow.com//templates/member\\match_list_all.tpl',
      1 => 1502960298,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1168259956a4a2a9128-84921613',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'matchArr' => 0,
    'item' => 0,
    'site_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_59956a4a34888',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59956a4a34888')) {function content_59956a4a34888($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="user-public-header">
    <a href="index.html" class="return"></a>
    <div class="headline">全部游戏屋</div>
</div>
<div class="user">   
    <div class="game">
    
    
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['matchArr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
        <div class="game-box">
            <dl>
                <dt><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" /></dt>
                <dd>
                    <h1><a href="user_roomInfor.html"><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
彩红屋【<?php echo $_smarty_tpl->tpl_vars['item']->value['red_packet_amount'];?>
彩红币】</a></h1>
                    <ul>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['wx_group_qrcode'];?>
" target="_blank">微信群二维码</a></li>
                        <li>群人数：<span><?php echo $_smarty_tpl->tpl_vars['item']->value['friend_count'];?>
位</span></li>
                    </ul>
                </dd>
            </dl>
            <div class="game-bar">
                <div class="game-bar-lt">
                    <ul>
                        <li class="li1">
                            <i><?php echo $_smarty_tpl->tpl_vars['item']->value['my_balance_in_owner'];?>
</i>
                            <span>我的彩币</span>
                        </li>
                        <li class="li2">
                            <div class="progress">
                                <progress class="progress4" string="12" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['progress'];?>
" max="100"></progress>
                                <i><?php echo $_smarty_tpl->tpl_vars['item']->value['join_match_num'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['red_packet_num'];?>
</i>
                            </div>
                            <span>游戏进度</span>
                        </li>
                        <li class="li3">
                            <i><?php echo $_smarty_tpl->tpl_vars['item']->value['my_pay_amount'];?>
</i>
                            <span>我投注币</span>
                        </li>
                    </ul>
                </div>
                <div class="game-bar-rt"><a href="javascript:void(0)" class="join-game"></a></div>
            </div>
        </div><!--/game-box-->
        <?php }
if (!$_smarty_tpl->tpl_vars['item']->_loop) {
?>
            暂无赛事信息
        <?php } ?>    
    </div><!--/game-->
</div><!--/user-->
</body>
</html>


<?php }} ?>