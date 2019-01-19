<?php
/**
 * CartController
 *
 * @copyright Copyright © 2019 Absoft. All rights reserved.
 * @author    dattt@absoft.com.vn
 */

namespace app\modules\shop\frontend\controllers;

use app\modules\shop\models\Repositories\Product\ProductRepository;
use luya\base\Module;
use Yii;
use app\modules\shop\models\CatalogProductEntity;
use app\modules\shop\models\Quote;
class CartController extends \luya\web\Controller
{

    protected $_productRepository;

    protected $_quoteModel;

    public function __construct ( $id , Module $module ,ProductRepository $productRepository,Quote $quote, array $config = [] )
    {
        $this->_productRepository = $productRepository;
        $this->_quoteModel = $quote;
        parent::__construct( $id , $module , $config );
    }


    public function newQuote(){
        return $this->_quoteModel->instantiate($row = null);
    }

    public function actionAdd(){
        $request = Yii::$app->request;
        $session = Yii::$app->session;

        $product = $this->_productRepository->load($request->get('product_id'));
        if($product){

            $cart = $session->get('cart');
            if($cart){
                $quote = $this->newQuote();
                $quote->items_count = 1;
                $quote->items_qty = $request->get('qty');
                $session->set('cart',['quote_id'=>'']);
            }



        } else {
            $session->addFlash('error','Product not found !');
        }


    }
}