<?php
/**
 * DefaultController
 *
 * @copyright Copyright © 2018 Absoft. All rights reserved.
 * @author    dattt@absoft.com.vn
 */

namespace app\modules\shop\frontend\controllers;


class DefaultController extends \luya\web\Controller
{

    public function actionIndex(){
        return 'hello word !';
    }

}