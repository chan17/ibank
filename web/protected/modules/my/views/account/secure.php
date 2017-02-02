<?php
// Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/css/login/index.css");

$this->pageTitle="账户安全 - ".Yii::app()->name;
?>

<div class="span8">
	<ul class="next_tab">
		<li class="on"><a>安全中心</a></li>
	</ul>
	<div class="next_tab_content">
		<div class="alert fade in Security_setting_warning">
			<span style="width: 20%">安全等级：中</span>
			<span style="width: 70%; text-align: center;">建议您启动全部安全设置，以保障账户和资金安全</span>
		</div>
		<table class="Security_setting_list">
			<tr>
				<td><span class="Security_suc_icon1"></span></td>
				<td class="tits">登录密码</td>
				<td class="succ contents">定期更换密码让您的账户更安全。</td>
				<td><a href="<?php echo $this->createUrl('/my/account/upPwd');?>">修改</a></td>
			</tr>
<!-- 			<tr>
				<td><span class="Security_suc_icon1"></span></td>
				<td class="tits">提现密码</td>
				<td class="succ contents">提现时需要使用</td>
				<td><a href="<?php/* echo $this->createUrl('/my/account/SetCashPassword',array('tab'=>'SetPwd'));*/?>">修改</a></td>
			</tr> -->
			<!-- 
			<tr>
				<td><span class="Security_suc_icon2"></span></td>
				<td class="tits">身份认证</td>
				<td class="contents">用于提升安全性和信用分。认证后不能修改。</td>
				<td class="contents">通过认证</td>
			</tr>
			<tr>
				<td><span class="Security_icon3"></span></td>
				<td class="tits">手机绑定</td>
				<td class="contents">用于实时了解账户变动，享受拍拍贷手机服务。</td>
				<td><a href="/cert/mobile" target='_blank'>立即绑定</a></td>
			</tr>
			<tr>
				<td><span class="Security_suc_icon5"></span></td>
				<td class="tits">邮箱绑定</td>
				<td class="contents">享受拍拍贷邮箱服务，接收账单信息，保障账号安全。</td>
				<td><a href="/cert/email" target='_blank'>修改</a></td>
			</tr>
			 -->
		</table>
	</div>
</div>
