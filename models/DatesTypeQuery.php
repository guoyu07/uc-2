<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[DatesType]].
 *
 * @see DatesType
 */
class DatesTypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return DatesType[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return DatesType|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
