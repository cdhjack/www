<?php /* Smarty version Smarty-3.1.5, created on 2014-10-16 13:40:02
         compiled from "D:\www\www.yoti-app.com\trunk\admin/templates/coach_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:285755421302edcffc0-76269081%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd263028bb3704d79a113f4970bdc3509caacf64e' => 
    array (
      0 => 'D:\\www\\www.yoti-app.com\\trunk\\admin/templates/coach_form.tpl',
      1 => 1413437977,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '285755421302edcffc0-76269081',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5421302f20466',
  'variables' => 
  array (
    'breadcrumbs' => 0,
    'item' => 0,
    'title' => 0,
    'coachInfo' => 0,
    'site_url' => 0,
    'backUrl' => 0,
    'coachTypeArr' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5421302f20466')) {function content_5421302f20466($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
      <h1><img src="view/image/order.png" alt="" /> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
      <div class="buttons"><a onclick="$('#form').submit();" class="button">
      <!--20141016改:教练信息未审核则名称为：审核，否则为：保存-->
      <?php if ($_smarty_tpl->tpl_vars['coachInfo']->value['pass']=='1'){?>
      保存
      <?php }else{ ?>
      审核
      <?php }?>
      </a><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/coach.php<?php echo $_smarty_tpl->tpl_vars['backUrl']->value;?>
" class="button">取消</a></div>
    </div>
    <div class="content">
      <div id="tabs" class="htabs"><a href="#tab-general">编辑项目</a><a href="#tab-data">查看信息</a><a href="#tab-image">图片设置</a><!--<a href="#tab-design">设计</a>--></div>
      <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/coachaction.php" method="post" enctype="multipart/form-data" id="form">
	  <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['coachInfo']->value['id'];?>
" />
	  <input type="hidden" name="act" value="save" />
        <div id="tab-general">
          <div id="languages" class="htabs">
                        <a href="#language1"><img src="view/image/flags/cn.png" title="简体中文" /> 简体中文</a>
                      </div>
                    <div id="language1">
            <table class="form">
              <tr>
                <td><span class="required">*</span> 教练昵称：</td>
                <td><input type="text" name="nickname"  value="<?php echo $_smarty_tpl->tpl_vars['coachInfo']->value['name'];?>
" />
                  </td>
              </tr>
              <tr>
                <td><span class="required">*</span> 教练姓名：</td>
                <td><input type="text" name="rname"  value="<?php echo $_smarty_tpl->tpl_vars['coachInfo']->value['rname'];?>
" />
                  </td>
              </tr>
              <tr>
                <td><span class="required">*</span> 性别：</td>
                <td><input type="radio" name="sex" value="1" <?php if ($_smarty_tpl->tpl_vars['coachInfo']->value['sex']=='1'){?> checked="checked"<?php }?>>&nbsp;男&nbsp;&nbsp;&nbsp;<input type="radio" name="sex" <?php if ($_smarty_tpl->tpl_vars['coachInfo']->value['sex']=='0'){?> checked="checked"<?php }?> value="0">&nbsp;女</td>
              </tr>
              <tr>
                <td><span class="required">*</span> 教练属性：</td>
                <td>
                <select name="typeid">
					<option value="">请选择类型</option>
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['coachTypeArr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->tpl_vars['coachInfo']->value['typeid']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['val'];?>
</option>
					<?php } ?>
                </select>
                
                <select name="level">
                <option value="">请选择级别</option>
                <option value="1" <?php if ($_smarty_tpl->tpl_vars['coachInfo']->value['level']=='1'){?> selected="selected"<?php }?>>一星</option>
                <option value="2" <?php if ($_smarty_tpl->tpl_vars['coachInfo']->value['level']=='2'){?> selected="selected"<?php }?>>二星</option>
                <option value="3" <?php if ($_smarty_tpl->tpl_vars['coachInfo']->value['level']=='3'){?> selected="selected"<?php }?>>三星</option>
                <option value="4" <?php if ($_smarty_tpl->tpl_vars['coachInfo']->value['level']=='4'){?> selected="selected"<?php }?>>四星</option>
                <option value="5" <?php if ($_smarty_tpl->tpl_vars['coachInfo']->value['level']=='5'){?> selected="selected"<?php }?>>五星</option>
                </select>
                </td>
              </tr>
              <tr>
                <td><span class="required">*</span> 课程价格：</td>
                <td><input type="text" name="price"  value="<?php echo $_smarty_tpl->tpl_vars['coachInfo']->value['price'];?>
" />&nbsp;&nbsp;元/小时
                  </td>
              </tr>
              <tr>
                <td>&nbsp;&nbsp; 个性签名：</td>
                <td><textarea name="sign" style="width:350px;height:50px;"><?php echo $_smarty_tpl->tpl_vars['coachInfo']->value['sign'];?>
</textarea></td>
              </tr>
              <tr>
                <td>&nbsp;&nbsp; 个人优势：</td>
                <td><textarea name="adv" style="width:350px;height:50px;"><?php echo $_smarty_tpl->tpl_vars['coachInfo']->value['adv'];?>
</textarea></td>
              </tr>
              <tr>
                <td>&nbsp;&nbsp; 服务流程：</td>
                <td><textarea name="flow" style="width:350px;height:50px;"><?php echo $_smarty_tpl->tpl_vars['coachInfo']->value['flow'];?>
</textarea></td>
              </tr>
            <tr>
              <td>&nbsp;&nbsp;头像:<br /><span class="help">图片请上传大小为300X300<br /></span></td>
              <td><textarea id="headpic" name="headpic" style="width:350px;height:200px;"><?php echo $_smarty_tpl->tpl_vars['coachInfo']->value['avatar'];?>
</textarea></td>
            </tr>
            <tr>
              <td>&nbsp;&nbsp;状态：</td>
              <td><select name="status">
				<option value="1" <?php if ($_smarty_tpl->tpl_vars['coachInfo']->value['status']=='1'){?>  selected="selected" <?php }?>>启用</option>
				<option value="0" <?php if ($_smarty_tpl->tpl_vars['coachInfo']->value['status']=='0'){?>  selected="selected" <?php }?>>禁用</option>
				</select>
				</td>
            </tr>
            </table>
          </div>
                  </div>
                  
         <div id="tab-data">
          <table class="form">
              <tr>
                <td>&nbsp;&nbsp; 收藏量：</td>
                <td><?php echo $_smarty_tpl->tpl_vars['coachInfo']->value['fav'];?>
</td>
              </tr>
              <tr>
                <td>&nbsp;&nbsp; 点赞量：</td>
                <td><?php echo $_smarty_tpl->tpl_vars['coachInfo']->value['thumb'];?>
</td>
              </tr>
              <tr>
                <td>&nbsp;&nbsp; 订单量：</td>
                <td><?php echo $_smarty_tpl->tpl_vars['coachInfo']->value['order_num'];?>
</td>
              </tr>
              <tr>
                <td>&nbsp;&nbsp; 服务态度：</td>
                <td><?php echo $_smarty_tpl->tpl_vars['coachInfo']->value['tdstar_html'];?>
</td>
              </tr>
              <tr>
                <td>&nbsp;&nbsp; 服务质量：</td>
                <td><?php echo $_smarty_tpl->tpl_vars['coachInfo']->value['zlstar_html'];?>
</td>
                  </td>
              </tr>
              <tr>
                <td>&nbsp;&nbsp; 服务内容：</td>
                <td><?php echo $_smarty_tpl->tpl_vars['coachInfo']->value['nrstar_html'];?>
</td>
                  </td>
              </tr>
              <tr>
                <td>&nbsp;&nbsp; 口碑：</td>
                <td><?php echo $_smarty_tpl->tpl_vars['coachInfo']->value['star_html'];?>
</td>
                  </td>
              </tr>
           
          </table>
        </div>         
                  
         <div id="tab-image">
          <table class="list" id="images">
            <thead>
              <tr>
                <td class="left">&nbsp;&nbsp;图片：</td>
              </tr>
            </thead>
            
            <tbody>
              <tr>
                <td class="left"><textarea id="photo" name="photo" style="width:100%;height:600px;"><?php echo $_smarty_tpl->tpl_vars['coachInfo']->value['photo_list'];?>
</textarea></td>
              </tr>
            </tbody>
			<!--
                                   
                                    <tbody id="image-row0">
              <tr>
                <td class="left"><div class="image"><img id="thumb0" alt="" src="http://mall.ikang.com/image/cache/data/H001152/_DSC0061-100x100.jpg">
                    <input type="hidden" id="image0" value="data/H001152/_DSC0061.jpg" name="product_image[0][image]">
                    </div>
                </td>
                <td class="left"><a class="button" onclick="$('#image-row0').remove();">移除</a></td>
              </tr>
            </tbody>
            
                                    <tfoot>
              <tr>
                <td></td>
                <td class="left"><a class="button" onclick="addImage();">添加图片</a></td>
              </tr>
            </tfoot>-->
          </table>
        </div>         
                  
        <!--
        <div id="tab-design">
          <table class="list">
            <thead>
              <tr>
                <td class="left">&nbsp;&nbsp;网店：</td>
                <td class="left">布局覆盖：</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="left">默认</td>
                <td class="left"><select name="information_layout[0][layout_id]">
                    <option value=""></option>
                                                            <option value="2">产品</option>
                                                                                <option value="11">信息</option>
                                                                                <option value="10">分销商</option>
                                                                                <option value="5">厂商</option>
                                                                                <option value="9">导航</option>
                                                                                <option value="6">帐户</option>
                                                                                <option value="3">目录</option>
                                                                                <option value="7">结账</option>
                                                                                <option value="8">联系</option>
                                                                                <option value="12">频道——新品推荐页</option>
                                                                                <option value="1">首页</option>
                                                                                <option value="4">默认</option>
                                                          </select></td>
              </tr>
            </tbody>
                      </table>
        </div>-->
      </form>
    </div>
  </div>
</div> 
<script type="text/javascript"><!--
$(document).ready(function() {
	$('.date').datepicker({dateFormat: 'yy-mm-dd'});
});
//--></script> 
<script type="text/javascript"><!--
$('#tabs a').tabs(); 
$('#languages a').tabs(); 
//--></script> 
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
public/kindeditor-4.1.7/themes/default/default.css" />
<script charset="utf-8" src="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
public/kindeditor-4.1.7/kindeditor-min.js"></script>
<script charset="utf-8" src="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
public/kindeditor-4.1.7/lang/zh_CN.js"></script>
<script>
	var editor;
	KindEditor.ready(function(K) {
			editor = K.create('textarea[name="photo"]', {
			allowImageUpload : true,
			filterMode: true,
			afterBlur: function(){this.sync();},
			items : [
				'source','justifyleft','justifycenter','justifyright','image'
			]
		});
	});
	var editor_headpic_url;
	KindEditor.ready(function(K) {
			editor_headpic_url = K.create('textarea[name="headpic"]', {
			allowImageUpload : true,
			filterMode: true,
			afterBlur: function(){this.sync();},
			items : [
				'source','justifyleft','justifycenter','justifyright','image'
			]
		});
	});
</script>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>