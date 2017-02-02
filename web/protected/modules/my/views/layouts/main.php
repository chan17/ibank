<?php /* @var $this AccountController */ ?>
<?php $this->beginContent('//layouts/main-front'); ?>

<link href="<?php echo Yii::app()->baseUrl;?>/css/loan/bootstrap-min.css" rel="stylesheet" />
<link href="<?php echo Yii::app()->baseUrl;?>/css/loan/validation-min.css" rel="stylesheet" />
<link href="<?php echo Yii::app()->baseUrl;?>/css/loan/imgareaselect-animated.css" rel="stylesheet">
<link href="<?php echo Yii::app()->baseUrl;?>/css/loan/default-min.css" rel="stylesheet" />
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/libs/HubSpot-messenger/build/css/messenger.css"); ?>

<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/libs/HubSpot-messenger/build/js/messenger.js");?>

<div class="PPD_header_nav" style="margin-bottom: 0;">
	<div class="PPD_login_status"></div>
</div>
    
<div class="clear"></div>

<div id="content_nav" class="row show-grid center980" style="margin-bottom:15%">
	<div class="left_navbar">
		<div>
			<div class="left_navbar_level1 my_borrower">我是借入者</div>
			<ul>
				<li<?php if('info'==Yii::app()->controller->getAction()->getId()){echo ' class="li_on"';}?>><a href="<?php echo $this->createUrl('/my');?>">我的账户首页</a></li>
				<li<?php if('loan'==Yii::app()->controller->getAction()->getId()){echo ' class="li_on"';}?>><a href="<?php echo $this->createUrl('/my/account/loan');?>">我的借款列表</a></li>
				<!-- <li><a href="<?php echo $this->createUrl('/my/account/msg');?>">我的消息</a></li> -->
			</ul>
		</div>
		<div>
			<div class="left_navbar_level1 my_settings">基本设置</div>
            <ul>
                <li<?php if('secure'==Yii::app()->controller->getAction()->getId()){echo ' class="li_on"';}?>><a href="<?php echo $this->createUrl('/my/account/secure');?>">安全中心</a></li>
				<li<?php if('upPwd'==Yii::app()->controller->getAction()->getId()){echo ' class="li_on"';}?>><a href="<?php echo $this->createUrl('/my/account/upPwd');?>">修改密码</a></li>
				<li<?php if('SetCashPassword'==Yii::app()->controller->getAction()->getId()){echo ' class="li_on"';}?>><a href="<?php echo $this->createUrl('/my/account/SetCashPassword',array('tab'=>'SetPwd'));?>">提现密码</a></li>
				<li<?php if('ownCard'==Yii::app()->controller->getAction()->getId()){echo ' class="li_on"';}?>><a href="<?php echo $this->createUrl('/my/account/ownCard');?>">我的名片</a></li>
				<li<?php if('receiveCards'==Yii::app()->controller->getAction()->getId()){echo ' class="li_on"';}?>><a href="<?php echo $this->createUrl('/my/account/receiveCards');?>">收到的名片</a></li>
            </ul>
        </div>
		<div>
			<div class="left_navbar_level1 my_management">资金管理</div>
			<ul>
				<li<?php if('recharge'==Yii::app()->controller->getAction()->getId()){echo ' class="li_on"';}?>><a href="<?php echo $this->createUrl('/my/account/recharge');?>">充值</a></li>
				<li<?php if('cash'==Yii::app()->controller->getAction()->getId()){echo ' class="li_on"';}?>><a href="<?php echo $this->createUrl('/my/account/cash');?>">提现</a></li>
				<li<?php if('moneyHistory'==Yii::app()->controller->getAction()->getId()){echo ' class="li_on"';}?>><a href="<?php echo $this->createUrl('/my/account/moneyHistory');?>">资金记录</a></li>
			</ul>
		</div>
    </div>
    <?php echo $content;?>
</div>

<div class="clear"></div>

<?php $this->endContent(); ?>