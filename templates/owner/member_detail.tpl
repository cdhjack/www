{*include file="header.tpl"*}
<div class="owner-public-header">
    <a href="index.html" class="return"></a>
    <div class="headline">玩家详情</div>
</div>
    
<div class="agent-show">
    <p><span>玩家名：</span><i>{*$member_arr.nickname*}</i></p>
    <p><span>手机号：</span><i>{*$member_arr.mobile*}</i></p>
    <p><span>余&nbsp;&nbsp;额：</span><i>{*$member_arr.balance*}</i></p>
    <p><span>注册时间：</span><i>{*$member_arr.reg_time|date_format:'%Y-%m-%d %H:%M:%S'*}</i></p>
    <p><span>身份证号：</span><i>{*$member_arr.identity*}</i></p>
    <p><span>手持身份证：</span></p>
    <span>
    {*if $member_arr.identity_pic neq ''*}<img src="{*$site_url*}{*$member_arr.identity_pic*}" />{*else*}暂无图片{*/if*}    
    </span>
</div><!--/agent-add-->
</body>
</html>


