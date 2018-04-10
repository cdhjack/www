<?php /* Smarty version Smarty-3.1.5, created on 2014-09-19 16:17:26
         compiled from "D:\www\www.yoti-app.com\trunk\admin/templates/coach_score_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:416954194435d285f3-29285090%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '048c9e3815b573350ac989d03fbb603030c8b64b' => 
    array (
      0 => 'D:\\www\\www.yoti-app.com\\trunk\\admin/templates/coach_score_form.tpl',
      1 => 1411114644,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '416954194435d285f3-29285090',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_54194435e0525',
  'variables' => 
  array (
    'breadcrumbs' => 0,
    'item' => 0,
    'coachInfo' => 0,
    'title' => 0,
    'site_url' => 0,
    'backUrl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54194435e0525')) {function content_54194435e0525($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
      <h1><img src="view/image/user.png" alt="" /> <?php echo $_smarty_tpl->tpl_vars['coachInfo']->value['rname'];?>
教练&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
      <div class="buttons"><!--<a onclick="$('#form').submit();" class="button">保存</a>--><a class="button" id="button-transaction"><span>保存</span></a><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/coach.php<?php echo $_smarty_tpl->tpl_vars['backUrl']->value;?>
" class="button">返回</a></div>
    </div>
    <div class="content">
    	  <div id="tab-transaction">
          <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['coachInfo']->value['id'];?>
" />
          <input type="hidden" name="act" value="addscore" />
          <table class="form">
            <tbody><tr>
              <td>扣分：</td>
              <td><input type="text" value="" id="score" name="score"></td>
            </tr>
            <tr>
              <td>原因：</td>
              <td><input type="text" value="" id="reason" name="reason"></td>
            </tr>
            <!--<tr>
              <td style="text-align: right;" colspan="2"><a class="button" id="button-transaction"><span>添加扣分</span></a></td>
            </tr>-->
          </tbody>
          </table>
         </div>
        <div id="transaction">
        </div>
    </div>
  </div>
</div> 
<script type="text/javascript"><!--
$('#transaction .pagination a').live('click', function() {
	$('#transaction').load(this.href);
	return false;
});			

$('#transaction').load("<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/coachscore.php?id=<?php echo $_smarty_tpl->tpl_vars['coachInfo']->value['id'];?>
");

$('#button-transaction').bind('click', function() {
	if($.trim($("#score").val())==''){
		alert("请输入扣分值!");
		return false;
	
	}
	if($.trim($("#reason").val())==''){
		alert("请填写扣分原因!");
		return false;
	
	}
	$.ajax({
		url: '<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/ajax/coachscore.php',
		type: 'post',
		dataType: 'json',
		data: 'act=' + encodeURIComponent($('#tab-transaction input[name=\'act\']').val()) + '&id=' + encodeURIComponent($('#tab-transaction input[name=\'id\']').val()) + '&score=' + encodeURIComponent($('#tab-transaction input[name=\'score\']').val()) + '&reason=' + encodeURIComponent($('#tab-transaction input[name=\'reason\']').val()),
		beforeSend: function() {
			$('.success, .warning').remove();
			$('#button-transaction').attr('disabled', true);
			$('#transaction').before('<div class="attention"><img src="view/image/loading.gif" alt="" /> 请等待！</div>');
		},
		complete: function() {
			$('#button-transaction').attr('disabled', false);
			$('.attention').remove();
		},
		success: function(data) {
			$('#transaction').load("<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/coachscore.php?id=<?php echo $_smarty_tpl->tpl_vars['coachInfo']->value['id'];?>
");
			$('#tab-transaction input[name=\'score\']').val('');
			$('#tab-transaction input[name=\'reason\']').val('');
			//console.info(data);
			//alert(data.msg);
			if(data.msg==1){				
				$('#transaction').before('<div class="success">'+data.info+'</div>');
			}
			else{
				$('#transaction').before('<div class="warning">'+data.info+'</div>');
			}
		}
	});
});
//--></script>  
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>