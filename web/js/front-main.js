$(document).ready(function(){
	$('#ui-user-name').mouseenter(function(){
		$('.nav-user-login').css({'display':'block'});
	});
	$('#nav-user').mouseleave(function(){
		$('.nav-user-login').css({'display':'none'});
	});


	$('#location-popover').popover();
});