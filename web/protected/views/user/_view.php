<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Uid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Uid), array('view', 'id'=>$data->Uid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Qqopenid')); ?>:</b>
	<?php echo CHtml::encode($data->Qqopenid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nickname')); ?>:</b>
	<?php echo CHtml::encode($data->Nickname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Password')); ?>:</b>
	<?php echo CHtml::encode($data->Password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Salt')); ?>:</b>
	<?php echo CHtml::encode($data->Salt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Gender')); ?>:</b>
	<?php echo CHtml::encode($data->Gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Level')); ?>:</b>
	<?php echo CHtml::encode($data->Level); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Email')); ?>:</b>
	<?php echo CHtml::encode($data->Email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Face')); ?>:</b>
	<?php echo CHtml::encode($data->Face); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Type')); ?>:</b>
	<?php echo CHtml::encode($data->Type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php echo CHtml::encode($data->Status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('True_name')); ?>:</b>
	<?php echo CHtml::encode($data->True_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Phone')); ?>:</b>
	<?php echo CHtml::encode($data->Phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PhoneVerified')); ?>:</b>
	<?php echo CHtml::encode($data->PhoneVerified); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Roles')); ?>:</b>
	<?php echo CHtml::encode($data->Roles); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('City')); ?>:</b>
	<?php echo CHtml::encode($data->City); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CityId')); ?>:</b>
	<?php echo CHtml::encode($data->CityId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id_number')); ?>:</b>
	<?php echo CHtml::encode($data->Id_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CheckidNum')); ?>:</b>
	<?php echo CHtml::encode($data->CheckidNum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CheckTel')); ?>:</b>
	<?php echo CHtml::encode($data->CheckTel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CheckName')); ?>:</b>
	<?php echo CHtml::encode($data->CheckName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CheckOutPwd')); ?>:</b>
	<?php echo CHtml::encode($data->CheckOutPwd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('OutMoneyPwd')); ?>:</b>
	<?php echo CHtml::encode($data->OutMoneyPwd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IsBlack')); ?>:</b>
	<?php echo CHtml::encode($data->IsBlack); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Create_time')); ?>:</b>
	<?php echo CHtml::encode($data->Create_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Update_time')); ?>:</b>
	<?php echo CHtml::encode($data->Update_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Version')); ?>:</b>
	<?php echo CHtml::encode($data->Version); ?>
	<br />

	*/ ?>

</div>