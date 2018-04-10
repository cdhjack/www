{*include file="header.tpl"*}
<div class="owner-public-header">
    <a href="index.html" class="return"></a>
    <div class="headline">我的比赛</div>
    <a href="{*$site_url*}owner/owner_match_list.php?status=2" class="ctrul">历史</a>
</div>
    
<div class="owner-event  {*if $status eq 2*}hitory-box{*/if*}">
	{*foreach from=$matchArr key=key item=item*}
	<div class="event-box">
    	<dl>
        	<dt><img src="{*$item['avatar']*}" /></dt>
            <dd>
            	<h1><a href="{*$site_url*}owner/owner_match_detail.php?matchs={*$item['matchs']*}">{*$item['nickname']*}彩红屋【{*$item['red_packet_amount']*}彩虹币】</a></h1>
                <ul>
                	<li>手机号：{*$item['mobile']*}</li>
                    <li>群人数：<span>{*$item['friend_count']*}位</span></li>
                </ul>
            </dd>
        </dl>
        <div class="event-bar">
        	<div class="event-bar-lt">
            	<div class="text">{*$item['join_match_num']*}/{*$item['red_packet_num']*}【{*$item['red_packet_amount']*}币】</div>
            	<progress class="progress1" string="12" value="{*$item['progress']*}" max="100"></progress>
            </div>
            <div class="event-bar-rt"><a href="{*$site_url*}owner/owner_match_detail.php?matchs={*$item['matchs']*}">查 看<br />游 戏</a></div>
        </div>
    </div><!--/event-box-->
    {*foreachelse*}
        暂无赛事信息
    {*/foreach*}    
</div><!--/owner-addEvent-->

<div class="event-footer">
	<a href="{*$site_url*}owner/owner_match_form.php">+添加新赛事</a>
</div><!--/event-footer-->
</body>
</html>


