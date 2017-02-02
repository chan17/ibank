<?php /* @var $this LoginController */
$this->pageTitle="订单审核 - ".Yii::app()->name;
$this->breadcrumbs=array(
    'Login',
);
// Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/libs/arale/alice/one.css");
?>


<div>
    <div class="seach-user-from">
<!--         <form class="seach-from" method="post">
            <span class="label label-default">搜索用户名</span>
            <input type="text" class="seach-input-username" name="userneme">
            <span class="label label-default">搜索手机</span>
            <input type="text" class="seach-input-phone" name="phone">
            <input type="submit" class="seach-go ">
        </form> -->
    </div>
        <?php if(empty($posts)): ?>
            <p>暂无记录</p>
        <?php else: ?>
        <table class="table">
            <thead><tr>
                <th>id</th>
                <th>用户名</th>
                <th>借款状态</th>
                <th>城市</th>
                <th>用途</th>
                <th>标题</th>
                <th>贷款金额</th>
                <th>期限</th>
                <!-- <th>总收益</th> -->
                <th>创建时间</th>
                <th>操作</th>
            </tr></thead>
            <tbody>
            <?php foreach ($posts as $key => $value):?>
                <tr>
                <td class="td-uid"><?php echo $value['LoanId'];?></td>
                <td class="td-nikename"><?php echo $postsUser[$value['Uid']];?></td>
                <?php if($value['Status'] == 0): ?>
                <td><span class="label label-danger"><?php echo $loanStatus[$value['Status']];?></span></td>
                <?php else: ?>
                <td><span class="label label-default"><?php echo $loanStatus[$value['Status']];?></span></td>
                <?php endif; ?>
                <td class="td-purview"><?php echo $postsCity[$value['CityId']]?></td>
                <td class="td-purview"><?php echo $loanType[$value['Loan_effect_type']]?></td>
                <td class="td-purview"><?php echo mb_substr($value['Loan_title'],0,10,'utf-8')?></td>
                <td class="td-purview">￥<?php echo $value['Loan_amount']?></td>
                <td class="td-purview">￥<?php echo $value['Loan_tern_type']?>个月</td>
                <!-- <td class="td-purview">￥<?/*php echo $value['Income']*/?></td> -->
                <td><?php echo date('y-m-d h:m',$value['Create_time']);?></td>
                <td>
                    <div class="btn-group">
                    <button type="button" data-id="<?php echo $value['LoanId']; ?>" data-url="<?php echo $this->createUrl('/admin/audit/ajaxChangeStatus',array('loanid'=>$value['LoanId']))?>" class="change-status btn btn-danger btn-sm" <?php echo ($value['Status']!= 0)?'disabled="disabled"':''; ?>>通过审核</button>
                    <a href="<?php echo $this->createUrl('/admin/audit/loanDetail',array('id'=>$value['LoanId']))?>" target="_blank">
                        <button type="button" class="btn btn-primary btn-sm">详情</button></a>
                    </div>
                </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
            <?php endif; ?>

    <div class="linkpager">
    <?php $this->widget('CLinkPager',array(
    'pages'=>$pages,
    'header'=>'',
    // 'fristPageLabel'=>'首页',
    'lastPageLabel'=>'末页',
    'prevPageLabel'=>'上一页',
    'nextPageLabel'=>'下一页',
    'maxButtonCount'=>13,
    ));  ?></div>

</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('.change-status').click(function(){
            if (confirm('确定通过id为 '+$(this).data('id')+' 的审核？')) {
                $.post($(this).data('url'),function(data){
                    if (data == true) {
                        Messenger().post({
                           message: "保存成功",
                            type: 'success',
                        }, {
                          url: "/some-url",
                          success: function() {
                          }
                        });
                        setTimeout('location.reload(true);',2000);
                    }else{
                        Messenger().post({
                          message: "保存失败",
                           type: 'error',
                        }, {
                          url: "/some-url",
                          success: function() {}
                        });
                    };
                },"json");
            };
        });
    });

</script>