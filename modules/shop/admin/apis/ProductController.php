<?php
/**
 * ProductController
 *
 * @copyright Copyright © 2018 Absoft. All rights reserved.
 * @author    dattt@absoft.com.vn
 */

namespace app\modules\shop\admin\apis;


use app\modules\shop\models\CatalogProductEntity;

class ProductController extends \luya\admin\base\RestController
{
    public function actionIndex(){
        return CatalogProductEntity::find()->all();
    }

}