<?php /* Smarty version Smarty-3.1.5, created on 2017-08-17 17:58:00
         compiled from "D:\www\www.rainbow.com//templates/member\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5502599293b10856e2-34735743%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9506e8d5f3676c03f8bce6d48401655e6dfd787' => 
    array (
      0 => 'D:\\www\\www.rainbow.com//templates/member\\index.tpl',
      1 => 1502963865,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5502599293b10856e2-34735743',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_599293b115ced',
  'variables' => 
  array (
    'member_arr' => 0,
    'site_url' => 0,
    'matchArr' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_599293b115ced')) {function content_599293b115ced($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="user-header">
    <div class="user-top">
        <div class="headline">我的信息</div>
        <a href="user_rule.html" class="ctrul">游戏规则</a>
    </div>
    
    <div class="user-btm">
        <div class="user-btm-lt">
            <i><?php echo $_smarty_tpl->tpl_vars['member_arr']->value['balance'];?>
</i>
            <span>全部彩币</span>
        </div>
        <div class="user-btm-ct"><a href="room2.html"><img src="../images/icon040.png" /></a></div>
        <div class="user-btm-rt">
            <div class="progress">
                <progress class="progress3" string="12" value="80" max="100"></progress>
                <i>156/200</i>
            </div>
            <span>游戏进度</span>
        </div>
    </div>
</div><!--/user-header-->
<div class="user">   
    <div class="game">
    	<div class="game-headline">
        	<span><img src="../images/icon035.png" /></span>
            <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
member/match_list_all.php">+更多</a>
        </div><!--/game-headline-->
      
      
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
        <!--/game-box-->
 
    </div><!--/game-->
    
    <div class="user-footer-two">
    	<dl class="one">
        	<a href="result.html">
                <dt></dt>
                <dd>开奖</dd>
            </a>
        </dl>
        <dl class="two">
        	<a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
member/match_list_all.php">
                <dt></dt>
                <dd>彩红屋</dd>
            </a>
        </dl>
        <dl class="three">
        	<a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
member/match_list_join.php">
                <dt></dt>
                <dd>投注</dd>
            </a>
        </dl>
        <dl class="five">
        	<a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
member/member_info_form.php">
                <dt></dt>
                <dd>我的</dd>
            </a>
        </dl>
        <dl class="fore add">
        	<a href="#">
                <dt></dt>
                <dd>添加</dd>
            </a>
        </dl>
    </div><!--/user-footer-->
</div><!--/user-->

<div class="room-invitation">
	<span class="room-close"></span>
	<form action="#" method="post">
    	<h1>请输入六位房间邀请码</h1>
        <div class="numeber">
        	<input type="text" />
            <input type="text" />
            <input type="text" />
            <input type="text" />
            <input type="text" />
            <input type="text" />
        </div><!--/numeber-->
        <input type="button" class="btn" value="确认加入" onClick="room2.html" />
    </form>
</div><!--/room-invitation-->

<div class="room-invitation-add">
	<span class="room-close-add"></span>
	<form action="#" method="post">
    	<h1>请输入六位房间邀请码</h1>
        <div class="numeber">
        	<input type="text" />
            <input type="text" />
            <input type="text" />
            <input type="text" />
            <input type="text" />
            <input type="text" />
        </div><!--/numeber-->
        <input type="button" class="btn" value="确认加入" onClick="room2.html" />
    </form>
</div><!--/room-invitation-->
</body>
</html>


<?php }} ?>