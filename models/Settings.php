<?php

namespace app\models;

use Yii;

class Settings extends \app\models\base\Settings
{
    /**
     * @inheritdoc
     * @return SettingsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SettingsQuery(get_called_class());
    }
}
