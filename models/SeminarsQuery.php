<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\base\Seminars]].
 *
 * @see \app\models\base\Seminars
 */
class SeminarsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \app\models\base\Seminars[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\base\Seminars|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
