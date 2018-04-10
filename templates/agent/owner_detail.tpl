{*include file="header.tpl"*}
<div class="agent-public-header">
    <a href="index.html" class="return"></a>
    <div class="headline">房主详情</div>
</div>
    
<div class="agent-show">
    <p><span>房主名：</span><i>{*$owner_arr.nickname*}</i></p>
    <p><span>手机号：</span><i>{*$owner_arr.mobile*}</i></p>
    <p><span>余&nbsp;&nbsp;额：</span><i>{*$owner_arr.balance*}</i></p>
    <p><span>玩家数：</span><i>{*$owner_arr.friend_count*}</i></p>
    <p><span>注册时间：</span><i>{*$owner_arr.reg_time|date_format:'%Y-%m-%d %H:%M:%S'*}</i></p>
    <p><span>身份证号：</span><i>{*$owner_arr.identity*}</i></p>
    <p><span>手持身份证：</span></p>
    <span>
    {*if $owner_arr.identity_pic neq ''*}<img src="{*$site_url*}{*$owner_arr.identity_pic*}" />{*else*}暂无图片{*/if*}    
    </span>
</div><!--/agent-add-->
</body>
</html>


