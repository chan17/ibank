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

<div id="login-banner">
	<img src="<?php echo Yii::app()->request->baseUrl.'/img/login/login_banner.png'; ?>" width="100%" height="276px">
</div>

<div role="main" class="main-row-container main-row">
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
		<?php echo $form->labelEx($model,'Phone',array('class'=>'ui-label')); ?>
		<?php echo $form->textField($model,'Phone',array('class'=>'ui-input')); ?>
		<?php echo $form->error($model,'Phone',array('class'=>'ui-form-explain ui-tiptext ui-tiptext-error')); ?>
	</div>


	<div class="ui-form-item ui-form-row ">
		<?php echo $form->labelEx($model,'Password',array('class'=>'ui-label')); ?>
		<?php echo $form->passwordField($model,'Password',array('class'=>'ui-input')); ?>
		<?php echo $form->error($model,'Password',array('class'=>'ui-form-explain ui-tiptext ui-tiptext-error')); ?>
	</div>

	<div class="rememberMe ui-form-item ui-form-row ">
		<?php echo $form->checkBox($model,'rememberMe',array('class'=>'ui-checkbox'));?>
		<?php echo $form->label($model,'rememberMe',array('for'=>'test')); ?>

			<a id="forget-pass" href="">忘记密码</a>
	</div>

	<div class="buttons ui-form-item ui-form-row text-center">
		<?php echo CHtml::submitButton('',array('class'=>'button-large login-buttom','id'=>'user-form-login-button','alt'=>'登陆')); ?>
	</div>

	<div id="no-account" class="ui-form-item ui-form-row text-center">
		<span>没有账号? </span>
		<a href="<?php echo Yii::app()->createUrl('register/index')?>">免费注册</a>
	</div>

	<?php $this->endWidget(); ?>

	</div><!-- login-from -->

	<div id="login-other">
		<a href="<?php echo Yii::app()->createUrl('LoginBind/Index')?>" class="text-center login-qq">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/login/qq_icon.png">
			<p class="text-center">QQ登录</p>
		</a>
	</div> <!-- end ogin-other -->
  </div>

</div>

<script type="text/javascript">
	$(document).ready(function(){
	$('#location-popover').popover();
	});
</script>