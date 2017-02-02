<?php
/* @var $this UserCardController */
/* @var $model UserCard */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-card-ownCard-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Uid'); ?>
		<?php echo $form->textField($model,'Uid'); ?>
		<?php echo $form->error($model,'Uid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Org'); ?>
		<?php echo $form->textField($model,'Org'); ?>
		<?php echo $form->error($model,'Org'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Create_time'); ?>
		<?php echo $form->textField($model,'Create_time'); ?>
		<?php echo $form->error($model,'Create_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Update_time'); ?>
		<?php echo $form->textField($model,'Update_time'); ?>
		<?php echo $form->error($model,'Update_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FullName'); ?>
		<?php echo $form->textField($model,'FullName'); ?>
		<?php echo $form->error($model,'FullName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Job'); ?>
		<?php echo $form->textField($model,'Job'); ?>
		<?php echo $form->error($model,'Job'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Mobile'); ?>
		<?php echo $form->textField($model,'Mobile'); ?>
		<?php echo $form->error($model,'Mobile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Business'); ?>
		<?php echo $form->textField($model,'Business'); ?>
		<?php echo $form->error($model,'Business'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LoanRate'); ?>
		<?php echo $form->textField($model,'LoanRate'); ?>
		<?php echo $form->error($model,'LoanRate'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->