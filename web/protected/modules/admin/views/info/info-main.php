<?php /* @var $this Controller */ ?>
<?php $this->beginContent('/layouts/main'); ?>
    <div class="row">
        <div class="col-md-2">
            <ul class="nav nav-pills nav-stacked">
              <li class="<?php echo ($this->twoNav == 'index')?'active':''; ?>">
                <a class="" href="<?php echo $this->createUrl('/admin/info/index')?>">首页</a>
              </li>
              <li class="<?php echo ($this->twoNav == 'GainClick')?'active':''; ?>">
                <a class="" href="<?php echo $this->createUrl('/admin/info/gainClick')?>">点击收益流水</a>
              </li>
              <li class="<?php echo ($this->twoNav == 'sendsms')?'active':''; ?>">
                <a class="" href="<?php echo $this->createUrl('/admin/info/SendSMS')?>">发送短信记录</a>
              </li>
              <li class="<?php echo ($this->twoNav == 'payment')?'active':''; ?>">
                <a class="" href="<?php echo $this->createUrl('/admin/info/Payment')?>">平台资金流动</a>
              </li>
            </ul>
        </div>
        <div class="col-md-10">
            <?php echo $content; ?>
        </div>

    </div>
<?php $this->endContent();?>