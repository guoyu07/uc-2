<?php

require(__DIR__ . '/../vendor/autoload.php');

(new Dotenv\Dotenv(__DIR__ . '/../'))->load();  // .env

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', getenv('YII_DEBUG'));
defined('YII_ENV') or define('YII_ENV', getenv('YII_ENV'));

require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');

// cloudinary
\Cloudinary::config(["cloud_name" => getenv('CLOUD_NAME'),"api_key" => getenv('CLOUD_KEY'),"api_secret" => getenv('CLOUD_SECRET')]);

(new yii\web\Application($config))->run();
