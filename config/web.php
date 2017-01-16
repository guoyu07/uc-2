<?php

$params = require(__DIR__ . '/params.php');
$sitemap = require(__DIR__ . '/sitemap.php');
$mail = require(__DIR__ . '/mail.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
        'app\components\Settings'
    ],
    'language' => 'ru-RU', // Set the language here
    'sourceLanguage' => 'en-US', // set source language to be English
    'timeZone' => 'Europe/Moscow',
    'layout' => '@app/views/layouts/site',
    'components' => [
        'formatter' => [
            'dateFormat' => 'dd.MM.yyyy',
            'timeFormat' => 'H:mm:ss',
            'datetimeFormat' => 'd.MM.yyyy H:mm',
            'locale' => 'ru-RU',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'RUR',
        ],
        'reCaptcha' => [
            'name' => 'reCaptcha',
            'class' => 'himiklab\yii2\recaptcha\ReCaptcha',
            'siteKey' => '6LftVxEUAAAAAO3vBRNmz7wL6xEk6-WjweXIS200',
            'secret' => '6LftVxEUAAAAAIcq1QO036CRi4q1BzY4kDdULt0C',
        ],
        //'assetManager' => [ 'bundles' => require(__DIR__ . '/' . 'assets-prod.php' ), ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    //'basePath' => '@app/messages',
                    //'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app' => 'i18n.php',
                        //'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => getenv('COOKIE_VALIDATION_KEY'),
        ],
        'cache' =>
            //(YII_ENV_DEV ?
            ['class' => 'yii\caching\FileCache']
//                : [
//            'class' => 'yii\caching\MemCache',
//            'servers' => [
//                [
//                    'host' => 'localhost',
//                    'port' => 11211,
//                ],
//            ],
//            'useMemcached' => true,
//            'serializer' => false,
//            'options' => [
//                \Memcached::OPT_COMPRESSION => false,
//            ],
//        ])
        ,
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'loginUrl'=> ['admin/login'],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                ['pattern' => 'sitemap', 'route' => 'sitemap/default/index', 'suffix' => '.xml'],
                'static/<path:\w+>' => 'site/static',
                'site/news/view/<id:\d+>' => 'site/news-view',
                [
                    'class' => 'app\components\NewsUrlRule',
                    // ...configure other properties...
                ],
                'dashboard' => '/admin',
                '<module:admin>/<action:\w+>' => '<module>/default/<action>',
                '<module:admin>/<action:\w+>/<id:\d+>' => '<module>/default/<action>',
                //'<module:posts>/<controller:\w+>' => '<module>/<controller>/index',
                //'<module:posts>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>'
            ],
        ],
        'mailer' => $mail,
        'mailme' => [
            'class' => 'app\components\MailMe'
        ]
    ],
    'params' => $params,
    'modules' => [
        'sitemap' => $sitemap,
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
    $config['modules']['utility'] = [
        'class' => 'c006\utility\migration\Module',
    ];
}

return $config;
