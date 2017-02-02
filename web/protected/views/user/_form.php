<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Qqopenid'); ?>
		<?php echo $form->textField($model,'Qqopenid'); ?>
		<?php echo $form->error($model,'Qqopenid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Nickname'); ?>
		<?php echo $form->textField($model,'Nickname',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'Nickname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Password'); ?>
		<?php echo $form->passwordField($model,'Password',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'Password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Salt'); ?>
		<?php echo $form->textField($model,'Salt',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'Salt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Gender'); ?>
		<?php echo $form->textField($model,'Gender'); ?>
		<?php echo $form->error($model,'Gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Level'); ?>
		<?php echo $form->textField($model,'Level',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'Level'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Email'); ?>
		<?php echo $form->textField($model,'Email'); ?>
		<?php echo $form->error($model,'Email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Face'); ?>
		<?php echo $form->textField($model,'Face'); ?>
		<?php echo $form->error($model,'Face'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Type'); ?>
		<?php echo $form->textField($model,'Type'); ?>
		<?php echo $form->error($model,'Type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Status'); ?>
		<?php echo $form->textField($model,'Status'); ?>
		<?php echo $form->error($model,'Status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'True_name'); ?>
		<?php echo $form->textField($model,'True_name',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'True_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Phone'); ?>
		<?php echo $form->textField($model,'Phone'); ?>
		<?php echo $form->error($model,'Phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PhoneVerified'); ?>
		<?php echo $form->textField($model,'PhoneVerified'); ?>
		<?php echo $form->error($model,'PhoneVerified'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Roles'); ?>
		<?php echo $form->textField($model,'Roles',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Roles'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'City'); ?>
		<?php echo $form->textField($model,'City',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'City'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CityId'); ?>
		<?php echo $form->textField($model,'CityId'); ?>
		<?php echo $form->error($model,'CityId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Id_number'); ?>
		<?php echo $form->textField($model,'Id_number',array('size'=>19,'maxlength'=>19)); ?>
		<?php echo $form->error($model,'Id_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CheckidNum'); ?>
		<?php echo $form->textField($model,'CheckidNum'); ?>
		<?php echo $form->error($model,'CheckidNum'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CheckTel'); ?>
		<?php echo $form->textField($model,'CheckTel'); ?>
		<?php echo $form->error($model,'CheckTel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CheckName'); ?>
		<?php echo $form->textField($model,'CheckName'); ?>
		<?php echo $form->error($model,'CheckName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CheckOutPwd'); ?>
		<?php echo $form->textField($model,'CheckOutPwd'); ?>
		<?php echo $form->error($model,'CheckOutPwd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'OutMoneyPwd'); ?>
		<?php echo $form->textField($model,'OutMoneyPwd'); ?>
		<?php echo $form->error($model,'OutMoneyPwd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IsBlack'); ?>
		<?php echo $form->textField($model,'IsBlack'); ?>
		<?php echo $form->error($model,'IsBlack'); ?>
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
		<?php echo $form->labelEx($model,'Version'); ?>
		<?php echo $form->textField($model,'Version'); ?>
		<?php echo $form->error($model,'Version'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->