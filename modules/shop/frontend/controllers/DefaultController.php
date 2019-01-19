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
use app\modules\shop\models\Repositories\Product\ProductRepository;
use luya\base\Module;

class DefaultController extends \luya\web\Controller
{

    protected $_productRepository;

    public function __construct ( $id , Module $module , ProductRepository $productRepository , array $config = [] )
    {
        $this->_productRepository = $productRepository;
        parent::__construct( $id , $module , $config );
    }

    public function actionIndex(){
//        echo \Yii::getAlias('@shop');
//        die;

        $products =$this->_productRepository
            ->addAttributeToSelect('name,price,short_description,image')
//            ->addFilterAttribute('entity_id','=',107)
            ->all();
//        var_dump($products);
//        die;
//var_dump($product);
////        $this->_productRepository->runQuery();
//        die;


//        $products = CatalogProductEntity::find()->all();
        return $this->render('index',compact('products'));
    }

    public function actionView($id){
        $product = $this->_productRepository->load($id);
        return $this->render('view',compact('product'));
    }

}