<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "seo".
 *
 * @property integer $id
 * @property string $route
 * @property string $title
 * @property string $menu
 * @property string $breadcrumbs
 * @property string $description
 * @property string $keywords
 * @property integer $enabled
 * @property string $h1
 *
 * @property Menu[] $menus
 */
class Seo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['route', 'title'], 'required'],
            [['enabled'], 'integer'],
            [['route', 'title', 'menu', 'breadcrumbs', 'description', 'keywords'], 'string', 'max' => 450],
            [['h1'], 'string', 'max' => 255],
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
            'menu' => Yii::t('app', 'Menu'),
            'breadcrumbs' => Yii::t('app', 'Breadcrumbs'),
            'description' => Yii::t('app', 'Description'),
            'keywords' => Yii::t('app', 'Keywords'),
            'enabled' => Yii::t('app', 'Enabled'),
            'h1' => Yii::t('app', 'H1'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenus()
    {
        return $this->hasMany(Menu::className(), ['seo_id' => 'id']);
    }
}
