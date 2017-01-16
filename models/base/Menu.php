<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property integer $id
 * @property integer $seo_id
 * @property integer $enabled
 *
 * @property Seo $seo
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['seo_id'], 'required'],
            [['seo_id', 'enabled'], 'integer'],
            [['seo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Seo::className(), 'targetAttribute' => ['seo_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'seo_id' => Yii::t('app', 'Seo ID'),
            'enabled' => Yii::t('app', 'Enabled'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeo()
    {
        return $this->hasOne(Seo::className(), ['id' => 'seo_id']);
    }
}
