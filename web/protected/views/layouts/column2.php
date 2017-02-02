<?php /* @var $this Controller */ 
// from admoinController
?>
<?php $this->beginContent('//layouts/main-admin'); ?>
<div class=" last" style="float:left;width:17%;">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>

<div class="" style="float:left;width:80%;">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<?php $this->endContent(); ?>