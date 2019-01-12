<?php
/**
 * ProductController
 *
 * @copyright Copyright © 2018 Absoft. All rights reserved.
 * @author    dattt@absoft.com.vn
 */

namespace app\modules\shop\admin\apis;

use app\modules\shop\models\EavAttribute;
use app\modules\shop\models\EavAttributeSet;
use Yii;
use app\modules\shop\models\CatalogProductEntity;


class EavAttributeController extends \luya\admin\base\RestController
{
    public function actionIndex(){

        $request = Yii::$app->getRequest();

        $attribute_set_id = $request->get('attribute_set_id')? $request->get('attribute_set_id'): '';

        $query = EavAttribute::find();
        if($attribute_set_id){
            $query->leftJoin('eav_entity_attribute','eav_attribute.attribute_id = eav_entity_attribute.attribute_id')
                ->where(['eav_entity_attribute.attribute_set_id'=>$attribute_set_id]);
        }
        return $query->all();
    }

    public function actionGetAttributeSets(){
        $request = Yii::$app->getRequest();

        $attribute_set_id = $request->get('attribute_set_id')? $request->get('attribute_set_id'): '';

        $query = EavAttributeSet::find();
        if($attribute_set_id){
            $query->where(['attribute_set_id'=>$attribute_set_id]);
        }
        return $query->all();
    }
    public function actionCreate(){
        $request = Yii::$app->getRequest();
        if($request->isPost){
            $requestData = $request->post();
            $product = new CatalogProductEntity();
            $product->attribute_set_id = $requestData['attribute_set_id'];
            unset($requestData['attribute_set_id']);
            $product->type_id = $requestData['type_id'];
            unset($requestData['type_id']);
            $product->setData($requestData);
            if(!$product->save()){
                return $product->getErrors();
            } else {
                return $product;
            }
        } else {
            return Yii::t('app','request not match');
        }
    }
}