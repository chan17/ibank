<?php
// Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/css/login/index.css");

$this->pageTitle="我的借款 - ".Yii::app()->name;
?>

<div class="span8">
	<ul class="next_tab">
		<li class="on"><a>借款列表</a></li>
	</ul>
	<div class="next_tab_content">
		<div class="published_list_nav">
			<table cellpadding="0" cellspacing="0">
				<tr class="tit_nav">
					<th width='150'>借款用途</th>
					<th width='135'>借款标题</th>
					<th width='100'>借款额度</th>
					<th width='90'>借款期限</th>
					<th width='90'>操作</th>
				</tr>
<?php 
	if(!empty($result)):
		foreach($result as $one):
?>
				<tr>
					<td><?php echo LoanConstants::$Loan_effect_type[$one['Loan_effect_type']];?></td>
					<td style="text-align: left; padding-left: 5px;"><?php echo $one['Loan_title'];?></td>
					<td>&#165;<?php echo $one['Loan_amount'];?></td>
					<td><?php echo LoanConstants::$Loan_tern_type[$one['Loan_tern_type']]?></td>
					<td><a href="<?php echo $this->createUrl('/apply/loan',array('s'=>LoanService::encodeS(1,$one['LoanId'])));?>">编辑</a></td>
				</tr>
<?php 
		endforeach;
	endif;
?>
			</table>
		</div>
	</div>
</div>
