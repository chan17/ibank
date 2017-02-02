<?php
// Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/css/login/index.css");

$this->pageTitle="充值页面 - ".Yii::app()->name;
?>

<!--  <form action="/inpour" method="POST" id="aibankform"> -->
        <input type="hidden" name="InpourType" id="txtChannel" value="" />
        <input type="hidden" name="BankName" id="txtBank" value=""/>
        <div class="span8">
            <ul class="next_tab">
                <li class="on">充值</li>
            </ul>
            <div class="next_tab_content">
                <div class="rechargenew_nav">
                    <div class="rechargenew_tit" style="height:auto;">
                        <div class="money">可用余额：<span>&#165;<?php echo $rechargeInfo['Yue'];?></span>元</div>
                    </div>
                    <?php if ($error != '') {?>
                        <div class="ui-tiptext-container ui-tiptext-container-error">
                            <p class="ui-tiptext ui-tiptext-error">
                                <i class="ui-tiptext-icon iconfont" title="出错">&#xF045;</i>
                                <span id="ui-tip-text">请填写充值金额</span>
                            </p>
                        </div>
                    <?php } ?>

        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'cash-form',
            'enableClientValidation'=>true,
        )); 
            CHtml::$afterRequiredLabel = '';
        ?>
                    <div class="rechargenew_content">
                        <div class="tip">充值方式： 支持多家银行借记卡充值；支持支付宝充值平台.</div>
                        <div class="card_nav">
                            <div class="card">
                                <table cellpadding="0" cellspacing="0">
                                    <tr>
                                            <td>
<td>
            <input id="ytWithdrawAmount" type="hidden"  value="" name="payway"><span id="payway"><input checked="checked" type="radio" channel="alipayccc" id="payway_0" maxlength="8" class="" value="0" name="payway"> <label for="payway_0"></label></span>                                            
                                            </td>                                            
                                            </td>

                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="mon_nav">
                            <div style="font-size: 12px; color: #999; text-align: center;">
                                <input type="hidden" id="txtFreeAmount" value="0" />
                            </div>

                            <table>
                                <tr>
                                    <td align="right">充值金额：
                                    </td>
                                    <td align="left" style="width: 356px;">
                                        <div style="float: left; width: 108px; height: 48px; line-height: 48px;">
            <?php echo $form->textField($model,'Amount',array('name'=>'Amount','id'=>'Amount','style'=>'width: 71px;','type'=>'text','class'=>'')); ?>
                                               &nbsp;&nbsp;元
                                    <?php echo $form->error($model,'Amount',array('class'=>'ui-form-explain ui-tiptext ui-tiptext-error')); ?>
                                                </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="height: 47px;">
                                    <td align="right">实际到账：
                                    </td>
                                    <td>
                                        <span id="factAmount" style="height: 30px; line-height: 30px;"></span>元
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" height="35">手续费：
                                    </td>
                                    <td>
                                        <span><span id="fee"></span>元</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
  <!--       <?php echo CHtml::submitButton('充值',array('class'=>'btn btn-primary submit float_l','alt'=>'充值')); ?> -->

                                        <input type="submit" class="btn btn-primary submit float_l" value="充值" id="btnOk">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    
                </div>
        <?php $this->endWidget(); ?>

            </div>
        </div>
    <!-- </form> -->
<!-- 下面是chan17写的CSS -->
<style type="text/css">
#payway{
    background:url(<?php echo Yii::app()->request->baseUrl.'/img/my/yeepay-logo.png'; ?>) no-repeat;
    height: 42px;
    width: 200px;
    -moz-border-radius:6px;border-radius:6px;
    display: block;
}

</style>

<script type="text/javascript">
$(document).ready(function(){
    $(".ui-tiptext-container").hide();
    $("#ui-tip-text").empty();

    $("#Amount").keyup(function(){

        var userAmount = $("#Amount").val();
        userAmount = parseFloat(userAmount);

        if (userAmount.length < 1) {
            $(".ui-tiptext-container").show();
            $("#ui-tip-text").html("请输入金额");
            return false;
        }
        if (!/^\d+(\.\d{1,2})?$/.test(userAmount)) {
            $(".ui-tiptext-container").show();
            $("#ui-tip-text").html("请输入正确金额");
            return false;
        }
        if (userAmount <= 0.01) {
            $("#ui-tip-text").html("充值金额需大于0.01元");
            $(".ui-tiptext-container").show();
            return false;
        }
        if (userAmount > 10000000) {
            $("#ui-tip-text").html("充值金额需小于10000000元");
            $(".ui-tiptext-container").show();

            return false;
        }

        // console.log(typeof(userAmount));
        // console.log(userAmount);
        if (isNaN(userAmount)) {
            var actualAmount = 0;
            var formalities = 0;
        }else{
            var actualAmount = userAmount - (userAmount*0.008);
            var formalities = userAmount*0.008;
        };
        $(".ui-tiptext-container").hide();
        
        // console.log(typeof(actualAmount));
        // console.log(actualAmount);
        console.log(typeof(formalities));
        console.log(formalities);
        if (isNaN(actualAmount) || isNaN(formalities)) {
            actualAmount = 0;
            formalities = 0;
        };
        $("#factAmount").text(actualAmount.toFixed(2));

        $("#fee").text(formalities.toFixed(2));
    });
});

</script>