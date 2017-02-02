<?php
/* @var $this LoginController */
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/css/error/index.css");
// Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/libs/bootstrap/v3/css/bootstrap.min.css");
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/js/default/index.js",CClientScript::POS_END);
$this->pageTitle="出错啦 - ".Yii::app()->name;

?>
<style type="text/css">
body{
	background: #e9e7e8;
}
</style>
<div class="pg-container">
	<main class="ui-main">
		<div src="" class="ui-img-smile"></div>
		<!-- <h2>Error <?php /*echo $code; */?></h2> -->

		<h1 class="ui-error-text" style="color:#933;"><?php echo CHtml::encode($statusMS); ?></h1>
		<h1 class="ui-error-text"><?php echo CHtml::encode($message); ?></h1>
		<div class="ui-exit-button">
			您可以去:
			<a href="<?php echo ''.Yii::app()->createUrl('default/index')?>" class="ui-button ui-button-lwhite ui-exit-button-index-link"><div class="ui-exit-button-index"></div></a>
			<p class="ui-exit-button-or">或</p>
			<a href="<?php echo Yii::app()->createUrl('Blog/Article',array('flag'=>'help'));?>" target="_blank" class="ui-button ui-button-lwhite"><div class="ui-exit-button-help"></div></a>
			<img class="">
		</div>
	</main>
</div>