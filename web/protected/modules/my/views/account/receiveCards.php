<?php
// Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/css/login/index.css");

$this->pageTitle="收到的名片 - ".Yii::app()->name;
?>

<div class="span8">
	<ul class="next_tab">
		<li class="on">收到的名片</li>
	</ul>
       
	<div class="next_tab_content">
		<div class="record_list_tit">
		</div>
		<div class="record_list_nav">
			<table cellpadding="0" cellspacing="0">
				<tbody>
					<tr class="tit_nav">
						<th>日期</th>
						<th>名称</th>
						<th>机构</th>
						<th>职务</th>
						<th>手机号码</th>
						<th>利率</th>
						<th width="100">业务</th>
					</tr>
					<?php if(!empty($receiveCards)):foreach($receiveCards as $one):?>
					<tr>
						<th><?php echo date('Y-m-d', $one['Create_time']);?></th>
						<th><?php echo $one['cardInfo']['FullName']?></th>
						<th><?php echo OrgConstants::$orgs[$one['cardInfo']['Org']]?></th>
						<th><?php echo $one['cardInfo']['Job']?></th>
						<th><?php echo $one['cardInfo']['Mobile']?></th>
						<th><?php echo $one['cardInfo']['LoanRate']?></th>
						<th><?php echo $one['cardInfo']['Business']?></th>
					</tr>
					<?php endforeach;endif;?>
				</tbody>
			</table>
		</div>
	</div>
</div>
