<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
$config = array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',
		
	'theme'=>'frontend',
	'language'=>'pt_br',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.modules.adm.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'adm'=>array(
				'components' => array(
						'errorHandler' => array(
								'errorAction' => 'adm/default/error'),
						'user' => array(
								'class'          => 'WebUser',
								'allowAutoLogin' => true,
								'stateKeyPrefix' => '_adm',
								'returnUrl' => array('default/index'), # page after login
								'loginUrl' => array('adm/default/login'), # login form path
						),
				),
		),
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths'=>array(
					'bootstrap.gii',
			),
		),	
		
	),

	// application components
	'components'=>array(
		'bootstrap'=>array(
				'class'=>'bootstrap.components.Bootstrap',
		),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName' => false,
			'rules'=>array(

				//RULES GII
				'gii'=>'gii',
          		'gii/<controller:\w+>'=>'gii/<controller>',
         		'gii/<controller:\w+>/<action:\w+>'=>'gii/<controller>/<action>', 

         		//RULES MODULE ADM
				'adm'=>'adm/default/index',
				'<module>/<action>' => '<module>/default/<action>',
				'<module>/<action>' => '<module>/<controller>/<action>',

				//RULES OF SITE
				''=>'site/index',
				'<action>'=>'site/<action>',

				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=testando',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			//'tablePrefix' => 'tbl_',
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
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>require(dirname(__FILE__).'/params.php'),
);

//RETURN DB CONFIGURATIONS
$db = require(dirname(__FILE__).'/db.php');
//MERGE THE ARRAYS
$configurations = CMap::mergeArray($config, $db);

return $configurations;