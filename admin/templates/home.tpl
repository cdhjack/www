{*include file="header.tpl"*}
<div id="content">
  <div class="breadcrumb">
        <a href="{*$site_url*}admin/">首页</a>
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
                <td class="left">登陆者: {*$adminObj->u_name*}</td>
                <td class="left">用户组: {*if $adminObj->u_flag eq '1'*}超级{*/if*}{*$adminObj->u_groupname*}</td>
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
              <td>{*$sever_software*}</td>
            </tr>
            <tr>
              <td>服务器系统：</td>
              <td>{*$php_os*}</td>
            </tr>
            <tr>
              <td>PHP 版本：</td>
              <td>{*$phpversion*}</td>
            </tr>
            <tr>
              <td>MySQL 版本：</td>
              <td>{*$mysqlversion*}</td>
            </tr>
			<tr>
              <td>register_globals：</td>
              <td>{*$onoff*}</td>
            </tr>
            <tr>
              <td>文件上传：</td>
              <td>{*$upload*}{*if $upload_max_filesize*}[MAX:{*$upload_max_filesize*}]{*/if*}</td>
            </tr>
            <tr>
              <td>服务器地址：</td>
              <td>{*$server_addr*}</td>
            </tr>
            <tr>
              <td>服务器时区：</td>
              <td>{*$server_time*} [<font style="color:#0066cc">{*$now_time*}</font>]</td>
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
        <div class="dashboard-heading">网站统计</div>
        <div class="dashboard-content">
			<table cellpadding="4" width="100%">
            <tr>
              <td>文章分类：</td>
              <td style="text-align:right;">{*$newsClassNum*}</td>
            </tr>
            <tr>
              <td>文章数：</td>
              <td style="text-align:right;">{*$newsNum*}</td>
            </tr>
            <tr>
              <td>会员注册数：</td>
              <td style="text-align:right;">{*$userReg*}</td>
            </tr>
            <!--<tr>
              <td>有效订单数：</td>
              <td style="text-align:right;">{*$validOrderNum*}</td>
            </tr>
            <tr>
              <td>有效订单金额：</td>
              <td style="text-align:right;">￥{*$validOrderMoney*}</td>
            </tr>
            <tr>
              <td>完成订单数：</td>
              <td style="text-align:right;">{*$completeOrderNum*}</td>
            </tr>
            <tr>
              <td>完成订单金额：</td>
              <td style="text-align:right;">￥{*$completeOrderMoney*}</td>
            </tr>
            <tr>
              <td>充值人数：</td>
              <td style="text-align:right;">{*$rechargeNum*}</td>
            </tr>
            <tr>
              <td>充值金额：</td>
              <td style="text-align:right;">￥{*$rechargeMoney*}</td>
            </tr>-->
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
		url: 'index.php?route=common/home/chart&token=<?php echo $token; ?>&range=' + range,
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
{*include file="footer.tpl"*}