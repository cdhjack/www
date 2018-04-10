{*include file="header.tpl"*}
<style type="text/css">
#content .list td img{padding: 1px; border: 1px solid #DDDDDD; width:40px; height:40px;}
</style>
<div id="content">
  <div class="breadcrumb">
		{*foreach from=$breadcrumbs key=key item=item*}
		{*$item['separator']*}<a href="{*$item['href']*}">{*$item['text']*}</a>
		{*/foreach*}       
      </div>
      <div class="box">
    <div class="heading">
      <h1><img src="view/image/user.png" alt="" /> {*$title*}</h1>
      <div class="buttons"><a onclick="doAction('status');" class="button">启用</a><a onclick="doAction('notstatus');" class="button">禁用</a><!--<a href="{*$site_url*}admin/coachform.php" class="button">新增</a>--><a onclick="doAction('delete');" class="button">删除</a></div>
    </div>
    <div class="content">
        <table class="list">
          <thead>
            <tr>
              <td width="5%" style="text-align: center;">选择</td>
              <td class="center" width="5%">ID号</td>
              <td class="center" width="5%">图片</td>
              <td class="center" width="5%">手机号码</td>
			  <td class="center" width="5%">姓名</td>
			  <td class="center" width="5%">性别</td>
              <td class="center" width="5%">类型</td>
              <td class="center" width="5%">级别</td>
			  <td class="right" width="5%">价格</td>
			  <td class="right" width="5%">接单数</td>
			  <td class="right" width="5%">扣分</td>
			  <td class="center" width="8%">注册时间</td>
			  <td class="center" width="5%">状态</td>
              <td class="center" width="10%">编辑</td>
            </tr>
			<tr>
		   <form action="{*$site_url*}admin/coach.php" method="post" id="search">
              <td style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" title="全选"/></td>
              <td class="center"><input type="text" size="11" name="filter_id" id="filter_id" value="{*$filter_id*}"></td>
              <td></td>
			  <td class="center"><input type="text" size="11" name="filter_phone" id="filter_phone" value="{*$filter_phone*}" /></td>
			  <td class="center"><input type="text" size="11" name="filter_rname" id="filter_rname" value="{*$filter_rname*}" /></td>
			  <td class="center">
                <select name="filter_sex">
                <option value="">全部</option>
                <option value="1" {*if $filter_sex eq '1'*} selected="selected"{*/if*}>男</option>
                <option value="0" {*if $filter_sex eq '0'*} selected="selected"{*/if*}>女</option>
                </select>
              </td>
			  <td class="center">
                <select name="filter_typeid">
					<option value="">全部</option>
					{*foreach from=$coachTypeArr key=key item=item*}
					<option value="{*$item['id']*}" {*if $item['id']==$filter_typeid*} selected="selected"{*/if*}>{*$item['val']*}</option>
					{*/foreach*}
                </select>
              </td>
			  <td class="center">
			  		<select name="filter_level">
					<option value="">全部</option>
					<option value="1" {*if $filter_level eq '1'*} selected="selected"{*/if*}>一星</option>
					<option value="2" {*if $filter_level eq '2'*} selected="selected"{*/if*}>二星</option>
					<option value="3" {*if $filter_level eq '3'*} selected="selected"{*/if*}>三星</option>
					<option value="4" {*if $filter_level eq '4'*} selected="selected"{*/if*}>四星</option>
					<option value="5" {*if $filter_level eq '5'*} selected="selected"{*/if*}>五星</option>
                    </select>
              </td>
			  <td class="center">
              		<input type="text"  style="text-align:right;"size="11" name="filter_min_price" id="filter_min_price" value="{*$filter_min_price*}" />
                    <br />到<br />
              		<input type="text" style="text-align:right;" size="11" name="filter_max_price" id="filter_max_price" value="{*$filter_max_price*}" />
              </td>
			  <td class="right"><input type="text" size="6" style="text-align:right;" name="filter_order_num" id="filter_order_num" value="{*$filter_order_num*}" /></td>
              <td class="right"><input type="text" size="6" style="text-align:right;" name="filter_score" id="filter_score" value="{*$filter_score*}" /></td>
              <td class="center">
              	<input type="text" name="filter_reg_start_date" size="11" id="filter_reg_start_date" value="{*$filter_reg_start_date*}" size="12" style="text-align:right;" class="date"/>
                <br />至<br />
              	<input type="text" name="filter_reg_end_date" size="11" id="filter_reg_end_date" value="{*$filter_reg_end_date*}" size="12" style="text-align:right;" class="date"/>
                </td>
              <td class="center">
			  		<select name="filter_pass">
					<option value="">全部</option>
					<option value="1" {*if $filter_pass eq '1'*} selected="selected"{*/if*}>已审核</option>
					<option value="0" {*if $filter_pass eq '0'*} selected="selected"{*/if*}>待审核</option>
					</select>
				</td>
              <td align="center"><a onclick="$('#search').submit();" class="button">筛选</a></td>
			</form>
            </tr>
          </thead>
		  <form action="{*$site_url*}admin/coachaction.php" method="post" enctype="multipart/form-data" id="form">
          <tbody>
			{*foreach from=$coachArr key=key item=item*}
            <tr>
              <td style="text-align: center;"><input type="checkbox" name="selected[]" value="{*$item['id']*}" /></td>
			  <td class="center">{*$item['id']*}</td>
              <td class="center"><img alt="头像" src="{*$item['avatar']*}"></td>
              <td class="center">{*$item['phone']*}</td>
              <td class="center">{*$item['rname']*}</td>
			  <td class="center">
              	{*if $item['sex'] eq '1'*}男{*/if*}
              	{*if $item['sex'] eq '0'*}女{*/if*}
               </td>
              <td class="center">{*$item['val']*}</td>
			  <td class="center">
              	{*if $item['level'] eq '1'*}一星{*/if*}
              	{*if $item['level'] eq '2'*}二星{*/if*}
              	{*if $item['level'] eq '3'*}三星{*/if*}
              	{*if $item['level'] eq '4'*}四星{*/if*}
              	{*if $item['level'] eq '5'*}五星{*/if*}
               </td>
			  <td class="right">￥{*$item['price']*}</td>
			  <td class="right">{*$item['order_num']*}</td>
			  <td class="right">{*$item['score']*}</td>
			  <td class="center">{*$item['reg_date']*}</td>
			  <td class="center">{*if $item['pass'] eq '1'*}已审核{*else*}待审核{*/if*}</td>
              <td class="center">
              {*if $item['pass'] neq '0'*}
              [ <a href="{*$site_url*}admin/coachscoreform.php?id={*$item['id']*}">扣分记录</a> ][ <a href="{*$site_url*}admin/coachpayform.php?id={*$item['id']*}">消费记录</a> ]<br />[ <a href="{*$site_url*}admin/coachpasswordform.php?id={*$item['id']*}">修改密码</a> ][ <a href="{*$site_url*}admin/coachform.php?id={*$item['id']*}">信息编辑</a> ]
              {*else*}
              <!--[ <a href="#" onclick="javascript:showCheckDiv('{*$item['id']*}','{*$item['rname']*}');return false;">审核</a> ]-->
              <!--20141016改：审核要求用信息编辑页面-->
              [ <a href="{*$site_url*}admin/coachform.php?id={*$item['id']*}">审核</a> ]
              {*/if*}
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
<!--弹出层开始-->
<script type="text/javascript" src="view/javascript/showdiv.js"></script>
<style type="text/css">
.LD_main{width:500px;height:200px;margin:0 auto;border:1px solid #CCCCCC; background:#FFFFFF;padding:0 0 0 0;color:#444;}
.LD_main ul{padding:0;margin:0; background:#f2f2f2; display:block;height:30px;}
.LD_main ul em a{ float:right;margin:5px 10px 0 0; font-style:normal; font-size:14px;color:#c00; text-decoration:none;}
.LD_main li{float:left;width:168px;height:40px;border-top:1px solid #ccc;border-left:1px solid #ccc;border-right:1px solid #ccc; background:#f8f8f8; list-style:none;margin:10px 8px 0 0;padding:0;line-height:40px; text-align:center; font-size:14px; cursor:pointer; font-weight:bold;}
.LD_main li.on{ background:#FFFFFF; color:#c00;}
.LD_main .box{ background:#FFFFFF;padding:20px 0 0 0;}
.LD_main .box table{ font-size:13px;}
.LD_main .box input{border:1px solid #ccc;height:22px;line-height:22px;padding:0 3px;}
.LD_main .box table td{padding:5px 2px;font-size:13px;}
.LD_main .error {
    color: #ff0000;
    display: block;
}
</style>
<div class="LD_main" id="show_check_div" style="display:none;">
   <ul>
     <em><a href="#" onclick="closeCheckDiv();return false;">×关闭</a></em>
  </ul>
  <div id="check_div" class="box" align="center">
     <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td  align="right" width="45%">教练姓名：<input type="hidden" name="coach_id" value=""/><input type="hidden" name="act" value="checkcoach"/></td>
    <td  align="left" width="10%"><span id="coachRealName"></span></td>
    <td></td>
    </tr>
  <tr>
    <td height="20"  align="right" >
        教练类型：
     </td>
     <td height="20"  align="left" >
        <select name="coach_typeid" id="coach_typeid">
					<option value="">请选择类型</option>
					{*foreach from=$coachTypeArr key=key item=item*}
					<option value="{*$item['id']*}">{*$item['val']*}</option>
					{*/foreach*}
                </select>
                
     </td>
     <td><span class="error" id="coach_typeid_error"></span></td>
  </tr>
  <tr>
    <td height="20"  align="right" >
        教练级别：
     </td>
     <td height="20"  align="left" >
       <select name="coach_level" id="coach_level">
                <option value="">请选择级别</option>
                <option value="1">一星</option>
                <option value="2">二星</option>
                <option value="3">三星</option>
                <option value="4">四星</option>
                <option value="5">五星</option>
                </select>
                
     </td>
     <td><span class="error" id="coach_level_error"></span></td>
  </tr>
  <tr><td colspan="3" align="center" style="padding:0;"><span class="error" id="json_error"></span></td></tr>
  <tr>
    <td height="40"  align="center" colspan="3" class="buttons"><div id="transaction"><a id="button-check" class="button" style="text-align:center">审 核</a>&nbsp;&nbsp;<a onclick="closeCheckDiv();return false;" class="button" style="text-align:center">取 消</a></div></td>
  </tr>
    </table>
  </div>
</div>
<!--弹出层结束-->
<script type="text/javascript"><!--
//审核显示div
function showCheckDiv(id,rname){	
	$("#check_div select[name='coach_typeid'] option[value='']").attr("selected",true)
	$("#check_div select[name='coach_level'] option[value='']").attr("selected",true)
	if(typeof id!='undefined' && id!=null && id!=''){
		$('#check_div input[name=\'coach_id\']').attr("value", id);
	}	
	$('#check_div #coachRealName').html(rname);
	setTimeout(function(){effect.zoomIn('show_check_div',1);},1);
}
function closeCheckDiv(){
	//将select值重置为空
	$('#check_div .error').html('');
	effect.zoomOut('show_check_div',1);	
}
//审核处理
$('#button-check').bind('click', function() {
	$('#check_div .error').html('');
	var isSubmit = true;
	var idArr = new Array();
	var textArr = new Array();
	if($.trim($("#coach_typeid").val())==''){
		idArr.push("coach_typeid_error");
		textArr.push("请选择教练类型!");
		isSubmit = false;
	}
	if($.trim($("#coach_level").val())==''){
		idArr.push("coach_level_error");
		textArr.push("请选择教练级别!");
		isSubmit = false;
	}
	
	if(!isSubmit){
		//提示信息
		for(var i=0;i<idArr.length;i++){ 
			$('#check_div #'+idArr[i]).html(textArr[i]);
		}
		return false;
	}
	
	$.ajax({
		url: '{*$site_url*}admin/ajax/coachcheck.php',
		type: 'post',
		dataType: 'json',
		data: 'act=' + encodeURIComponent($('#check_div input[name=\'act\']').val()) + '&coach_id=' + encodeURIComponent($('#check_div input[name=\'coach_id\']').val()) + '&coach_typeid=' + encodeURIComponent($('#check_div select[name=\'coach_typeid\']').val()) + '&coach_level=' + encodeURIComponent($('#check_div select[name=\'coach_level\']').val()),
		beforeSend: function() {
			$('#check_div .error').html('');
			$('#button-check').attr('disabled', true);
		},
		complete: function() {
			$('#button-check').attr('disabled', false);
		},
		success: function(data) {
			if(data.msg==1){
				alert(data.info)
				window.location.reload();	
			}
			else{
				$('#check_div #json_error').html(data.info);
			}
		}
	});
});




$(document).ready(function() {
	$('.date').datepicker({dateFormat: 'yy-mm-dd'});
});
//--></script> 
<script type="text/javascript"><!--
function doAction(act){
	var actionUrl = $('#form').attr('action');
	actionUrl = actionUrl+'?act='+act;
	$('#form').attr('action',actionUrl);
	$('#form').submit();
}
//-->
</script> 
{*include file="footer.tpl"*}