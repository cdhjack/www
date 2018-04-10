<table class="list">
  <thead>
    <tr>
      <td class="left">添加时间</td>
      <td class="right">扣分</td>
      <td class="right">原因</td>
    </tr>
  </thead>
  <tbody>
    {*foreach from=$coachScoreArr key=key item=item*}
    <tr>
      <td class="left">{*$item['addtime']|date_format:'%Y/%m/%d %H:%M:%S'*}</td>
      <td class="right">{*$item['score']*}</td>
      <td class="right">{*$item['reason']*}</td>
    </tr>
    {*foreachelse*}
    <tr><td colspan="3" class="left">暂无相关信息</td></tr>
    {*/foreach*}	
  </tbody>
</table>
<div class="pagination">
{*$pageHtml*}
</div>
