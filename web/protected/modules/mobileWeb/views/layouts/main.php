<!DOCTYPE html>
<head>
  <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico" />
  <!-- <meta property="qc:admins" content="157330560121636375" /> -->

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="description" content="世纪唯银-中国领先互联网金融P2P网贷平台 提供网络贷款，投资理财 小额贷款,短期贷款,个人贷款,无抵押贷款服务 世纪唯银理财借贷投资，获得高年收益率回报，超低门槛，超高收益" />
<meta name="keywords" content="世纪唯银,世纪唯银官网,P2P网贷,互联网金融,网络贷款,投资理财" />


  <!-- 自己写的 -->

  <!-- 库 -->
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/common.css" />
	
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/libs/jquery.mobile/jquery.mobile.custom.structure.css">
	<script src="<?php echo Yii::app()->request->baseUrl;?>/libs/jquery/jquery-1.9.1.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl;?>/libs/jquery.mobile/jquery.mobile.custom.min.js"></script>

	<?php
		// Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/libs/jquery/jquery-1.9.1.min.js");
		// Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/libs/jquery.mobile/jquery.mobile-1.4.2.min.js");
	?>

  <title><?php echo CHtml::encode($this->pageTitle); ?></title>
  <style type="text/css">
	html{
		margin: 0;
		padding: 0;
		border: 0;
		width: 100%;
	}
  	body{
  		font: Microsoft YaHei,Helvetica,Tahoma;,"Hiragino Sans GB";
  		font: '微软雅黑';
		background: none;
		/*min-width: 1000px;*/
		width: 100%;
  	}

  </style>
</head>
<body>

	<?php echo $content;?>

</body>
</html>