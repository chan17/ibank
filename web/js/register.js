$(document).ready(function() {
	jQuery.validator.setDefaults({
	  debug: true,
	  success: "valid"
	});
	// jquery validate
	$("#register-index-form").validate({
		debug: true
		// rules: {
		// 	"#RegisterForm_phoneVerified":{
		// 		required: true,
		// 		digits: true,
		// 		rangelenth: [4,5],
		// 	}
		// },
		// messages:{
		// 	"#RegisterForm_phoneVerified": {
		// 		required: "请填写手机验证码",
		// 		digits:"请输入数字",
		// 		rangelenth: "验证码不正确",
		// 	}
		// }
	});
	$("#RegisterForm_phoneVerified").rules("add", {
		required: true,
		digits: true,
		maxlength: 5,
		messages:{
			required: "请填写手机验证码",
			digits:"请输入数字",
			maxlength: "验证码长度不正确",
		}
	});

	// about Phone Auth in the cloopen
	$('#AjaxPhoneAuth').click(function(){
		return ;
		var phone = $('#RegisterForm_Phone').val();
		var phoneNum = $('#RegisterForm_phoneVerified').val();

		 $("#phone-error").hide();
		if (phone =="") {
			// var vv = '<label for="RegisterForm_phoneVerified" class="error">请输入手机号 ，再验证手机</label>';
			// $("#RegisterForm_Phone").after(vv);
			 $("#phone-error").show();
		}else{
			
			$.post("/51ibank/web/index.php?r=register/Ajaxphoneauth&phone="+phone,function(data){
			// 	console.log("data:"+data );
				var _time = 40; //设置倒计时秒数

				// $("#AjaxPhoneAuth").html((_time+1)+"秒后重新发送");
				$("#AjaxPhoneAuth").attr("disabled","disabled");
					setI(_time);	//调用倒计时
						 // setTimeout :  http://www.w3school.com.cn/jsref/met_win_settimeout.asp
					setTimeout(function(){
						$("#AjaxPhoneAuth").html('获取手机确认码');
						$("#AjaxPhoneAuth").removeAttr('disabled');
					},(_time * 1000)); //时间到后关闭提示框
				 
				function setI(i){
					var a = setTimeout(function(){$("#AjaxPhoneAuth").html(i+"秒后重新发送");setI(i-1)},1000);
					if(i==0){
						$("#AjaxPhoneAuth").html('获取手机确认码');
						clearTimeout(a,function(){
						});
					}
				}

			});
		}
	});


});