<?php /* Smarty version Smarty-3.1.5, created on 2014-10-15 13:21:52
         compiled from "D:\www\www.yoti-app.com\trunk\admin/templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14396540eaf921d8791-70522270%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1569185491ff7238c2d7e717af948f2c9ae52d02' => 
    array (
      0 => 'D:\\www\\www.yoti-app.com\\trunk\\admin/templates/header.tpl',
      1 => 1413350509,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14396540eaf921d8791-70522270',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_540eaf9239c1b',
  'variables' => 
  array (
    'site_name' => 0,
    'title' => 0,
    'site_url' => 0,
    'adminObj' => 0,
    'headerLiClass' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540eaf9239c1b')) {function content_540eaf9239c1b($_smarty_tpl) {?><!DOCTYPE html>
<html dir="ltr" lang="zh-CN">
<head>
<meta charset="UTF-8" />
<title><?php echo $_smarty_tpl->tpl_vars['site_name']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<base href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/" />

<link rel="stylesheet" type="text/css" href="view/stylesheet/stylesheet.css" />
<script type="text/javascript" src="view/javascript/jquery/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="view/javascript/jquery/ui/jquery-ui-1.8.16.custom.min.js"></script>
<link type="text/css" href="view/javascript/jquery/ui/themes/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
<script type="text/javascript" src="view/javascript/jquery/tabs.js"></script>
<script type="text/javascript" src="view/javascript/jquery/superfish/js/superfish.js"></script>
<script type="text/javascript" src="view/javascript/common.js"></script>
<script type="text/javascript">
//-----------------------------------------
// Confirm Actions (delete, uninstall)
//-----------------------------------------
$(document).ready(function(){
    // Confirm Delete
    $('#form').submit(function(){
        if ($(this).attr('action').indexOf('delete',1) != -1) {
            if (!confirm('删除或卸载后您将不能恢复，请确定要这么做吗？')) {
                return false;
            }
        }
		//启用禁用要求确认信息提示
		if ($(this).attr('action').indexOf('pass',1) != -1) {
            if (!confirm('启用选中信息，请确定要这么做吗？')) {
                return false;
            }
        }
		if ($(this).attr('action').indexOf('notpass',1) != -1) {
            if (!confirm('禁用选中信息，请确定要这么做吗？')) {
                return false;
            }
        }
		
    });
    	
    // Confirm Uninstall
    $('a').click(function(){
        if ($(this).attr('href') != null && $(this).attr('href').indexOf('uninstall', 1) != -1) {
            if (!confirm('删除或卸载后您将不能恢复，请确定要这么做吗？')) {
                return false;
            }
        }
    });
});
</script>
</head>
<body>
<div id="container">
<div id="header">
  <div class="div1">
    <div class="div2"><img src="view/image/logo.png" title="功能菜单" onClick="location = '<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/index.php'" /></div>
      	<?php if ($_smarty_tpl->tpl_vars['adminObj']->value->u_id){?> 
		<div class="div3"><img src="view/image/lock.png" alt="" style="position: relative; top: 3px;" />&nbsp;您已登录为 <span><?php echo $_smarty_tpl->tpl_vars['adminObj']->value->u_name;?>
</span></div>
        <?php }?>
	  </div>
	<?php if ($_smarty_tpl->tpl_vars['adminObj']->value->u_id){?>  
    <div id="menu">
    <ul class="left" style="display: none;">
      <li id="dashboard" <?php echo $_smarty_tpl->tpl_vars['headerLiClass']->value['index'];?>
><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/" class="top">管理首页</a></li>
      <li id="report" <?php echo $_smarty_tpl->tpl_vars['headerLiClass']->value['report'];?>
><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/report.php" class="top">数据报表</a></li>
	  <li id="accountname" <?php echo $_smarty_tpl->tpl_vars['headerLiClass']->value['accountname'];?>
><a class="top">客户管理</a>
        <ul>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/member.php">用户列表</a></li>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/coach.php">教练列表</a></li>
        </ul>
      </li>
      <li id="order" <?php echo $_smarty_tpl->tpl_vars['headerLiClass']->value['order'];?>
><a class="top">订单管理</a>
        <ul>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/order.php">订单列表</a></li>
        </ul>
      </li>
      <li id="rank" <?php echo $_smarty_tpl->tpl_vars['headerLiClass']->value['rank'];?>
><a class="top">排行管理</a>
	  	<ul>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/rank.php">教练排行</a></li>
		</ul>
	  </li>
      <li id="coupon" <?php echo $_smarty_tpl->tpl_vars['headerLiClass']->value['coupon'];?>
><a class="top">优惠券管理</a>
        <ul>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/couponclass.php">优惠券类型</a></li>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/coupon.php">优惠券列表</a></li>
        </ul>
      </li>
      <li id="sms" <?php echo $_smarty_tpl->tpl_vars['headerLiClass']->value['sms'];?>
><a class="top">短信管理</a>
        <ul>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/regsms.php">系统短信</a></li>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/marketsms.php">营销短信</a></li>
        </ul>
      <!--</li>
       <li id="job" <?php echo $_smarty_tpl->tpl_vars['headerLiClass']->value['job'];?>
><a class="top">招聘管理</a>
        <ul>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/jobclass.php">招聘分类</a></li>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/job.php">招聘列表</a></li>
        </ul>
      </li>-->
        <!--<ul>
		  <li><a href="http://mall.ikang.com/admin/index.php?route=catalog/merchant&amp;token=55660a1e0ed7a71adfee4ea423d869a2">商品供应商</a></li>
          <li><a href="http://mall.ikang.com/admin/index.php?route=catalog/category&amp;token=55660a1e0ed7a71adfee4ea423d869a2">商品分类</a></li>
          <li><a href="http://mall.ikang.com/admin/index.php?route=catalog/product&amp;token=55660a1e0ed7a71adfee4ea423d869a2">商品管理</a></li>
		  <li><a href="http://mall.ikang.com/admin/index.php?route=catalog/product_give&amp;token=55660a1e0ed7a71adfee4ea423d869a2">赠品管理</a></li>
          <li><a href="http://mall.ikang.com/admin/index.php?route=catalog/filter&amp;token=55660a1e0ed7a71adfee4ea423d869a2">过滤</a></li>
          <li><a class="parent">属性</a>
            <ul>
              <li><a href="http://mall.ikang.com/admin/index.php?route=catalog/attribute&amp;token=55660a1e0ed7a71adfee4ea423d869a2">属性</a></li>
              <li><a href="http://mall.ikang.com/admin/index.php?route=catalog/attribute_group&amp;token=55660a1e0ed7a71adfee4ea423d869a2">属性组</a></li>
            </ul>
          </li>
          <li><a href="http://mall.ikang.com/admin/index.php?route=catalog/option&amp;token=55660a1e0ed7a71adfee4ea423d869a2">选项</a></li>
          <li><a href="http://mall.ikang.com/admin/index.php?route=catalog/manufacturer&amp;token=55660a1e0ed7a71adfee4ea423d869a2">品牌管理</a></li>
          <li><a href="http://mall.ikang.com/admin/index.php?route=catalog/download&amp;token=55660a1e0ed7a71adfee4ea423d869a2">下载设置</a></li>
          <li><a href="http://mall.ikang.com/admin/index.php?route=catalog/review&amp;token=55660a1e0ed7a71adfee4ea423d869a2">商品评论</a></li>
          <li><a href="http://mall.ikang.com/admin/index.php?route=catalog/information&amp;token=55660a1e0ed7a71adfee4ea423d869a2">文章管理</a></li>
        </ul>-->
      <!--<li id="extension"><a class="top">扩展功能</a>
        <ul>
          <li><a href="http://mall.ikang.com/admin/index.php?route=extension/module&amp;token=55660a1e0ed7a71adfee4ea423d869a2">模块配置</a></li>
          <li><a href="http://mall.ikang.com/admin/index.php?route=extension/shipping&amp;token=55660a1e0ed7a71adfee4ea423d869a2">配送管理</a></li>
          <li><a href="http://mall.ikang.com/admin/index.php?route=extension/payment&amp;token=55660a1e0ed7a71adfee4ea423d869a2">支付管理</a></li>
          <li><a href="http://mall.ikang.com/admin/index.php?route=extension/total&amp;token=55660a1e0ed7a71adfee4ea423d869a2">订单配置</a></li>
          <li><a href="http://mall.ikang.com/admin/index.php?route=extension/feed&amp;token=55660a1e0ed7a71adfee4ea423d869a2">插件扩展</a></li>
        </ul>
      </li>-->
	  <li id="admin" <?php echo $_smarty_tpl->tpl_vars['headerLiClass']->value['admin'];?>
><a class="top">用户目录</a>
        <ul>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/user.php">用户管理</a></li>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/usergroup.php">用户群组</a></li>
        </ul>
      </li>
	   <li id="system" <?php echo $_smarty_tpl->tpl_vars['headerLiClass']->value['system'];?>
><a class="top">系统设置</a>
	   <ul>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/charge.php">充送活动</a></li>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/information.php">文章管理</a></li>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/message.php">意见反馈</a></li>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/log.php">操作日志</a></li>
        </ul>
      </li>
	   
	   
      <!--<li id="sale"><a class="top">营销推广</a>
        <ul>
          <li><a href="http://mall.ikang.com/admin/index.php?route=sale/order&amp;token=55660a1e0ed7a71adfee4ea423d869a2">订单管理</a></li>
          <li><a href="http://mall.ikang.com/admin/index.php?route=sale/invoice&amp;token=55660a1e0ed7a71adfee4ea423d869a2">发票管理</a></li>
          <li><a href="http://mall.ikang.com/admin/index.php?route=sale/cash_out&amp;token=55660a1e0ed7a71adfee4ea423d869a2">提现审核</a></li>
          <li><a href="http://mall.ikang.com/admin/index.php?route=sale/return&amp;token=55660a1e0ed7a71adfee4ea423d869a2">商品退换</a></li>
          <li><a class="parent">客户列表</a>
            <ul>
              <li><a href="http://mall.ikang.com/admin/index.php?route=sale/customer&amp;token=55660a1e0ed7a71adfee4ea423d869a2">客户列表</a></li>
              <li><a href="http://mall.ikang.com/admin/index.php?route=sale/customer_group&amp;token=55660a1e0ed7a71adfee4ea423d869a2">客户群组</a></li>
              <li><a href="http://mall.ikang.com/admin/index.php?route=sale/customer_ban_ip&amp;token=55660a1e0ed7a71adfee4ea423d869a2">禁止 IP</a></li>
            </ul>
          </li>
           <li><a href="http://mall.ikang.com/admin/index.php?route=sale/activity&amp;token=55660a1e0ed7a71adfee4ea423d869a2">搭配销售</a></li>
		   <li><a href="http://mall.ikang.com/admin/index.php?route=sale/full&amp;token=55660a1e0ed7a71adfee4ea423d869a2">满减满送</a></li>
          <li><a href="http://mall.ikang.com/admin/index.php?route=sale/affiliate&amp;token=55660a1e0ed7a71adfee4ea423d869a2">加盟会员</a></li>
          <li><a href="http://mall.ikang.com/admin/index.php?route=sale/coupon&amp;token=55660a1e0ed7a71adfee4ea423d869a2">优惠券设置</a></li>
		   <li><a href="http://mall.ikang.com/admin/index.php?route=sale/invitation&amp;token=55660a1e0ed7a71adfee4ea423d869a2">邀请码设置</a></li>
          <li><a class="parent">礼品券</a>
            <ul>
              <li><a href="http://mall.ikang.com/admin/index.php?route=sale/voucher&amp;token=55660a1e0ed7a71adfee4ea423d869a2">礼品券</a></li>
              <li><a href="http://mall.ikang.com/admin/index.php?route=sale/voucher_theme&amp;token=55660a1e0ed7a71adfee4ea423d869a2">礼品券主题</a></li>
            </ul>
          </li>
          <li><a href="http://mall.ikang.com/admin/index.php?route=sale/contact&amp;token=55660a1e0ed7a71adfee4ea423d869a2">邮件通知</a></li>
        </ul>
      </li>
      <li id="system"><a class="top">系统设置</a>
        <ul>
          <li><a href="http://mall.ikang.com/admin/index.php?route=setting/store&amp;token=55660a1e0ed7a71adfee4ea423d869a2">网店设置</a></li>
          <li><a class="parent">设计</a>
            <ul>
              <li><a href="http://mall.ikang.com/admin/index.php?route=design/layout&amp;token=55660a1e0ed7a71adfee4ea423d869a2">布局</a></li>
              <li><a href="http://mall.ikang.com/admin/index.php?route=design/banner&amp;token=55660a1e0ed7a71adfee4ea423d869a2">横幅</a></li>
            </ul>
          </li>
          <li><a class="parent">用户管理</a>
            <ul>
              <li><a href="http://mall.ikang.com/admin/index.php?route=user/user&amp;token=55660a1e0ed7a71adfee4ea423d869a2">用户管理</a></li>
              <li><a href="http://mall.ikang.com/admin/index.php?route=user/user_permission&amp;token=55660a1e0ed7a71adfee4ea423d869a2">用户群组</a></li>
            </ul>
          </li>
          <li><a class="parent">参数设置</a>
            <ul>
              <li><a href="http://mall.ikang.com/admin/index.php?route=localisation/language&amp;token=55660a1e0ed7a71adfee4ea423d869a2">语言设置</a></li>
              <li><a href="http://mall.ikang.com/admin/index.php?route=localisation/currency&amp;token=55660a1e0ed7a71adfee4ea423d869a2">货币设置</a></li>
              <li><a href="http://mall.ikang.com/admin/index.php?route=localisation/stock_status&amp;token=55660a1e0ed7a71adfee4ea423d869a2">库存状态</a></li>
              <li><a href="http://mall.ikang.com/admin/index.php?route=localisation/order_status&amp;token=55660a1e0ed7a71adfee4ea423d869a2">订单状态</a></li>
              <li><a class="parent">商品退换</a>
                <ul>
                  <li><a href="http://mall.ikang.com/admin/index.php?route=localisation/return_status&amp;token=55660a1e0ed7a71adfee4ea423d869a2">退换状态</a></li>
                  <li><a href="http://mall.ikang.com/admin/index.php?route=localisation/return_action&amp;token=55660a1e0ed7a71adfee4ea423d869a2">退换管理</a></li>
                  <li><a href="http://mall.ikang.com/admin/index.php?route=localisation/return_reason&amp;token=55660a1e0ed7a71adfee4ea423d869a2">退换原因</a></li>
                </ul>
              </li>
              <li><a href="http://mall.ikang.com/admin/index.php?route=localisation/country&amp;token=55660a1e0ed7a71adfee4ea423d869a2">国家设置</a></li>
              <li><a href="http://mall.ikang.com/admin/index.php?route=localisation/zone&amp;token=55660a1e0ed7a71adfee4ea423d869a2">国家地区</a></li>
              <li><a href="http://mall.ikang.com/admin/index.php?route=localisation/geo_zone&amp;token=55660a1e0ed7a71adfee4ea423d869a2">区域群组</a></li>
              <li><a class="parent">商品税种</a>
                <ul>
                  <li><a href="http://mall.ikang.com/admin/index.php?route=localisation/tax_class&amp;token=55660a1e0ed7a71adfee4ea423d869a2">税率类别</a></li>
                  <li><a href="http://mall.ikang.com/admin/index.php?route=localisation/tax_rate&amp;token=55660a1e0ed7a71adfee4ea423d869a2">商品税率</a></li>
                </ul>
              </li>
              <li><a href="http://mall.ikang.com/admin/index.php?route=localisation/length_class&amp;token=55660a1e0ed7a71adfee4ea423d869a2">长度单位</a></li>
              <li><a href="http://mall.ikang.com/admin/index.php?route=localisation/weight_class&amp;token=55660a1e0ed7a71adfee4ea423d869a2">重量单位</a></li>
            </ul>
          </li>
          <li><a href="http://mall.ikang.com/admin/index.php?route=tool/error_log&amp;token=55660a1e0ed7a71adfee4ea423d869a2">错误日志</a></li>
          <li><a href="http://mall.ikang.com/admin/index.php?route=tool/backup&amp;token=55660a1e0ed7a71adfee4ea423d869a2">数据维护</a></li>
        </ul>
      </li>
      <li id="reports"><a class="top">统计报表</a>
        <ul>
          <li><a class="parent">营销推广</a>
            <ul>
              <li><a href="http://mall.ikang.com/admin/index.php?route=report/sale_order&amp;token=55660a1e0ed7a71adfee4ea423d869a2">销售订单统计</a></li>
              <li><a href="http://mall.ikang.com/admin/index.php?route=report/sale_tax&amp;token=55660a1e0ed7a71adfee4ea423d869a2">商品销售统计</a></li>
              <li><a href="http://mall.ikang.com/admin/index.php?route=report/sale_shipping&amp;token=55660a1e0ed7a71adfee4ea423d869a2">运费统计</a></li>
              <li><a href="http://mall.ikang.com/admin/index.php?route=report/sale_return&amp;token=55660a1e0ed7a71adfee4ea423d869a2">退换商品统计</a></li>
              <li><a href="http://mall.ikang.com/admin/index.php?route=report/sale_coupon&amp;token=55660a1e0ed7a71adfee4ea423d869a2">折扣商品统计</a></li>
            </ul>
          </li>
          <li><a class="parent">商品管理</a>
            <ul>
              <li><a href="http://mall.ikang.com/admin/index.php?route=report/product_viewed&amp;token=55660a1e0ed7a71adfee4ea423d869a2">商品浏览统计</a></li>
              <li><a href="http://mall.ikang.com/admin/index.php?route=report/product_purchased&amp;token=55660a1e0ed7a71adfee4ea423d869a2">商品购买统计</a></li>
            </ul>
          </li>
          <li><a class="parent">客户列表</a>
            <ul>
              <li><a href="http://mall.ikang.com/admin/index.php?route=report/customer_online&amp;token=55660a1e0ed7a71adfee4ea423d869a2">网上客户统计</a></li>
              <li><a href="http://mall.ikang.com/admin/index.php?route=report/customer_order&amp;token=55660a1e0ed7a71adfee4ea423d869a2">订单统计</a></li>
              <li><a href="http://mall.ikang.com/admin/index.php?route=report/customer_reward&amp;token=55660a1e0ed7a71adfee4ea423d869a2">奖励积分统计</a></li>
              <li><a href="http://mall.ikang.com/admin/index.php?route=report/customer_credit&amp;token=55660a1e0ed7a71adfee4ea423d869a2">商户信用统计</a></li>
            </ul>
          </li>
          <li><a class="parent">加盟会员</a>
            <ul>
              <li><a href="http://mall.ikang.com/admin/index.php?route=report/affiliate_commission&amp;token=55660a1e0ed7a71adfee4ea423d869a2">加盟佣金统计</a></li>
            </ul>
          </li>
        </ul>
      </li>
      <li id="help"><a class="top">帮助中心</a>
        <ul>
          <li><a href="http://www.opencart.com" target="_blank">官方网站</a></li>
          <li><a href="http://www.opencart.com/index.php?route=documentation/introduction" target="_blank">帮助文档</a></li>
          <li><a href="http://forum.opencart.com" target="_blank">支援论坛</a></li>
          <li><a onClick="window.open('http://opencart.cn');">中文支持(opencart.cn)</a></li>
        </ul>
      </li>-->
    </ul>
    <ul class="right" style="display: none;">
      <!--<li id="store"><a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
" target="_blank" class="top">网站前台</a>
        <ul>
                  </ul>
      </li>-->
      <li><a class="top" href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/login.php?isweb=2">退出系统</a></li>
    </ul>
  </div>
  <?php }?>
  </div>
<?php }} ?>