<?php

namespace app\models;

use Yii;

class Menu extends \app\models\base\Menu
{
    /**
     * @inheritdoc
     * @return MenuQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MenuQuery(get_called_class());
    }
}
