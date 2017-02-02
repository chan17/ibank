<?php
// Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/css/login/index.css");

$this->pageTitle="我的消息 - ".Yii::app()->name;
?>

<div class="span8">
	<ul class="next_tab">
		<li class="on">我的消息</li>
	</ul>
       
	<div class="next_tab_content">
		<div class="record_list_nav">
			<table cellpadding="0" cellspacing="0">
				<tbody>
					<tr class="tit_nav">
						<th>发信人</th>
						<th width="200">内容</th>
						<th>日期</th>
						<th>操作</th>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
