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
use app\modules\shop\models\Repositories\Product\ProductRepository;
use luya\admin\base\Module;
use Yii;
class ProductController extends \luya\admin\base\Controller
{

    protected $_productRepository;

    public $disablePermissionCheck = true;

    public function __construct ( $id , Module $module ,ProductRepository $productRepository, array $config = [] )
    {
        $this->_productRepository = $productRepository;

        parent::__construct( $id , $module , $config );
    }

    public function actionIndex(){

        $model = new CatalogProductEntity();
        return $this->render('index',compact('model'));
    }

    public function actionCreate(){
        return $this->render('create');
    }

    public function actionUpdate(){
        return $this->render('update');
    }

    public function actionTest(){
        $product = $this->_productRepository->findById(107);
        var_dump($product);
    }
}