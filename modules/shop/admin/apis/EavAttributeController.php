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
        $request = Yii::$app->getRequest()->post();
        $requestData = $request;
        var_dump(Yii::$app->getRequest()->post());
        die;
        $attributeInstance = new EavAttribute();
        $attributeInstance->attributes = $requestData;

    }

    public function actionAttributes(){
        $query = EavAttribute::find();
        return $query->all();
    }

    public function actionView($id){
        return EavAttribute::findOne($id);
    }

    public function actionUpdate(){
        $request = Yii::$app->getRequest();
        $requestData = $request->post();
        var_dump($requestData);
        die;
        $attributeInstance = EavAttribute::findOne($requestData['attribute_id']);
        $attributeInstance->attributes = $requestData;

    }
}