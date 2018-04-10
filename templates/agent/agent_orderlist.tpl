{*include file="header.tpl"*}
<div class="agent-public-header">
    <a href="index.html" class="return"></a>
    <div class="headline">群订单</div>
</div>
    
<div class="agent-indent">
    <ul class="agent-indent-tab">
    	<li>待处理</li>
        <li>已完成</li>
        <li>已取消</li>
    </ul>
    
    <!--待处理订单-->
    <div class="agent-indent-cont">
        {*foreach from=$order_pending_arr key=key item=item*}
        <dl>
        	<dt><img src="{*$item['avatar']*}" /></dt>
            <dd class="dd-one">
                <ul>
                    <li>房&emsp;主：{*$item['nickname']*}</li>
                    <li>手机号：{*$item['mobile']*}</li>
                    <li>充值币：<span>{*$item['amount']*}个</span></li>
                    <li>{*$item['order_time_name']*}：</span>{*$item['order_time']*}</li>
                    <li>状&emsp;态：<span>{*$item['status_name']*}</span></li>
                </ul>
            </dd>
            <dd class="dd-two">
            	<a href="#" onclick="javascript:rechargeOrder({*$item['id']*},'pay');return false;">充值</a><a href="#" onclick="javascript:rechargeOrder({*$item['id']*},'cancle');return false;">取消</a>
            </dd>
        </dl>
       {*/foreach*} 
    </div><!--/agent-indent-cont-->
    
    
    <!--已完成订单-->
    <div class="agent-indent-cont">
        {*foreach from=$order_complete_arr key=key item=item*}
        <dl>
        	<dt><img src="{*$item['avatar']*}" /></dt>
            <dd class="dd-one">
                <ul>
                    <li>房&emsp;主：{*$item['nickname']*}</li>
                    <li>手机号：{*$item['mobile']*}</li>
                    <li>充值币：<span>{*$item['amount']*}个</span></li>
                    <li>{*$item['order_time_name']*}：</span>{*$item['order_time']*}</li>
                    <!--<li>状&emsp;态：<span>{*$item['status_name']*}</span></li>-->
                </ul>
            </dd>
            <dd class="dd-two">
            	<a href="#" class="gray">已完成</a>
            </dd>
        </dl>
       {*/foreach*} 
    </div><!--/agent-indent-cont-->
    
    <!--已取消订单-->
    <div class="agent-indent-cont">
        {*foreach from=$order_cancle_arr key=key item=item*}
        <dl>
        	<dt><img src="{*$item['avatar']*}" /></dt>
            <dd class="dd-one">
                <ul>
                    <li>房&emsp;主：{*$item['nickname']*}</li>
                    <li>手机号：{*$item['mobile']*}</li>
                    <li>充值币：<span>{*$item['amount']*}个</span></li>
                    <li>{*$item['order_time_name']*}：</span>{*$item['order_time']*}</li>
                    <!--<li>状&emsp;态：<span>{*$item['status_name']*}</span></li>-->
                </ul>
            </dd>
            <dd class="dd-two">
            	<a href="#" class="gray">已取消</a>
            </dd>
        </dl>
       {*/foreach*} 
    </div><!--/agent-indent-cont-->
    
    
</div><!--/agent-list-->
<script type="text/javascript">
//充值订单处理
function rechargeOrder(order_id,act_type){
	if(!order_id || !act_type){
		alert("参数错误");
		return false;
	}
	$.ajax({
		url: '{*$site_url*}agent/ownerOrderAction.php',
		type: 'post',
		dataType: 'json',
		data:{"order_id":order_id,"act_type":act_type},
		beforeSend: function() {
		},
		complete: function() {
		},
		success: function(data) {
			if(data.REV == 1){
				alert(data.MSG);
				window.location.reload(); 
			}
			else{
				alert(data.MSG);
			}
		}
	});
}
</script>
</body>
</html>


