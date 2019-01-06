<?php

namespace app\modules\api\frontend;

/**
 * Api Admin Module.
 *
 * File has been created with `module/create` command. 
 * 
 * @author
 * @since 1.0.0
 */
class Module extends \luya\base\Module
{
    public $apis = [
      'api-module-posts' =>'app\modules\api\frontend\apis\PostController'
    ];

}