<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->Uid,
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->Uid)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Uid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>View User #<?php echo $model->Uid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Uid',
		'Qqopenid',
		'Nickname',
		'Password',
		'Salt',
		'Gender',
		'Level',
		'Email',
		'Face',
		'Type',
		'Status',
		'True_name',
		'Phone',
		'PhoneVerified',
		'Roles',
		'City',
		'CityId',
		'Id_number',
		'CheckidNum',
		'CheckTel',
		'CheckName',
		'CheckOutPwd',
		'OutMoneyPwd',
		'IsBlack',
		'Create_time',
		'Update_time',
		'Version',
	),
)); ?>
