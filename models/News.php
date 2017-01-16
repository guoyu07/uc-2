<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use \yii\db\ActiveRecord;
use yii\db\Expression;
use himiklab\sitemap\behaviors\SitemapBehavior;
use yii\helpers\Url;
use \app\components\FileUpload;

class News extends \app\models\base\News
{
    public static $thumb_size = 220; // px
    public $uploadFile;

    public function behaviors()
    {
        return [
            'sitemap' => [
                'class' => SitemapBehavior::className(),
                'scope' => function ($model) {
                    /** @var \yii\db\ActiveQuery $model */
                    $model->select(['id', 'updated_at', 'image', 'title']);
                    //$model->andWhere(['is_deleted' => 0]);
                },
                'dataClosure' => function ($model) {
                    /** @var self $model */
                    return [
                        'loc' => Url::to(['/site/news-view', 'id' => $model->id], true),
                        'lastmod' => strtotime($model->updated_at),
                        'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                        'priority' => 0.8,
//                        'images' => [
//                            [
//                                'loc'           => $model->image ? Yii::$app->params["webUploadPath"] . $model->image : null,
//                                'caption'       => $model->title,
//                            ],
//                        ]
                    ];
                }
            ],
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

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge (parent::attributeLabels(), [
            'uploadFile' => Yii::t('app', 'uploadFile'),
        ]);
    }

    public function getFullImageUrl()
    {
        return FileUpload::getRawUrl($this->image);
    }

    public function getImageUrl()
    {
        return FileUpload::getThumbUrl($this->image);
    }

    public function upload()
    {
        return FileUpload::upload($this, 'image');
    }

    public function getImageTag()
    {
        return \branchonline\lightbox\Lightbox::widget([
            'files' => [
                [
                    'thumb' => $this->getImageUrl(),
                    'original' => $this->getFullImageUrl(),
                    'title' => $this->title,
                    'thumbOptions' => [ 'class' => 'img-thumbnail', 'alt' => $this->image, 'width' => Teachers::$thumb_size ]
                ],
            ]
        ]);
    }

    /**
     * @inheritdoc
     * @return NewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NewsQuery(get_called_class());
    }
}
