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
      <div class="buttons"><a onclick="$('#form').submit();" class="button">发送</a><a href="{*$site_url*}admin/marketsms.php{*$backUrl*}" class="button">取消</a></div>
    </div>
    
    
    
    <div class="content">
      <form action="{*$site_url*}admin/marketsmsaction.php" method="post" enctype="multipart/form-data" id="form">
	  <input type="hidden" name="act" value="save" />
        <table class="form">
          <tr>
            <td><span class="required">*</span> 用户类型：</td>
            <td>
			  		<select name="user_type" onchange="">
					<option value="">请选择</option>
                    <option value="user">个人用户</option>
                    <option value="coach">教练用户</option>
                    <option value="all">所有用户</option>
                    <option value="new">输入手机号码</option>
					</select>
              </td>
          </tr>
          <tr id="new_phone" style="display:none;">
            <td><span class="required">*</span> 手机号码：<br /><span class="help">多个手机号请用分号隔开";"</span></td>
            <td>
          		<textarea name="phone" style="width:350px;height:100px;"></textarea>
              </td>
          </tr>          
          <tr>
            <td><span class="required">*</span>短信内容：</td>
            <td><textarea name="content" style="width:350px;height:100px;"></textarea>
            <p id="gptu">            
            你已输入了<var style="color: #C00">0</var>个字符，共<varsms style="color: #C00">0</varsms>条短信。</p>
            <p>
              </td>
          </tr>
        </table>
      </form>
    </div>
    
    
  </div>
</div> 
<script type="text/javascript"><!--
$('textarea[name=\'content\']').keyup(function(){
	var counter = $('textarea[name=\'content\']').val().length; //获取文本域的字符串长度
	var smscounter = Math.ceil(counter/70);
	$("#gptu var").text(counter);
	$("#gptu varsms").text(smscounter);
});


$('select[name=\'user_type\']').change(function(){
	var user_type_value = $(this).val();	
	if(user_type_value=='new'){		
		$('textarea[name=\'phone\']').val('');
		$('textarea[name=\'phone\']').attr('readonly', false);
		$("#new_phone").show();
	}
	else{		
		$('textarea[name=\'phone\']').attr('readonly', true);
		$("#new_phone").hide();
	}
});

$(document).ready(function() {
	$('.date').datepicker({dateFormat: 'yy-mm-dd'});
});
//--></script> 
{*include file="footer.tpl"*}