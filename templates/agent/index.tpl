{*include file="header.tpl"*}
<div class="agent">
    <div class="agent-header">
        <div class="agent-top">
            <div class="headline">
                <h1>代理商管理</h1><a href="{*$site_url*}user/loginAction.php?isweb=2" class="quit"><i></i>退出</a>
            </div>
            
            <dl>
                <dt><img src="{*$member_arr.avatar*}" /></dt>
                <dd class="dd-one">
                	<h1>{*$member_arr.nickname*}</h1>
                    <p>身份： {*$member_type_name_arr[$member_arr.member_type]*}</p>
                </dd>
                <dd class="dd-two"><a href="{*$site_url*}agent/agent_info_form.php">编辑信息</a></dd>
            </dl>   
        </div><!--/agent-top-->
        <ul>
            <li><b>{*$member_arr.balance*}</b>我的金币</li>
            <li><b>{*$member_arr.friend_count*}</b>所有房主</li>
            <li><b>{*$member_arr.order_num*}</b>充币订单</li>
        </ul>
    </div><!--/agent-header-->
    
    <div class="agent-cont">
    	<ul>
            <li><span><i></i></span><a href="{*$site_url*}agent/agent_rainbow.php">我的彩红币</a></li>
            <li><span><i></i></span><a href="{*$site_url*}agent/owner_list.php">所有房主</a></li>
            <li><span><i></i></span><a href="{*$site_url*}agent/agent_orderlist.php">充币订单</a></li>
            <li><span><i></i></span><a href="{*$site_url*}agent/agent_passwd_form.php">账号管理</a></li>
        </ul>
    </div><!--/agent-cont-->
    
    <div class="agent-footer">
        <ul>
            <li><a href="{*$site_url*}agent/agent_orderlist.php">充币订单</a></li>
            <li><a href="{*$site_url*}agent/owner_form.php">添加房主</a></li>
        </ul>
    </div><!--/agent-footer-->
</div>
</body>
</html>


