<?php

namespace app\modules\shop\admin;

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
    ];

    public function getMenu ()
    {
        return (new \luya\admin\components\AdminMenuBuilder($this))
            ->node('Shop', 'store_mall_directory')
            ->group('Catalog')
            ->itemRoute("Products", "shopadmin/product/index", "poll");
    }
}