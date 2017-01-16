<?php

namespace app\models;

use Yii;

class BusinessType extends \app\models\base\BusinessType
{
    /**
     * @inheritdoc
     * @return BusinessTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BusinessTypeQuery(get_called_class());
    }
}
