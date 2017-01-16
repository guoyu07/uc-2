<?php

namespace app\models;

use Yii;

class OrdersType extends \app\models\base\OrdersType
{
    /**
     * @inheritdoc
     * @return OrdersTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrdersTypeQuery(get_called_class());
    }
}
