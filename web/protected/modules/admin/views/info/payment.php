<?php /* @var $this LoginController */
$this->pageTitle="平台资金流动 - ".Yii::app()->name;
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
        <table class="table table-hover">
            <thead><tr>
                <th>id</th>
                <th>用户名</th>
                <th>借款订单</th>
                <th>流动类型</th>
                <th>涉及金额</th>
                <th>创建时间</th>
            </tr></thead>
            <tbody>
            <?php foreach ($posts as $key => $value):?>
                <tr>
                <td class="td-uid"><?php echo $value['Id'];?></td>
                <td class="td-nikename"><?php echo $postsUser[$value['Uid']];?></td>
                <td><?php echo $value['LoanId'];?>号</td>
                <td class="td-purview">￥<?php echo $value['Type']?></td>
                <td class="td-purview">￥<?php echo $value['Money']?></td>
                <td><?php echo date('y-m-d h:m',$value['Create_time']);?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
            <?php endif; ?>
</div>

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