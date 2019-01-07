<?php
/**
 * DefaultController
 *
 * @copyright Copyright © 2018 Absoft. All rights reserved.
 * @author    dattt@absoft.com.vn
 */

namespace app\modules\shop\frontend\controllers;


use app\modules\shop\common\helpers\EavAttributeHelper;
use app\modules\shop\models\CatalogProductEntity;

class DefaultController extends \luya\web\Controller
{

    public function actionIndex(){
        $attributes = [
            'name'=>'Iphone 4s',
            'description'=>'Điện thoại xin nhất Việt Nam',
            'short_description'=>'Điện thoại xin nhất Việt Nam',
            'price'=>59
        ];
        $helper = new EavAttributeHelper();
        $product = new CatalogProductEntity();
        $product->sku = "iphone4s";
        $product->attribute_set_id = 4;
        $product->eav_attributes = $attributes;
        $product->store_id = 1;
        $attribute = $helper->getEntityAttributes(4,$product);
        var_dump($attribute);
        die;
        if(!$product->save()){
            var_dump($product->getErrors());
        };
    }

}