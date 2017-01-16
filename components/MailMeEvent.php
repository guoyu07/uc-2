<?php
/**
 * Created by PhpStorm.
 * User: Сергей
 * Date: 01.01.2017
 * Time: 23:49
 */

namespace app\components;


class MailMeEvent extends \yii\base\Event
{
    public $model;

    public function __construct($model)
    {
        $this->model = $model;
    }
}