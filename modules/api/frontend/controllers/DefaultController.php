<?php

namespace app\modules\api\frontend\controllers;
use Yii;
use yii\web\View;

class DefaultController extends \luya\web\Controller
{
    public $modelClass = 'luya\news\models\Article';

    public function actionIndex ()
    {
       $this->getView()->registerJsFile('//cdn.jsdelivr.net/npm/vue/dist/vue.js',['position'=>View::POS_HEAD]);
       $this->getView()->registerJsFile('//unpkg.com/axios/dist/axios.min.js',['position'=>View::POS_HEAD]);

       return $this->render('index');
    }
}