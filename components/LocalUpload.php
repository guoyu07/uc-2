<?php
/**
 * Created by PhpStorm.
 * User: Сергей
 * Date: 05.01.2017
 * Time: 23:47
 */

namespace app\components;

use yii\web\UploadedFile;
use app\components\FileUpload;
use yii\imagine\Image;
use Yii;
use yii\helpers\BaseFileHelper;

class LocalUpload
{
    public static function getThumbUrl($file)
    {
        if(isset($file) && !empty($file)) {

            $model = '';
            $data = explode("/", $file);
            if (count($data) > 1) {
                $file = $data[1];
                $model = $data[0] . "/";
            }

            $width = FileUpload::DEFAULT_THUMB_SIZE;
            $thumb_web = Yii::$app->params['webUploadPath'] . $model . "thumb-w{$width}-" . $file;
            $thumb_serv = Yii::$app->params['uploadPath']  . $model . "thumb-w{$width}-" . $file;
            if (!file_exists($thumb_serv)) {
                Image::thumbnail(Yii::$app->params['uploadPath'] . $model . $file, $width, null)
                    ->save($thumb_serv, ['jpeg_quality' => FileUpload::DEFAULT_JPEG_QUALITY]);
            }
            return $thumb_web;
        }
    }

    public static function getRawUrl($file)
    {
        if(isset($file) && !empty($file)) {
            $thumb_web = Yii::$app->params['webUploadPath'] . $file;
            return $thumb_web;
        }
    }

    public static function upload($model, $field)
    {
        $uploadFile = UploadedFile::getInstance($model, 'uploadFile');

        if ($uploadFile) {
            $ext = $uploadFile->extension;

            BaseFileHelper::createDirectory(Yii::$app->params['uploadPath'] . $model->tableName());

            $filename = $model->tableName() . "/" . Yii::$app->security->generateRandomString() .".{$ext}";
            $path = Yii::$app->params['uploadPath'] . $filename;
            if($uploadFile->saveAs($path))
            {
                $model->{$field} = $filename;
                return true;
            }
        }

        return false;
    }

    public static function getFileRawUrl($file)
    {
        if(isset($file) && !empty($file)) {
            return Yii::$app->params['webUploadPath'] . $file;
        }
    }

    public static function uploadFile($model, $field)
    {
        $uploadFile = UploadedFile::getInstance($model, 'uploadFile');

        if ($uploadFile) {
            $path = Yii::$app->params['uploadPath'] . $uploadFile->name;
            if($uploadFile->saveAs($path))
            {
                $model->{$field} = $uploadFile->name;
            }
        }
    }

    public static function uploadForCkeditor()
    {
        $subpath = "ckeditor";

        $uploadFile = UploadedFile::getInstanceByName('upload');

        if ($uploadFile) {

            BaseFileHelper::createDirectory(Yii::$app->params['uploadPath'] . $subpath);

            $ext = $uploadFile->extension;
            $filename = $subpath . "/" . Yii::$app->security->generateRandomString() .".{$ext}";
            $path = Yii::$app->params['uploadPath'] . $filename;
            if($uploadFile->saveAs($path))
            {
                Image::thumbnail($path, FileUpload::DEFAULT_CKEDITOR_SIZE, null)
                    ->save($path, ['jpeg_quality' => FileUpload::DEFAULT_JPEG_QUALITY]);
                //$this->photo = $filename;

                $web = Yii::$app->params['webUploadPath'] . $filename;
                $func = Yii::$app->request->get('CKEditorFuncNum');

                echo "<script type=\"text/javascript\">
                      window.parent.CKEDITOR.tools.callFunction(\"{$func}\", \"{$web}\", \"\");
                      </script>";
                return;
            }
        }
    }
}