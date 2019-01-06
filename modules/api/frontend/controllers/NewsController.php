<?php

namespace app\modules\api\frontend\controllers;
use Yii;
use yii\web\View;

class NewsController extends \luya\rest\ActiveController
{
    public $modelClass = 'luya\news\models\Article';
}