<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "static_page".
 *
 * @property integer $id
 * @property string $route
 * @property string $title
 * @property string $html
 * @property string $created_at
 * @property string $updated_at
 */
class StaticPage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'static_page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['route', 'title', 'html'], 'required'],
            [['html'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['route', 'title'], 'string', 'max' => 450],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'route' => Yii::t('app', 'Route'),
            'title' => Yii::t('app', 'Title'),
            'html' => Yii::t('app', 'Html'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
