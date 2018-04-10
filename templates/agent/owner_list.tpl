{*include file="header.tpl"*}
<div class="agent-public-header">
    <a href="index.html" class="return"></a>
    <div class="headline">我的房主</div>
</div>
    
<div class="agent-list">
    
    <div class="agent-list-search">
    <form action="{*$site_url*}agent/owner_list.php" method="post" id="search">
    	<input type="text" class="text" id="filter_search_name" name="filter_search_name" placeholder="请输入手机号、房主名" value="{*$filter_search_name*}"/>
        <input type="button" class="btn" id="button-search-1" onClick="javacript:$('#search').submit();"/>
    </form>
    </div>
    
    <div class="agent-list-cont">
		{*foreach from=$memberArr key=key item=item*}
        <dl>
        	<dt><img src="{*$item['avatar']*}" /></dt>
            <dd class="dd-one">
            	<h1>{*$item['nickname']*}</h1>
                <ul>
                	<li>手机号：{*$item['mobile']*}</li>
                    <li>彩虹币：{*$item['balance']*}</li>
                </ul>
            </dd>
            <dd class="dd-two">
            	<a href="{*$site_url*}agent/owner_detail.php?owners={*$item['owner_detail']*}">详情</a>
                <a href="{*$site_url*}agent/owner_recharge.php?owners={*$item['owner_recharge']*}">充值</a>
            </dd>
        </dl>
        {*foreachelse*}
            暂无房主信息
        {*/foreach*}
    </div>
</div><!--/agent-list-->
</body>
</html>


