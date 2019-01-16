<?php

namespace app\modules\shop\admin\assets;

class Main extends \luya\web\Asset
{
    public $sourcePath = '@shopadmin/resources';

    public $js = [
        'js/catalog.route.js',
    ];

    public $depends = [
        'luya\admin\assets\Main',
    ];
}