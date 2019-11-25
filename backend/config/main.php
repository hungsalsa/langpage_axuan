<?php
use yii\web\Request;
$baseUrl = str_replace('/web', '', (new Request)->getBaseUrl());
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'auth' => [
            'class' => 'backend\modules\auth\Module',
        ],
        'setting' => [
            'class' => 'backend\modules\setting\setting',
        ],
    ],
    
    'components' => [
        'formatter' => [
           'class' => 'yii\i18n\Formatter',
           'dateFormat' => 'php:d-M-Y',
           'datetimeFormat' => 'php:d-M-Y H:i:s',
           'timeFormat' => 'php:H:i:s',
            // 'currencyCode' => 'VNĐ',
        ],
        
        'request' => [
            'csrfParam' => '_csrf-backend',
            'enableCsrfValidation' => false,
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'request'=>[
            'baseUrl'=>$baseUrl
        ],
        
        'urlManager' => [
            'baseUrl'=>$baseUrl,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'other/attribute'=>'quantri/productattributes/index',
                'other/attribute/create'=>'quantri/productattributes/create',
                'other/attribute/update'=>'quantri/productattributes/update',
                'other/attribute/delete'=>'quantri/productattributes/delete',

                'other/value-attribute'=>'quantri/product-attributes-values/index',
                'other/value-attribute/create'=>'quantri/product-attributes-values/create',
                'other/value-attribute/update'=>'quantri/product-attributes-values/update',
                'other/value-attribute/delete'=>'quantri/product-attributes-values/delete',

                'defaultRoute' => '/setting/setting-modules',
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['guest'],
        ],
        
    ],
    'params' => $params,
    'defaultRoute' => 'register',
];
