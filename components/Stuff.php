<?php
/**
 * Created by PhpStorm.
 * User: Сергей
 * Date: 10.01.2017
 * Time: 1:07
 */

namespace app\components;


class Stuff
{
    // получить имя класса
    public static function getClassName($object)
    {
        $path = explode('\\',get_class($object));
        return array_pop($path);
    }

    // сортировка строкового массива как даты
    public static function sortArrayAsDate(&$array)
    {
        usort($array, function($a1, $a2) {
            $v1 = strtotime($a1);
            $v2 = strtotime($a2);
            return $v1 - $v2; // $v2 - $v1 to reverse direction
        });
    }

    // Название месяца по метке UNIX
    public static function getMonthName($date = false) {
        // Если не задано время в UNIX, то используем текущий
        if (!$date) {
            $mN = date('m');
            // Если задано определяем месяц времени
        } else {
            $mN = date('m', strtotime($date));
        }

        $monthAr = array(
            1 => array('Январь', 'Января'),
            2 => array('Февраль', 'Февраля'),
            3 => array('Март', 'Марта'),
            4 => array('Апрель', 'Апреля'),
            5 => array('Май', 'Мая'),
            6 => array('Июнь', 'Июня'),
            7 => array('Июль', 'Июля'),
            8 => array('Август', 'Августа'),
            9 => array('Сентябрь', 'Сентября'),
            10=> array('Октябрь', 'Октября'),
            11=> array('Ноябрь', 'Ноября'),
            12=> array('Декабрь', 'Декабря')
        );

        return $monthAr[(int)$mN];
    }
}