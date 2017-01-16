<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "dates_type".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Seminars[] $seminars
 */
class DatesType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dates_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeminars()
    {
        return $this->hasMany(Seminars::className(), ['dates_type_id' => 'id']);
    }
}
