<?php

namespace app\modules\shop\models;

use Yii;

/**
 * This is the model class for table "{{%eav_entity_attribute}}".
 *
 * @property int $entity_attribute_id Entity Attribute Id
 * @property int $entity_type_id Entity Type Id
 * @property int $attribute_set_id Attribute Set Id
 * @property int $attribute_group_id Attribute Group Id
 * @property int $attribute_id Attribute Id
 * @property int $sort_order Sort Order
 *
 * @property EavAttribute $attribute0
 * @property EavAttributeGroup $attributeGroup
 */
class EavEntityAttribute extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%eav_entity_attribute}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['entity_type_id', 'attribute_set_id', 'attribute_group_id', 'attribute_id', 'sort_order'], 'integer'],
            [['attribute_set_id', 'attribute_id'], 'unique', 'targetAttribute' => ['attribute_set_id', 'attribute_id']],
            [['attribute_group_id', 'attribute_id'], 'unique', 'targetAttribute' => ['attribute_group_id', 'attribute_id']],
            [['attribute_id'], 'exist', 'skipOnError' => true, 'targetClass' => EavAttribute::className(), 'targetAttribute' => ['attribute_id' => 'attribute_id']],
            [['attribute_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => EavAttributeGroup::className(), 'targetAttribute' => ['attribute_group_id' => 'attribute_group_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'entity_attribute_id' => Yii::t('shop', 'Entity Attribute Id'),
            'entity_type_id' => Yii::t('shop', 'Entity Type Id'),
            'attribute_set_id' => Yii::t('shop', 'Attribute Set Id'),
            'attribute_group_id' => Yii::t('shop', 'Attribute Group Id'),
            'attribute_id' => Yii::t('shop', 'Attribute Id'),
            'sort_order' => Yii::t('shop', 'Sort Order'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttribute0()
    {
        return $this->hasOne(EavAttribute::className(), ['attribute_id' => 'attribute_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributeGroup()
    {
        return $this->hasOne(EavAttributeGroup::className(), ['attribute_group_id' => 'attribute_group_id']);
    }
}
