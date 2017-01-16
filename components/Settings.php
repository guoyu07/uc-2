<?php
/**
 * Created by PhpStorm.
 * User: Сергей
 * Date: 29.12.2016
 * Time: 23:06
 */

namespace app\components;

use Yii;
use yii\base\BootstrapInterface;

class Settings implements BootstrapInterface
{
    private $db;

    public function __construct() {
        $this->db = Yii::$app->db;
    }

    /**
     * Bootstrap method to be called during application bootstrap stage.
     * Loads all the settings into the Yii::$app->params array
     * @param Application $app the application currently running
     */

    public function bootstrap($app) {
        $tableSettings = Yii::$app->db->schema->getTableSchema('settings');
        if ($tableSettings) {
            $settings = \app\models\Settings::find()->all();

            foreach ($settings as $param) {
                Yii::$app->params[$param->key] = $param->value;
            }
        }
    }
}