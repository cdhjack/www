<?php /* Smarty version Smarty-3.1.5, created on 2014-10-16 13:39:59
         compiled from "D:\www\www.yoti-app.com\trunk\admin/templates/coach_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20954164ad12098a3-86994353%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c07be622290880ffdfbcadea5283e1e7f83b46b' => 
    array (
      0 => 'D:\\www\\www.yoti-app.com\\trunk\\admin/templates/coach_list.tpl',
      1 => 1413437739,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20954164ad12098a3-86994353',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_54164ad16893d',
  'variables' => 
  array (
    'breadcrumbs' => 0,
    'item' => 0,
    'title' => 0,
    'site_url' => 0,
    'filter_id' => 0,
    'filter_phone' => 0,
    'filter_rname' => 0,
    'filter_sex' => 0,
    'coachTypeArr' => 0,
    'filter_typeid' => 0,
    'filter_level' => 0,
    'filter_min_price' => 0,
    'filter_max_price' => 0,
    'filter_order_num' => 0,
    'filter_score' => 0,
    'filter_reg_start_date' => 0,
    'filter_reg_end_date' => 0,
    'filter_pass' => 0,
    'coachArr' => 0,
    'pageHtml' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54164ad16893d')) {function content_54164ad16893d($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style type="text/css">
#content .list td img{padding: 1px; border: 1px solid #DDDDDD; width:40px; height:40px;}
</style>
<div id="content">
  <div class="breadcrumb">
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['breadcrumbs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		<?php echo $_smarty_tpl->tpl_vars['item']->value['separator'];?>
<a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['href'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['text'];?>
</a>
		<?php } ?>       
      </div>
      <div class="box">
    <div class="heading">
      <h1><img src="view/image/user.png" alt="" /> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
      <div class="buttons"><a onclick="doAction('status');" class="button">启用</a><a onclick="doAction('notstatus');" class="button">禁用</a><!--<a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/coachform.php" class="button">新增</a>--><a onclick="doAction('delete');" class="button">删除</a></div>
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
		   <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/coach.php" method="post" id="search">
              <td style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" title="全选"/></td>
              <td class="center"><input type="text" size="11" name="filter_id" id="filter_id" value="<?php echo $_smarty_tpl->tpl_vars['filter_id']->value;?>
"></td>
              <td></td>
			  <td class="center"><input type="text" size="11" name="filter_phone" id="filter_phone" value="<?php echo $_smarty_tpl->tpl_vars['filter_phone']->value;?>
" /></td>
			  <td class="center"><input type="text" size="11" name="filter_rname" id="filter_rname" value="<?php echo $_smarty_tpl->tpl_vars['filter_rname']->value;?>
" /></td>
			  <td class="center">
                <select name="filter_sex">
                <option value="">全部</option>
                <option value="1" <?php if ($_smarty_tpl->tpl_vars['filter_sex']->value=='1'){?> selected="selected"<?php }?>>男</option>
                <option value="0" <?php if ($_smarty_tpl->tpl_vars['filter_sex']->value=='0'){?> selected="selected"<?php }?>>女</option>
                </select>
              </td>
			  <td class="center">
                <select name="filter_typeid">
					<option value="">全部</option>
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['coachTypeArr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->tpl_vars['filter_typeid']->value){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['val'];?>
</option>
					<?php } ?>
                </select>
              </td>
			  <td class="center">
			  		<select name="filter_level">
					<option value="">全部</option>
					<option value="1" <?php if ($_smarty_tpl->tpl_vars['filter_level']->value=='1'){?> selected="selected"<?php }?>>一星</option>
					<option value="2" <?php if ($_smarty_tpl->tpl_vars['filter_level']->value=='2'){?> selected="selected"<?php }?>>二星</option>
					<option value="3" <?php if ($_smarty_tpl->tpl_vars['filter_level']->value=='3'){?> selected="selected"<?php }?>>三星</option>
					<option value="4" <?php if ($_smarty_tpl->tpl_vars['filter_level']->value=='4'){?> selected="selected"<?php }?>>四星</option>
					<option value="5" <?php if ($_smarty_tpl->tpl_vars['filter_level']->value=='5'){?> selected="selected"<?php }?>>五星</option>
                    </select>
              </td>
			  <td class="center">
              		<input type="text"  style="text-align:right;"size="11" name="filter_min_price" id="filter_min_price" value="<?php echo $_smarty_tpl->tpl_vars['filter_min_price']->value;?>
" />
                    <br />到<br />
              		<input type="text" style="text-align:right;" size="11" name="filter_max_price" id="filter_max_price" value="<?php echo $_smarty_tpl->tpl_vars['filter_max_price']->value;?>
" />
              </td>
			  <td class="right"><input type="text" size="6" style="text-align:right;" name="filter_order_num" id="filter_order_num" value="<?php echo $_smarty_tpl->tpl_vars['filter_order_num']->value;?>
" /></td>
              <td class="right"><input type="text" size="6" style="text-align:right;" name="filter_score" id="filter_score" value="<?php echo $_smarty_tpl->tpl_vars['filter_score']->value;?>
" /></td>
              <td class="center">
              	<input type="text" name="filter_reg_start_date" size="11" id="filter_reg_start_date" value="<?php echo $_smarty_tpl->tpl_vars['filter_reg_start_date']->value;?>
" size="12" style="text-align:right;" class="date"/>
                <br />至<br />
              	<input type="text" name="filter_reg_end_date" size="11" id="filter_reg_end_date" value="<?php echo $_smarty_tpl->tpl_vars['filter_reg_end_date']->value;?>
" size="12" style="text-align:right;" class="date"/>
                </td>
              <td class="center">
			  		<select name="filter_pass">
					<option value="">全部</option>
					<option value="1" <?php if ($_smarty_tpl->tpl_vars['filter_pass']->value=='1'){?> selected="selected"<?php }?>>已审核</option>
					<option value="0" <?php if ($_smarty_tpl->tpl_vars['filter_pass']->value=='0'){?> selected="selected"<?php }?>>待审核</option>
					</select>
				</td>
              <td align="center"><a onclick="$('#search').submit();" class="button">筛选</a></td>
			</form>
            </tr>
          </thead>
		  <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/coachaction.php" method="post" enctype="multipart/form-data" id="form">
          <tbody>
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['coachArr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
            <tr>
              <td style="text-align: center;"><input type="checkbox" name="selected[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" /></td>
			  <td class="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
              <td class="center"><img alt="头像" src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
"></td>
              <td class="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['phone'];?>
</td>
              <td class="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['rname'];?>
</td>
			  <td class="center">
              	<?php if ($_smarty_tpl->tpl_vars['item']->value['sex']=='1'){?>男<?php }?>
              	<?php if ($_smarty_tpl->tpl_vars['item']->value['sex']=='0'){?>女<?php }?>
               </td>
              <td class="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['val'];?>
</td>
			  <td class="center">
              	<?php if ($_smarty_tpl->tpl_vars['item']->value['level']=='1'){?>一星<?php }?>
              	<?php if ($_smarty_tpl->tpl_vars['item']->value['level']=='2'){?>二星<?php }?>
              	<?php if ($_smarty_tpl->tpl_vars['item']->value['level']=='3'){?>三星<?php }?>
              	<?php if ($_smarty_tpl->tpl_vars['item']->value['level']=='4'){?>四星<?php }?>
              	<?php if ($_smarty_tpl->tpl_vars['item']->value['level']=='5'){?>五星<?php }?>
               </td>
			  <td class="right">￥<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
</td>
			  <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['order_num'];?>
</td>
			  <td class="right"><?php echo $_smarty_tpl->tpl_vars['item']->value['score'];?>
</td>
			  <td class="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['reg_date'];?>
</td>
			  <td class="center"><?php if ($_smarty_tpl->tpl_vars['item']->value['pass']=='1'){?>已审核<?php }else{ ?>待审核<?php }?></td>
              <td class="center">
              <?php if ($_smarty_tpl->tpl_vars['item']->value['pass']!='0'){?>
              [ <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/coachscoreform.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">扣分记录</a> ][ <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/coachpayform.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">消费记录</a> ]<br />[ <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/coachpasswordform.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">修改密码</a> ][ <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/coachform.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">信息编辑</a> ]
              <?php }else{ ?>
              <!--[ <a href="#" onclick="javascript:showCheckDiv('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['item']->value['rname'];?>
');return false;">审核</a> ]-->
              <!--20141016改：审核要求用信息编辑页面-->
              [ <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/coachform.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">审核</a> ]
              <?php }?>
              </td>
            </tr>
			<?php }
if (!$_smarty_tpl->tpl_vars['item']->_loop) {
?>
			<tr><td colspan="15" class="left">暂无相关信息</td></tr>
			<?php } ?>	
		  </tbody>
		  </form>
        </table>
      <div class="pagination">
	  <?php echo $_smarty_tpl->tpl_vars['pageHtml']->value;?>

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
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['coachTypeArr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['val'];?>
</option>
					<?php } ?>
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
		url: '<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/ajax/coachcheck.php',
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
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>