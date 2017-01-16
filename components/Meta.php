<?php
/**
 * Created by PhpStorm.
 * User: Сергей
 * Date: 29.12.2016
 * Time: 12:07
 */

namespace app\components;


class Meta
{
    static function registerTags($title, $description, $keywords, $url = null, $image = null)
    {
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $description
        ]);
        \Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => Meta::createKeywords($keywords)
        ]);

        \Yii::$app->view->registerMetaTag([
            'name' => 'og:title',
            'content' => $title
        ]);
        \Yii::$app->view->registerMetaTag([
            'name' => 'og:description',
            'content' => $description
        ]);
        if ($url) {
            \Yii::$app->view->registerMetaTag([
                'name' => 'og:url',
                'content' => $url
            ]);
        }

        if ($image) {
            \Yii::$app->view->registerMetaTag([
                'name' => 'og:image',
                'content' => $image
            ]);
        }
    }

    static function createKeywords ($text)
    {
        return str_replace(' ',',', mb_strtolower($text));
    }
}