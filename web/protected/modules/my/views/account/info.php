<?php
// Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/css/login/index.css");

$this->pageTitle="我的账号 - ".Yii::app()->name;
?>
<div class="span5">
	<?php if($prompt): ?>
		<div class="ui-tipbox ui-tipbox-success" style="margin-top:10px;">
		    <div class="ui-tipbox-icon">
		        <i class="iconfont" title="成功">&#xF049;</i>
		    </div>
		    <div class="ui-tipbox-content">
		        <h3 class="ui-tipbox-title">恭喜您充值成功</h3>
		        <p class="ui-tipbox-explain">"账户余额"增加了不少呢~</p>
		    </div>
		</div>
	<?php endif; ?>
	<div class="create_list_info">
		<div class="info_tit">
			<div></div>
			<span class="float_l">个人信息</span>
		</div>
	    <div class="head_sculpture_nav" style="margin: 0 0 10px 10px;">
		<div class="head_sculpture">
		    <a href="javascript:;">
			<img src="http://static.ppdai.com/app_themes/images/head/nophoto_80.gif" title="更换头像" width="80" height="80" alt="更换头像"/>
		    </a>
		</div>
	    </div>
	    <div class="userinfo_nav">
		<h3><?php echo $userInfo['Phone'];?></h3>
			<div class="float_l">
			    <ul>
				<li>账户余额：&#165;<?php echo $rechargeInfo['Yue'];?></li>
				<li>冻结金额：&#165;<?php echo $rechargeInfo['ColdYue']?>
			    </ul>
			</div>
			<div class="float_l">
			    <ul style="margin-left: 5px; *margin-left: 0px; width: 200px;">
				<li>赠送金额：&#165;<?php echo $rechargeInfo['HandselYue']?>&nbsp;&nbsp; </li>
				<li><span class="float_l">账号安全等级：</span></li>
			    </ul>
			</div>
	    </div>
	</div>
	<div class="ui-tiptext-container ui-tiptext-container-message" style="margin-top:20px;">
	    <p class="ui-tiptext ui-tiptext-message">
	        <i class="ui-tiptext-icon iconfont" title="提示">&#xF046;</i>
	        提示
	    </p>
	    <ul class="ui-list" >
	    	<li class="ui-list-item"><span class="ui-list-item-text">
	    		<b>账户余额</b> 是您充值后的金额总数，您可以随时提取它。 </span></li>
	    	<li class="ui-list-item"><span class="ui-list-item-text">
	    		<b>冻结金额</b> 是您收到的借款点击金额，在借款结束后打入您的余额内。 </span></li>
	    	<li class="ui-list-item"><span class="ui-list-item-text">
	    		<b>赠送金额</b> 是本平台馈赠与您的一份小礼。 </span></li>
	    </ul>
	</div>

</div>