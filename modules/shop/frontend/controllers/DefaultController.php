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
        $this->_productRepository
            ->addFilterAttribute('name',['type'=>'=','value'=>'Iphone 4s'])
            ->addFilterAttribute('visibility',['type'=>'=','value'=>'1'])
            ->runQuery();

        $this->_productRepository->runQuery();
        die;


        $products = CatalogProductEntity::find()->all();
        return $this->render('index',compact('products'));
    }

    public function actionView($id){
        echo $id;
        die;
    }

}