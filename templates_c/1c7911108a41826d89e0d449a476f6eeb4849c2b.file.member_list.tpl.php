<?php /* Smarty version Smarty-3.1.5, created on 2017-08-05 15:52:03
         compiled from "E:\www\www.rainbow.com//templates/owner\member_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2884059857923b9a930-46939629%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c7911108a41826d89e0d449a476f6eeb4849c2b' => 
    array (
      0 => 'E:\\www\\www.rainbow.com//templates/owner\\member_list.tpl',
      1 => 1501747225,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2884059857923b9a930-46939629',
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
  'unifunc' => 'content_59857923c3fe6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59857923c3fe6')) {function content_59857923c3fe6($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="owner-public-header">
    <a href="index.html" class="return"></a>
    <div class="headline">群成员</div>
</div>
    
<div class="owner-list">
    <div class="owner-list-search">
    <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
owner/member_list.php" method="post" id="search">
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
owner/member_detail.php?members=<?php echo $_smarty_tpl->tpl_vars['item']->value['member_detail'];?>
">详情</a>
                <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
owner/member_recharge.php?members=<?php echo $_smarty_tpl->tpl_vars['item']->value['member_recharge'];?>
">充值</a>
            </dd>
        </dl>
        <?php }
if (!$_smarty_tpl->tpl_vars['item']->_loop) {
?>
            暂无会员信息
        <?php } ?>
    </div>
</div><!--/owner-list-->
</body>
</html>


<?php }} ?>