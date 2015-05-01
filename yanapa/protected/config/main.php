<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',
	'theme'=>'classic',
	'language' => 'en',
	'sourceLanguage' => 'en',
	// preloading 'log' component
	'preload'=>array('log','bootstrap'),
    //attacching a general behavior on BeginRequest of every request
    'behaviors' => array(
        'onBeginRequest' => array(
            'class' => 'SBeginRequestBehavior'
        )
    ),
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		//autoloading subfolders of "component" folder from APPLICATION
        'application.components.behaviors.*',
        'application.components.widgets.*',
        'application.components.helpers.*',
        //autoloading Language module models, components and widgets from APPLICATION
        'application.modules.language.models.*',
        'application.modules.language.components.*',
        'application.modules.language.widgets.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'Enter Your Password Here',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
            //added path to Bootstrap extension scaffolding
            'generatorPaths' => array(
                'bootstrap.gii', // YiiBootstrap extension scaffolding
            ),
		),
		//Language module definiton from APPLICATION
        'language' => array(),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		/*'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'urlSuffix'=>".html",
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),*/

		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=dbynp100',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			// added parameter for tables prefix (with empty value) - Declare a prefix if needed
            'tablePrefix' => '',
            'enableProfiling' => true,
            'enableParamLogging' => true,
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
		//Overriding standard MessageSource functions for language fallback 
        'messages' => array(
            'class' => 'SPhpMessageSource',
        ),
            /*'bootstrap' => array(
            'class' => 'ext.bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
            'responsiveCss' => true,
			//'tooltipSelector' => '[data-toggle=tooltip]',
			'tooltipSelector' => '[rel=tooltip]',
			'fontAwesomeCss' => false,
        ),*/
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
		//Parameters for SMultilingualBehavior				
        'defaultLanguage' => 'it',
	),
);