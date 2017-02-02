<?php
// Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/css/login/index.css");

$this->pageTitle="账户安全 - ".Yii::app()->name;
?>

<div class="span8">
	<ul class="next_tab">
		<li class="on">资金记录</li>
	</ul>
       
	<div class="next_tab_content">
		<div class="record_list_tit">
			<form action="<?php echo $this->createUrl('/my/account/moneyHistory')?>" method="GET">
			<input type="hidden" name="r" value="my/account/moneyHistory" />
				<table>
					<tr>
						<td align="right" width="80">资金类型：</td>
						<td>
							<select name="Type" id="Type" style="width: 197px;">
                                    <option <?php if(''==$_GET['Type']){echo 'selected';}?> value="">所有</option>
                                    <option <?php if('add'==$_GET['Type']){echo 'selected';}?> value="add">充值</option>
                                    <option <?php if('minus'==$_GET['Type']){echo 'selected';}?> value="minus">提现</option>
                                    <option <?php if('click'==$_GET['Type']){echo 'selected';}?> value="click">点击消费</option>
							</select>
						</td>
						<td align="right" width="60">时间：</td>
						<td>
							<select name="Time" id="Time" style="width: 96px;">
									<option <?php if(!$_GET['Time']){echo 'selected';}?> value="0">所有</option>
                                    <option <?php if(3==$_GET['Time']){echo 'selected';}?> value="3">三天以内</option>
                                    <option <?php if(7==$_GET['Time']){echo 'selected';}?> value="7">一周以内</option>
                                    <option <?php if(30==$_GET['Time']){echo 'selected';}?> value="30">一个月以内</option>
                                    <option <?php if(90==$_GET['Time']){echo 'selected';}?> value="90">三个月以内</option>
                                    <option <?php if(180==$_GET['Time']){echo 'selected';}?> value="180">六个月以内</option>
							</select>
						</td>
						<td align="left" width="90">
							<input class="btn btn-primary subbtn" type="submit" value="确定" id="btOk"/>
						</td>
					</tr>
				</table>
			</form>
		</div>
		<div class="record_list_nav">
			<table cellpadding="0" cellspacing="0">
				<tbody>
					<tr class="tit_nav">
						<th>日期</th>
						<th>类型</th>
						<th>余额</th>
						<th width="200">说明</th>
					</tr>
					<?php if(!empty($logPayments)):foreach($logPayments as $one):
						if('add'==$one->attributes['Type']){
							$_type = '充值';
							$_des = '成功充值&#165;'.$one->attributes['Money'];
						}elseif('minus'==$one->attributes['Type']){
							$_type = '提现';
							$_des = '成功提现&#165;'.$one->attributes['Money'];
						}elseif('click'==$one->attributes['Type']){
							$_type = '点击消费';
							$_des = '查看借款信息消费&#165;'.$one->attributes['Money'];
						}
					?>
					<tr>
						<th><?php echo date('Y-m-d H:i:s',$one->attributes['Create_time']);?></th>
						<th><?php echo $_type?></th>
						<th><?php echo $one->attributes['Money']?></th>
						<th width="200"><?php echo $_des;?></th>
					</tr>
					<?php endforeach;endif;?>
				</tbody>
			</table>
		</div>
	</div>
</div>
