<?php if (!empty($posts)): ?>
<?php foreach($posts as $row):?>
<div id="card-box">
	<div id="card-title">
		<?php if ($row['Status'] == 1) {
			echo '<div class="card-title-flag-ongoing"></div>';
			echo '<p>查询借贷信息所产生的点击收益归借款发布人所有。</p>';
		}elseif ($row['Status'] == 2) {
			echo '<div class="card-title-flag-end"></div>';
			echo '<p>查询借贷信息所产生的点击收益归借款发布人所有。</p>';
		}?>
	</div>

	<div id="card-main">
		<div class="card-main-avatar "></div>
			<?php if(!empty($loancCollection)): ?>
				<?php if(in_array($row['LoanId'],$loancCollection)): ?>
					<i class="card-main-Bought"></i>
				<?php endif; ?>
			<?php endif; ?>
		<div class="card-main-info">
			<div class="card-main-info-black">
			  <ul>
			    <li class="ui-list-item">借款人：<span><?php echo $aboutUser[$row['Uid']]['Nickname'];?></span></li>
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
					<?php $levelNum = strlen($aboutUser[$row['Uid']]['Level']);
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
				<!-- todo  -->
				<?php
				if ( $purview == 0): ?>
                    <!-- 信贷经理 -->
					<a class="loan-manage" data-loanid="<?php echo $row['LoanId'] ?>"
						data-loanurl="<?php echo Yii::app()->createUrl('loanDetail/Item',array('id'=>$row['LoanId']));?>"
						data-url="<?php echo Yii::app()->createUrl('default/ajaxIsPoor',array('id'=>$row['LoanId']));?>">
						<button class="card-main-buttom-manager"></button>
					</a>
				<?php else: ?>
                    <!-- 普通投资者 -->
					<a class="loan-manage" data-loanid="<?php echo $row['LoanId'] ?>"
						data-url="<?php echo Yii::app()->createUrl('default/ajaxIsPoor',array('id'=>$row['LoanId']));?>">
						<button class="card-main-buttom-manager"></button>
					</a>
					<!-- <div class="card-main-buttom-manager"></div> -->
				<?php endif; ?>

			</div>

		</div>
	</div>
</div> <!-- card-box end -->
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

<div class="modal  payModal" id="loanModal" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">正在付款中 . . .</h4>
      </div>
      <div class="modal-body">
      	<div id="click-price">
      		<b>查看价格：</b><span id="number-price"></span> 元
      		<br /><br />
      	</div>
      	<p id="modal-body-content">

      	</p>
      </div>
      <div class="modal-footer" style="color: white;">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <a id="button-recharnge" type="button" href=""  data-url="<?php echo $this->createUrl('/my/account/recharge',array('loanId'=>''));?>" target="_blank" class=""  style="display:none"><button class="button-modal btn btn-primary">立刻充值</button></a>
        <a id="button-pay" type="button" href="" class="" data-url="<?php echo $this->createUrl('/PayLoanDetail/RechargeAfter',array('loanId'=>''));?>" style="display:none"><button class="button-modal btn btn-primary">立即支付</button></a>
        <a id="button-look" type="button" href="" class=""  style="display:none"><button class="button-modal btn btn-primary">立即查看</button></a>
        <a id="button-login" type="button" href="<?php echo Yii::app()->createUrl('login/index')?>" class=""  style="display:none"> <button class="button-modal btn btn-primary">立即登录</button></a>
      </div>
    </div><!-- /.modal-content-->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 

<?php else: ?>
	<div id="none-loan">
		<p>暂无当前城市的借款信息</p>
	</div>

<?php endif; ?>