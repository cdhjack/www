{*include file="header.tpl"*}
<div class="owner-public-header">
    <a href="index.html" class="return"></a>
    <div class="headline">群成员</div>
</div>
    
<div class="owner-list">
    <div class="owner-list-search">
    <form action="{*$site_url*}owner/member_list.php" method="post" id="search">
    	<input type="text" class="text" id="filter_search_name" name="filter_search_name" placeholder="请输入手机号、房主名" value="{*$filter_search_name*}"/>
        <input type="button" class="btn" id="button-search-1" onClick="javacript:$('#search').submit();"/>
    </form>
    </div>
    
    <div class="owner-list-cont">
		{*foreach from=$memberArr key=key item=item*}
        <dl>
        	<dt><img src="{*$item['avatar']*}" /></dt>
            <dd class="dd-one">
            	<h1>{*$item['nickname']*}</h1>
                <p>手机号：{*$item['mobile']*}</p>
            </dd>
            <dd class="dd-two">
            	<a href="{*$site_url*}owner/member_detail.php?members={*$item['member_detail']*}">详情</a>
                <a href="{*$site_url*}owner/member_recharge.php?members={*$item['member_recharge']*}">充值</a>
            </dd>
        </dl>
        {*foreachelse*}
            暂无会员信息
        {*/foreach*}
    </div>
</div><!--/owner-list-->
</body>
</html>


