<?php
/**
 * ProductHelper
 *
 * @copyright Copyright © 2019 Absoft. All rights reserved.
 * @author    dattt@absoft.com.vn
 */

namespace app\modules\shop\common\helpers;


use app\modules\shop\models\CatalogProductEntity;

class ProductHelper
{
    /**
     * @param CatalogProductEntity $product
     * @param array $attributes
     */
    public function margeProductWithAttribute( $product, $attributes = []){
        foreach ($attributes as $attribute_code => $attribute_value) {
            $product->setDataUsingMethod($attribute_code,$attribute_value);
        }
    }

}