<?php
// Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/css/login/index.css");

$this->pageTitle="修改密码 - ".Yii::app()->name;
// var_dump($userInfo['Qqopenid']);exit();
?>

<div class="span8">
	<ul class="next_tab">
		<li  class="on"><a >修改密码</a></li>
	</ul>
	<?php if(strlen($userInfo['Qqopenid']) != 32): ?>

	<?php if ($error != '') {?>
	<div class="ui-tiptext-container ui-tiptext-container-error">
    <p class="ui-tiptext ui-tiptext-error">
        <i class="ui-tiptext-icon iconfont" title="出错">&#xF045;</i>
		<?php  echo $error; ?>
    </p>
	</div>
	<?php } ?>

	<div class="next_tab_content">
		<div class="edit_password_nav">
			<form method="post" id="mypassword">
				<table id="my_password">
				<tr><td class="td"  align="right">用户名：</td><td colspan="2" width="165"><?php echo $userInfo['Phone']?></td></tr>
				<tr><td class="td"  align="right">原密码：</td><td  width="165"><input type="password" name="oldpwd" style="margin: 0"/></td><td><em>请输入您的原密码</em></td></tr>
				<tr><td class="td"  align="right">新密码：</td><td  width="165"><input type="password" name="newpwd" style="margin: 0"/></td><td><em>请使用8-16个字符的英文字母、符号和数字的组合</em></td></tr>
				<tr><td class="td" align="right">确认密码：</td><td  width="165"><input type="password" name="chkpwd" style="margin: 0"/></td><td><em>请再次输入密码</em></td></tr>
				<tr><td class="td" align="right"></td><td colspan="2"><input type="submit" id="password_submit" data-result="<?php echo $result;?>" class="btn btn-info passwordbtn" value="立即修改" /></td></tr>
				</table>
			</form>
		</div>
	</div>
	<?php else: ?>
		<div class="ui-tipbox ui-tipbox-stop">
		    <div class="ui-tipbox-icon">
		        <i class="iconfont" title="阻止">&#xF048;</i>
		    </div>
		    <div class="ui-tipbox-content">
		        <h3 class="ui-tipbox-title">您使用了QQ登陆本平台</h3>
		        <p class="ui-tipbox-explain">当前使用的是您的QQ密码，故无法更改密码</p>
		    </div>
		</div>
	<?php endif; ?>
</div>

<script type="text/javascript">
$(document).ready(function(){
	var nn = $('#password_submit').data('result');
	// console.log(nn);
	if (nn == true) {
		Messenger().post({
		  message: "保存成功"
		}, {
		  url: "/some-url",
		  success: function() {}
		});
	// console.log('55666666666666665');
	};
});
</script>