<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "reviews".
 *
 * @property integer $id
 * @property string $name
 * @property string $agency
 * @property string $email
 * @property string $phone
 * @property integer $status_id
 * @property integer $seminar_id
 * @property string $text
 * @property string $created_at
 * @property string $updated_at
 *
 * @property ReviewsStatus $status
 * @property Seminars $seminar
 */
class Reviews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reviews';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'seminar_id'], 'required'],
            [['status_id', 'seminar_id'], 'integer'],
            [['text'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 450],
            [['agency'], 'string', 'max' => 250],
            [['email', 'phone'], 'string', 'max' => 45],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => ReviewsStatus::className(), 'targetAttribute' => ['status_id' => 'id']],
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
            'agency' => Yii::t('app', 'Agency'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'status_id' => Yii::t('app', 'Status ID'),
            'seminar_id' => Yii::t('app', 'Seminar ID'),
            'text' => Yii::t('app', 'Text'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(ReviewsStatus::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeminar()
    {
        return $this->hasOne(Seminars::className(), ['id' => 'seminar_id']);
    }
}
