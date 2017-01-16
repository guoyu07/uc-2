<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $agency
 * @property string $question
 * @property integer $seminar_id
 * @property integer $enable
 * @property integer $orders_type_id
 * @property string $passport
 * @property string $address
 * @property integer $business_type_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property BusinessType $businessType
 * @property OrdersType $ordersType
 * @property Seminars $seminar
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'seminar_id', 'orders_type_id'], 'required'],
            [['question'], 'string'],
            [['seminar_id', 'enable', 'orders_type_id', 'business_type_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'address'], 'string', 'max' => 450],
            [['email', 'phone', 'passport'], 'string', 'max' => 45],
            [['agency'], 'string', 'max' => 250],
            [['business_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => BusinessType::className(), 'targetAttribute' => ['business_type_id' => 'id']],
            [['orders_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrdersType::className(), 'targetAttribute' => ['orders_type_id' => 'id']],
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
            'name' => Yii::t('app', 'Name'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'agency' => Yii::t('app', 'Agency'),
            'question' => Yii::t('app', 'Question'),
            'seminar_id' => Yii::t('app', 'Seminar ID'),
            'enable' => Yii::t('app', 'Enable'),
            'orders_type_id' => Yii::t('app', 'Orders Type ID'),
            'passport' => Yii::t('app', 'Passport'),
            'address' => Yii::t('app', 'Address'),
            'business_type_id' => Yii::t('app', 'Business Type ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBusinessType()
    {
        return $this->hasOne(BusinessType::className(), ['id' => 'business_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdersType()
    {
        return $this->hasOne(OrdersType::className(), ['id' => 'orders_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeminar()
    {
        return $this->hasOne(Seminars::className(), ['id' => 'seminar_id']);
    }
}
