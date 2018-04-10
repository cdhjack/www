{*include file="header.tpl"*}
<div id="content">
  <div class="breadcrumb">
		{*foreach from=$breadcrumbs key=key item=item*}
		{*$item['separator']*}<a href="{*$item['href']*}">{*$item['text']*}</a>
		{*/foreach*}       
      </div>
    <div class="box">
    <div class="heading">
      <h1><img src="view/image/order.png" alt="" /> {*$title*}</h1>
      <div class="buttons"><a onclick="$('#form').submit();" class="button">保存</a><a href="{*$site_url*}admin/order.php{*$backUrl*}" class="button">取消</a></div>
    </div>
    
    
    
    <div class="content">
      <form action="{*$site_url*}admin/orderaction.php" method="post" enctype="multipart/form-data" id="form">
	  <input type="hidden" name="id" value="{*$orderInfo['id']*}" />
	  <input type="hidden" name="act" value="save" />
        <table class="form">
          <tr>
            <td> 服务态度：<span class="help">支持半颗星,如3.5</span></td>
            <td>{*$orderInfo['tdstar_html']*}&nbsp;&nbsp;评星值：<input type="hidden" name="old_tdstar" value="{*$orderInfo['tdstar']*}" /><input type="text" name="tdstar" value="{*$orderInfo['tdstar']*}" size="12"/>
              </td>
          </tr>
          <tr>
            <td> 服务质量：<span class="help">支持半颗星,如3.5</span></td>
            <td>{*$orderInfo['zlstar_html']*}&nbsp;&nbsp;评星值：<input type="hidden" name="old_zlstar" value="{*$orderInfo['zlstar']*}" /><input type="text" name="zlstar" value="{*$orderInfo['zlstar']*}" size="12"/>
              </td>
          </tr>
          <tr>
            <td> 服务内容：<span class="help">支持半颗星,如3.5</span></td>
            <td>{*$orderInfo['nrstar_html']*}&nbsp;&nbsp;评星值：<input type="hidden" name="old_nrstar" value="{*$orderInfo['nrstar']*}" /><input type="text" name="nrstar" value="{*$orderInfo['nrstar']*}" size="12"/>
              </td>
          </tr>
          <tr>
            <td> 订单得分：<span class="help">三项评分的平均值</span></td>
            <td>{*$orderInfo['score_html']*}
              </td>
          </tr>
          <tr>
            <td><span class="required">*</span> 用户评论：</td>
            <td><input type="hidden" name="user_comment_id" value="{*$newOrderCommentArr['user']['id']*}" /><textarea name="user_comment_content" style="width:650px;height:100px;">{*$newOrderCommentArr['user']['content']*}</textarea>
              </td>
          </tr>
          <tr>
            <td><span class="required">*</span> 教练回复：</td>
            <td><input type="hidden" name="coach_comment_id" value="{*$newOrderCommentArr['coach']['id']*}" /><textarea name="coach_comment_content" style="width:650px;height:100px;">{*$newOrderCommentArr['coach']['content']*}</textarea>
              </td>
          </tr>
        </table>
      </form>
    </div>
    
    
  </div>
</div> 
{*include file="footer.tpl"*}