<?php

namespace app\models;

use Yii;

class Dates extends \app\models\base\Dates
{
    /**
     * @inheritdoc
     * @return DatesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DatesQuery(get_called_class());
    }
}
