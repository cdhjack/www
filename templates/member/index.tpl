{*include file="header.tpl"*}
<div class="user-header">
    <div class="user-top">
        <div class="headline">我的信息</div>
        <a href="user_rule.html" class="ctrul">游戏规则</a>
    </div>
    
    <div class="user-btm">
        <div class="user-btm-lt">
            <i>{*$member_arr.balance*}</i>
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
            <a href="{*$site_url*}member/match_list_all.php">+更多</a>
        </div><!--/game-headline-->
      
      
        {*foreach from=$matchArr key=key item=item*}
        <div class="game-box">
            <dl>
                <dt><img src="{*$item['avatar']*}" /></dt>
                <dd>
                    <h1><a href="user_roomInfor.html">{*$item['nickname']*}彩红屋【{*$item['red_packet_amount']*}彩红币】</a></h1>
                    <ul>
                        <li><a href="{*$site_url*}{*$item['wx_group_qrcode']*}" target="_blank">微信群二维码</a></li>
                        <li>群人数：<span>{*$item['friend_count']*}位</span></li>
                    </ul>
                </dd>
            </dl>
            <div class="game-bar">
                <div class="game-bar-lt">
                    <ul>
                        <li class="li1">
                            <i>{*$item['my_balance_in_owner']*}</i>
                            <span>我的彩币</span>
                        </li>
                        <li class="li2">
                            <div class="progress">
                                <progress class="progress4" string="12" value="{*$item['progress']*}" max="100"></progress>
                                <i>{*$item['join_match_num']*}/{*$item['red_packet_num']*}</i>
                            </div>
                            <span>游戏进度</span>
                        </li>
                        <li class="li3">
                            <i>{*$item['my_pay_amount']*}</i>
                            <span>我投注币</span>
                        </li>
                    </ul>
                </div>
                <div class="game-bar-rt"><a href="javascript:void(0)" class="join-game"></a></div>
            </div>
        </div><!--/game-box-->
        {*foreachelse*}
            暂无赛事信息
        {*/foreach*}    
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
        	<a href="{*$site_url*}member/match_list_all.php">
                <dt></dt>
                <dd>彩红屋</dd>
            </a>
        </dl>
        <dl class="three">
        	<a href="{*$site_url*}member/match_list_join.php">
                <dt></dt>
                <dd>投注</dd>
            </a>
        </dl>
        <dl class="five">
        	<a href="{*$site_url*}member/member_info_form.php">
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


