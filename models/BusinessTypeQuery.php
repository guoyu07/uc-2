<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[BusinessType]].
 *
 * @see BusinessType
 */
class BusinessTypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return BusinessType[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return BusinessType|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
