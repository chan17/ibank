<?php /* @var $this LoginController */
$this->pageTitle="提现审核 - ".Yii::app()->name;
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
                <th>状态</th>
                <th>提款后余额</th>
                <th>冻结金额</th>
                <th>提款金额</th>
                <th>提款账户(卡号)</th>
                <th>提款账户姓名</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr></thead>
            <tbody>
            <?php foreach ($posts as $key => $value):?>
                <tr>
                <td class="td-uid"><?php echo $value['id'];?></td>
                <td class="td-nikename"><?php echo $postsUser[$value['Uid']];?></td>
                <?php if($value['Status'] == 0): ?>
                <td><span class="label label-danger">未审核</span></td>
                <?php else: ?>
                <td><span class="label label-default">已审核</span></td>
                <?php endif; ?>
                <td class="td-purview">￥<?php echo $value['YuE']?></td>
                <td class="td-purview">￥<?php echo $value['ColdYuE']?></td>
                <td class="td-purview">￥<?php echo $value['OutJinE']?></td>
                <td class="td-purview"><?php echo $value['OutCount']?></td>
                <td class="td-purview"><?php echo $value['OutCountName']?></td>
                <td><?php echo date('y-m-d h:m',$value['Create_time']);?></td>
                <td>
                   <button type="button" data-id="<?php echo $value['id']; ?>" data-url="<?php echo $this->createUrl('/admin/audit/ajaxChangeWithdrawalStatus',array('id'=>$value['id']))?>" class="change-status btn btn-danger btn-sm" <?php echo ($value['Status']!= 0)?'disabled="disabled"':''; ?>>通过审核</button>
                </td>
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



<script type="text/javascript">
    $(document).ready(function(){

        $('.change-status').click(function(){
            if (confirm('确定通过id为 '+$(this).data('id')+' 的提现？')) {
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