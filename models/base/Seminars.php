<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "seminars".
 *
 * @property integer $id
 * @property string $name
 * @property string $start
 * @property integer $onlyMonth
 * @property string $end
 * @property string $price
 * @property string $created_at
 * @property string $updated_at
 * @property string $speakers
 * @property string $description
 * @property string $subscription
 * @property string $file
 * @property integer $dates_type_id
 * @property integer $enabled
 *
 * @property Dates[] $dates
 * @property Orders[] $orders
 * @property Reviews[] $reviews
 * @property DatesType $datesType
 */
class Seminars extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seminars';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'price'], 'required'],
            [['start', 'end', 'created_at', 'updated_at'], 'safe'],
            [['onlyMonth', 'dates_type_id', 'enabled'], 'integer'],
            [['price'], 'number'],
            [['speakers', 'description', 'subscription'], 'string'],
            [['name'], 'string', 'max' => 250],
            [['file'], 'string', 'max' => 450],
            [['dates_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => DatesType::className(), 'targetAttribute' => ['dates_type_id' => 'id']],
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
            'start' => Yii::t('app', 'Start'),
            'onlyMonth' => Yii::t('app', 'Only Month'),
            'end' => Yii::t('app', 'End'),
            'price' => Yii::t('app', 'Price'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'speakers' => Yii::t('app', 'Speakers'),
            'description' => Yii::t('app', 'Description'),
            'subscription' => Yii::t('app', 'Subscription'),
            'file' => Yii::t('app', 'File'),
            'dates_type_id' => Yii::t('app', 'Dates Type ID'),
            'enabled' => Yii::t('app', 'Enabled'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDates()
    {
        return $this->hasMany(Dates::className(), ['seminar_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['seminar_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Reviews::className(), ['seminar_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatesType()
    {
        return $this->hasOne(DatesType::className(), ['id' => 'dates_type_id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\SeminarsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\SeminarsQuery(get_called_class());
    }
}
