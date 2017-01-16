<?php
/**
 * Created by PhpStorm.
 * User: Сергей
 * Date: 28.12.2016
 * Time: 20:10
 */

namespace app\components;

use yii\web\UrlRuleInterface;
use yii\base\Object;

class NewsUrlRule extends Object implements UrlRuleInterface
{
    public function createUrl($manager, $route, $params)
    {
        if ($route === 'site/news') {
            if (isset($params['id'])) {
                return 'site/news/view/' . $params['id'];
            }
        }
        return false;  // this rule does not apply
    }

    public function parseRequest($manager, $request)
    {
        $pathInfo = $request->getPathInfo();
        if (preg_match('%^(\w+)(/(\w+))?$%', $pathInfo, $matches)) {
            // check $matches[1] and $matches[3] to see
            // if they match a manufacturer and a model in the database
            // If so, set $params['manufacturer'] and/or $params['model']
            // and return ['car/index', $params]
        }
        return false;  // this rule does not apply
    }
}