<?php
$params = require(__DIR__ . '/params.php');
$dbParams = require(__DIR__ . '/test_db.php');
$sitemap = require(__DIR__ . '/sitemap.php');
$mail = require(__DIR__ . '/mail.php');

/**
 * Application configuration shared by all test types
 */
return [
    'id' => 'basic-tests',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
        'app\components\Settings'
    ],
    'language' => 'ru-RU', // Set the language here
    //'sourceLanguage' => 'en-US', // set source language to be English
    'layout' => '@app/views/layouts/admin',
    'components' => [
        'assetManager'=>[
            'basePath'=> __DIR__ . '/../tests/assets'
        ],
        'db' => $dbParams,
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
        'user' => [
            'identityClass' => 'app\models\User',
        ],        
        'request' => [
            'cookieValidationKey' => 'test',
            'enableCsrfValidation' => false,
            // but if you absolutely need it set cookie domain to localhost
            /*
            'csrfCookie' => [
                'domain' => 'localhost',
            ],
            */
        ],
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
