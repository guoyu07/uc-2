<?php
/**
 * Created by PhpStorm.
 * User: Сергей
 * Date: 20.12.2016
 * Time: 21:51
 */

namespace app\components;

use yii\base\Widget;

class SideMenuWidget extends Widget
{
    public $menu;

    public function init()
    {
        parent::init();

        if ($this->menu === null) {
            foreach (\app\models\Menu::find()->where(['enabled' => 1])->with("seo")->all() as $menu) {
                $this->menu[] = ["label" => $menu->seo->menu, "url" => "/".$menu->seo->route];
            }

        }
    }

    public function run()
    {
        return $this->render('menu', [
            'menu' => $this->menu,
        ]);
    }
}