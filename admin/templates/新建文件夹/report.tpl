{*include file="header.tpl"*}
<div id="content">
  <div class="breadcrumb">
		{*foreach from=$breadcrumbs key=key item=item*}
		{*$item['separator']*}<a href="{*$item['href']*}">{*$item['text']*}</a>
		{*/foreach*}       
      </div>
      <div class="box">
    <div class="heading">
      <h1><img src="view/image/report.png" alt="" /> {*$title*}</h1>
      <div class="buttons"></div>
    </div>
    <div class="content">
      <table class="form">
        <tr>
       <form action="{*$site_url*}admin/report.php" method="post" id="search">
          <td width="10%">年份：            <select name="year">
          
                                        {*foreach from=$yearArr key=key item=item*} 
                                        <option value="{*$item*}" {*if $item eq $searchYear*}selected="selected"{*/if*}>{*$item*}</option>
                                        {*/foreach*}
                                    </select></td>
          <td width="10%">月份：            <select name="month">
                                        {*foreach from=$monthArr key=key item=item*} 
                                        <option value="{*$item*}" {*if $item eq $searchMonth*}selected="selected"{*/if*}>{*$item*}</option>
                                        {*/foreach*}
                                    </select></td>
          <td style="text-align: right;"><a onclick="$('#search').submit();" class="button">筛选</a></td>
        </form>
        </tr>
      </table>
      <table class="list">
        <thead>
          <tr>
            <td class="left" width="8%"></td>
            {*foreach from=$mdaysArr key=key item=item*}
            <td class="right">{*$item*}</td>
            {*/foreach*}
          </tr>
        </thead>
        <tbody>
          {*foreach from=$reportArr key=key item=item*}
          <tr>
            <td class="center"><b>{*$reportNameArr[$key]*}</b></td>
            {*foreach from=$item key=key2 item=item2*}
            <td class="right">{*$item2*}</td>
            {*/foreach*}
          </tr>
          {*/foreach*}
        </tbody>
      </table>
      <div class="pagination"></div>
    </div>
  </div>
</div> 
<script type="text/javascript"><!--
$(document).ready(function() {
	$('.date').datepicker({dateFormat: 'yy-mm-dd'});
});
//--></script> 
{*include file="footer.tpl"*}