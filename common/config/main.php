 <?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
            'decimalSeparator' => ',',
            'thousandSeparator' => '.',
             'timeZone' => 'Asia/Ho_Chi_Minh',
            // 'currencyCode' => 'VNĐ',
        ],
    ],
    // 'cache' => [
    //     'class' => 'yii\caching\FileCache',
    // ],
];
