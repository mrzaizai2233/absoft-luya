<?php
/**
 * ProductController
 *
 * @copyright Copyright © 2018 Absoft. All rights reserved.
 * @author    dattt@absoft.com.vn
 */

namespace app\modules\shop\admin\apis;

use Yii;
use app\modules\shop\models\CatalogProductEntity;


class ProductController extends \luya\admin\base\RestController
{
    public function actionIndex(){

        $request = Yii::$app->getRequest();
        $offset = $request->get('offset') ? $request->get('offset') : 0;
        $limit = $request->get('limit') ? $request->get('limit') : 15;
        $results = CatalogProductEntity::find()->limit($limit)->offset($offset)->all();
        $products = [];
        foreach ($results as $result) {
            $products[]=$result->getData();
        }
        return $products;
    }

    public function actionCreate(){
        $request = Yii::$app->getRequest();
        if($request->isPost){
            $requestData = $request->post();
            $product = new CatalogProductEntity();
            $product->attributes = $requestData;
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

    public function actionUpdate($id){
        $request = Yii::$app->getRequest();
        if($request->isPost){
            $requestData = $request->post();
            $product = CatalogProductEntity::findOne($id);
            $product->attributes = $requestData;
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

    public function actionDelete(){
        $id = Yii::$app->getRequest()->post('id');
        if($id){
            return CatalogProductEntity::deleteAll(['entity_id'=>$id]);
        } else {
            return Yii::t('app','entity_id  missing');
        }
    }

}