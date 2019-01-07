<?php
/**
 * EavAttributeHelper
 *
 * @copyright Copyright © 2019 Absoft. All rights reserved.
 * @author    dattt@absoft.com.vn
 */

namespace app\modules\shop\common\helpers;


use app\modules\shop\models\CatalogProductEntity;
use app\modules\shop\models\EavAttribute;
use app\modules\shop\models\Store;

class EavAttributeHelper
{

    /**
     * @param $entityType
     * @param object $object
     */
    public function getEntityAttributes($entityType, $object = null){
        $store_id = $object->store_id?$object->store_id: Store::DEFAULT_STORE_ID;
        $attribute_set_id = $object->attribute_set_id?$object->attribute_set_id:CatalogProductEntity::DEFUALT_ATTRIBUTE_SET;
        $attributesData = EavAttribute::find()
            ->leftJoin('eav_attribute_set','eav_attribute_set.entity_type_id = eav_attribute.entity_type_id')
            ->where(['eav_attribute.entity_type_id'=>$entityType])
            ->andWhere(['eav_attribute_set.attribute_set_id'=>$attribute_set_id])
            ->all();
        $attributes = [];
        foreach ($attributesData as $attribute) {
            $attributes[$attribute->attribute_code]= $attribute;
        }
        return $attributes;
    }

}