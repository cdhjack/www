{*include file="header.tpl"*}
<div class="user-public-header">
    <a href="index.html" class="return"></a>
    <div class="headline">全部游戏屋</div>
</div>
<div class="user">   
    <div class="game">
    
    
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
    </div><!--/game-->
</div><!--/user-->
</body>
</html>


