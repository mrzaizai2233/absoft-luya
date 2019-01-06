<?php
/**
 * ProductController
 *
 * @copyright Copyright © 2018 Absoft. All rights reserved.
 * @author    dattt@absoft.com.vn
 */

namespace app\modules\shop\admin\controllers;


use app\modules\shop\models\CatalogProductEntity;

class ProductController extends \luya\admin\base\Controller
{

    public function actionIndex(){
        $model = new CatalogProductEntity();
        return $this->render('index',compact('model'));
    }
}