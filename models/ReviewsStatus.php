<?php

namespace app\models;

use Yii;

class ReviewsStatus extends \app\models\base\ReviewsStatus
{
    /**
     * @inheritdoc
     * @return ReviewsStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ReviewsStatusQuery(get_called_class());
    }
}
