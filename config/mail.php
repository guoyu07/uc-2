<?php

return [
    'class' => 'yii\swiftmailer\Mailer',
    //'viewPath' => '@backend/mail',
    'useFileTransport' => false,//set this property to false to send mails to real email addresses
    //comment the following array to send mail using php's mail function
    'transport' => [
        'class' => 'Swift_SmtpTransport',
        'host' => getenv('MAIL_HOST'),
        'username' => getenv('MAIL_USER'),
        'password' => getenv('MAIL_PASSWORD'),
        'port' => '587',
        'encryption' => 'tls',
    ],
];