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


        $product  = CatalogProductEntity::findOne(97);
        echo "<pre>";
        var_dump($product->getData());
        die;
    }

}