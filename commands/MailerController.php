<?php
/**
 * Created by PhpStorm.
 * User: Сергей
 * Date: 30.12.2016
 * Time: 22:07
 */

namespace app\commands;

use yii\console\Controller;

class MailerController extends Controller
{
    public function actionIndex()
    {
        echo "try yii mailer/test\n";
    }

    public function actionTest()
    {
        \Yii::$app->mailme->test();
    }
}