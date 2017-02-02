<?php /* @var $this Controller */ ?>
<?php $this->beginContent('/layouts/main'); ?>
    <div class="row">
        <div class="col-md-1">
            <ul class="nav nav-pills nav-stacked">
              <li class="<?php echo ($this->twoNav == 'loan')?'active':''; ?>">
                <a class="" href="<?php echo $this->createUrl('/admin/audit/loan')?>">借款订单审核</a>
              </li>
              <li class="<?php echo ($this->twoNav == 'withdrawal')?'active':''; ?>">
                <a class="" href="<?php echo $this->createUrl('/admin/audit/withdrawal')?>">提现审核</a>
              </li>

            </ul>
        </div>
        <div class="col-md-11">
            <?php echo $content; ?>
        </div>
    </div>
<?php $this->endContent();?>