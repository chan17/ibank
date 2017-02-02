<?php /* @var $this Controller */ 
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/css/loan/bootstrap-min.css");
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/css/loan/default-min.css");
// 
$this->pageTitle="申请贷款 - ".Yii::app()->name;
?>
<?php $this->beginContent('//layouts/main-front'); ?>
    <?php echo $content; ?>
<?php $this->endContent(); ?>

<style type="text/css">
label {
	display: inline-block;
	 margin-bottom: 0; 
	 font-weight:normal; 
}

#content_nav .span8{
	width:750px;
}
</style>