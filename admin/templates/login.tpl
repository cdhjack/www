{*include file="header.tpl"*}
<div id="content">
  <div class="box" style="width: 400px; min-height: 300px; margin-top: 40px; margin-left: auto; margin-right: auto;">
    <div class="heading">
      <h1><img src="view/image/lockscreen.png" alt="" /> 请输入您的登录信息。</h1>
    </div>
    <div class="content" style="min-height: 150px; overflow: hidden;">
	  {*if $error_warning neq ''*}
      <div class="warning">{*$error_warning*}</div>
      {*/if*}
	  <form action="{*$site_url*}admin/login.php" method="post" enctype="multipart/form-data" id="form">
	  <Input type="hidden" name="isweb" value="1">
        <table style="width: 100%;">
          <tr>
            <td style="text-align: center;" rowspan="4"><img src="view/image/login.png" alt="请输入您的登录信息。" /></td>
          </tr>
          <tr>
            <td>管理帐户：<br />
              <input type="text" name="username" value="{*$remember_username*}" style="margin-top: 4px;" />
              <br />
              <br />
              安全密码：<br />
              <input type="password" name="password" value="" style="margin-top: 4px;" />
                            <!--<br />
              <a href="{*$site_url*}admin/index.php?route=common/forgotten">忘记密码</a>-->
                            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td style="text-align: right;"><a onclick="$('#form').submit();" class="button">登录</a></td>
          </tr>
        </table>
	  </form>
    </div>
  </div>
</div>
<script type="text/javascript"><!--
$('#form input').keydown(function(e) {
	if (e.keyCode == 13) {
		$('#form').submit();
	}
});
//--></script> 
{*include file="footer.tpl"*}