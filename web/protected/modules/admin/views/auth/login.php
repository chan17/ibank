<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/css/login/index.css");

/* @var $this LoginController */
$this->pageTitle="登录 - ".Yii::app()->name;
$this->breadcrumbs=array(
	'Login',
);
// Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/libs/arale/alice/one.css");
?>

<div role="main" class="main-row-container">
  <div id="use-login">
	<div id="login-from" class="form adaptive-login-from">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'user-index-form',
	   	'enableClientValidation'=>true, //表单
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

	<div class="ui-form-item ui-form-row ">
		<?php echo $form->labelEx($model,'UserName',array('class'=>'ui-label')); ?>
		<?php echo $form->textField($model,'UserName',array('class'=>'ui-input')); ?>
		<?php echo $form->error($model,'UserName',array('class'=>'ui-form-explain ui-tiptext ui-tiptext-error')); ?>
	</div>


	<div class="ui-form-item ui-form-row ">
		<?php echo $form->labelEx($model,'Password',array('class'=>'ui-label')); ?>
		<?php echo $form->passwordField($model,'Password',array('class'=>'ui-input')); ?>
		<?php echo $form->error($model,'Password',array('class'=>'ui-form-explain ui-tiptext ui-tiptext-error')); ?>
	</div>

	<div class="buttons ui-form-item ui-form-row text-center">
		<?php echo CHtml::submitButton('',array('class'=>'button-large login-buttom','id'=>'user-form-login-button','alt'=>'登陆')); ?>
	</div>

	<div id="no-account" class="ui-form-item ui-form-row text-center">
		<span>没有账号? </span>
		<span>请联系管理员</span>
	</div>

	<?php $this->endWidget(); ?>

	</div><!-- login-from -->

  </div>

</div>

<script type="text/javascript">
	$(document).ready(function(){
	$('#location-popover').popover();
	});
</script>