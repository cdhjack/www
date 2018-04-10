<?php /* Smarty version Smarty-3.1.5, created on 2017-05-22 12:51:37
         compiled from "/data/home/byu1865080001/htdocs//templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1179587348592260cf9dffe3-15568326%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b47cbc8a87b97056453699973d58f07acd911c7' => 
    array (
      0 => '/data/home/byu1865080001/htdocs//templates/index.tpl',
      1 => 1495399764,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1179587348592260cf9dffe3-15568326',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_592260cfaea59',
  'variables' => 
  array (
    'title' => 0,
    'description' => 0,
    'keywords' => 0,
    'site_url' => 0,
    'is_login' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592260cfaea59')) {function content_592260cfaea59($_smarty_tpl) {?><!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
"/>
<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
">
<link rel="stylesheet" type="text/css" href="css/base.css">
<link rel="stylesheet" type="text/css" href="css/layout.css">
<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?937efdd04a419cb21a4d8f4e63ec2d21";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
</head>
<body>
<div class="index-page">
	<div class="b_nav clearfix text-center">
		<a href="jianjie.html"><img src="images/btn1.png" alt=""></a>
		<a href="xiazai.html"><img src="images/btn2.png" alt=""></a>
		<a href="zhipai.html"><img src="images/btn3.png" alt=""></a>
	</div>
	<div class="wrap">
		<div class="in_main clearfix">
			<div class="inleft left">
				<?php echo $_smarty_tpl->getSubTemplate ("login.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

				<div class="in_a text-center">
					<a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
reg.php" <?php if ($_smarty_tpl->tpl_vars['is_login']->value==1){?>onClick="alert('您已经登录用户中心');return false;" <?php }?>>用户中心</a>|<a href="chongzhi.html">游戏充值</a>
				</div>
				<a href="#"><img src="images/ad1.jpg" alt=""></a>
				<div class="kfbox">
					<h3>客服中心</h3>
					<div class="infor">
						<p>官方qq群：565354416</p>
						<a href="https://jq.qq.com/?_wv=1027&k=49C57C2"><img src="images/qq.png" alt=""></a>
					</div>
				</div>
				<a href="jiazhang.html"><img src="images/ad2.jpg" alt=""></a>
				<div class="kfbox lxbox">
					<h3>联系方式</h3>
					<div class="infor">
						<ul class="lxul">
							<li class="email">chitu@chitugame.com</li>
							<li class="tel">010-57108978</li>
						</ul>
						<div class="clearfix">
							<img src="images/wx.png" class="left" alt="">
							<div class="gz_r right">
								<p>关注胡了三国微信平台</p>
								<div class="gz_links">
									<a href="http://weibo.com/hulesanguo?refer_flag=1001030101_&is_hot=1"><img src="images/wb.png" alt=""></a>
									<a href="http://tieba.baidu.com/f?kw=%E8%83%A1%E4%BA%86%E4%B8%89%E5%9B%BD%20&fr=wwwt"><img src="images/tb.png" alt=""></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="inright right">
				<div class="clearfix inr_a">
					<div class="aimg left">
						<div class="banner">
							<div class="banShow cycle-slideshow" 
						    data-cycle-timeout="6000"
						    data-cycle-fx="scrollHorz"
						    data-cycle-slides="> div"
						    data-cycle-pager=".bpager1"
						    >
								<div class="bandiv">
									<a href="jianjie1.html"><img src="images/img.jpg" alt=""></a>
								</div>
								<div class="bandiv">
									<a href="liucheng.html"><img src="images/llunbo2.jpg" alt=""></a>
								</div>
								<div class="bandiv">
									<a href="jianjie1.html"><img src="images/1lunbo3.jpg" alt=""></a>
								</div>
							</div>
						</div>
					</div>
					<div class="atxt right">
						<div class="tbg"></div>
						<div class="infor">
							<h2>极简玩法<br/><span>三分钟上手！</span></h2>
							<p>
								《胡了三国》是一款完全原创的三人卡牌竞技游戏，玩法简洁，玩家只要达成特定的派型即可获胜。精简，耐玩。通过一副牌53张来诠释复杂的三国时代，既可以在手机上玩，也可以在线下用实体卡牌来玩。被称为最精简的三国策略游戏。
							</p>
						</div>
					</div>
				</div>
				<div class="inr_b clearfix">
					<div class="inb_l left">
						<div class="banner">
							<div class="banShow cycle-slideshow" 
						    data-cycle-timeout="6000"
						    data-cycle-slides="> div"
						    data-cycle-pager=".bpager2"
						    >
								<div class="bandiv">
									<a href="huodong.html"><img src="images/ban.jpg" alt=""></a>
									<p>《胡了三国》谁能引领群雄？团体赛即将开战1！</p>
								</div>
								<div class="bandiv">
									<a href="huodong.html"><img src="images/lunbo2.jpg" alt=""></a>
									<p>《胡了三国》谁能引领群雄？团体赛即将开战2！</p>
								</div>
								<div class="bandiv">
									<a href="huodong.html"><img src="images/lunbo3.jpg" alt=""></a>
									<p>《胡了三国》谁能引领群雄？团体赛即将开战3！</p>
								</div>
							</div>
							<div class="bpager bpager2"></div>
						</div>
						<div class="kfbox kpBox">
							<h3>卡牌资料 <a href="kapai.html" class="right more">更多&gt;&gt;</a></h3>
							<ul class="rwlist clearfix">
								<li>
									<a href="#">
										<img src="images/pic1.png" alt="">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="images/pic2.png" alt="">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="images/pic3.png" alt="">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="images/pic4.png" alt="">
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="inb_r right">
						<div class="kfbox">
							<h3>玩家推荐</h3>
							<ul class="tjlist text-center">
								<li>
									<img src="images/pic5.png" alt="">
									<div class="text">
										<h4>世界智运会冠军</h4>
										<p>三分钟上手，五分钟入迷，胡了三国是近年难得一见的趣味智力竞技游戏。</p>
									</div>
								</li>
								<li>
									<img src="images/pic6.png" alt="">
									<div class="text">
										<h4>万智牌中国冠军</h4>
										<p>只用一副牌，就完美概括了三国精髓，创意玩法令人拍案叫绝！</p>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<script type="text/javascript" src="js/plugin.js"></script>
</body>
</html><?php }} ?>