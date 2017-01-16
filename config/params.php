<?php

return [
    'adminEmail' => 'admin@example.com',
    //'siteBrand' => 'Учебный центр СПб ГБУ «Горжилобмен»',
    //'siteBrandLid' => 'Семинары и Курсы повышения квалификации',
    //'siteEmail' => 'info@obmencity.ru',
    //'sitePhone' => '7(812) 576-00-00',
    'webUploadPath' => '/images/upload/',
    'uploadPath' => __DIR__ . '/../web/images/upload/',
    'remoteSave' => getenv('STORAGE') == 'remote' ? true : false,
];
