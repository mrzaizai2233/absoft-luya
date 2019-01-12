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
        return $this->render('index',compact('model'));
    }

    public function actionCreate(){
        $model = new CatalogProductEntity();
        return $this->render('create',compact('model'));
    }

    public function actionUpdate(){
        $product = CatalogProductEntity::findOne(105);
        $product->setAttributeSetId($product->attribute_set_id);
        $product->setTypeId($product->type_id);
        return $this->render('update',compact('product'));
    }
}