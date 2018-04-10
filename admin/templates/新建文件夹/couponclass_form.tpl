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
      <div class="buttons"><a onclick="$('#form').submit();" class="button">保存</a><a href="{*$site_url*}admin/couponclass.php{*$backUrl*}" class="button">取消</a></div>
    </div>
    
    
    
    <div class="content">
      <form action="{*$site_url*}admin/couponclassaction.php" method="post" enctype="multipart/form-data" id="form">
	  <input type="hidden" name="update_i_type" value="{*$couponClassInfo['i_type']*}" />
      <input type="hidden" name="update_idesc" value="{*$couponClassInfo['idesc']*}" />
	  <input type="hidden" name="act" value="save" />
        <table class="form">
          <tr>
            <td><span class="required">*</span> 优惠券类型：</td>
            <td>
			  		<select name="i_type" onchange="">
					<option value="">请选择</option>
					{*foreach from=$couponClassArr key=key item=item*}
					<option value="{*$item['i_type']*}" {*if $item['i_type']==$couponClassInfo['i_type']*} selected="selected"{*/if*}>{*$item['idesc']*}</option>
					{*/foreach*}
                    <option value="new">以上没有需要新建类型</option>
					</select>
                    <span id="new_idesc" style="display:none;"><input type="text" value="" name="idesc"></span>
              </td>
          </tr>
          <tr>
            <td><span class="required">*</span> 优惠券名称：</td>
            <td>
          		<input type="text" value="{*$couponClassInfo['name']*}" style="width:350px;" name="title">
              </td>
          </tr>          
          <tr>
            <td><span class="required">*</span>面额：</td>
            <td><input type="text" name="price" value="{*$couponClassInfo['price']*}" />
              </td>
          </tr>
          <tr>
            <td><span class="required">*</span>生成数量：</td>
            <td>{*if $couponClassInfo['i_type'] gte 0 && $couponClassNum gt 0*} {*$couponClassNum*}{*else*}<input type="text" name="total" value="" />{*/if*}
              </td>
          </tr>
            <tr>
              <td><span class="required">*</span> 过期日期：</td>
              <td><input type="text" name="yxq" class="date" value="{*$couponClassInfo['yxq']*}" /></td>
            </tr>
          <tr>
            <td>&nbsp;&nbsp;备注：</td>
            <td><textarea name="note" style="width:650px;height:200px;">{*$couponClassInfo['note']*}</textarea>
              </td>
          </tr>
        </table>
      </form>
    </div>
    
    
  </div>
</div> 
<script type="text/javascript"><!--
//满送或满减选择切换jack_2013-11-20
$('select[name=\'i_type\']').change(function(){
	var i_type_value = $(this).val();
	if(i_type_value=='new'){
		$("#new_idesc").show();
		$('input[name=\'idesc\']').val('');
		$('input[name=\'title\']').val('');
		$('input[name=\'title\']').attr('readonly', false);
	}
	else{
		$("#new_idesc").hide();
		$('input[name=\'idesc\']').val('');
		//获取该类型优惠券的名称
		if(i_type_value==""){			
			$('input[name=\'title\']').val('');
			$('input[name=\'title\']').attr('readonly', false);
		}
		else{
			$.ajax({
				url: '{*$site_url*}admin/ajax/coupon.php',
				type: 'post',
				dataType: 'json',
				data: 'act=getitypeinfo&i_type=' + encodeURIComponent(i_type_value),
				beforeSend: function() {
				},
				complete: function() {
				},
				success: function(data) {
					if(data.msg==1){						
						$('input[name=\'title\']').val(data.info.name);	
						$('input[name=\'title\']').attr('readonly', true);		
					}
					else{
						alert(data.info)
					}
				}
			});
		}
	}
});

$(document).ready(function() {
	$('.date').datepicker({dateFormat: 'yy-mm-dd'});
});
//--></script> 
<link rel="stylesheet" href="{*$site_url*}public/kindeditor-4.1.7/themes/default/default.css" />
<script charset="utf-8" src="{*$site_url*}public/kindeditor-4.1.7/kindeditor-min.js"></script>
<script charset="utf-8" src="{*$site_url*}public/kindeditor-4.1.7/lang/zh_CN.js"></script>
<script>
	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('textarea[name="note"]', {
			resizeType : 1,
			allowPreviewEmoticons : false,
			allowImageUpload : false,
			afterBlur:function(){
			   this.sync();
			},
			items : [
				'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
				'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
				'insertunorderedlist', '|', 'emoticons', 'image', 'link']
		});
	});
</script>
{*include file="footer.tpl"*}