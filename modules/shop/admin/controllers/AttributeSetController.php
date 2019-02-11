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
class AttributeSetController extends \luya\admin\base\Controller
{

    public $disablePermissionCheck = true;

    public function actionIndex(){
        return $this->render('index');
    }

    public function actionCreate(){
        return $this->render('create');
    }

    public function actionUpdate(){
        return $this->render('update');
    }

}