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
    <meta name="description" content="世纪唯银-中国领先互联网金融P2P网贷平台 提供网络贷款，投资理财 小额贷款,短期贷款,个人贷款,无抵押贷款服务 世纪唯银理财借贷投资，获得高年收益率回报，超低门槛，超高收益" />
    <meta name="keywords" content="世纪唯银,世纪唯银官网,P2P网贷,互联网金融,网络贷款,投资理财" />


  <!-- 自己写的 -->
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/front-main.css" />
  <!-- 库 -->
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/common.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/libs/arale/alice/one.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/libs/bootstrap/v3/css/bootstrap.min.css" />
  <script src="<?php echo Yii::app()->request->baseUrl;?>/libs/responsive.gs/scripts/respond.min.js"></script>

  <script src="<?php echo Yii::app()->request->baseUrl;?>/libs/jquery/jquery-1.9.1.min.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl;?>/js/front-main.js"></script>
	<?php
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/libs/bootstrap/v3/js/bootstrap.min.js");
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
  		font: 13px/1.5 Microsoft YaHei,Helvetica,Tahoma;,"Hiragino Sans GB";
  		font: '微软雅黑';
		background: url(<?php echo Yii::app()->request->baseUrl; ?>/img/bg.jpg) top center;
		/*min-width: 1000px;*/
		width: 100%;
  	}

  </style>
</head>
<body>

<header role="banner" class="" id="nav-header">
	<div id="nav-main" class="gutters">
		<a class="nav-block nav-block-logo" href="<?php echo ''.Yii::app()->createUrl('default/index')?>">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo.png" alt="世纪唯银" class="nav-logo-img nav-logo-size">
<!-- 			<dl class="nav-logo-size nav-logo-p">
				<dd class="nav-logo-text"></dd>
				<dd class="nav-logo-url">51ibank.com</dd>
			</dl> -->
		</a>
		<div class="nav-block nav-block-location">
			<!-- <a href="#" id="location-popover" data-placement="bottom" data-html="true" data-animation="true" class="" data-toggle="popover" title="" data-content="<p>北京</p><p>上海</p><p>广州</p><p>杭州</p>" data-original-title="请选择您需要借款的城市">[杭州] -->
				<p class="inthecity"><?php echo Yii::app()->session['cityName'];   ?></p>
				<p class="change-city"><a  target="_blank" href="<?php echo Yii::app()->createUrl('default/CityList'); ?>">[切换城市]</a></p>
			</a>
		</div>
		<div class="nav-block nav-block-link">
			<ul id="nav-link-ul" class="">
				<li class="" ><a href="<?php echo Yii::app()->createUrl('default/index')?>"><span>首页</span></a></li>
				<li class="" ><a href="<?php echo Yii::app()->createUrl('apply/loan')?>"><span>我要借款</span></a></li>
                <li class="" ><a href="<?php echo Yii::app()->createUrl('guide/newHand')?>"><span>新手指引</span></a></li>
				<li class="" ><a href="<?php echo Yii::app()->createUrl('Blog/Article',array('flag'=>'company'));?>"><span>关于我们</span></a></li>
			</ul>
		</div>
		<div class="nav-block nav-block-user">
			<ul id="nav-user" class="gutters">
				<?php if(!Yii::app()->user->isGuest):?>
				<li >
				<a class="nav-link fn-text-overflow" id="ui-user-name">
				    <span class="">您好，<?php echo Yii::app()->user->nickname?></span>
				    <span class="">
				    	<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/xiaosanjiao.png" alt="" class="">
				    </span>
				</a>

					<ul id="user-ctrl" class="nav-ul nav-user-login">
						<li>
							<a href="<?php echo $this->createUrl('/my/');?>">个人中心</a>
							</li>
							<div class="ui-nav-dropdown-separator"></div>
							<li>
							<a href="<?php echo $this->createAbsoluteUrl('/login/logout')?>">退出</a>
							</li>
							
					</ul>
				  </li>
				 <?php else:?>


					<li id="nologin-icon">
					<a  href="<?php echo Yii::app()->createUrl('LoginBind/Index')?>" id="nav-nologin-link"><img alt="qq" src="<?php echo Yii::app()->request->baseUrl.'/img/qq-nav-login.png'; ?>"></a>
					</li>
					<li class="li-nologin"><a href="<?php echo Yii::app()->createUrl('login/index')?>" id="nav-nologin-link"><span>登录</span></a></li>
					<li class="li-nologin"><a href="<?php echo Yii::app()->createUrl('register/index')?>" id="nav-nologin-link"><span style="color:#3399CC;">注册</span></a></li>
				 <?php endif;?>
			</ul>
		</div>
	</div><!-- mainmenu -->
</header><!-- header -->

<!-- <div class="container row" > -->
	<?php echo $content;?>

	<div class="clear"></div>
<!-- </div>container end -->

<div style="">
<footer role="contentinfo"  id="footer" >
  <div class="container footer-info" id="ft_inner">
  	<div class="foot-list">
  		<div class="foot-list-icon f1"></div>
	  	<dl>
	  		<dt class="site-link">关于我们</dt>
	  		<dd><a href="<?php echo Yii::app()->createUrl('Blog/Article',array('flag'=>'company'));?>">公司介绍</a></dd>
	  		<dd><a href="<?php echo Yii::app()->createUrl('Blog/Article',array('flag'=>'media'));?>">媒体报道</a></dd>
	  		<dd><a href="<?php echo Yii::app()->createUrl('Blog/Article',array('flag'=>'join-us'));?>">招贤纳士</a></dd>
	  		<dd><a href="<?php echo Yii::app()->createUrl('Blog/Article',array('flag'=>'contact'));?>">联系我们</a></dd>
	  	</dl>
  	</div>
  	<div class="foot-list">
  		<div class="foot-list-icon f2"></div>
	  	<dl>
	  		<dt class="site-link">投资安全</dt>
	  		<dd><a href="https://ipcrs.pbccrc.org.cn/" target="_blank">查询个人信用</a></dd>
	  		<dd><a href="<?php echo Yii::app()->createUrl('Blog/Article',array('flag'=>'safety'));?>">资金安全</a></dd>
	  		<dd><a href="<?php echo Yii::app()->createUrl('Blog/Article',array('flag'=>'parther'));?>">合作伙伴</a></dd>
	  	</dl>
  	</div>
  	<div class="foot-list">
  		<div class="foot-list-icon f3"></div>
	  	<dl>
	  		<dt class="site-link">帮助中心</dt>
	  		<dd><a href="<?php echo Yii::app()->createUrl('Blog/Article',array('flag'=>'agreement'));?>">注册协议</a></dd>
	  		<dd><a href="<?php echo Yii::app()->createUrl('Blog/Article',array('flag'=>'service-agreement'));?>">服务协议</a></dd>
	  	</dl>
  	</div>
  	<div class="foot-list">
  		<div class="foot-list-icon f4"></div>
	  	<dl>
	  		<dt class="site-link">服务热线</dt>
	  		<dd>0571-8888888</dd>
	  		<dd>工作日 9:00-18:00</dd>
	  	</dl>
  		<div class="foot-list-icon f5"></div>
	  	<dl>
	  		<dt class="site-link">官方讨论群</dt>
	  		<dd>111111111</dd>
	  		<dd>222222222</dd>
	  	</dl>
  	</div>

	<div class="foot-about-site" >
		<p class="copyright">
			版权所有 © 杭州巨伞网络科技有限公司
		</p>
		<p class="copyright">
			浙ICP备13018684号
		</p>
	</div>
  </div>
</footer><!-- footer -->
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#location-popover').popover();
	});
</script>
</body>
</html>