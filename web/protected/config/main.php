<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'融金工场',
	'sourceLanguage'=>'zh_cn',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.service.*',
		'application.utils.*',
		'application.controllers.*',
		'application.constants.*',
		'application.filters.*',
		'application.forms.*',
		'application.utils.Payment.yeepay.*',
	),

	'modules'=>array(

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'kaifa',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		// 用户中心
		'my'=>array(
			'class'=>'application.modules.my.MyModule',
			'defaultController'	=> 'account/info',
		),
		// 后台
		'admin'=>array(
			'class'=>'application.modules.admin.AdminModule',
			'defaultController'	=> 'Auth/Login',
		),
		// 移动端网页
		'mobileWeb'=>array(
			'class'=>'application.modules.mobileWeb.MobileWebModule',
			// 'defaultController'	=> 'Auth/Login',
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		// 'urlManager'=>array(
		// 	'urlFormat'=>'path',
		// 	'rules'=>array(
		// 		'<controller:\w+>/<id:\d+>'=>'<controller>/view',
		// 		'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
		// 		'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
		// 	),
		// ),
		
		// 'db'=>array(
		// 	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		// ),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=51ibank',
			'emulatePrepare' => true,
			'username'=>'root', 
			'password' => '',
			'charset' => 'utf8',
		),
		 // 线上服务器配置。
		// 'db'=>array(
		// 	'connectionString' => 'mysql:host=hdm-115.hichina.com;dbname=hdm1150023_db',
		// 	'emulatePrepare' => true,
		// 	'username'=>'hdm1150023', 
		// 	'password' => '19830527X',
		// 	'charset' => 'utf8',
		// ),

        'user'=>array(
        	// 'class'=>'YWebUser',
            // 这实际上是默认值
            // 'loginUrl'=>array('login/index'),
            // about login cookie
            'allowAutoLogin'=>true,
        ),

		'errorHandler'=>array(
			// use 'admin/error' action to display errors 异常
			'errorAction'=>'error/index',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				// array(
				// 	'class'=>'CWebLogRoute',
				// ),
			),
		),
		
        'authManager'=>array(
            'class'=>'CDbAuthManager',
            // 'connectionID'=>'db',
        ),
	),

    'defaultController'=>'default/index',

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),


	///自定义参数都写在这里,如果想让这个页面不被guest看到，要指定的用户登陆后才可见，就加上适用于后台维护。
	// 'visible'=>!Yii::app()->user->isGuest，
);