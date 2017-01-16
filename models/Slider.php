<?php

namespace app\models;

use Yii;
use \app\components\FileUpload;
/**
 * This is the model class for table "slider".
 *
 * @property integer $id
 * @property string $content
 * @property integer $interval
 * @property string $caption
 * @property integer $enabled
 */
class Slider extends \app\models\base\Slider
{
    public static $thumb_size = 120; // px
    public $uploadFile;
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
        return FileUpload::getRawUrl($this->content);
    }

    public function getImageUrl()
    {
        return FileUpload::getThumbUrl($this->content);
    }

    public function upload()
    {
        return FileUpload::upload($this, 'content');
    }

    public function getImageTag()
    {
        return \branchonline\lightbox\Lightbox::widget([
            'files' => [
                [
                    'thumb' => $this->getImageUrl(),
                    'original' => $this->getFullImageUrl(),
                    'thumbOptions' => [ 'class' => 'img-thumbnail', 'alt' => $this->content, 'width' => Slider::$thumb_size ]
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
        ]);
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
