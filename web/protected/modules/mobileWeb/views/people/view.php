<?php
	$this->pageTitle=$userInfo['Nickname'];
	Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . "/css/mobileWeb/people-view.css");
?>
<div data-role="page" id="pageone">
	<header data-role="header" class="" id="ui-nav-header">
		<nav data-role="navbar">
			<ul>
		      <li id="back"><a href="#anylink">首页</a></li>
		      <!-- <li id="back2"><a href="#anylink">搜索</a></li> -->
		    </ul>
		</nav>

		<section class="ui-grid-b text-center" id="ui-identity">
		  <div class="ui-block-a ui-identity-bankName"><span>xx银行  </span></div>
		  <div class="ui-block-b"><span>Some Text</span></div>
		  <div class="ui-block-c ui-identity-userName"><span>陈一号</span></div>
		</section>
		<!-- <hr class="ui-nav-hr"> -->
		 
	</header><!-- header -->

	<main role="main" class="ui-content">
		<p>Page content goes here.</p>
		
	</main><!-- /content -->

	<footer data-role="footer">
		<section data-role="navbar">
	      <ul>
	        <li><a href="#" >更多</a></li>
	        <li><a href="#" >更少</a></li>
	        <li><a href="#" >信息</a></li>
	      </ul>
	    </section>
	</footer><!-- /footer -->
</div>