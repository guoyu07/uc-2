<?php
/**
 * Created by PhpStorm.
 * User: Сергей
 * Date: 28.12.2016
 * Time: 0:13
 */

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;
use yii\filters\VerbFilter;
use yii\web\Response;
use app\models\UploadedFile;
use \app\components\FileUpload;

class CkeditorController extends Controller
{
    public function behaviors()
    {
        return [
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'upload-image' => ['POST'],
//                ],
//            ],
            [
                'class' => \yii\filters\ContentNegotiator::className(),
                'only' => ['upload-image'],
                'formats' => [
                    //'application/json' => Response::FORMAT_JSON,
                    'text/html' => Response::FORMAT_HTML,
                ],
            ],
        ];
    }

    public function actionUploadImage()
    {
        return FileUpload::uploadForCkeditor();
    }

    public function actionUploadedImages()
    {
        var_dump($_POST, $_FILES);
    }
}