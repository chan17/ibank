<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cash-form',
	// 'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
)); 
	CHtml::$afterRequiredLabel = '';
?>
<div class="amount_nav">
	<div class="tit float_l">提现金额：</div>
	<?php echo $form->textField($model,'WithdrawAmount',array('maxlength'=>'8','type'=>'text','class'=>'')); ?>
	<?php echo $form->error($model,'WithdrawAmount',array('class'=>'ui-form-explain ui-tiptext ui-tiptext-error')); ?>
</div>

<div class="amount_nav">
	<div class="tit float_l">提现密码：</div>
	<?php echo $form->passwordField($model,'WithdrawPassword',array('type'=>'text','class'=>'','value'=>'')); ?>
	<?php echo $form->error($model,'WithdrawPassword',array('class'=>'ui-form-explain ui-tiptext ui-tiptext-error')); ?>
</div>

<div class="" style="margin:0 0 0 0">
	<?php echo CHtml::submitButton('提取',array('class'=>'btn btn-primary submit float_l get-cash-button','data-result'=>$result)); ?>
</div>

<?php $this->endWidget(); ?>