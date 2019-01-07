<?php
/**
 * AttributeHelper
 *
 * @copyright Copyright © 2019 Absoft. All rights reserved.
 * @author    dattt@absoft.com.vn
 */

namespace app\modules\shop\helpers;


use app\modules\shop\models\EavAttribute;

class AttributeHelper
{

    public static function saveEavAttributes ($attributes,$entity_id,$store_id,$entity_type_id,$entity_table)
    {

        $eavEnityAttributes = EavAttribute::find()
            ->where( [ 'in' , 'eav_attribute.attribute_code' , array_keys( $attributes ) ] )
            ->andWhere( [ 'eav_attribute.entity_type_id' => $entity_type_id ] )
            ->all();

        $_preAttributeToSaves = [];
        foreach ($attributes as $eav_attribute_code => $eav_attribute_value) {
            foreach ($eavEnityAttributes as $index => $eavEnityAttribute) {
                if ($eavEnityAttribute->attribute_code == $eav_attribute_code) {
                    $attributeToSaves[ $eavEnityAttribute->backend_type ][ $eavEnityAttribute->attribute_id ] = $eav_attribute_value;
                    unset($eavEnityAttributes[$index]);
                }
            }
        }
        $attributeToSaves = [];
        foreach ($_preAttributeToSaves as $type => $preAttributeToSave) {
            foreach ($preAttributeToSave as $attribute_id => $value) {
                $attributeToSaves[$type][]=[
                    'attribute_id'=>$attribute_id,
                    'entity_id'=>$entity_id,
                    'store_id'=>$store_id
                ];
            }
        }
        echo "<pre>";
        var_dump( $attributeToSaves );
        die;
    }
}