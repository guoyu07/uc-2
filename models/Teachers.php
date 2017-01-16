<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use \yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\Html;
use \app\components\FileUpload;

class Teachers extends \app\models\base\Teachers
{
    public static $thumb_size = 120; // px
    public $uploadFile;

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge (parent::rules(), [
            [['uploadFile'], 'safe'],
            [['uploadFile', ], 'file',
                'skipOnEmpty' => true, // пропустить если файл не загружен
                'extensions'=>'jpg, gif, png, jpeg'],
        ]);
    }

    public function getFullImageUrl()
    {
        return FileUpload::getRawUrl($this->photo);
    }

    public function getImageUrl()
    {
        return FileUpload::getThumbUrl($this->photo);
    }

    public function upload()
    {
        return FileUpload::upload($this, 'photo');
    }

    public function getImageTag()
    {
        return \branchonline\lightbox\Lightbox::widget([
            'files' => [
                [
                    'thumb' => $this->getImageUrl(),
                    'original' => $this->getFullImageUrl(),
                    'title' => $this->name,
                    'thumbOptions' => [ 'class' => 'img-thumbnail', 'alt' => $this->photo, 'width' => Teachers::$thumb_size ]
                ],
            ]
        ]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge (parent::attributeLabels(), [
            'uploadFile' => Yii::t('app', 'uploadFile'),
            'name' => Yii::t('app', 'Teacher Name'),
        ]);
    }

    /**
     * @inheritdoc
     * @return TeachersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TeachersQuery(get_called_class());
    }
}
