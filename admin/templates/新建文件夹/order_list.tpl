{*include file="header.tpl"*}
<div id="content">
  <div class="breadcrumb">
		{*foreach from=$breadcrumbs key=key item=item*}
		{*$item['separator']*}<a href="{*$item['href']*}">{*$item['text']*}</a>
		{*/foreach*}       
      </div>
      <div class="box">
    <div class="heading">
      <h1><img src="view/image/order.png" alt="" /> {*$title*}</h1>
      <div class="buttons"><font style="color:#FF0000">订单状态：待服务【学员申请课程开始】；服务中【教练确认课程开始】；已完成【课程结束】</font><!--<a onclick="doAction('isshow');" class="button">启用</a><a onclick="doAction('notshow');" class="button">停用</a><a href="{*$site_url*}admin/orderform.php" class="button">新增</a><a onclick="doAction('delete');" class="button">删除</a>--></div>
    </div>
    <div class="content">
        <table class="list">
          <thead>
            <tr>
              <td width="5%" style="text-align: center;">选择</td>
              <td class="center" width="5%">ID号</td>
			  <td class="right">用户</td>
              <td class="right" width="10%">手机号</td>
			  <td class="right" width="10%">教练</td>
			  <td class="right" width="10%">课程名</td>
			  <td class="right" width="5%">时长</td>
			  <td class="right" width="5%">单价</td>
              <td class="right" width="5%">总价</td>
              <td class="right" width="5%">优惠券</td>
              <td class="right" width="5%">最终价</td>
              <td class="right" width="5%">下单时间</td>
              <td class="right" width="5%">状态</td>
              <td class="center" width="14%">编辑</td>
            </tr>
			<tr>
		   <form action="{*$site_url*}admin/order.php" method="post" id="search">
              <td style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" title="全选"/></td>
              <td><input type="text" size="8" name="filter_id" id="filter_id" value="{*$filter_id*}"></td>
			  <td class="right"><input type="text" name="filter_name" id="filter_name" value="{*$filter_name*}" size="10"/></td>
			  <td class="right"><input type="text" name="filter_phone" id="filter_phone" value="{*$filter_phone*}" size="10"/></td>
			  <td class="right"><input type="text" name="filter_cname" id="filter_cname" value="{*$filter_cname*}" size="10"/></td>
			  <td class="right"><input type="text" name="filter_kcname" id="filter_kcname" value="{*$filter_kcname*}" size="10"/></td>
			  <td class="right"><input type="text" size="8" name="filter_hour" id="filter_hour" style="text-align:right;" value="{*$filter_hour*}" /></td>
			  <td class="right"><input type="text" size="8" name="filter_perprice" id="filter_perprice" style="text-align:right;" value="{*$filter_perprice*}" /></td>
			  <td class="right"><input type="text" size="8" name="filter_price" id="filter_price" style="text-align:right;" value="{*$filter_price*}" /></td>
			  <td class="right"><input type="text" size="8" name="filter_coupon" id="filter_coupon" style="text-align:right;" value="{*$filter_coupon*}" /></td>
			  <td class="right"><input type="text" size="8" name="filter_rprice" id="filter_rprice" style="text-align:right;" value="{*$filter_rprice*}" /></td>
			  <td class="right"><input type="text" name="filter_date" id="filter_date" value="{*$filter_date*}" size="8" style="text-align:right;" class="date"/></td>
              <td class="right">
			  		<select name="filter_type">
					<option value="">全部</option>
					<option value="0" {*if $filter_type eq '0'*} selected="selected"{*/if*}>未支付</option>
					<option value="1" {*if $filter_type eq '1'*} selected="selected"{*/if*}>已支付</option>
					<option value="2" {*if $filter_type eq '2'*} selected="selected"{*/if*}>待服务</option>
					<option value="3" {*if $filter_type eq '3'*} selected="selected"{*/if*}>服务中</option>
                    
					<option value="8" {*if $filter_type eq '8'*} selected="selected"{*/if*}>已完成</option>
					<option value="9" {*if $filter_type eq '9'*} selected="selected"{*/if*}>已取消</option>
					<option value="10" {*if $filter_type eq '10'*} selected="selected"{*/if*}>已删除</option>
                    </select>
				</td>
              <td align="center"><a onclick="$('#search').submit();" class="button">筛选</a></td>
			</form>
            </tr>
          </thead>
		  <form action="{*$site_url*}admin/orderaction.php" method="post" enctype="multipart/form-data" id="form">
          <tbody>
			{*foreach from=$orderArr key=key item=item*}
            <tr>
              <td style="text-align: center;"><input type="checkbox" name="selected[]" value="{*$item['id']*}" /></td>
			  <td class="center">{*$item['id']*}</td>
              <td class="right">{*$item['name']*}</td>
              <td class="right">{*$item['phone']*}</td>
              <td class="right">{*$item['cname']*}</td>
              <td class="right">{*$item['kcname']*}</td>
              <td class="right">{*$item['hour']*}</td>
			  <td class="right">{*$item['perprice']*}</td>
			  <td class="right">{*$item['price']*}</td>
			  <td class="right">{*$item['coupon']*}</td>
			  <td class="right">{*$item['rprice']*}</td>
			  <td class="center">{*$item['date']*} {*$item['time']*}</td>
			  <td class="right">
              	{*if $item['type'] eq '0'*}未支付{*/if*}
              	{*if $item['type'] eq '1'*}已支付{*/if*}
              	{*if $item['type'] eq '2'*}待服务{*/if*}
              	{*if $item['type'] eq '3'*}服务中{*/if*}
              	{*if $item['type'] eq '8'*}已完成{*/if*}
              	{*if $item['type'] eq '9'*}已取消{*/if*}
              	{*if $item['type'] eq '10'*}已删除{*/if*}
              </td>
              <td class="center">{*if $item['type'] eq '8'*}[ <a href="{*$site_url*}admin/orderform.php?id={*$item['id']*}">编辑评论</a> ]{*/if*}<!--[ <a href="{*$site_url*}admin/ordermeta.php?id={*$item['id']*}">聊天记录</a> ]-->
              {*if $item['type'] eq '0'*}[ <a href="{*$site_url*}admin/orderaction.php?act=cancle&id={*$item['id']*}">取消</a> ]{*/if*}
              {*if $item['type'] eq '1' || $item['type'] eq '2' || $item['type'] eq '3' || $item['type'] eq '8'*}[ <a href="{*$site_url*}admin/orderrefundform.php?id={*$item['id']*}">退款</a> ]{*/if*}
              </td>
            </tr>
			{*foreachelse*}
			<tr><td colspan="15" class="left">暂无相关信息</td></tr>
			{*/foreach*}	
		  </tbody>
		  </form>
        </table>
      <div class="pagination">
	  {*$pageHtml*}
	  </div>
    </div>
  </div>
</div> 
<script type="text/javascript"><!--
$(document).ready(function() {
	$('.date').datepicker({dateFormat: 'yy-mm-dd'});
});
//--></script> 
<script type="text/javascript"><!--
function doAction(act){
	var actionUrl = $('#form').attr('action');
	actionUrl = actionUrl+'?act='+act;
	$('#form').attr('action',actionUrl);
	$('#form').submit();}
//--></script> 


{*include file="footer.tpl"*}