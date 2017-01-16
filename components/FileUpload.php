<?php
/**
 * Created by PhpStorm.
 * User: Сергей
 * Date: 05.01.2017
 * Time: 23:49
 */

namespace app\components;

use Yii;

class FileUpload
{
    const DEFAULT_THUMB_SIZE = 120; // px
    const MAX_UPLOADING_WIDTH = 1200; // px
    const MAX_UPLOADING_HEIGTH = 1000; // px
    const DEFAULT_CKEDITOR_SIZE = 1000; // px
    const DEFAULT_JPEG_QUALITY = 70; // px

    public static function getThumbUrl($file)
    {
        return Yii::$app->params["remoteSave"] ?
            CloudinaryMe::getThumbUrl($file) :
            LocalUpload::getThumbUrl($file);
    }

    public static function getRawUrl($file)
    {
        return Yii::$app->params["remoteSave"] ?
            CloudinaryMe::getRawUrl($file) :
            LocalUpload::getRawUrl($file);
    }

    public static function upload($model, $field)
    {
        return Yii::$app->params["remoteSave"] ?
            CloudinaryMe::upload($model, $field) :
            LocalUpload::upload($model, $field);
    }

    public static function getFileRawUrl($file)
    {
        return Yii::$app->params["remoteSave"] ?
            CloudinaryMe::getFileRawUrl($file) :
            LocalUpload::getFileRawUrl($file);
    }

    public static function uploadFile($model, $field)
    {
        return Yii::$app->params["remoteSave"] ?
            CloudinaryMe::uploadFile($model, $field) :
            LocalUpload::uploadFile($model, $field);
    }

    public static function uploadForCkeditor()
    {
        return Yii::$app->params["remoteSave"] ?
            CloudinaryMe::uploadForCkeditor() :
            LocalUpload::uploadForCkeditor();
    }
}