<?php

namespace app\modules\shop\admin;

use Yii;
/**
 * Shop Admin Module.
 *
 * File has been created with `module/create` command. 
 * 
 * @author
 * @since 1.0.0
 */
class Module extends \luya\admin\base\Module
{
    public $apis = [
        'api-shop-product' => 'app\modules\shop\admin\apis\ProductController' ,
        'api-shop-attribute' => 'app\modules\shop\admin\apis\EavAttributeController' ,
    ];


    public function getAdminAssets()
    {
        return [
            'app\modules\shop\admin\assets\Main'
        ];
    }

    public function getMenu ()
    {
        return (new \luya\admin\components\AdminMenuBuilder($this))
            ->node('Shop', 'store_mall_directory')
            ->group('Catalog')
            ->itemRoute("Products", "shopadmin/product/index", "poll")
            ->itemRoute("Attributes", "shopadmin/attribute/index", "poll");
    }
}