<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		/*
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'Enter Your Password Here',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		*/
	),
	
	//维护程序时，这样子所有的请求转发到一个地方
	//'catchAllRequest' => array('site/all'),
	'language' => 'es',

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName' => false,
			'urlSuffix' => '.html',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=yiimall',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		'request' => array(
			'enableCsrfValidation' => true, //如果防止post跨站攻击
			'enableCookieValidation' => true, //防止Cookie攻击
		),
		'cache' => array(
			'class' => 'CMemCache',
			'servers' => array(
				array('host' => '127.0.0.1', 'port' => 11211, 'weight' => 60),
			),
		),
		'redis' => array(
			
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				array(
					'class'=>'CWebLogRoute',
// 					'levels'=>'trace',
// 					'categories' => 'system.db.*',
				),
				array(
					'class' => 'CProfileLogRoute',
				),
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params' => require(dirname(__FILE__) . '/params.php'),  
);

// //数据库配置
// $database =  require(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'db.php');
// if (!empty($database)) {
// 	$config['components'] = CMap::mergeArray($config['components'],$database);
// 	//    Yii::app()->setComponents($database);
// }
// return $config;