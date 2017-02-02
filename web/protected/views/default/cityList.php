<?php
/* @var $this LoginController */
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/css/default/city-list.css");
// Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/libs/bootstrap/v3/css/bootstrap.min.css");
// Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/js/default/index.js",CClientScript::POS_END);
$this->pageTitle="切换城市 - ".Yii::app()->name;
$this->breadcrumbs=array(
	'default',
);
?>

<div role="main" class="main-row-container main-row" id="">
	<div class="ui-info-box">
        <p class="ui-tipbox-explain"><b><?php echo Yii::app()->name;?></b>  全国最大的贷款中介平台</p>
	</div>

	<div class="page-citylist">
		<div class="hot-city-list">
			<label>热门城市：</label>
			<a  href="<?php echo Yii::app()->createUrl('Default/ChangeCity',array('cityid'=>429)); ?>" domain="hangzhou">杭州</a>
			<a  href="<?php echo Yii::app()->createUrl('Default/ChangeCity',array('cityid'=>2)); ?>" domain="beijing">北京</a>
			<a  href="<?php echo Yii::app()->createUrl('Default/ChangeCity',array('cityid'=>346)); ?>" domain="shanghai">上海</a>
			<a  href="<?php echo Yii::app()->createUrl('Default/ChangeCity',array('cityid'=>76)); ?>" domain="guangzhou">广州</a>
			<a  href="<?php echo Yii::app()->createUrl('Default/ChangeCity',array('cityid'=>77)); ?>" domain="shenzhen">深圳</a>
			<a  href="<?php echo Yii::app()->createUrl('Default/ChangeCity',array('cityid'=>170)); ?>"  domain="wuhan">武汉</a>
			<a  href="<?php echo Yii::app()->createUrl('Default/ChangeCity',array('cityid'=>387)); ?>" domain="tianjin">天津</a>
			<a  href="<?php echo Yii::app()->createUrl('Default/ChangeCity',array('cityid'=>357)); ?>" domain="xian">西安</a>
			<a  href="<?php echo Yii::app()->createUrl('Default/ChangeCity',array('cityid'=>218)); ?>" domain="nanjing">南京</a>
			<a  href="<?php echo Yii::app()->createUrl('Default/ChangeCity',array('cityid'=>367)); ?>"  domain="chengdu">成都</a>
			<a  href="<?php echo Yii::app()->createUrl('Default/ChangeCity',array('cityid'=>51)); ?>" href="22" domain="chongqing">重庆</a>
		</div>

		<div class="select-city">
			<?php  
            	$form=$this->beginWidget('CActiveForm', array(
					'id'=>'select_city_form',
            		'enableAjaxValidation'=>true,
				)); 
			?>
			<?php echo $form->labelEx($model,'province',array('_label'=>'span','class'=>'','_afterRequired'=>'：')); ?>
    		<select name="CityListForm[province]" id="CityListForm_province" 
    		data-url="<?php echo Yii::app()->createUrl('Default/AjaxGetCityList',array('id'=>'')); ?>" required="required">
				<option value="" selected="selected">请选择省份</option>
				<?php 
					foreach($province as $_k=>$_v){
						echo '<option value="'.$_v['ProvinceId'].'"';
						// if($_k==$model->province){echo ' selected="selected"';}
						echo '>'.$_v['Name'].'</option>';
					}
				?>
			</select>
    		<select name="CityListForm[city]" id="CityListForm_city" required="required">
				<option value="" selected="selected">请选择城市</option>

			</select>
			<a id="select-city-button" data-url="<?php echo Yii::app()->createUrl('Default/ChangeCity',array('cityid'=>'')); ?>" class="ui-button ui-button-mblue" href="#">确定</a>
		<?php $this->endWidget(); ?>
			
		</div>

		<div class="pinyin-citylist">
			<h3>按拼音首字母选择:</h3>
			<div class="ui-tab-content">
				<div id="TabWordList" class="ui-tab-content-item current">
					<?php foreach ($pinyinCity as $key => $value):?>
					<div class="city-list-item wrap-clear" data-css-hover="city-list-item-hover">
						<span class="label"><?php echo strtoupper($key); ?></span>

						<div class="citys city_list">
						<?php foreach ($value as $key2 => $value2):?>
							<a href="<?php echo Yii::app()->createUrl('Default/ChangeCity',array('cityid'=>$value2['CityId'])); ?>" data-domain=""><span class=""><?php echo $value2['Name']; ?></span></a>
						<?php endforeach; ?>
						</div>

					</div>
					<?php endforeach; ?>
				</div>
			</div>

		</div><!-- pinyin-citylist -end -->

	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$("#CityListForm_province").change(function(){
		$("#CityListForm_city ").empty();
		$("#select-city-button").css('color','#555');
		$("#CityListForm_city").append('<option value="" selected="selected">请选择城市</option>');
		console.log('changechange');
		var provincId = $("#CityListForm_province").val();
		console.log(provincId);

		if (provincId == null) {
			return false
		}else{
			$.get($(this).data('url')+provincId,function(data){
				// console.log(data);
				for (var i = 0; i < data.length; i++) {
					$("#CityListForm_city").append("<option value='"+data[i].CityId+"'>"+data[i].Name+"</option>");
				};
			},"json");
		}
	});

	$("#CityListForm_city").change(function(){
		var cityId = $("#CityListForm_city").val();
		// console.log($("#select-city-button").data('url'));
		var gotoindex = $("#select-city-button").data('url');
		$("#select-city-button").attr('href',gotoindex+cityId);
		$("#select-city-button").css('color','#fff');
	});
});
</script>