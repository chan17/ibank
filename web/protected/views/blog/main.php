<?php /* @var $this blog Controller */ 
$flag = $_GET['flag'];
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/css/blog/main.css");
// Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/js/register.js",CClientScript::POS_END);
$this->beginContent('//layouts/main-front'); ?>
	<div class="main-row-container main-row">
		<div id="sidebar">
		  <ul class="ui-side-list">
		    <li class="ui-side-item <?php if($flag=='company'){echo'active';} ?>">
		      <a style="color: ;" id="ui-side-nav" class=" ui-side-item-link" href="<?php echo Yii::app()->createUrl('Blog/Article',array('flag'=>'company'));?>" target="_self">公司简介</a>
		    </li>
		    <li class="ui-side-item <?php if($flag=='media'){echo'active';} ?>">
		      <a style="color: ;" id="ui-side-nav" class=" ui-side-item-link" href="<?php echo Yii::app()->createUrl('Blog/Article',array('flag'=>'media'));?>" target="_self">媒体报道</a>
		    </li>
		    <li class="ui-side-item <?php if($flag=='join-us'){echo'active';} ?>">
		      <a style="color: ;" id="ui-side-nav" class=" ui-side-item-link" href="<?php echo Yii::app()->createUrl('Blog/Article',array('flag'=>'join-us'));?>" target="_self">招贤纳士</a>
		    </li>
		    <li class="ui-side-item <?php if($flag=='contact'){echo'active';} ?>">
		      <a style="color: ;" id="ui-side-nav" class=" ui-side-item-link" href="<?php echo Yii::app()->createUrl('Blog/Article',array('flag'=>'contact'));?>" target="_self">联系我们</a>
		    </li>
		    <li class="ui-side-item  <?php if($flag=='help'){echo'active';} ?>">
		      <a style="color: ;" id="ui-side-nav" class=" ui-side-item-link" href="<?php echo Yii::app()->createUrl('Blog/Article',array('flag'=>'help'));?>" target="_self">帮助中心</a>
		    </li>
		    <li class="ui-side-item <?php if($flag=='safety'){echo'active';} ?>">
		      <a style="color: ;" id="ui-side-nav" class=" ui-side-item-link" href="<?php echo Yii::app()->createUrl('Blog/Article',array('flag'=>'safety'));?>" target="_self">资金安全</a>
		    </li>
		    <li class="ui-side-item <?php if($flag=='parther'){echo'active';} ?>">
		      <a style="color: ;" id="ui-side-nav" class=" ui-side-item-link" href="<?php echo Yii::app()->createUrl('Blog/Article',array('flag'=>'parther'));?>" target="_self">合作伙伴</a>
		    </li>
		    <li class="ui-side-item <?php if($flag=='agreement'){echo'active';} ?>">
		      <a style="color: ;" id="ui-side-nav" class=" ui-side-item-link" href="<?php echo Yii::app()->createUrl('Blog/Article',array('flag'=>'agreement'));?>" target="_self">注册协议</a>
		    </li>
		    <li class="ui-side-item  <?php if($flag=='service-agreement'){echo'active';} ?>">
		      <a style="color: ;" id="ui-side-nav" class="last ui-side-item-link" href="<?php echo Yii::app()->createUrl('Blog/Article',array('flag'=>'service-agreement'));?>" target="_self">服务协议</a>
		    </li>
		  </ul>
		</div>
		
		<div id="pg-main" class="panel panel-default">
			<div class="ui-panel-title">
				<p id="main-title">

				</p>
			</div>
			<div class="panel-body">
				<?php echo $content; ?>
			</div>
		</div>
	</div>
<?php $this->endContent(); ?>

<script type="text/javascript">
	$(document).ready(function(){
		var currentFlag = $(".active a:first").text();
		console.log(currentFlag);
		$("#main-title").text(currentFlag);
	});
</script>