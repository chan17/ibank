<?php /* @var $this LoginController */
$this->pageTitle="管理后台用户 - ".Yii::app()->name;
$this->breadcrumbs=array(
	'Login',
);
// Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/libs/arale/alice/one.css");
?>
<?php if($filter == true): ?>
<div>
    <div class="seach-user-from">
        <form class="seach-from" method="post" style="float:left;">
            <span class="label label-default">搜索用户名</span>
            <input type="text" class="seach-input-username" name="UserName">
            <input type="submit" class="seach-go ">
        </form>
        <button type="button" class="btn btn-primary btn-xs"  data-toggle="modal"  data-target="#cteatUser" style="float:right;">创建用户</button>
    </div>
        <table class="table table-hover">
            <thead><tr>
                <th>id</th>
                <th>用户名</th>
                <th>权限</th>
                <th>上次登录</th>
                <th>上次IP</th>
                <th>操作</th>
            </tr></thead>
            <tbody>
            <?php foreach ($posts as $key => $value):?>
                <tr>
                <td class="td-uid"><?php echo $value['Uid'];?></td>
                <td class="td-nikename"><?php echo $value['UserName'];?></td>
                <td class="td-purview"><?php echo $admin_purview[$value['Purview']];?></td>
                <td><?php echo date('y-m-d h:m',$value['LastTime']);?></td>
                <td><?php echo $value['LastIp'];?></td>
                                                    <td><button type="button" id=""  data-url="<?php echo $this->createUrl('/admin/user/ajaxDelUser',array('uid'=>$value['Uid']));?>" class="delUser btn btn-danger">删除</button></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>

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

    <div class="modal fade" id="cteatUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">创建用户</h4>
          </div>
            <form action="<?php echo $this->createUrl('/admin/user/createUser');?>" class="change-user-from" method="post" role="form">
          <div class="modal-body">
              <div class="form-group">
                <label for="">用户名</label>
                 <input type="text" class="change-input-singleincome form-control" name="UserName">
              </div>
              <div class="form-group">
                <label for="">密码</label>
                 <input type="text" class="change-input-singleincome form-control" name="Password">
              </div>
              <div class="form-group">
                <label for="">权限</label>
                         <select class="form-control change-input-purview" name="Purview">
                  <option value="1"><?php echo $admin_purview[1]; ?></option>
                  <option value="2"><?php echo $admin_purview[2]; ?></option>
                  <option value="3"><?php echo $admin_purview[3]; ?></option>
                     </select>
              </div>

              <div class="ui-tiptext-container ui-tiptext-container-message">
                <p class="ui-tiptext ui-tiptext-message">
                    <i class="ui-tiptext-icon iconfont" title="提示">&#xF046;</i>
                    超级管理员：&nbsp;&nbsp;&nbsp;&nbsp;可以管理后台用户，以及拥有一切后台权限。
                </p>
                <p class="ui-tiptext ui-tiptext-follow">
                    管理员：&nbsp;&nbsp;&nbsp;&nbsp;不可以管理后台用户,拥有其余的所有权限，主要用来审核用.
                </p>
                <p class="ui-tiptext ui-tiptext-follow">
                    看日志:&nbsp;&nbsp;&nbsp;&nbsp;只能看信息.
                </p>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit"  class="change-go btn btn-primary changes-user-submit" >Save changes</button>
          </div>
            </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
<?php else: ?>
    <p>不好意思，您无法访问</p>
<?php endif; ?>

<script type="text/javascript">
    $(document).ready(function(){

        $('.delUser').click(function(){
            $.post($(this).data('url'),function(data){
                if (data == true) {
                    Messenger().post({
                       message: "删除成功",
                        type: 'success',
                    }, {
                      url: "/some-url",
                      success: function() {
                      }
                    });
                    setTimeout('location.reload(true);',2000);
                }else{
                    Messenger().post({
                      message: "删除失败",
                       type: 'error',
                    }, {
                      url: "/some-url",
                      success: function() {}
                    });
                };
            },"json");
        });
    });
</script>