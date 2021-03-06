<?php

namespace app\modules\shop\frontend;
/**
 * Shop Admin Module.
 *
 * File has been created with `module/create` command. 
 * 
 * @author
 * @since 1.0.0
 */
class Module extends \luya\base\Module
{
    public function init ()
    {
        \Yii::$container->set('app\modules\shop\models\Repositories\Product','app\modules\shop\models\Repositories\Product');
        parent::init();
    }
}