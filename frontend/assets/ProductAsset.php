<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class ProductAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/main.css',
        'css/blue.css',
        'css/owl.carousel.css',
        'css/owl.transitions.css',
        'css/animate.min.css',
        'css/rateit.css',
        'css/bootstrap-select.min.css',
        'css/lightbox.css',
        'css/font-awesome.css',
        'http://fonts.googleapis.com/css?family=Roboto:300,400,500,700',
        'https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800',
        'https://fonts.googleapis.com/css?family=Montserrat:400,700',
    ];
    public $js = [
        'js/jquery-1.11.1.min.js',
        'js/bootstrap.min.js',
        'js/bootstrap-hover-dropdown.min.js',
        'js/owl.carousel.min.js',
        'js/echo.min.js',
        'js/jquery.easing-1.3.min.js',
        'js/bootstrap-slider.min.js',
        'js/jquery.rateit.min.js',
        'js/lightbox.min.js',
        'js/bootstrap-select.min.js',
        'js/wow.min.js',
        'js/scripts.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
