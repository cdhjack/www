<?php /* Smarty version Smarty-3.1.5, created on 2017-05-19 22:30:57
         compiled from "E:\www\www.yotiapp.com\trunk\admin/templates/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18489591f01a13de254-35110062%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '651ea5b713909cd489e5ed8d3e46cc1e4d473a74' => 
    array (
      0 => 'E:\\www\\www.yotiapp.com\\trunk\\admin/templates/home.tpl',
      1 => 1413434933,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18489591f01a13de254-35110062',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'site_url' => 0,
    'adminObj' => 0,
    'sever_software' => 0,
    'php_os' => 0,
    'phpversion' => 0,
    'mysqlversion' => 0,
    'onoff' => 0,
    'upload' => 0,
    'upload_max_filesize' => 0,
    'server_addr' => 0,
    'server_time' => 0,
    'now_time' => 0,
    'userReg' => 0,
    'coachReg' => 0,
    'validOrderNum' => 0,
    'validOrderMoney' => 0,
    'completeOrderNum' => 0,
    'completeOrderMoney' => 0,
    'rechargeNum' => 0,
    'rechargeMoney' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_591f01a150179',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_591f01a150179')) {function content_591f01a150179($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="content">
  <div class="breadcrumb">
        <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
admin/">首页</a>
      </div>
              <div class="box">
    <div class="heading">
      <h1><img src="view/image/home.png" alt="" /> 管理首页</h1>
    </div>
    <div class="content">
	<div class="latest">
        <div class="dashboard-heading">我的状态</div>
        <div class="dashboard-content" style="padding:0px; min-height:0px;">
          <table class="list" style="margin-bottom:0px;">
            <thead>
              <tr>
                <td class="left">登陆者: <?php echo $_smarty_tpl->tpl_vars['adminObj']->value->u_name;?>
</td>
                <td class="left">用户组: <?php if ($_smarty_tpl->tpl_vars['adminObj']->value->u_flag=='1'){?>超级<?php }?><?php echo $_smarty_tpl->tpl_vars['adminObj']->value->u_groupname;?>
</td>
              </tr>
            </thead>
            <!--<tbody>
			  <tr>
                <td class="left"></td>
                <td class="left"> </td>
                  </td>
              </tr>
			</tbody>-->
          </table>
        </div>
      </div>
	  <br />
	
      <div class="overview">
        <div class="dashboard-heading">系统信息</div>
        <div class="dashboard-content">
          <table cellpadding="4">
            <tr>
              <td>服务器软件：</td>
              <td><?php echo $_smarty_tpl->tpl_vars['sever_software']->value;?>
</td>
            </tr>
            <tr>
              <td>服务器系统：</td>
              <td><?php echo $_smarty_tpl->tpl_vars['php_os']->value;?>
</td>
            </tr>
            <tr>
              <td>PHP 版本：</td>
              <td><?php echo $_smarty_tpl->tpl_vars['phpversion']->value;?>
</td>
            </tr>
            <tr>
              <td>MySQL 版本：</td>
              <td><?php echo $_smarty_tpl->tpl_vars['mysqlversion']->value;?>
</td>
            </tr>
			<tr>
              <td>register_globals：</td>
              <td><?php echo $_smarty_tpl->tpl_vars['onoff']->value;?>
</td>
            </tr>
            <tr>
              <td>文件上传：</td>
              <td><?php echo $_smarty_tpl->tpl_vars['upload']->value;?>
<?php if ($_smarty_tpl->tpl_vars['upload_max_filesize']->value){?>[MAX:<?php echo $_smarty_tpl->tpl_vars['upload_max_filesize']->value;?>
]<?php }?></td>
            </tr>
            <tr>
              <td>服务器地址：</td>
              <td><?php echo $_smarty_tpl->tpl_vars['server_addr']->value;?>
</td>
            </tr>
            <tr>
              <td>服务器时区：</td>
              <td><?php echo $_smarty_tpl->tpl_vars['server_time']->value;?>
 [<font style="color:#0066cc"><?php echo $_smarty_tpl->tpl_vars['now_time']->value;?>
</font>]</td>
            </tr>
          </table>
        </div>
      </div>
      <div class="statistic">
        <!--<div class="range">选择范围：          <select id="range" onchange="getSalesChart(this.value)">
            <option value="day">今日</option>
            <option value="week">本星期</option>
            <option value="month">本月度</option>
            <option value="year">本年度</option>
          </select>
        </div>-->
        <div class="dashboard-heading">APP统计</div>
        <div class="dashboard-content">
			<table cellpadding="4" width="100%">
            <tr>
              <td>个人注册数：</td>
              <td style="text-align:right;"><?php echo $_smarty_tpl->tpl_vars['userReg']->value;?>
</td>
            </tr>
            <tr>
              <td>教练注册数：</td>
              <td style="text-align:right;"><?php echo $_smarty_tpl->tpl_vars['coachReg']->value;?>
</td>
            </tr>
            <tr>
              <td>有效订单数：</td>
              <td style="text-align:right;"><?php echo $_smarty_tpl->tpl_vars['validOrderNum']->value;?>
</td>
            </tr>
            <tr>
              <td>有效订单金额：</td>
              <td style="text-align:right;">￥<?php echo $_smarty_tpl->tpl_vars['validOrderMoney']->value;?>
</td>
            </tr>
            <tr>
              <td>完成订单数：</td>
              <td style="text-align:right;"><?php echo $_smarty_tpl->tpl_vars['completeOrderNum']->value;?>
</td>
            </tr>
            <tr>
              <td>完成订单金额：</td>
              <td style="text-align:right;">￥<?php echo $_smarty_tpl->tpl_vars['completeOrderMoney']->value;?>
</td>
            </tr>
            <tr>
              <td>充值人数：</td>
              <td style="text-align:right;"><?php echo $_smarty_tpl->tpl_vars['rechargeNum']->value;?>
</td>
            </tr>
            <tr>
              <td>充值金额：</td>
              <td style="text-align:right;">￥<?php echo $_smarty_tpl->tpl_vars['rechargeMoney']->value;?>
</td>
            </tr>
          </table>
          <!--<div id="report" style="width: 390px; height: 170px; margin: auto;"></div>-->
        </div>
      </div>
      
    </div>
  </div>
</div>
<!--[if IE]>
<script type="text/javascript" src="view/javascript/jquery/flot/excanvas.js"></script>
<![endif]--> 
<script type="text/javascript" src="view/javascript/jquery/flot/jquery.flot.js"></script> 
<script type="text/javascript"><!--
function getSalesChart(range) {
	$.ajax({
		type: 'get',
		url: 'index.php?route=common/home/chart&token=<<?php ?>?php echo $token; ?<?php ?>>&range=' + range,
		dataType: 'json',
		async: false,
		success: function(json) {
			var option = {	
				shadowSize: 0,
				lines: { 
					show: true,
					fill: true,
					lineWidth: 1
				},
				grid: {
					backgroundColor: '#FFFFFF'
				},	
				xaxis: {
            		ticks: json.xaxis
				}
			}

			$.plot($('#report'), [json.order, json.customer], option);
		}
	});
}

//getSalesChart($('#range').val());
//--></script> 
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>