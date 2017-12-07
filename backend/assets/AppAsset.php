<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'font-awesome-4.7.0/css/font-awesome.min.css',
        'css/magnific-popup/magnific-popup.css',
        'css/creative.css',
     
    ];
    public $js = [
        'js/popper/popper.min.js',
        'js/jquery-easing/jquery.easing.min.js',
        //'js/scrollreveal/scrollreveal.min.js',
       // 'js/magnific-popup/jquery.magnific-popup.min.js',
        'js/creative.min.js',
        'js/main.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
