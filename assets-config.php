<?php
/*
Yii command:
yii asset tools/gulp/assets-config.php config/assets-prod.php
*/

Yii::setAlias('@webroot', str_replace('\\', '/', dirname(__FILE__)) . '/web');
Yii::setAlias('@web', '/');

return [
    'jsCompressor' => 'gulp compress-js --gulpfile gulpfile.js --src {from} --dist {to}',
    'cssCompressor' => 'gulp compress-css --gulpfile gulpfile.js --src {from} --dist {to}',
    'bundles' => [
        'app\assets\SiteAsset',
        'app\assets\AdminAsset',
    ],
    'targets' => [
        'all' => [
            'class' => 'yii\web\AssetBundle',
            'basePath' => '@webroot/assets',
            'baseUrl' => '@web/assets',
            'js' => 'all-{hash}.js',
            'css' => 'all-{hash}.css',
            'depends' => [
            ],
        ],
    ],
    // Asset manager configuration:
    'assetManager' => [
        'basePath' => '@webroot/assets',
        'baseUrl' => '@web/assets',
    ],
];
