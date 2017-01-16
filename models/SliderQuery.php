<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\base\Slider]].
 *
 * @see \app\models\base\Slider
 */
class SliderQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \app\models\base\Slider[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\base\Slider|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
