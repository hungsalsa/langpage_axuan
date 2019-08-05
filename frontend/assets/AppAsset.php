<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'bootstrap/version-3.1.1.min.css',
        'font-awesome/css/all.min.css',
        'css/global.css'
        /*'css/bootstrap.min.css',
        'css/main.css',
        'css/blue.css',
        'css/owl.carousel.css',
        'css/owl.transitions.css',
        'css/animate.min.css',
        'css/rateit.css',
        'css/bootstrap-select.min.css',
        'css/font-awesome.css',*/
    ];
    public $js = [
        // 'js/jquery-3.3.1.min.js',
        'bootstrap/version-3.1.1.min.js',
        'js/index.min.js',
        'js/bootstrap-notify.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
