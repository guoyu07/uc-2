<?php

namespace app\models;

use Yii;

class DatesType extends \app\models\base\DatesType
{
    /**
     * @inheritdoc
     * @return DatesTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DatesTypeQuery(get_called_class());
    }
}
