<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "dates".
 *
 * @property integer $id
 * @property string $date
 * @property integer $seminar_id
 *
 * @property Seminars $seminar
 */
class Dates extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dates';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'seminar_id'], 'required'],
            [['date'], 'safe'],
            [['seminar_id'], 'integer'],
            [['seminar_id'], 'exist', 'skipOnError' => true, 'targetClass' => Seminars::className(), 'targetAttribute' => ['seminar_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'date' => Yii::t('app', 'Date'),
            'seminar_id' => Yii::t('app', 'Seminar ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeminar()
    {
        return $this->hasOne(Seminars::className(), ['id' => 'seminar_id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\DatesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\DatesQuery(get_called_class());
    }
}
