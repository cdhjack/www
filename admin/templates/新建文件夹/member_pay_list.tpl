<table class="list">
  <thead>
    <tr>
      <td class="left">时间</td>
      <td class="right">操作</td>
      <td class="right">金额(元)</td>
      <td class="right">原因</td>
    </tr>
  </thead>
  <tbody>
  	{*if $memberPayArr*}
    {*foreach from=$memberPayArr key=key item=item*}
    <tr>
      <td class="left">{*$item['addtime']|date_format:'%Y/%m/%d %H:%M:%S'*}</td>
      <td class="right">{*if $item['optype'] eq '1'*}收入{*/if*}{*if $item['optype'] eq '0'*}支出{*/if*}</td>
      <td class="right">￥{*$item['money']*}</td>
      <td class="right">{*$item['idesc']*}</td>
    </tr>
    {*/foreach*}
    <tr>
      <td class="left">合计</td>
      <td class="right"></td>
      <td class="right"></td>
      <td class="right">￥{*$memberInfo['ye']*}</td>
    </tr>
    {*else*}
    <tr><td colspan="4" class="left">暂无相关信息</td></tr>
    {*/if*}
  </tbody>
</table>
<div class="pagination">
{*$pageHtml*}
</div>
