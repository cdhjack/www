<?php /* Smarty version Smarty-3.1.5, created on 2017-08-15 14:05:36
         compiled from "D:\www\www.rainbow.com//templates/owner\owner_match_detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:80365991528c146195-60891790%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e8588d17b7898deca95e72596d218a0e804698f' => 
    array (
      0 => 'D:\\www\\www.rainbow.com//templates/owner\\owner_match_detail.tpl',
      1 => 1502777130,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '80365991528c146195-60891790',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5991528c3c87b',
  'variables' => 
  array (
    'match_arr' => 0,
    'member_pay_amount' => 0,
    'match_member_arr' => 0,
    'item' => 0,
    'match_nomember_arr' => 0,
    'match_member_result_arr' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5991528c3c87b')) {function content_5991528c3c87b($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="user-header-two">
	<div class="user-box">
        <div class="user-top">
            <a href="index.html" class="return"></a>
            <div class="headline"><?php echo $_smarty_tpl->tpl_vars['match_arr']->value['nickname'];?>
彩红屋</div>
            <!--<a href="user_convert.html" class="ctrul">彩币兑换</a>-->
        </div>
        
        <div class="red-packet">
        	<span><i><?php echo $_smarty_tpl->tpl_vars['match_arr']->value['red_packet_amount'];?>
</i>彩红包</span>
        </div><!--/red-packet-->
        
        <div class="progressBar">
        	<progress class="progress5" string="12" value="<?php echo $_smarty_tpl->tpl_vars['match_arr']->value['progress'];?>
" max="100"></progress>
            <i><?php echo $_smarty_tpl->tpl_vars['match_arr']->value['join_match_num'];?>
/<?php echo $_smarty_tpl->tpl_vars['match_arr']->value['red_packet_num'];?>
</i>
        </div>
        
        
    </div><!--/user-box-->
    
    <div class="user-btm-two">
        <dl>
        	<dt></dt>
            <dd>
            	<b><?php echo $_smarty_tpl->tpl_vars['match_arr']->value['owner_pay_amount'];?>
</b>
                <span>我消耗彩币</span>
            </dd>
        </dl>
        <dl>
        	<dt></dt>
            <dd>
            	<b><?php echo $_smarty_tpl->tpl_vars['member_pay_amount']->value;?>
</b>
                <span>玩家投注彩币</span>
            </dd>
        </dl>
    </div>
</div><!--/user-header-two-->

<div class="room">
	<ul class="room-tab room-tab-two">
    	<li class="room-crt">彩虹包</li>
        <li>参赛结果</li>
    </ul>
    
    <div class="room-content">
    	<span class="star-top"></span>
        <span class="star-bottom"></span>
        
    	<div class="room-content-in">
            <!--彩红包-->
            <div class="room-box redBag">
            	<ul>                
                	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['match_member_arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                	<li <?php echo $_smarty_tpl->tpl_vars['item']->value['style'];?>
>
                        <dl class="dl-two">
                        	<dt><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" /></dt>
                            <dd><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</dd>
                        </dl>
                    </li>
                    <?php } ?>                    
                	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['match_nomember_arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                    <li <?php echo $_smarty_tpl->tpl_vars['item']->value;?>
>
                    	<dl class="dl-one">
                        	<dt>彩</dt>
                        </dl>
                    </li>
                    <?php } ?> 
                    
                    <!--<li class="margin0">
                    	<dl class="dl-one">
                        	<dt>彩</dt>
                        </dl>
                        <dl class="dl-two">
                        	<dt><img src="../images/img010.jpg" /></dt>
                            <dd>我的生活</dd>
                        </dl>
                        
                        <div class="room-bag">
                            <span class="room-close2"></span>
                            <form action="#" method="post">
                                <p>本次参赛需消耗</p>
                                <h1>100个彩虹币</h1>
                                <p>当前剩余：15000个</p>
                                <input type="button" class="btn bagBtn" value="确认参赛" />
                            </form>
                        </div><!--/room-invitation
                    </li>
                    
                    <li>
                    	<dl class="dl-one">
                        	<dt>彩</dt>
                        </dl>
                        <dl class="dl-two">
                        	<dt><img src="../images/img010.jpg" /></dt>
                            <dd>我的生活</dd>
                        </dl>
                        
                        <div class="room-bag">
                            <span class="room-close2"></span>
                            <form action="#" method="post">
                                <p>本次参赛需消耗</p>
                                <h1>100个彩虹币</h1>
                                <p>当前剩余：15000个</p>
                                <input type="button" class="btn bagBtn" value="确认参赛" />
                            </form>
                        </div><!--/room-invitation
                    </li>-->
                    
                    
                    
                </ul>
            </div><!--/room-box-->
            
            
             <!--参赛结果-->
            <div class="room-box result">
            	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['match_member_result_arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
            	<dl>
                	<dt><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" /></dt>
                    <dd class="dd-one">
                    	<h1><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</h1>
                        <p>手机：<?php echo $_smarty_tpl->tpl_vars['item']->value['mobile'];?>
</p>
                    </dd>
                    <dd class="dd-two">获得：<?php echo $_smarty_tpl->tpl_vars['item']->value['win_amount'];?>
彩红币</dd>
                </dl>
                <?php }
if (!$_smarty_tpl->tpl_vars['item']->_loop) {
?>
                    暂无赛事结果
                <?php } ?>
            </div><!--/room-box-->
            
            <!--我的彩包-->
            <!--<div class="room-box my-redBag redBag">
            	<h1 class="title">本次获得500彩红币</h1>
                <ul>
                	<li class="margin0">
                    	<dl class="dl-one">
                        	<dt>彩</dt>
                        </dl>
                        <dl class="dl-two">
                        	<dt><img src="../images/img010.jpg" /></dt>
                            <dd>我的生活</dd>
                        </dl>
                        
                        <div class="room-bag">
                            <span class="room-close2"></span>
                            <form action="#" method="post">
                                <p>本次参赛需消耗</p>
                                <h1>100个彩虹币</h1>
                                <p>当前剩余：15000个</p>
                                <input type="button" class="btn bagBtn" value="确认参赛" />
                            </form>
                        </div><!--/room-invitation
                    </li>
                    
                    <li>
                    	<dl class="dl-one">
                        	<dt>彩</dt>
                        </dl>
                        <dl class="dl-two">
                        	<dt><img src="../images/img010.jpg" /></dt>
                            <dd>我的生活</dd>
                        </dl>
                        
                        <div class="room-bag">
                            <span class="room-close2"></span>
                            <form action="#" method="post">
                                <p>本次参赛需消耗</p>
                                <h1>100个彩虹币</h1>
                                <p>当前剩余：15000个</p>
                                <input type="button" class="btn bagBtn" value="确认参赛" />
                            </form>
                        </div><!--/room-invitation
                    </li>
                    
                    <li>
                    	<dl class="dl-one">
                        	<dt>彩</dt>
                        </dl>
                        <dl class="dl-two">
                        	<dt><img src="../images/img010.jpg" /></dt>
                            <dd>我的生活</dd>
                        </dl>
                        
                        <div class="room-bag">
                            <span class="room-close2"></span>
                            <form action="#" method="post">
                                <p>本次参赛需消耗</p>
                                <h1>100个彩虹币</h1>
                                <p>当前剩余：15000个</p>
                                <input type="button" class="btn bagBtn" value="确认参赛" />
                            </form>
                        </div><!--/room-invitation
                    </li>
                    
                    <li>
                    	<dl class="dl-one">
                        	<dt>彩</dt>
                        </dl>
                        <dl class="dl-two">
                        	<dt><img src="../images/img010.jpg" /></dt>
                            <dd>我的生活</dd>
                        </dl>
                        
                        <div class="room-bag">
                            <span class="room-close2"></span>
                            <form action="#" method="post">
                                <p>本次参赛需消耗</p>
                                <h1>100个彩虹币</h1>
                                <p>当前剩余：15000个</p>
                                <input type="button" class="btn bagBtn" value="确认参赛" />
                            </form>
                        </div><!--/room-invitation
                    </li>
                    
                    <li>
                    	<dl class="dl-one">
                        	<dt>彩</dt>
                        </dl>
                        <dl class="dl-two">
                        	<dt><img src="../images/img010.jpg" /></dt>
                            <dd>我的生活</dd>
                        </dl>
                        
                        <div class="room-bag">
                            <span class="room-close2"></span>
                            <form action="#" method="post">
                                <p>本次参赛需消耗</p>
                                <h1>100个彩虹币</h1>
                                <p>当前剩余：15000个</p>
                                <input type="button" class="btn bagBtn" value="确认参赛" />
                            </form>
                        </div><!--/room-invitation
                    </li>
                    
                    
                    <li class="margin0">
                    	<dl class="dl-one">
                        	<dt>彩</dt>
                        </dl>
                        <dl class="dl-two">
                        	<dt><img src="../images/img010.jpg" /></dt>
                            <dd>我的生活</dd>
                        </dl>
                        
                        <div class="room-bag">
                            <span class="room-close2"></span>
                            <form action="#" method="post">
                                <p>本次参赛需消耗</p>
                                <h1>100个彩虹币</h1>
                                <p>当前剩余：15000个</p>
                                <input type="button" class="btn bagBtn" value="确认参赛" />
                            </form>
                        </div><!--/room-invitation
                    </li>
                    
                    <li>
                    	<dl class="dl-one">
                        	<dt>彩</dt>
                        </dl>
                        <dl class="dl-two">
                        	<dt><img src="../images/img010.jpg" /></dt>
                            <dd>我的生活</dd>
                        </dl>
                        
                        <div class="room-bag">
                            <span class="room-close2"></span>
                            <form action="#" method="post">
                                <p>本次参赛需消耗</p>
                                <h1>100个彩虹币</h1>
                                <p>当前剩余：15000个</p>
                                <input type="button" class="btn bagBtn" value="确认参赛" />
                            </form>
                        </div><!--/room-invitation
                    </li>
                    
                    <li>
                    	<dl class="dl-one">
                        	<dt>彩</dt>
                        </dl>
                        <dl class="dl-two">
                        	<dt><img src="../images/img010.jpg" /></dt>
                            <dd>我的生活</dd>
                        </dl>
                        
                        <div class="room-bag">
                            <span class="room-close2"></span>
                            <form action="#" method="post">
                                <p>本次参赛需消耗</p>
                                <h1>100个彩虹币</h1>
                                <p>当前剩余：15000个</p>
                                <input type="button" class="btn bagBtn" value="确认参赛" />
                            </form>
                        </div><!--/room-invitation
                    </li>
                 </ul>   
            </div><!--/room-box-->
            
            
        </div>
    </div><!--/room-content-->
    
</div><!--/room-->
</body>
</html>


<?php }} ?>