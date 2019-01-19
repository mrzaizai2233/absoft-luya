<?php

namespace app\modules\shop\frontend\assets;

class Main extends \luya\web\Asset
{
    public $sourcePath = '@shop/resources';
    public $js = [
        'js/shop.js',
    ];
    public $css = [
        'css/shop.css',
        'css/shop-vew.css',
    ];

    public $depends = [
         'yii\web\YiiAsset',
         'yii\bootstrap\BootstrapAsset',
      ];
}