{*include file="header.tpl"*}
<div class="user-header-two">
	<div class="user-box">
        <div class="user-top">
            <a href="index.html" class="return"></a>
            <div class="headline">{*$match_arr.nickname*}彩红屋</div>
            <!--<a href="user_convert.html" class="ctrul">彩币兑换</a>-->
        </div>
        
        <div class="red-packet">
        	<span><i>{*$match_arr.red_packet_amount*}</i>彩红包</span>
        </div><!--/red-packet-->
        
        <div class="progressBar">
        	<progress class="progress5" string="12" value="{*$match_arr.progress*}" max="100"></progress>
            <i>{*$match_arr.join_match_num*}/{*$match_arr.red_packet_num*}</i>
        </div>
        
        
    </div><!--/user-box-->
    
    <div class="user-btm-two">
        <dl>
        	<dt></dt>
            <dd>
            	<b>{*$match_arr.owner_pay_amount*}</b>
                <span>我消耗彩币</span>
            </dd>
        </dl>
        <dl>
        	<dt></dt>
            <dd>
            	<b>{*$member_pay_amount*}</b>
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
                	{*foreach from=$match_member_arr key=key item=item*}
                	<li {*$item['style']*}>
                        <dl class="dl-two">
                        	<dt><img src="{*$item['avatar']*}" /></dt>
                            <dd>{*$item['nickname']*}</dd>
                        </dl>
                    </li>
                    {*/foreach*}                    
                	{*foreach from=$match_nomember_arr key=key item=item*}
                    <li {*$item*}>
                    	<dl class="dl-one">
                        	<dt>彩</dt>
                        </dl>
                    </li>
                    {*/foreach*} 
                    
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
            	{*foreach from=$match_member_result_arr key=key item=item*}
            	<dl>
                	<dt><img src="{*$item['avatar']*}" /></dt>
                    <dd class="dd-one">
                    	<h1>{*$item['nickname']*}</h1>
                        <p>手机：{*$item['mobile']*}</p>
                    </dd>
                    <dd class="dd-two">获得：{*$item['win_amount']*}彩红币</dd>
                </dl>
                {*foreachelse*}
                    暂无赛事结果
                {*/foreach*}
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


