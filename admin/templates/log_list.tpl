{*include file="header.tpl"*}
<div id="content">
  <div class="breadcrumb">
		{*foreach from=$breadcrumbs key=key item=item*}
		{*$item['separator']*}<a href="{*$item['href']*}">{*$item['text']*}</a>
		{*/foreach*}       
      </div>
    <div class="box">
    <div class="heading">
      <h1><img src="view/image/log.png" alt="" /> {*$title*}</h1>
      <div class="buttons"><a href="{*$site_url*}admin/logaction.php?act=clear" class="button">清除日志</a></div>
    </div>
    <div class="content">
      <textarea wrap="off" style="width: 98%; height: 300px; padding: 5px; border: 1px solid #CCCCCC; background: #FFFFFF; overflow: scroll;">
{*$log*}
</textarea>
    </div>
  </div>
</div> 
{*include file="footer.tpl"*}