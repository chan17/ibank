<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class=""> <!--<![endif]-->
<head>
  <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico" />
  <meta property="qc:admins" content="157330560121636375" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0, maximum-scale=2.0, user-scalable=yes" />  -->
  <meta name="apple-mobile-web-app-capable" content="yes" />

  <!-- 自己写的 -->
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/main.css" />
  <!-- 库 -->
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/common.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/libs/arale/alice/one.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/libs/bootstrap/v3/css/bootstrap.min.css" />

  <script src="<?php echo Yii::app()->request->baseUrl;?>/libs/jquery/jquery-1.9.1.min.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl;?>/js/front-main.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/libs/HubSpot-messenger/build/css/messenger.css" />
  <script src="<?php echo Yii::app()->request->baseUrl;?>/libs/HubSpot-messenger/build/js/messenger.js"></script>
	<?php
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/libs/bootstrap/v3/js/bootstrap.min.js");
      // Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/libs/HubSpot-messenger/build/css/messenger.css"); 
      // Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/libs/HubSpot-messenger/build/js/messenger.js");
	?>


  <title><?php echo CHtml::encode($this->pageTitle); ?>后台</title>
  <style type="text/css">
  	html{
  		margin: 0;
  		padding: 0;
  		border: 0;
  		width: 100%;
  	}
  	body{
  		font: 13px/1.5 Microsoft YaHei,Helvetica,Tahoma;,"Hiragino Sans GB";
  		font: '微软雅黑';
  		width: 100%;
  	}
    thead tr th{
      font-weight: bold;
    }

  </style>
</head>
<body>
<nav  class="navbar navbar-inverse" role="navigation" style="border-radius: 0;">
  <div id="nav-main">
  <div class="navbar-header">
    <a class="navbar-brand" href="#">ibank后台管理系统</a>
  </div>
  <ul class="nav navbar-nav">
      <li class="<?php echo ($this->aNav == 'info')?'active':''; ?>"><a href="<?php echo $this->createUrl('/admin/info/index')?>">信息</a></li>
      <li class="<?php echo ($this->aNav == 'user')?'active':''; ?>"><a href="<?php echo $this->createUrl('/admin/user/ctrl')?>">用户</a></li>
      <li class="<?php echo ($this->aNav == 'audit')?'active':''; ?>"><a href="<?php echo $this->createUrl('/admin/audit/loan')?>">审核</a></li>
    </ul>

  <!-- Collect the nav links, forms, and other content for toggling -->
   <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9">
<!--     <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Link</a></li>
      <li><a href="#">Link</a></li>
    </ul> -->
    <ul class="nav navbar-nav navbar-right">

        <?php if(!Yii::app()->user->isGuest):?>
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" id="ui-user-name">
            <span class="">您好，<?php echo Yii::app()->user->username;?></span>
            <b class="caret"></b>
        </a>

          <ul id="" class="dropdown-menu">
            <li>
              <li>
              <a href="<?php echo $this->createAbsoluteUrl('/admin/auth/logout')?>">退出</a>
              </li>
              
          </ul>
          </li>
         <?php else:?>
            <li><a href="<?php echo $this->createAbsoluteUrl('/admin/auth/login')?>">登陆</a></li>
         <?php endif;?>
    </ul>

  </div><!-- /.navbar-collapse -->
  </div>
</nav>

<div id="main-content">
  <?php echo $content;?>
</div>

</body>
</html>