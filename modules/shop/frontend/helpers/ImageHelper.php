<?php
/**
 * ImageHelper
 *
 * @copyright Copyright © 2019 Absoft. All rights reserved.
 * @author    dattt@absoft.com.vn
 */

namespace app\modules\shop\frontend\helpers;

use app\modules\shop\models\CatalogProductEntity;
use luya\admin\image\Item;


class ImageHelper
{


    /**
     * @param \app\modules\shop\models\CatalogProductEntity $product
     * @return string
     */
    public static function getProductImage($product){
        $imageUrl = null;

        if($product->getImage()){
            $imageUrl = Item::create(['file_id'=>$product->getImage(),'filter_id'=>$product->getImage()])->getSourceAbsolute();
        } else {
            $imageUrl = \Yii::getAlias('@shop').'\resources\images\product.jpg';
        }
        return $imageUrl;
    }

}