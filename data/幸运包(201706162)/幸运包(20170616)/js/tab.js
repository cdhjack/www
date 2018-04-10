// JavaScript Document

/* 代理商管理-订单-切换 */
$(function(){
	$(".agent-indent .agent-indent-cont:not(:first)").hide();
	$(".agent-indent-tab li:eq(0)").addClass("agent-indent-crt");
	$(".agent-indent-tab li").click(function(){
		var i=$(this).index();
		$(this).addClass("agent-indent-crt").siblings("li").removeClass("agent-indent-crt");
		$(".agent-indent .agent-indent-cont").eq(i).show().siblings(".agent-indent-cont").hide();
		})
	})
/* 代理商管理-我的彩虹币-切换 */
$(function(){
	$(".affirm-indent").click(function(){
		$(".rainbow-popup").show();
		})
	$(".close").click(function(){
		$(".rainbow-popup").hide();
		})	
	})
/* 房主-订单-切换 */
$(function(){
	$(".owner-indent .owner-indent-cont:not(:first)").hide();
	$(".owner-indent-tab li:eq(0)").addClass("owner-indent-crt");
	$(".owner-indent-tab li").click(function(){
		var i=$(this).index();
		$(this).addClass("owner-indent-crt").siblings("li").removeClass("owner-indent-crt");
		$(".owner-indent .owner-indent-cont").eq(i).show().siblings(".owner-indent-cont").hide();
		})
	})	
/* 个人中心-添加赛事 */
$(function(){
	$(".eventBtn").click(function(){
		$(".succeed").show();
		})
	$(".succeed-colse").click(function(){
		$(".succeed").hide();
		})
	})			
/* 房主-我的彩虹币-切换 */
$(function(){
	$(".affirm-indent-two").click(function(){
		$(".rainbow-popup-two").show();
		})
	$(".close-two").click(function(){
		$(".rainbow-popup-two").hide();
		})	
	})	
/* 个人中心 */
$(function(){
	$(".join-game").click(function(){
		$(".room-invitation").show();
		})
	$(".room-close").click(function(){
		$(".room-invitation").hide();
		})
	})
	
$(function(){
	$(".add").click(function(){
		$(".room-invitation-add").show();
		})
	$(".room-close-add").click(function(){
		$(".room-invitation-add").hide();
		})
	})
			
/* 个人中心-进入房间 */
$(function(){
	$(".room-content .room-box:not(:first)").hide();
	$(".room-tab li:eq(0)").addClass("room-crt");
	$(".room-tab li").click(function(){
		var i=$(this).index();
		$(this).addClass("room-crt").siblings("li").removeClass("room-crt");
		$(".room-content .room-box").eq(i).show().siblings(".room-box").hide();
		})
	})	
	
$(function(){
	$(".redBag ul li .dl-one").click(function(){
		$(this).siblings(".room-bag").show();
		});
	$(".room-close2").click(function(){
		$(this).parents(".room-bag").hide();
		});
		
	$(".bagBtn").click(function(){
		$(".room-bag").hide();
		$(this).parent().parent().siblings('.dl-one').hide();
		$(this).parent().parent().siblings('.dl-two').show();
	});		
})
		
		