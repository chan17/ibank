<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/css/account/cash.css");

$this->pageTitle="账户提现 - ".Yii::app()->name;
?>
<style>
	.ui-form-explain{
		margin-left: 105px;
	}
</style>
<div class="span8">
	<div class="drawnew_nav">
		<div class="drawnew_tit" style="height:auto;">
			<div class="money float_l" >可用余额：<span>&#165;<?php echo $rechargeInfo['Yue'];?></span>元</div>
		</div>

		<?php if ($error != ''): ?>
		<div class="ui-tiptext-container ui-tiptext-container-error">
	    <p class="ui-tiptext ui-tiptext-error">
	        <i class="ui-tiptext-icon iconfont" title="出错">&#xF045;</i>
			<?php  echo $error; ?>
	    </p>
		</div>
		<?php endif; ?>
		<h3>选择提现银行卡</h3>
		
		<hr>
		<form class="ui-form" name="" method="post" action="" id="ui-cash-form">
		    <fieldset>

	        <div class="ui-form-item">
	            <label for="" class="ui-label">
	                <span class="ui-form-required">*</span>提取金额
	            </label>
	            <input class="ui-input" type="text">
	        </div>

	        <div class="ui-form-item">
	            <input type="submit" class="ui-button ui-button-mblue" value="提现">
	        </div>
	        </fieldset>
		</form>

			<div class="ui-tiptext-container" style="margin-top:80px;margin-left:20px;width:90%;background: #f0f4f7;">
	    <p class="ui-tiptext ui-tiptext-message">
	        <i class="ui-tiptext-icon iconfont" title="提示">&#xF046;</i>
	        提示
	    </p>
	    <ul class="ui-list" >
	    	<li class="ui-list-item"><span class="ui-list-item-text">
	    		 收到您的提现请求后，本平台将在1个工作日（双休日或法定节假日顺延）处理您的提现申请，请您注意查收 </span></li>
	    	<li class="ui-list-item"><span class="ui-list-item-text">
	    		 本平台审核后3-10个工作日内打款致您的账户 </span></li>
	    	<li class="ui-list-item"><span class="ui-list-item-text">
	    		本平台将通过易宝支付进行提款操作 </span></li>
	    </ul>
	</div>

	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	var nn = $('.get-cash-button').data('result');
	// console.log(nn);
	if (nn == true) {
		Messenger().post({
		  message: "提款成功"
		}, {
		  url: "/some-url",
		  success: function() {}
		});
	}
	if (nn == false) {
		Messenger().post
	    message: 'There was an explosion while processing your request.'
	    type: 'error'
	    showCloseButton: true
	};
});
</script>