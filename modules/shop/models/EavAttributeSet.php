<?php

namespace app\modules\shop\models;

use Yii;

/**
 * This is the model class for table "{{%eav_attribute_set}}".
 *
 * @property int $attribute_set_id Attribute Set Id
 * @property int $entity_type_id Entity Type Id
 * @property string $attribute_set_name Attribute Set Name
 * @property int $sort_order Sort Order
 *
 * @property CatalogProductEntity[] $catalogProductEntities
 * @property EavAttributeGroup[] $eavAttributeGroups
 */
class EavAttributeSet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%eav_attribute_set}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['entity_type_id', 'sort_order'], 'integer'],
            [['attribute_set_name'], 'string', 'max' => 255],
            [['entity_type_id', 'attribute_set_name'], 'unique', 'targetAttribute' => ['entity_type_id', 'attribute_set_name']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'attribute_set_id' => Yii::t('app', 'Attribute Set Id'),
            'entity_type_id' => Yii::t('app', 'Entity Type Id'),
            'attribute_set_name' => Yii::t('app', 'Attribute Set Name'),
            'sort_order' => Yii::t('app', 'Sort Order'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogProductEntities()
    {
        return $this->hasMany(CatalogProductEntity::className(), ['attribute_set_id' => 'attribute_set_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEavAttributeGroups()
    {
        return $this->hasMany(EavAttributeGroup::className(), ['attribute_set_id' => 'attribute_set_id']);
    }
}
