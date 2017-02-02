$(document).ready(function(){

	$('.loan-manage').click(function(){
		var loanLink = this;
		var loanId = $(this).data('loanid');
		console.log('loan-id',loanId);

		$.post($(this).data('url'),function(data){
			// console.log(data);
			// var data = eval("("+json+")");
			// 未登录
			if (data.type==='login' && data.status===false) {
				$('#modal-body-content').html(data.message+'');
				$('#button-login').css('display','inline-block');
				$('.modal-header').css('display','none');
				$().showModal();
			};
			// 用户权限
			if (data.type==='loginpurview' && data.status===false) {
				$('#modal-body-content').html(data.message+'');
				$('.modal-header').css('display','none');
				$().showModal();
			};
			if (data.type==='recharge') {
				// 余额不够
				var hrefPay = '';
				$('#button-recharnge').attr('href','');  // 清空

				if (data.status === false) {
					$('#modal-body-content').html(data.message);
					$('#number-price').html(data.clickPrice);
					hrefPay = $('#button-recharnge').data('url');  // 获取连接
					console.log(hrefPay,'vvv');
					console.log('loan-id',loanId);
					$('#button-recharnge').attr('href',hrefPay+loanId);  // 给链接加id

					$('#click-price').css('display','block');
					$('#button-recharnge').css('display','inline-block');
					$().showModal();
				}
				// 余额够,去支付
				if (data.status===true) {
					hrefPay = $('#button-pay').data('url');
					$('#button-pay').attr('href',hrefPay+loanId);

					$('#modal-body-content').html(data.message);
					$('#number-price').html(data.clickPrice);
					$('#button-pay').css('display','inline-block');
					$('#click-price').css('display','block');
					$().showModal();
				}
			}
			
			// 之前已付款的。。
			if (data.type==='pay' && data.status === true) {
				var hrefPay = $(loanLink).data('loanurl');
				$('#button-look').attr('href',hrefPay);  

				$('#modal-body-content').html(data.message);
				$('#button-look').css('display','inline-block');
				$().showModal();	
			}

		},"json")
		.error(function() { 
			$('#modal-body-content').html('贷款信息获取失败，请联系管理员 help@51ibank.com');
			$("#click-price").css('display','none');
			$('#button-recharnge').css('display','none');
			$('.modal-header').css('display','none');
			$().showModal();
		});

		$('#loanModal').on('hidden.bs.modal', function (e) {
			$('#button-recharnge,#button-pay,#button-recharnge,#button-login').css('display','none');
		});

		jQuery.fn.showModal=function () {
			$('.payModal').modal({
				show:true,
				backdrop:false,
				keyboard: false,
			});
		}
	});

/*	$('.carousel').carousel();

	   // $(".carousel-caption").animate({top:'150px'});
	    // $('.carousel-caption').css({"color":"white","border":"2px solid white"});

		$('.carousel').on('slid', function (html,D){
			$(".active div:eq(0)").css({"display":"block"});

			$(".active div:eq(0)").fadeIn(function(){
			// $(".active div:eq(0)").css({"display":"block"},function(){
			   $(".active div:eq(0)").animate({top:'50%'},3000,function(){
				// $('.active  div:eq(0)').hide(function(){});
					// $(".active div:eq(0)").fadeOut();
			   });
			});
		});
		var first = $('#first-slide').attr('class');
		if (first == "item active") {
			$(".active div:eq(0)").css({"display":"block"});

			$(".active div:eq(0)").fadeIn(function(){
			// $(".active div:eq(0)").css({"display":"block"},function(){
			   $(".active div:eq(0)").animate({top:'50%'},3000,function(){
				// $('.active  div:eq(0)').hide(function(){});
					// $(".active div:eq(0)").fadeOut();
			   });
			});
		};

		$('.carousel').on('slide.bs.carousel', function (html,D){
			
			$(".carousel-caption").css({"display":"none","top":"0"});
			// console.log('bbb');
		});*/
});

//滚动插件 
(function($){
$.fn.extend({
	Scroll:function(opt,callback){
	//参数初始化 
	if(!opt) var opt={}; 
	var _this=this.eq(0).find("ul:first");
	var lineH=_this.find("li:first").height(), //获取行高
	line=opt.line?parseInt(opt.line,10):parseInt(this.height()/lineH,10), //每次滚动的行数，默认为一屏，即父容器高度

	speed=opt.speed?parseInt(opt.speed,20):500, //卷动速度，数值越大，速度越慢（毫秒）

	timer=opt.timer?parseInt(opt.timer,14):3000; //滚动的时间间隔（毫秒） 
	if(line==0) line=1; 
	var upHeight=0-line*lineH;

	//滚动函数 
	scrollUp=function(){
		_this.animate({
			marginTop:upHeight 
		},speed,function(){ 
			for(i=1;i<=line;i++){ 
			_this.find("li:first").appendTo(_this); 
			} 
			_this.css({marginTop:0}); 
		}); 
	} 

	//鼠标事件绑定 
	_this.hover(function(){ 
		clearInterval(timerID); 
	},function(){ 
		timerID=setInterval("scrollUp()",timer); 
	}).mouseout(); 
} //Scroll:function end

}) //fn.extend end
})(jQuery);

$(document).ready(function(){ 
	$("#scrollDiv").Scroll({line:4,speed:500,timer:1000}); 
});