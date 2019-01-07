<?php
/**
 * ProductController
 *
 * @copyright Copyright © 2018 Absoft. All rights reserved.
 * @author    dattt@absoft.com.vn
 */

namespace app\modules\shop\admin\controllers;


use app\modules\shop\models\CatalogProductEntity;
use app\modules\shop\models\EavAttribute;

class ProductController extends \luya\admin\base\Controller
{

    public function actionIndex(){
        $model = new CatalogProductEntity();
        $eavAttribute = EavAttribute::findOne(73);
        $eavAttribute->saveAttributeValue('Abc');
        return $this->render('index',compact('model'));
    }
}