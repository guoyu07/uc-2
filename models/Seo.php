<?php

namespace app\models;

use Yii;

class Seo extends \app\models\base\Seo
{
    /**
     * @inheritdoc
     * @return SeoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SeoQuery(get_called_class());
    }
}
