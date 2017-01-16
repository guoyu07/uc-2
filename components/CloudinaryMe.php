<?php
/**
 * Created by PhpStorm.
 * User: Сергей
 * Date: 05.01.2017
 * Time: 17:45
 */

namespace app\components;

use Yii;
use yii\web\UploadedFile;
use \Cloudinary\Uploader;
use app\components\FileUpload;

class CloudinaryMe
{
    public static function getThumbUrl($file)
    {
        if(isset($file) && !empty($file)) {
            return cloudinary_url($file, [
                "width" => FileUpload::DEFAULT_THUMB_SIZE]);
        }
    }

    public static function getRawUrl($file)
    {
        if(isset($file) && !empty($file)) {
            return cloudinary_url($file);
        }
    }

    public static function upload($model, $field)
    {
        $uploadFile = UploadedFile::getInstance($model, 'uploadFile');
        if ($uploadFile) {
            $file = Uploader::upload($uploadFile->tempName,
                [
                    "public_id" => $model->tableName() . "/" . Yii::$app->security->generateRandomString(),
                    "crop" => "limit", "width" => FileUpload::MAX_UPLOADING_WIDTH, "height" => FileUpload::MAX_UPLOADING_HEIGTH,
                    "tags" => [$model->tableName()]
                ]);

            if ($file) {
                $model->{$field} = $file['public_id'];
                return true;
            }
        }
        return false;
    }

    public static function getFileRawUrl($file)
    {
        if(isset($file) && !empty($file)) {
            return cloudinary_url($file, ["resource_type" => "raw"]);
        }
    }

    public static function uploadFile($model, $field)
    {
        $uploadFile = UploadedFile::getInstance($model, 'uploadFile');
        if ($uploadFile) {
            $file = Uploader::upload($uploadFile->tempName,
                [
                    "resource_type" => "raw",
                    "public_id" => $model->tableName() . "/" . $uploadFile->name,
                    "tags" => [$model->tableName()]
                ]);

            if ($file) {
                $model->{$field} = $file['public_id'];
                return true;
            }
        }
        return false;
    }

    public static function uploadForCkeditor()
    {
        $uploadFile = UploadedFile::getInstanceByName('upload');

        if ($uploadFile) {
            $file = Uploader::upload($uploadFile->tempName,
                [
                    "public_id" => "ckeditor/" . Yii::$app->security->generateRandomString(),
                    "crop" => "limit", "width" => FileUpload::DEFAULT_CKEDITOR_SIZE, "height" => FileUpload::DEFAULT_CKEDITOR_SIZE,
                    "tags" => ["ckeditor"]
                ]);

            if ($file) {
                $web = $file["url"];
                $func = Yii::$app->request->get('CKEditorFuncNum');

                echo "<script type=\"text/javascript\">
                      window.parent.CKEDITOR.tools.callFunction(\"{$func}\", \"{$web}\", \"\");
                      </script>";
                return;
            }
        }
    }
}