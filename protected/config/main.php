<?php

return array(
	'basePath' => dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'defaultController' => 'index',
	'name'     => 'Reester',

	'preload'=>array('log'),

	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
        'users',
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123',
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),

	'components'=>array(
        'mailer' => array('class'=>'PHPMailer'),
        'photo'  => array('class'=>'AddPhoto'),
		'user'=>array(
			'allowAutoLogin'=>true,
            'class' => 'WebUser',
		),

        'authManager' => array(
            'class'         => 'PhpAuthManager',
            'defaultRoles'  => array(0),
        ),

		'urlManager'=>array(
			'urlFormat'=>'path',
            'showScriptName' => false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
        //config remote DB



		/*'db'=>array(
			'connectionString' => 'mysql:host=reester.mysql;dbname=reester_db',
			'emulatePrepare' => true,
			'username' => 'reester_mysql',
			'password' => 'ycfzdtbu',
			'charset' => 'utf8',
		),*/



        // config my DB
        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=reester_db',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ),

        'errorHandler'=>array(
			'errorAction'=>'/error/index',
		),

        'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),/*
				array(
					'class'=>'CWebLogRoute',
				),*/
			),
		),

        'clientScript'=>array(
            'packages' => array(
                'bootstrap' => array(
                    'baseUrl' => '/css/bootstrap/',
                    'js'      => array(YII_DEBUG ? 'js/bootstrap.min.js' : 'bootstrap.js'),
                    'css'     => array('css/bootstrap.css'),
                    'depends' => array('jquery'),
                ),
            )
        ),

	),

	'params'=>array(
		'adminEmail'=>'webmaster@example.com',
	),
);