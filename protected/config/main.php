<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'J Finder',

	// preloading 'log' component
	'preload'=>array('log'),
        'theme'=>'bluefields_user',
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'ext.giix-components.*', // You need to import the giix component
                'application.modules.user.models.*',
                'application.modules.company.models.*',
		'application.modules.admin.library.bootstrap.*'
                
	),
        'aliases' => array(
            //If you used composer your path should be
            'xupload' => 'ext.vendor.asgaroth.xupload',
            //If you manually installed it
            'xupload' => 'ext.xupload',
	    'bootstrap' => 'application.modules.admin.library.bootstrap'
        ),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'user',
                'company',
		'admin',
                'webconference',
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'1234',
                        'generatorPaths' => array(
                            'ext.giix-core', // giix generator
                        ),
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
                     'allowAutoLogin'=>true,
                     'loginUrl'=>'/jfinder/index.php?r=site/index',
		),
                'mailer' => array(
                    'class' => 'application.extensions.mailer.EMailer',
                    'pathViews' => 'application.views.email',
                    'pathLayouts' => 'application.views.email.layouts'
                 ),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array( 
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=jfinder',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '1234',
			'charset' => 'utf8',
                       'enableProfiling' => true,
                        'enableParamLogging' => true,
                        //'schemaCachingDuration' => 100
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
                /* 'session' => array(
                    'class' => 'CDbHttpSession',
                    'timeout' => 1200, // 1200 sec =  20 mins idle
                 ),*/

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
                                       /* array(
                                        'class'=>'ext.yii-debug-toolbar.yii-debug-toolbar.YiiDebugToolbarRoute',
                                        'ipFilters'=>array('127.0.0.1','192.168.1.215')
                                        ),*/
                           
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning,trace',
				),
				// uncomment the following to show log messages on web pages
				/*array(
					'class'=>'CWebLogRoute',
				),*/
                             
//                                array(
//                                    'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
//                                )*/
			),
		), 
            /*
            'cache'=>array(
                'class'=>'system.caching.CFileCache',
             ),
             */
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
