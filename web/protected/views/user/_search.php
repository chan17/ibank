<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Uid'); ?>
		<?php echo $form->textField($model,'Uid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Qqopenid'); ?>
		<?php echo $form->textField($model,'Qqopenid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Nickname'); ?>
		<?php echo $form->textField($model,'Nickname',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Password'); ?>
		<?php echo $form->passwordField($model,'Password',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Salt'); ?>
		<?php echo $form->textField($model,'Salt',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Gender'); ?>
		<?php echo $form->textField($model,'Gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Level'); ?>
		<?php echo $form->textField($model,'Level',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Email'); ?>
		<?php echo $form->textField($model,'Email'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Face'); ?>
		<?php echo $form->textField($model,'Face'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Type'); ?>
		<?php echo $form->textField($model,'Type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Status'); ?>
		<?php echo $form->textField($model,'Status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'True_name'); ?>
		<?php echo $form->textField($model,'True_name',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Phone'); ?>
		<?php echo $form->textField($model,'Phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PhoneVerified'); ?>
		<?php echo $form->textField($model,'PhoneVerified'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Roles'); ?>
		<?php echo $form->textField($model,'Roles',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'City'); ?>
		<?php echo $form->textField($model,'City',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CityId'); ?>
		<?php echo $form->textField($model,'CityId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Id_number'); ?>
		<?php echo $form->textField($model,'Id_number',array('size'=>19,'maxlength'=>19)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CheckidNum'); ?>
		<?php echo $form->textField($model,'CheckidNum'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CheckTel'); ?>
		<?php echo $form->textField($model,'CheckTel'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CheckName'); ?>
		<?php echo $form->textField($model,'CheckName'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CheckOutPwd'); ?>
		<?php echo $form->textField($model,'CheckOutPwd'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'OutMoneyPwd'); ?>
		<?php echo $form->textField($model,'OutMoneyPwd'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IsBlack'); ?>
		<?php echo $form->textField($model,'IsBlack'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Create_time'); ?>
		<?php echo $form->textField($model,'Create_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Update_time'); ?>
		<?php echo $form->textField($model,'Update_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Version'); ?>
		<?php echo $form->textField($model,'Version'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->