<?php
/**
 * ProductController
 *
 * @copyright Copyright © 2018 Absoft. All rights reserved.
 * @author    dattt@absoft.com.vn
 */

namespace app\modules\shop\admin\apis;


class ProductController extends \luya\admin\base\RestController
{
    public function actionIndex(){
        return ['foo','bar'];
    }

}