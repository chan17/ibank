<?php
$this->pageTitle="新手指引 - ".Yii::app()->name;

Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/css/guide/new-hand.css");
?>
<div class="pg-container-content">
    <div class="pg-products">
    <div class="pg-title">
        <h2 class="breadcrumbs">新手指引</h2>
    </div>
    <main class="pg-guide-content">
        <div class="ui-card" >
            <div class="ui-card-title">
                <i class="ui-card-title-icon-step"></i>
                <h3 class="ui-card-title-text">
                    借款步骤
                </h3>
            </div>
            <div class="ui-card-body">
                <p>欢迎来到世纪唯银，世纪唯银是国内最先引用借贷双方互相引荐模式的平台,您可在<a href="<?php echo Yii::app()->createUrl('login/index')?>" target="_blank">注册</a> 或 <a href="<?php echo Yii::app()->createUrl('register/index')?>" target="_blank">登录</a>后进行以下步骤：</p>
            </div>
            <img class="ui-card-body-banner" width="100%" height="180px" src="<?php echo Yii::app()->request->baseUrl; ?>/img/new-hand/banner.png">
        </div>
        <div class="ui-card" >
            <div class="ui-card-title">
                <i class="ui-card-title-icon-info"></i>
                <h3 class="ui-card-title-text">
                    借款资格、额度及准备资料
                </h3>
            </div>
            <div class="ui-card-body">
                <p>
                    <b>1. 借款资格</b></br>

                    &nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;借款人年龄在22周岁（含）至55周岁之间；</br>

                    &nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;借款人的税后月薪需在4000元人民币以上。</br>
                    </br>
                    <b>2. 借款金额、期限</b></br>

                    &nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;借款额度 1-50万元</br>

                    &nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;借款期限 12个月、18个月、24个月、36个月 四种供用户选择</br>

                     </br>

                    <b>3. 借款需要准备的资料</b></br>

                    &nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;身份证</br>

                    &nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;银行工资卡流水</br>

                    &nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;个人信用报告（ 去哪儿获取信用报告？）</br>
                </p>
            </div>
        </div>
        <div class="ui-card" >
            <div class="ui-card-title">
                <i class="ui-card-title-icon-howdo"></i>
                <h3 class="ui-card-title-text">
                    借款可以用来做什么
                </h3>
            </div>
            <div class="ui-card-body">
                <p>
                    <b>借款可以用来做什么?</b></br>
                    您在生活、工作或者学习中如需要借款，都可以在世纪唯银申请借款。</br>
</br>
                    <b>借款可以用来：</b></br>
                    生意周转、扩大生产、备货、创业、旅游、培训、结婚、住院看病、</br>
                    个人消费（家居家电、电子产品等等）、短期生活周转等等。</br>
                    而且和信贷经理建立联系后，在资金运用上如有疑问均可咨询这些专业人士，免除您的后顾之忧。</br>
                </p>
            </div>
        </div>

    </main >
    </div>
</div>