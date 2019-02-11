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
use app\modules\shop\models\EavEntityAttribute;
use Yii;
use app\modules\shop\models\CatalogProductEntity;
use yii\data\ActiveDataProvider;
use yii\db\Query;


class EavAttributeSetController extends \luya\admin\base\RestController
{
    public function actionIndex(){
        return EavAttributeSet::find()->all();
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

    public function actionGetAttributes(){
        return EavAttribute::find()->with('options')->asArray()->all();
        $query = (new Query())->from('eav_entity_attribute')->leftJoin('eav_attribute','eav_attribute.attribute_id = eav_entity_attribute.attribute_id');
        $dataProvider = new ActiveDataProvider([
            'query'=>$query
        ]);
        return $dataProvider->query->all();
    }
    public function actionCreate(){
        $attributeSetInstance = new EavAttributeSet();
        $attributeSetInstance->attributes = Yii::$app->getRequest()->post();

        if(!$attributeSetInstance->save()){
            return $attributeSetInstance->getErrors();
        } else {
            return 1;
        }
    }

    public function actionAttributes(){
        $query = EavAttribute::find();
        return $query->all();
    }

    public function actionView($id){
        return EavAttribute::find()
            ->with('options')
            ->where(['eav_attribute.attribute_id'=>$id])
            ->asArray()
            ->one();
    }

    public function actionUpdate(){
        $request = Yii::$app->getRequest();
        $requestData = $request->post();
        $attributeInstance = EavAttribute::findOne($requestData['attribute_id']);
        $attributeInstance->attributes = $requestData;
        if(isset($requestData['options'])) {
            $attributeInstance->setOptions($requestData['options']);
        }
        if(!$attributeInstance->save()){
            return $attributeInstance->getErrors();
        } else {
            return 1;
        }
    }

    public function actionDelete(){
        return EavAttribute::deleteAll(['attribute_id'=>Yii::$app->request->post('id')]);
    }
}