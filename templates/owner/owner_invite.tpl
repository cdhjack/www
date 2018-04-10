{*include file="header.tpl"*}
<div class="owner-public-header">
    <a href="index.html" class="return"></a>
    <div class="headline">房间邀请码</div>
</div>
    
<div class="owner-invitation">
	<div class="title"><span>您的房间邀请码</span></div>

    <div class="code">
		{*foreach from=$code_arr key=key item=item*}
    	<span>{*$item*}</span>
        {*/foreach*}
    </div>
    <h1><a href="#">赶快邀请您的好友加入吧！</a></h1>
</div><!--/owner-invitation-->
</body>
</html>


