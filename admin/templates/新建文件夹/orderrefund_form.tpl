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
      <div class="buttons"><a onclick="$('#form').submit();" class="button">保存</a><a href="{*$site_url*}admin/order.php{*$backUrl*}" class="button">取消</a></div>
    </div>
    
    
    
    <div class="content">
      <form action="{*$site_url*}admin/orderaction.php" method="post" enctype="multipart/form-data" id="form">
	  <input type="hidden" name="id" value="{*$orderInfo['id']*}" />
	  <input type="hidden" name="act" value="refund" />
        <table class="form">
          <tr>
            <td> 用户名称：</td>
            <td>{*$orderInfo['name']*}
              </td>
          </tr>
          <tr>
            <td> 退款金额：</td>
            <td>{*$orderInfo['rprice']*}
              </td>
          </tr>
          <tr>
            <td><span class="required">*</span> 退款原因：</td>
            <td><textarea name="reason" style="width:650px;height:100px;"></textarea>
              </td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div> 
{*include file="footer.tpl"*}