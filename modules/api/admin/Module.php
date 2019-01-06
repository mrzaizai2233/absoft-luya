<?php

namespace app\modules\api\admin;

/**
 * Api Admin Module.
 *
 * File has been created with `module/create` command.
 *
 * @author
 * @since 1.0.0
 */
class Module extends \luya\admin\base\Module
{
    public $apis = [
        'api-shop-product' => 'app\modules\api\admin\apis\ProductController' ,

    ];

    public function getMenu ()
    {
        return (new \luya\admin\components\AdminMenuBuilder( $this ))
            ->node( 'Products' , 'store_mall_directory' )
            ->group( 'Products' )
            ->itemApi( 'Products' , 'shopadmin/product/index' , 'folder' , 'api-shop-product' );
    }

}