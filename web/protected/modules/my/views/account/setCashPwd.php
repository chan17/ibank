<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/css/account/set-cash-pwd.css");

$this->pageTitle="设置提现密码 - ".Yii::app()->name;
?>
<div id="CashPwd-content">
	<div id="CashPwd-tab" class="ui-tab">
	    <ul class="ui-tab-items">
	        <li class="ui-tab-item  <?php ($tab=='SetPwd')?print'ui-tab-item-current':'';?>">
	            <a href="<?php echo $this->createUrl('/my/account/SetCashPassword',array('tab'=>'SetPwd'));?>">提现密码</a>
	        </li>
<!-- 	        <li class="ui-tab-item <?php ($tab=='ForgetPwd')?print'ui-tab-item-current':'';?>">
	            <a href="<?php echo $this->createUrl('/my/account/SetCashPassword',array('tab'=>'ForgetPwd'));?>">找回密码</a>
	        </li> -->
	    </ul>
	</div>
	<div id="get-pwd">
		<p class="">为了您的账户安全，请定期更换提现密码，并确保提现密码设置与登录密码不同。</p>
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'setcashpassword-form',
			// 'enableAjaxValidation'=>true,
			'enableClientValidation'=>true,
		)); 
			CHtml::$afterRequiredLabel = '';
		?>
		<?php if ($error != '') { ?>
		<div class="ui-tiptext-container ui-tiptext-container-error">
	    <p class="ui-tiptext ui-tiptext-error">
	        <i class="ui-tiptext-icon iconfont" title="出错">&#xF045;</i>
			<?php  echo $error; ?>
	    </p>
		</div>
		<?php } ?>


		<?php if($tab == 'SetPwd'):?>
	
	        <?php if($firstSet == false):?>
				<div class="row ui-form-item">
					<?php echo $form->labelEx($model,'oldpwd',array('class'=>'ui-label')); ?>
					<?php echo $form->passwordField($model,'oldpwd',array('class'=>'ui-input')); ?>
					<?php echo $form->error($model,'oldpwd',array('class'=>'ui-form-explain ui-tiptext ui-tiptext-error')); ?>
				</div>
			<?php endif; ?>
				<div class="row ui-form-item">
					<?php echo $form->labelEx($model,'newpwd',array('class'=>'ui-label')); ?>
					<?php echo $form->passwordField($model,'newpwd',array('class'=>'ui-input')); ?>
					<?php echo $form->error($model,'newpwd',array('class'=>'ui-form-explain ui-tiptext ui-tiptext-error')); ?>
				</div>
				<div class="row ui-form-item">
					<?php echo $form->labelEx($model,'chkpwd',array('class'=>'ui-label')); ?>
					<?php echo $form->passwordField($model,'chkpwd',array('class'=>'ui-input')); ?>
					<?php echo $form->error($model,'chkpwd',array('class'=>'ui-form-explain ui-tiptext ui-tiptext-error')); ?>
				</div>
				<div class="row buttons ui-form-item  text-center">
					<?php echo CHtml::submitButton('提交',array('class'=>'btn btn-info passwordbtn change-pwd-button','data-result'=>$result)); ?>
				</div>
			<?php $this->endWidget(); ?>

		<?php endif; ?>
		<?php if($tab == 'ForgetPwd'):?>

		<?php endif; ?>


	</div>

</div>

<script type="text/javascript">
$(document).ready(function(){
	var nn = $('.change-pwd-button').data('result');
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