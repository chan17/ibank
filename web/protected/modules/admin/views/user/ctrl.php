<?php /* @var $this LoginController */
$this->pageTitle="管理前台用户 - ".Yii::app()->name;
$this->breadcrumbs=array(
	'Login',
);
// Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/libs/arale/alice/one.css");
?>

<div>
	<div class="seach-user-from">
		<form class="seach-from" method="post">
			<span class="label label-default">搜索用户名</span>
			<input type="text" class="seach-input-username" name="userneme">
			<span class="label label-default">搜索手机</span>
			<input type="text" class="seach-input-phone" name="phone">
			<input type="submit" class="seach-go ">
		</form>
	</div>
		<table class="table table-hover">
			<thead><tr>
				<th>id</th>
				<th>手机</th>
				<th>用户名</th>
				<th>身份</th>
				<th>信用等级</th>
				<th>点击收益</th>
				<th>注册时间</th>
				<th>是否拉黑</th>
				<th>操作</th>
			</tr></thead>
			<tbody>
			<?php foreach ($posts as $key => $value):?>
				<tr>
				<td class="td-uid"><?php echo $value['Uid'];?></td>
				<td><?php echo $value['Phone'];?></td>
				<td class="td-nikename">
					<a href="<?php echo $this->createUrl('/admin/user/recharge',array('uid'=>$value['Uid']))?>" target="_blank" class="view-rechange" data-toggle="tooltip" data-placement="top" title="" data-original-title="查看余额" alt="查看余额">
						<?php echo $value['Nickname'];?>
					</a>
				</td>
				<td class="td-purview"><?php echo ($value['Purview'] == 0)?'信贷经理':'普通投资者';?></td>
				<td class="td-level"><?php echo $value['Level'];?></td>
				<td><?php echo $value['SingleIncome'];?>元</td>
				<td><?php echo date('y-m-d h:m',$value['SingleIncome']);?></td>
				<td><?php echo ($value['IsBlack'] == 0)?'否':'是';?></td>
				<td>
					<div class="btn-group">

					  <button type="button" id=""  data-url="<?php echo $this->createUrl('/admin/user/ajaxPullBlack',array('uid'=>$value['Uid']));?>" class="isBlack btn btn-danger"><?php echo ($value['IsBlack'] == 0)?'拉黑':'解除拉黑';?></button>
					  <button type="button" data-uid="<?php echo $value['Uid']; ?>"  data-url="<?php echo $this->createUrl('/admin/user/ajaxChangeUser',array('uid'=>$value['Uid']));?>" class="btn btn-info change-user" data-toggle="modal"  data-target="#myModal">改 收益/等级</button>
					</div>
				</td>
				</tr>
			<?php endforeach;?>
			</tbody>
		</table>
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

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">修改等级/点击收益</h4>
		  </div>
			<form class="change-user-from" method="post" role="form">
		  <div class="modal-body">
				  <div class="alert alert-info">
				  	点击收益只能输入数字,小数最多两位
				  </div>
		  	  <div class="form-group">
			    <label for="">点击收益</label>
			     <input type="text" class="change-input-singleincome form-control" name="singleincome">

			  </div>
			  <div class="form-group">
			    <label for="">等级</label>
			   <select class="form-control change-input-purview" name="level">
			  <option>AAAAA</option>
			  <option>AAAA</option>
			  <option>AAA</option>
			  <option>AA</option>
			  <option>A</option>
			</select>
			  </div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<button type="button"  class="change-go btn btn-primary changes-user-submit" >Save changes</button>
		  </div>
			</form>
		</div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
<script type="text/javascript">
	$(document).ready(function(){

		$('.isBlack').click(function(){
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
		});
		var url ='';
		$('.change-user').click(function(){
			var uid = $(this).data('uid');
			url = $(this).data('url');
			$.get($(this).data('url'),function(data){
				$('.change-input-singleincome').val(data.singleincome);
				console.log(data.level.length);
				$('.change-input-purview').val(data.level);
			},"json");
		});

		$('.changes-user-submit').click(function(){
			var userInfo = $('.change-user-from').serialize();
			console.log(userInfo);
			console.log(url);
			$.post(url,userInfo,function(data){
			// console.log(data);
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
		});

		$('.view-rechange').tooltip();
		
	});
</script>