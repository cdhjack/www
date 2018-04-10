<?php /* Smarty version Smarty-3.1.5, created on 2017-08-05 15:50:15
         compiled from "E:\www\www.rainbow.com//templates/agent\owner_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:43325960ff8b7844b3-47011983%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d4311637684a985db42dc46fc9cc9b6808704c8' => 
    array (
      0 => 'E:\\www\\www.rainbow.com//templates/agent\\owner_list.tpl',
      1 => 1501817475,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '43325960ff8b7844b3-47011983',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5960ff8b827f3',
  'variables' => 
  array (
    'site_url' => 0,
    'filter_search_name' => 0,
    'memberArr' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5960ff8b827f3')) {function content_5960ff8b827f3($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="agent-public-header">
    <a href="index.html" class="return"></a>
    <div class="headline">我的房主</div>
</div>
    
<div class="agent-list">
    
    <div class="agent-list-search">
    <form action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
agent/owner_list.php" method="post" id="search">
    	<input type="text" class="text" id="filter_search_name" name="filter_search_name" placeholder="请输入手机号、房主名" value="<?php echo $_smarty_tpl->tpl_vars['filter_search_name']->value;?>
"/>
        <input type="button" class="btn" id="button-search-1" onClick="javacript:$('#search').submit();"/>
    </form>
    </div>
    
    <div class="agent-list-cont">
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
                <ul>
                	<li>手机号：<?php echo $_smarty_tpl->tpl_vars['item']->value['mobile'];?>
</li>
                    <li>彩虹币：<?php echo $_smarty_tpl->tpl_vars['item']->value['balance'];?>
</li>
                </ul>
            </dd>
            <dd class="dd-two">
            	<a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
agent/owner_detail.php?owners=<?php echo $_smarty_tpl->tpl_vars['item']->value['owner_detail'];?>
">详情</a>
                <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
agent/owner_recharge.php?owners=<?php echo $_smarty_tpl->tpl_vars['item']->value['owner_recharge'];?>
">充值</a>
            </dd>
        </dl>
        <?php }
if (!$_smarty_tpl->tpl_vars['item']->_loop) {
?>
            暂无房主信息
        <?php } ?>
    </div>
</div><!--/agent-list-->
</body>
</html>


<?php }} ?>