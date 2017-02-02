<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */

?>

<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/css/loanDetail/index.css");

/* @var $this LoanDetailController */
$this->pageTitle = $aload['loanBaseInfo']['Loan_title']." - ".$aload['loanBaseInfo']['Loan_effect_type']." - ".Yii::app()->name;
// $this->breadcrumbs=array(
// 	'Login',
// );
?>

<div role="main" class="main-row-container main-row">
<div class="ui-box-white-bg" id="">
	<?php if($prompt): ?>
		<div class="ui-tiptext-container ui-tiptext-container-success">
		    <p class="ui-tiptext ui-tiptext-success">
		        <i class="ui-tiptext-icon iconfont" title="成功">&#xF049;</i>
		        恭喜您付款成功,本平台已自动扣取查看费用。
		    </p>
		</div>
	<?php endif; ?>
	<div class="ui-box-title">
		<i class="ui-box-icon" id="ui-personal"></i>
		借款详情
	</div>

	<div class="ui-box-main text-center">
		<!-- 写错了 -->
		<?php if ($user == NULL) {
			$loginUrl = Yii::app()->createUrl('login/index');
			echo "<p id='plase-login' class='text-center'>请先<a href='$loginUrl'>登录</a>,后查看</p>";
		}else{ ?>
		
		
		<div class="ui-table-container">
		<table class="ui-table ui-table-noborder">
			<thead>
			    <tr>
		            <td>借款发布人</td>
		            <td>借款类型</td>
		            <td>信用度</td>
		            <td>年收入</td>
		            <td>借款额度</td>
		            <td>借款期限</td>
		            <td>借款次数</td>
		            <td>点击收益</td>
		            <td>单次点击收益</td>
		        </tr>
		    </thead>
		    <tbody>
		        <tr>
		            <td><?php echo $aload['loanUserInfo']['Nike_name']; ?></td>
		            <td><?php echo $aload['loanBaseInfo']['Loan_effect_type']; ?></td>
		            <td><?php echo $user['Level']; ?></td>
		            <td><?php echo $aload['loanUserInfo']['Year_revenue'].'万元'; ?></td>
		            <td><?php echo $aload['loanBaseInfo']['Loan_amount'].'元';; ?></td>
		            <td><?php echo $aload['loanBaseInfo']['Loan_tern_type'].'个月'; ?></td>
		            <td><?php echo $user['loan_count'].'次'; ?></td>
		            <td><?php echo $aload['loanBaseInfo']['Income'].'元';; ?></td>
		            <td><?php echo $user['SingleIncome'].'元';; ?></td>
		        </tr>
		    </tbody>
		</table>
		</div>
		<?php } ?>

	</div>
</div>

<div class="ui-box-white-bg" id="">
	<div class="ui-box-title">
		<i class="ui-box-icon" id="ui-verify"></i>
		审核状态
	</div>

	<div class="" style="border-radius:15px;broder:none;">
		
		<table id="ui-verify-table" class="ui-table ui-table-noborder">
		    <thead>
		        <tr id="verify-thead">
		            <th width="33%">审核项目</th>
		            <th width="34%">状态</th>
		            <th width="33%">通过日期</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php foreach ($prove as $key => $value) {
				    echo '<tr>';
		        	echo '<td>'.$proveName[$key].'</td>';
		        	if ($value != NULL) {
			        	echo '<td class="verify-hook"><i></i></td>';
		        	}else{
		        		echo '<td class="verify-fork"><i></i></td>';
		        	}
		        	echo '<td class="verify-time">'.date('Y-m-d',$aload['loanUserProve']['Update_time']).'</td>';
				    echo '</tr>';
		    	}?>

		    </tbody>
		</table>
	</div>
</div>

<div class="ui-box-white-bg" id="">
	<div class="ui-box-title">
		<i class="ui-box-icon" id="ui-introduction"></i>
		贷款描述
	</div>

		<!-- <div id="verify-thead"></div> -->
	<div class="ui-box-main">
		<p><?php echo $aload['loanBaseInfo']['Loan_description']; ?></p>
	</div>
</div>
</div>