<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[OrdersType]].
 *
 * @see OrdersType
 */
class OrdersTypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return OrdersType[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return OrdersType|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
