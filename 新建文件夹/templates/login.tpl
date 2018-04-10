{*if $is_login eq 1*}
<div class="loginBox">
    <div class="lgbg"></div>
    <div class="lgdiv">
        <div class="ot_a"><br /><br />你好，{*$login_name*} <a href="{*$site_url*}loginAction.php?isweb=2">退出</a>
        </div>
    </div>
</div>
{*else*}
<div class="loginBox">
    <div class="lgbg"></div>
    <div class="lgdiv">
        <form id="LOGIN" class="lgform" name="LOGIN" onSubmit="return checkForm(this);" action="{*$site_url*}loginAction.php" method="post">
        <Input type="hidden" name="isweb" value="1">
        <Input type="hidden" name="come_url" value="">
            <input type="text" value="" name="username" placeholder="邮箱/手机号"/>
            <input type="password" value="" name="password" placeholder="密码"/>
            <button>登录</button>
            <a href="xiazai.html" class="an1">登录</a>
        </form>
        <script language="javascript">
        // JavaScript Document
        function checkForm(theForm){
            if(theForm.username.value==""){
                alert("请输入邮箱/手机号！");
                theForm.username.focus();
                return false;
            }
            if(theForm.password.value==""){
                alert("请输入您的密码！");
                theForm.password.focus();
                return false;
            }
            return true;
        }
        </script>
        <div class="ot_a">
            <a href="reg.php">注册账号</a>|<a href="doc/agree.docx">会员协议</a>
        </div>
    </div>
</div>
{*/if*}