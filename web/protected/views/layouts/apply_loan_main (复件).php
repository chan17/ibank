<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>个人资料信息</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href="css/loan/bootstrap-min.css" rel="stylesheet" />
    <link href="css/loan/default-min.css" rel="stylesheet" />
</head>
<body class="font_yahei">
    <div id="_paymsg" class="Alt_Toptit" style="display: none;">
    </div>
    <div id="_audit" class="Alt_Toptit" style="display: none;">
    </div>
    <div class="PPD_header_nav" style="margin-bottom: 0;">
        <div class="PPD_login_status">
        	<div class="tool_nav_bar font_yahei">
        		<div class="tool_nav">
        			<span class="float_l">Hi,</span>
        			<a name="tool_user" href="#"><i>登录后名称</i></a>
        		</div>
        	</div>
        </div>
    </div>
    <div class="PPD_tab_nav">
        <div class="tab_nav_Bg">
            <div class="width_1200">
                <div class="center980">
                    <h1>
                        <a href="#">
                            <img src="#" class="float_l" />
                        </a>
                    </h1>
                    <ul id="tabIcon" class="font_yahei">
                        <li><a href="#" id="10000">首页</a></li>
                        <li><a href="#" id="10001">我要借款</a></li>
                        <li><a href="#" id="10002">新手指引</a></li>
                        <li><a href="#" id="10003">关于我们</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <?php echo $content;?>


<div style="display: none">
    
</div>


    <div class="clear">
    </div>

    <div class="row-fluid show-grid bottom_nav" style="">
        <div class="center980">
            <ul>
                <li><span class="web_index"></span><a href='/'>网站首页</a></li>
                <li>|</li>
                <li><span class="web_aboutus"></span><a href='/help/aboutus.htm'>关于我们</a></li>
                <li>|</li>
                <li><span class="web_map"></span><a href="/home/sitemap.htm">网站地图</a></li>
                <li>|</li>
                <li><span class="web_service"></span><a href='/consult'>客服留言</a></li>
                <li>|</li>
                <li><div style="float:left" id="BDBridgeFixedWrap"></div></li>
            </ul>
            <p>
                <?php echo Yii::app()->name?> 版权所有 2007-2014
            </p>
            <p>
                Copyright Reserved 2007-2014©<?php echo Yii::app()->name?>
            </p>

        </div>
    </div>

    
</body>
</html>
