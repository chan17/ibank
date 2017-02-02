<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="<?php echo Yii::app()->request->baseUrl.'/img/default/banner/banner1_06.jpg'; ?>">
      <div class="carousel-caption">
       ggggggggg
      </div>
    </div>
        <div class="item ">
      <img src="<?php echo Yii::app()->request->baseUrl.'/img/default/banner/banner1_06.jpg'; ?>">
      <div class="carousel-caption">
       ggggggggg
      </div>
    </div>
        <div class="item ">
      <img src="<?php echo Yii::app()->request->baseUrl.'/img/default/banner/banner1_06.jpg'; ?>">
      <div class="carousel-caption">
       ggggggggg
      </div>
    </div>
    
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>




<script type="text/javascript"></script>
<?php 
// Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/libs/bootstrap/v3/js/bootstrap.min.js");
// Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/libs/bootstrap/v3/css/bootstrap.min.css");
 ?>
<script type="text/javascript">
  $(document).ready(function(){
    // $(".slider-wrap").css("height","460px");
    // $("#bbbbb").attr("style","overflow: hidden; width: 100%; height: 460px;");
//     $('.carousel').carousel(function(){
// console.log('ddddddddd');

//     });
//     console.log('333333333333');

//     $('.carousel').on('slide.bs.carousel', function () {
//         console.log('66666666');
//     });
  });
</script>