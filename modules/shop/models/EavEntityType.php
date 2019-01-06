<?php

namespace app\modules\shop\models;

use Yii;

/**
 * This is the model class for table "{{%eav_entity_type}}".
 *
 * @property int $entity_type_id Entity Type Id
 * @property string $entity_type_code Entity Type Code
 * @property string $entity_model Entity Model
 * @property string $attribute_model Attribute Model
 * @property string $entity_table Entity Table
 * @property string $value_table_prefix Value Table Prefix
 * @property string $entity_id_field Entity Id Field
 * @property int $is_data_sharing Defines Is Data Sharing
 * @property string $data_sharing_key Data Sharing Key
 * @property int $default_attribute_set_id Default Attribute Set Id
 * @property string $increment_model Increment Model
 * @property int $increment_per_store Increment Per Store
 * @property int $increment_pad_length Increment Pad Length
 * @property string $increment_pad_char Increment Pad Char
 * @property string $additional_attribute_table Additional Attribute Table
 * @property string $entity_attribute_collection Entity Attribute Collection
 */
class EavEntityType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%eav_entity_type}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['entity_type_code', 'entity_model'], 'required'],
            [['is_data_sharing', 'default_attribute_set_id', 'increment_per_store', 'increment_pad_length'], 'integer'],
            [['entity_type_code'], 'string', 'max' => 50],
            [['entity_model', 'attribute_model', 'entity_table', 'value_table_prefix', 'entity_id_field', 'increment_model', 'additional_attribute_table', 'entity_attribute_collection'], 'string', 'max' => 255],
            [['data_sharing_key'], 'string', 'max' => 100],
            [['increment_pad_char'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'entity_type_id' => Yii::t('shop', 'Entity Type Id'),
            'entity_type_code' => Yii::t('shop', 'Entity Type Code'),
            'entity_model' => Yii::t('shop', 'Entity Model'),
            'attribute_model' => Yii::t('shop', 'Attribute Model'),
            'entity_table' => Yii::t('shop', 'Entity Table'),
            'value_table_prefix' => Yii::t('shop', 'Value Table Prefix'),
            'entity_id_field' => Yii::t('shop', 'Entity Id Field'),
            'is_data_sharing' => Yii::t('shop', 'Defines Is Data Sharing'),
            'data_sharing_key' => Yii::t('shop', 'Data Sharing Key'),
            'default_attribute_set_id' => Yii::t('shop', 'Default Attribute Set Id'),
            'increment_model' => Yii::t('shop', 'Increment Model'),
            'increment_per_store' => Yii::t('shop', 'Increment Per Store'),
            'increment_pad_length' => Yii::t('shop', 'Increment Pad Length'),
            'increment_pad_char' => Yii::t('shop', 'Increment Pad Char'),
            'additional_attribute_table' => Yii::t('shop', 'Additional Attribute Table'),
            'entity_attribute_collection' => Yii::t('shop', 'Entity Attribute Collection'),
        ];
    }
}
