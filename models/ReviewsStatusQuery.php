<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ReviewsStatus]].
 *
 * @see ReviewsStatus
 */
class ReviewsStatusQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ReviewsStatus[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ReviewsStatus|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
