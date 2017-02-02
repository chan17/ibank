<?php
/* @var $this LoginController */
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/css/default/index.css");
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/css/default/loan-modal.css");
// Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/libs/bootstrap/v3/css/bootstrap.min.css");
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/js/default/index.js",CClientScript::POS_END);
$this->pageTitle=Yii::app()->name."- 全国最大的贷款中介平台";
$this->breadcrumbs=array(
	'default',
);
?>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">

    <div id="first-slide" class="item active">
      <img src="<?php echo Yii::app()->request->baseUrl.'/img/default/banner/index.jpg'; ?>">
      <div id="carousel-main-text" class="carousel-caption">

      </div>
    </div>
    <div id="" class="item">
      <img src="<?php echo Yii::app()->request->baseUrl.'/img/default/banner/banner1.jpg'; ?>">
      <div id="carousel-main-text" class="carousel-caption">
      </div>
    </div>
    <div id="" class="item">
      <img src="<?php echo Yii::app()->request->baseUrl.'/img/default/banner/banner2.jpg'; ?>">
      <div id="carousel-main-text" class="carousel-caption">
      </div>
    </div>
    <div id="" class="item">
      <img src="<?php echo Yii::app()->request->baseUrl.'/img/default/banner/banner3.jpg'; ?>">
      <div id="carousel-main-text" class="carousel-caption">
      </div>
    </div>
    
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>


<div role="main" class="main-row-container main-row" id="loan-list">
	<div class="main-left-span8">
		<?php require_once('loanList.php'); ?>
	</div>

	<div class="main-left-span4">
		<div class="sidebar-box" class="loading-row">
			<div class="sidebar-box-title sidebar-box-top5bg"><p class="title-p "><span>收益TOP5</span></p></div>
			<?php foreach($top5 as $row):?>
				<p class="solid-main">
					&nbsp;&nbsp;&nbsp;&nbsp;恭喜<span class="text-tab"><?php echo $top5User[ $row['Uid'] ]; ?></span>，发布了<span class="text-tab">¥<?php echo $row['Loan_amount' ]; ?></span>的借款订单，并得到<span class="text-tab">¥<?php echo $row['Income']; ?></span>的点击收益。
				</p>
			<?php endforeach;?>
		</div>

		<div class="sidebar-box sidebar-box-taApply" class="loading-row">
			<div class="sidebar-box-title " id=""><p class="title-p "><span>TA们申请了</span></p></div>
			<div id="scrollDiv">
			<ul>

			  <?php foreach($taApply as $row):?>
			  <li>
				<p class="solid-main" id="solid-main-taApply">
					<span class="text-tab"><?php echo rand(1,38); ?>分钟前</span>：<?php echo $taApplyUser[ $row['Uid'] ]; ?><br>
					申请了借款金额为 <span class="text-tab-2">¥<?php echo $row['Loan_amount']; ?></span>的借款，<span class="text-tab-2"><?php echo $row['Loan_title' ]; ?></span>
				</p>
			  </li>
			  <?php endforeach;?>

			</ul>
			</div>
		</div>
	</div>
</div>

<div id="row-line"></div>

<div id="agency " class="main-row-container">
	<div class="agency-title">
		<p>合作机构</p>
	</div>
	<div class="agency-main">
		<img src="<?php echo Yii::app()->request->baseUrl.'/img/default/agency.png'; ?>">
	</div>
</div>