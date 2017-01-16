<?php

use kartik\sidenav\SideNav;

echo SideNav::widget([
    //'type' => SideNav::TYPE_DEFAULT,
    //'heading' => 'Options',
    'items' => $menu
]);