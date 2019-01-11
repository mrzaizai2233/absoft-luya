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
        return CatalogProductEntity::find()->limit($limit)->offset($offset)->all();
    }

}