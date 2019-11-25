<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=xuan_landingpage',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            // 'enableQueryCache' => true,
            // 'queryCacheDuration' => 86400,
            // 'enableSchemaCache' => true,
  // Name of the cache component used to store schema information
            // 'schemaCache' => 'cache',
  // Duration of schema cache.
            // 'schemaCacheDuration' => 86400, 
        ],
        /*'db2' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=yii2_mayin2_2',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'enableQueryCache' => true,
            'queryCacheDuration' => 86400,
            'enableSchemaCache' => true,
  // Name of the cache component used to store schema information
            'schemaCache' => 'cache',
  // Duration of schema cache.
            'schemaCacheDuration' => 86400, 
        ],*/
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            // 'useFileTransport' => true,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com', 
                'username' => 'nguyequoccuong90@gmail.com',
                'password' => 'bfuJXfMoDP094UKYRWp7',
                'port' => '587', 
                'encryption' => 'tls',
            ],
        ],
    ],
];
