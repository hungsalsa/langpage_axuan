<?php
use yii\web\Request;
$baseUrl = str_replace('/frontend/web','', (new Request)->getBaseUrl());
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        // 'formatter' => [
        //     'decimalSeparator' => ',',
        //     'thousandSeparator' => '.',
        // ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'request'=>array(
            'baseUrl'=>$baseUrl
        ),
        
        'urlManager' => [
            'baseUrl'=>$baseUrl,
            'showScriptName' => false,
            'enablePrettyUrl' => true,
            // 'suffix' => '/xuan',
            // 'enableStrictParsing' => false,
            'rules' => [
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<slug:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<slug:\w+>' => '<controller>/<action>',
                
                // 'chi-tiet/<slug>' => 'tin-tuc/view',
                // 'san-pham/<slug>'=>'product/listpro/<id:\d+>',
                // 'tin-tuc/<slug>' => 'categories/danhsach',
                
                // '<controller:\w+>/<slug:\d+>' => '<controller>/view',
                // 'product/<slug:\w+>' => 'product/view',
              //   // '<controller:\w+>/<slug:\w+>' => '<controller>/view',
            
              // '<action:\w+>/<slug:\d+>' => '<controller>/<action>',
              // '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                // 'gio-hang/addcart/<id:\d+>/<num:\d+>' => 'gio-hang/addcart',
                // 'gio-hang/delcart/<id:\d+>' => 'gio-hang/delcart',
                // 'gio-hang/updatecart/<id:\d+>/<num:\d+>' => 'gio-hang/updatecart',
                // '<controller:\w+>/<action:\w+>/<slug:\w+>' => '<controller>/<action>',
                // '<controller:\w+>/<action:\w+>/<id:\d+>/<soluong:\d+>' => '<controller>/<action>/',
                // 'product/<id:\d+>/<slug>' => 'product/view',
                // 'tin-tuc/<slug>.html' => 'tin-tuc/view',
                // 'tin-tuc/<slug>' => 'tin-tuc/list',
                // '<slug>.html' => 'product/view',

                // 'san-pham-<slug:[\w\-]+>-<id:\d+>/trang-<page:\d+>' => 'categories/index',
                // 'san-pham-<slug:[\w\-]+>-<id:\d+>' => 'categories/index',

                '<slug:[\w\-]+>/trang-<page:\d+>' => 'categories/index',
                '<slug:[\w\-]+>' => 'categories/index',

                // '<slug>'=>'<id:\d+>/<slug>',
                // '<slug:[\w\-]+>/trang-<page:\d+>.html' => 'product/index',
                '<slug:[\w\-]+>.html'=>'product/index',

                // '<slug:[a-z0-9-]+>/trang-<page:\d+>' => 'category/index',
                // '<slug:[a-z0-9-]+>' => 'category/index',

                // '<slug:[a-z0-9-]+>/trang-<page:\d+>' => 'category/index',
                // '<slug:[a-z0-9-]+>' => 'category/index',
                // 'san-pham-<slug>' => 'product/danhsach',
                // 'san-pham/<slug>/trang-<page:\d+>' => 'product/danhsach',
                
                // 'product'=>'product/index',
                // 'danh'=>'product/listpro',
                // '<slug:[a-zA-Z0-9]+>-<id:\d+>'=>'product/view',
                // '<slug>' => 'product/view',
                // 'product/view/<id:\d+>' => 'product/view', 
                // 'product/<slug>' => 'product/slug',
                // '<:slug>-<id:\d+>' => 'product/view',
                'defaultRoute' => '/site/index',
            ],
        ],

        // 'view' => [
        //     'class' => '\rmrevin\yii\minify\View',
        //     'enableMinify' => !YII_DEBUG,
        //     'concatCss' => true, // concatenate css
        //     'minifyCss' => true, // minificate css
        //     'concatJs' => true, // concatenate js
        //     'minifyJs' => true, // minificate js
        //     'minifyOutput' => true, // minificate result html page
        //     'webPath' => '@web', // path alias to web base
        //     'basePath' => '@webroot', // path alias to web base
        //     'minifyPath' => '@webroot/minify', // path alias to save minify result
        //     'jsPosition' => [ \yii\web\View::POS_END ], // positions of js files to be minified
        //     'forceCharset' => 'UTF-8', // charset forcibly assign, otherwise will use all of the files found charset
        //     'expandImports' => true, // whether to change @import on content
        //     'compressOptions' => ['extra' => true], // options for compress
        //     'excludeFiles' => [
        //         'jquery.js', // exclude this file from minification
        //         'app-[^.].js', // you may use regexp
        //     ],
        
        //     'excludeBundles' => [
        //         \app\helloworld\AssetBundle::class, // exclude this bundle from minification
        //     ],
        // ]
    ],
    'params' => $params,

    // 'container' => [
    //     'definitions' => [
    //         'yii\widgets\LinkPager' => [
    //             'firstPageLabel' => 'First',
    //             'lastPageLabel'  => 'Last'
    //         ]
    //     ]
    // ],
];
