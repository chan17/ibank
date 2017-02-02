<?php
/* @var $this LoginController */
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/css/default/index.css");
// Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/libs/bootstrap/v3/css/bootstrap.min.css");
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/js/default/index.js",CClientScript::POS_END);
$this->pageTitle="".Yii::app()->name;
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
	  <?php foreach($posts as $row):?>
		<div id="card-box">
			<div id="card-title">
				<?php if ($row['Status'] == 1) {
					echo '<div class="card-title-flag-ongoing"></div>';
					echo '<p>信贷经理审核通过后，个人投资者才可以追加小额投资。</p>';
				}elseif ($row['Status'] == 2) {
					echo '<div class="card-title-flag-end"></div>';
					echo '<p> 此用户已成功从优质机构获取贷款，个人投资者可以追加投资。</p>';
				}?>
			</div>

			<div id="card-main">
				<div class="card-main-avatar "></div>
				<div class="card-main-info">
					<div class="card-main-info-black">
					  <ul>
					    <li class="ui-list-item">借款人：<span><?php echo  $userInfo[$row['LoanId']]['Nike_name'];?></span></li>
					    <li class="ui-list-item">借款金额：<span style="color:#933"><?php echo  $row['Loan_amount'];?></span>元</li>
					    <li class="ui-list-item">借款期限：<span style="color:#933"><?php echo  $row['Loan_tern_type'];?></span>个月</li>
					    <li class="ui-list-item">年收入：<span style="color:#933"><?php echo $userInfo[$row['LoanId']]['Year_revenue']/10000 ;?></span>万元</li>
					    <li class="ui-list-item">借款用途：<span><?php echo $loadType[$row['Loan_effect_type']] ;?></span></li>
					    <li class="ui-list-item">借款人类型：<span><?php echo $Publisher_type [ $userInfo[$row['LoanId']]['Publisher_type']  ];?></span></li>
					  </ul>
					</div>
					<div class="card-main-info-black  card-main-info-black-last">
						<div class="card-title-level">
							<span>信用度:</span>
							<?php
							$levelNum = strlen($aboutUser[$row['Uid']]['Level']);
								for ($i=0; $i < $levelNum; $i++) { 
									echo '<div class="card-title-star"></div>';
								}
								if ($levelNum<5) {
									$step = 5-$levelNum;
									for ($i=0; $i < $step ; $i++) { 
										echo '<div class="card-title-star-hide"></div>';
									}
								}
							?>
						</div>

						<?php if (empty(Yii::app()->user->purview)) {
						 	$purview =0;
						} 
						if ( $purview == 0): ?>
							<a href="<?php echo Yii::app()->createUrl('LoanDetail/item',array('id'=>$row['LoanId']));  ?>">
								<button class="card-main-buttom-manager" data-toggle="modal" data-target="#myModal"></button>
							</a>
						<?php else: ?>
							<!-- <div class="card-main-buttom-manager"></div> -->
							<div class="card-main-buttom-manager"></div>
						<?php endif; ?>

						<?php if( $row['Status'] == 2): ?>
						<a href="<?php echo Yii::app()->createUrl('LoanDetail/item',array('id'=>$row['LoanId'])); ?>"><div class="card-main-buttom-personal-on"></div></a>
						<?php else:?>
							<div class="card-main-buttom-personal-off"></div>
						<?php endif;?>
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
					      </div>
					      <div class="modal-body">
					        ...
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        <button type="button" class="btn btn-primary">Save changes</button>
					      </div>
					    </div><!-- /.modal-content -->
					  </div><!-- /.modal-dialog -->
					</div><!-- /.modal -->
					</div>
				</div>
			</div>
		</div>
	  <?php endforeach;?>
  		<div class="link-pager">
			 <?php
			 //分页widget代码: 
			 $this->widget('WebLinkPager',array(
			 	'pages'=>$pages,
			 	'prevPageLabel' => '上一页',
			 	'nextPageLabel' => '下一页',
			 	'htmlId' => 'card-main-pagination',
		 	));
			?>
  		</div>
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

<?php 
// Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/libs/bootstrap/v3/js/bootstrap.min.js");
 ?>
<script type="text/javascript">
	$(document).ready(function(){
	});
</script>