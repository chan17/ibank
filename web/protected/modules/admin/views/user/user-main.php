<?php /* @var $this Controller */ ?>
<?php $this->beginContent('/layouts/main'); ?>
	<div class="row">
		<div class="col-md-2">
			<ul class="nav nav-pills nav-stacked">
			  <li class="<?php echo ($this->twoNav == 'ctrl')?'active':''; ?>">
			  	<a class="" href="<?php echo $this->createUrl('/admin/user/ctrl')?>">管理前台用户</a>
			  </li>
  			  <li class="<?php echo ($this->twoNav == 'recharge')?'active':''; ?>">
			  	<a class="" href="<?php echo $this->createUrl('/admin/user/recharge')?>">用户余额</a>
			  </li>
			  <li class="<?php echo ($this->twoNav == 'ctrlAdmin')?'active':''; ?>">
			  	<a class="" href="<?php echo $this->createUrl('/admin/user/ctrlAdmin')?>">管理后台用户</a>
			  </li>
			</ul>
		</div>
		<div class="col-md-10">
			<?php echo $content; ?>
		</div>
	</div>
<?php $this->endContent();?>