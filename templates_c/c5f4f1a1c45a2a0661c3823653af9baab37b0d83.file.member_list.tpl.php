<?php /* Smarty version Smarty-3.1.5, created on 2017-07-31 17:47:17
         compiled from "D:\www\www.rainbow.com//templates/house\member_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32426597efca5614623-38626499%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5f4f1a1c45a2a0661c3823653af9baab37b0d83' => 
    array (
      0 => 'D:\\www\\www.rainbow.com//templates/house\\member_list.tpl',
      1 => 1501493544,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32426597efca5614623-38626499',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'site_url' => 0,
    'filter_search_name' => 0,
    'memberArr' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_597efca569676',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_597efca569676')) {function content_597efca569676($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="owner-public-header">
    <a href="index.html" class="return"></a>
    <div class="headline">群成员</div>
</div>
    
<div class="owner-list">
    <div class="owner-list-search">
    <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
owner/owner_list.php" method="post" id="search">
    	<input type="text" class="text" id="filter_search_name" name="filter_search_name" placeholder="请输入手机号、房主名" value="<?php echo $_smarty_tpl->tpl_vars['filter_search_name']->value;?>
"/>
        <input type="button" class="btn" id="button-search-1" onClick="javacript:$('#search').submit();"/>
    </form>
    </div>
    
    <div class="owner-list-cont">
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['memberArr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
        <dl>
        	<dt><img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar'];?>
" /></dt>
            <dd class="dd-one">
            	<h1><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</h1>
                <p>手机号：<?php echo $_smarty_tpl->tpl_vars['item']->value['mobile'];?>
</p>
            </dd>
            <dd class="dd-two">
            	<a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
owner/owner_detail.php?owners=<?php echo $_smarty_tpl->tpl_vars['item']->value['owner_detail'];?>
">详情</a>
                <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
owner/owner_recharge.php?owners=<?php echo $_smarty_tpl->tpl_vars['item']->value['owners'];?>
">充值</a>
            </dd>
        </dl>
        <?php }
if (!$_smarty_tpl->tpl_vars['item']->_loop) {
?>
            暂无房主信息
        <?php } ?>
    </div>
</div><!--/owner-list-->
</body>
</html>


<?php }} ?>