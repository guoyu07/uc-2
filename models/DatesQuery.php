<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\base\Dates]].
 *
 * @see \app\models\base\Dates
 */
class DatesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \app\models\base\Dates[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\base\Dates|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
