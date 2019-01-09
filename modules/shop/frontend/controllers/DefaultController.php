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
            'name'=>'Iphone 4s 12312313123123',
            'description'=>'Điện thoại xin nhất Việt Nam',
            'short_description'=>'Điện thoại xin nhất Hải Phòng',
            'price'=>59,
//            'category_ids'=>[1,2,3,4,5]
        ];
        echo "<pre>";
//        $product = new CatalogProductEntity();
        $product = CatalogProductEntity::findOne(95);
        $product->sku = "iphone4s";
        $product->attribute_set_id = 4;
        $product->setData($attributes);
        $product->save();
        die;
//        var_dump($product);
        var_dump($product->getAttributes());
        var_dump($product->getEntityTable());
        $attribute = $helper->getEntityAttributes(4,$product);
        die;
        if(!$product->save()){
            var_dump($product->getErrors());
        };
    }

}