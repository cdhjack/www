{*include file="header.tpl"*}
<div class="owner">
    <div class="owner-header">
        <div class="owner-top">
            <div class="headline">
                <h1>房主管理</h1><a href="{*$site_url*}user/loginAction.php?isweb=2" class="quit"><i></i>退出</a>
            </div>
            
            <dl>
                <dt><img src="{*$member_arr.avatar*}" /></dt>
                <dd class="dd-one">
                	<h1>{*$member_arr.nickname*}</h1>
                    <p>身份： {*$member_type_name_arr[$member_arr.member_type]*}</p>
                </dd>
                <dd class="dd-two"><a href="{*$site_url*}owner/owner_info_form.php">编辑信息</a></dd>
            </dl>  
        </div><!--/owner-top-->
        <ul>
            <li><b>{*$member_arr.balance*}</b>我的金币</li>
            <li><b>{*$member_arr.friend_count*}</b>所有玩家</li>
            <li><b>{*$member_arr.order_num*}</b>充币订单</li>
        </ul>
    </div><!--/owner-header-->
    
    <div class="owner-cont">
    	<dl>
        	<a href="{*$site_url*}owner/owner_match_list.php?status=1">
                <dt><img src="../images/icon012.png" /></dt>
                <dd>我的比赛</dd>
            </a>
        </dl>
        <dl>
        	<a href="{*$site_url*}owner/member_list.php">
                <dt><img src="../images/icon013.png" /></dt>
                <dd>房间成员</dd>
            </a>
        </dl>
        <dl>
        	<a href="{*$site_url*}owner/owner_invite.php?code={*$member_arr.invite_code*}">
                <dt><img src="../images/icon014.png" /></dt>
                <dd>邀请码</dd>
            </a>
        </dl>
        <dl>
        	<a href="{*$site_url*}owner/owner_rainbow.php">
                <dt><img src="../images/icon015.png" /></dt>
                <dd>我的彩红币</dd>
            </a>
        </dl>
        <dl>
        	<a href="{*$site_url*}owner/owner_orderlist.php">
                <dt><img src="../images/icon016.png" /></dt>
                <dd>群订单</dd>
            </a>
        </dl>
        <dl>
        	<a href="{*$site_url*}owner/owner_passwd_form.php">
                <dt><img src="../images/icon017.png" /></dt>
                <dd>帐号管理</dd>
            </a>
        </dl>
    </div>
    
    <div class="owner-footer">
        <dl>
        	<a href="{*$site_url*}owner/owner_orderlist.php">
                <dt></dt>
                <dd>最新订单</dd>
            </a>
        </dl>
        <dl class="gold">
        	<a href="{*$site_url*}owner/owner_match_form.php">
                <dt></dt>
                <dd>发起比赛</dd>
            </a>
        </dl>
        <dl>
        	<a href="{*$site_url*}owner/member_form.php">
                <dt></dt>
                <dd>添加成员</dd>
            </a>
        </dl>
    </div><!--/owner-footer-->
</div>
</body>
</html>


