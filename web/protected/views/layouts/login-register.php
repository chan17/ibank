<?php /* 
@var $this Controller 
from front Controller
*/ ?>
<?php $this->beginContent('//layouts/main-front'); ?>
<div id="content">
	<?php echo $content; ?>
</div><!-- content -->
<?php $this->endContent(); ?>

<style type="text/css">
	.nav-block-location{
		display: none;
	}
	.nav-block-link{
		display: none;
	}
	.nav-block-user{
		float: right;
	}
</style>