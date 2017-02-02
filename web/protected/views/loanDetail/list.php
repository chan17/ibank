<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */

/* 之前给假数据 写的界面，舍不得删~ */

?>

<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/css/loanDetail/index.css");

/* @var $this LoanDetailController */
$this->pageTitle = $aload['Loan_title']." - ".$aload['Loantype']." - ".Yii::app()->name;
// $this->breadcrumbs=array(
// 	'Login',
// );
?>


<?php
	// var_dump('借款发布人');
	// var_dump('借款类型',);
	// var_dump('性用度',$aload['user']['Level']);
	// var_dump('性用度',);
	// var_dump('性用度',$aload['loanUserInfo']['Year_revenue']);?>

<div class="ui-box-white-bg" id="">
	<div class="ui-box-title">
		<i class="ui-box-icon" id="ui-personal"></i>
		个人详情
	</div>

	<div class="ui-box-main text-center">
		<?php if ($user == NULL) {
			$loginUrl = Yii::app()->createUrl('login/index');
			echo "<p id='plase-login' class='text-center'>请先<a href='$loginUrl'>登录</a>,后查看</p>";
		}else{ ?>
 		
		<div class="ui-table-container">
		<table class="ui-table ui-table-noborder">
			<thead id="ui-userinfo-thead">
			    <tr>
		            <td>借款发布人</td>
		            <td>借款类型</td>
		            <td>信用度</td>
		            <td>年收入</td>
		            <td>借款额度</td>
		            <td>借款期限</td>
		            <td>借款次数</td>
		            <!-- <td>违约记录</td> -->
		            <td>点击收益</td>
		            <td>每次点击收益</td>
		            <td>QQ</td>
		            <td>邮箱</td>
		        </tr>
		    </thead>
		    <tbody>
		        <tr>
		            <td><?php echo $aload['NickName']; ?></td>
		            <td><?php echo $aload['Loantype']; ?></td>
		            <td><?php echo $user['Level']; ?></td>
		            <td><?php echo $aload['Year_revenue'].'万元'; ?></td>
		            <td><?php echo $aload['Jine'].'元';; ?></td>
		            <td><?php echo $aload['Endtime'].'个月'; ?></td>
		            <td><?php echo $user['loan_count'].'次'; ?></td>
		            <!-- <td><?php /*echo ;*/ ?></td> -->
		            <td><?php echo $aload['Income'].'元';; ?></td>
		            <td><?php echo $aload['SingleIncome'].'元';; ?></td>
		            <td><?php echo $aload['QQ']; ?></td>
		            <td><?php echo $aload['Email']; ?></td>
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
		审核进度
	</div>

	<!-- <div class=""> -->
		
		<table id="ui-verify-table" class="ui-table ui-table-layout-fixed">
		    <thead >
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
		        	echo '<td class="verify-time">'.date('Y-m-d',$aload['Create_time']).'</td>';
				    echo '</tr>';
		    	}?>

		    </tbody>
		</table>
	<!-- </div> -->
</div>

<div class="ui-box-white-bg" id="">
	<div class="ui-box-title">
		<i class="ui-box-icon" id="ui-introduction"></i>
		贷款描述
	</div>

	<div class="ui-box-main">
		<p><?php echo $aload['LoanDetail']; ?></p>
	</div>
</div>