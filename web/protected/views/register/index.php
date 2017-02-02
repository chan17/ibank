<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/css/register/index.css");

$this->pageTitle="注册  - ".Yii::app()->name;

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/libs/jquery-validation/dist/jquery.validate.min.js");
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/libs/jquery-validation/src/localization/messages_zh.js");

// Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/js/register.js",CClientScript::POS_END);
//  上面那句有问题。
?>

<div role="main" class="main-row-container main-row">
<div id="reg-info-banner" class="">

		<?php if($war == 'Qq'):?>
			<p class="reg-info-banner-p6 ">您好！<?php echo $qquser['Nickname']; ?>  请完善以下信息，以便完成注册。</p>
		<?php else:?>
			<p class="reg-info-banner-p6 ">注册新账号</p>
		<?php endif;?>
	<p class="go-login reg-info-banner reg-info-banner-p6">已有账号？立刻<a href="<?php echo Yii::app()->createUrl('login/index')?>">登录</a></p>	
</div>

<div id="reg-tab-content" class="ui-box-white-bg">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'register-index-form',
	// 'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
)); 
	CHtml::$afterRequiredLabel = '';
?>

	<?php /*echo $form->errorSummary($model); */?>
	<?php if ($error != '') { ?>
		<div class="ui-tiptext-container ui-tiptext-container-error">
	    <p class="ui-tiptext ui-tiptext-error">
	        <i class="ui-tiptext-icon iconfont" title="出错">&#xF045;</i>
			<?php  echo $error; ?>
	    </p>
		</div>

	<?php } ?>
	<div class="row ui-form-item">
		<?php echo $form->labelEx($model,'Nickname',array('class'=>'ui-label'),array('class'=>'ui-label')); ?>
		<?php if ($war == 'Qq') {
			 echo $form->textField($model,'Nickname',array('class'=>'ui-input','value'=>$qquser['Nickname'])); 
		}else{
			 echo $form->textField($model,'Nickname',array('class'=>'ui-input')); 
		}?>
		<?php echo $form->error($model,'Nickname',array('class'=>'ui-form-explain ui-tiptext ui-tiptext-error')); ?>
	</div>

	<div class="row ui-form-item">
		<?php echo $form->labelEx($model,'Phone',array('class'=>'ui-label')); ?>
		<?php echo $form->textField($model,'Phone',array('class'=>'ui-input')); ?>
		<?php echo $form->error($model,'Phone',array('class'=>'ui-form-explain ui-tiptext ui-tiptext-error')); ?>
		<label for="RegisterForm_phoneVerified" id="phone-error" class="error" style="display:none">请输入手机号 ，再验证手机</label>
	</div>
	
	<div class="row buttons ui-form-item">
		<label class="ui-label" ></label>
		<button class="ui-input" name id="AjaxPhoneAuth" type="button">获取手机验证码</button>
		<?php /*echo CHtml::ajaxButton('获取手机确认码',Chtml::normalizeUrl('/register',array('phone'=>'')),array('id'=>'ajaxPhone
		','class'=>'ui-button ui-button-morange')); */?>
	</div>

	<div class="row ui-form-item">
		<?php echo $form->labelEx($model,'phoneVerified',array('class'=>'ui-label')); ?>
		<?php echo $form->textField($model,'phoneVerified',array('class'=>'ui-input')); ?>
		<?php echo $form->error($model,'phoneVerified',array('class'=>'ui-form-explain ui-tiptext ui-tiptext-error')); ?>
	</div>

	<?php if($war == 'Qq'):?>
	<?php else:?>
	<div class="row ui-form-item">
		<?php echo $form->labelEx($model,'Password',array('class'=>'ui-label')); ?>
		<?php echo $form->passwordField($model,'Password',array('class'=>'ui-input')); ?>
		<?php echo $form->error($model,'Password',array('class'=>'ui-form-explain ui-tiptext ui-tiptext-error')); ?>
	</div>

	<div class="row ui-form-item">
		<?php echo $form->labelEx($model,'confirmPassword',array('class'=>'ui-label')); ?>
		<?php echo $form->passwordField($model,'confirmPassword',array('class'=>'ui-input')); ?>
		<?php echo $form->error($model,'confirmPassword',array('class'=>'ui-form-explain ui-tiptext ui-tiptext-error')); ?>
	</div>
	<?php endif;?>

	<div class="row ui-form-item">
		<?php echo $form->labelEx($model,'purview',array('class'=>'ui-label')); ?>
		<?php echo $form->radioButtonList($model,'purview',array('0'=>'信贷经理','1'=>'个人用户'),array('required'=>true,'separator'=>'','labelOptions'=>array('_label'=>'i')) ); ?>
		<?php echo $form->error($model,'purview',array('class'=>'ui-form-explain ui-tiptext ui-tiptext-error')); ?>
	</div>
	
	<div class=" ui-form-item ui-form-row ">
		<?php echo $form->checkBox($model,'agree',array('class'=>'ui-checkbox ui-input-agree','checked'=>'checked'));?>
		<?php echo $form->labelEx($model,'agree',array('for'=>'test')); ?>
	</div>

	<div class="row buttons ui-form-item  text-center">
		<?php echo CHtml::submitButton('',array('class'=>'ui-input-submit register-button')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->

</div>
