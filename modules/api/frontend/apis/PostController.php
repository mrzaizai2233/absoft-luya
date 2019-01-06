<?php
/**
 * PostController
 *
 * @copyright Copyright © 2018 Absoft. All rights reserved.
 * @author    dattt@absoft.com.vn
 */

namespace app\modules\api\frontend\apis;


class PostController extends \luya\admin\ngrest\base\Api
{
    public $modelClass = 'luya\news\models\Article';

    public function actionComment(){

    }
}