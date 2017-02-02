<?php
// Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/css/login/index.css");

$this->pageTitle="我的名片 - ".Yii::app()->name;
// var_dump($userInfo['Qqopenid']);exit();
?>

<div class="span8">
	<ul class="next_tab">
		<li  class="on"><a >我的名片</a></li>
	</ul>
	
	<?php if ($error != '') {?>
	<div class="ui-tiptext-container ui-tiptext-container-error">
    <p class="ui-tiptext ui-tiptext-error">
        <i class="ui-tiptext-icon iconfont" title="出错">&#xF045;</i>
		<?php  echo $error; ?>
    </p>
	</div>
	<?php } ?>
	
	<div class="next_tab_content">
		<div class="edit_password_nav">
			<form method="post" id="mypassword">
				<table id="my_password">
				<tr><td class="td"  align="right">姓名：</td><td  width="165"><input type="text" value="<?php echo $cardInfo['FullName']?>" name="FullName" style="margin: 0"/></td><td><em>请输入您的姓名</em></td></tr>
				<tr><td class="td"  align="right">职务：</td><td  width="165"><input type="text" value="<?php echo $cardInfo['Job']?>" name="Job" style="margin: 0"/></td><td><em>请输入您的职务</em></td></tr>
				<tr><td class="td" align="right">手机号码：</td><td  width="165"><input type="text" value="<?php echo $cardInfo['Mobile']?>" name="Mobile" style="margin: 0"/></td><td><em>请输入您的手机号码</em></td></tr>
				<tr><td class="td"  align="right">主要业务：</td><td  width="165"><input type="text" value="<?php echo $cardInfo['Business']?>" name="Business" style="margin: 0"/></td><td><em>请输入您的主要业务</em></td></tr>
				<tr><td class="td"  align="right">贷款利率：</td><td  width="165"><input type="text" value="<?php echo $cardInfo['LoanRate']?>" name="LoanRate" style="margin: 0"/></td><td><em>请输入您的贷款利率</em></td></tr>
				<tr><td class="td" align="right">所在机构：</td><td  width="165">
				<select name="Org" style="margin: 0;width:180px">
				<?php foreach(OrgConstants::$orgs as $_k=>$_n):?>
					<option <?php if($cardInfo['Org']==$_k){echo 'selected';}?> value="<?php echo $_k?>"><?php echo $_n?></option>
				<?php endforeach;?>
				</select>
				</td><td><em>请输入您的所在机构</em></td></tr>
				<tr><td class="td" align="right"></td><td colspan="2"><input type="submit" id="card_submit" data-result="<?php echo $result;?>" class="btn btn-info passwordbtn" value="保存内容" /></td></tr>
				</table>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	var nn = $('#card_submit').data('result');
	// console.log(nn);
	if (nn == true) {
		Messenger().post({
		  message: "保存成功"
		}, {
		  url: "/some-url",
		  success: function() {}
		});
	// console.log('55666666666666665');
	};
});
</script>