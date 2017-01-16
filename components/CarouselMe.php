<?php
/**
 * Created by PhpStorm.
 * User: Сергей
 * Date: 05.01.2017
 * Time: 22:44
 */

namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;

class CarouselMe extends Widget
{
    public $carousel;

    public function init()
    {
        parent::init();

        if ($this->carousel === null) {
            foreach (\app\models\Slider::find()->where(['enabled' => 1])->all() as $slide) {
                $this->carousel[] = [ "content" => Html::img($slide->getFullImageUrl()), "options" => ['interval' => $slide->interval]];
            }

        }
    }

    public function run()
    {
        return $this->render('carousel', [
            'carousel' => $this->carousel,
        ]);
    }
}