<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property integer $id
 * @property string $content
 * @property integer $interval
 * @property string $caption
 * @property integer $enabled
 */
class Slider extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'required'],
            [['interval', 'enabled'], 'integer'],
            [['content', 'caption'], 'string', 'max' => 450],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'content' => Yii::t('app', 'Content'),
            'interval' => Yii::t('app', 'Interval'),
            'caption' => Yii::t('app', 'Caption'),
            'enabled' => Yii::t('app', 'Enabled'),
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\SliderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\SliderQuery(get_called_class());
    }
}
