<?php

namespace app\modules\shop\models;

use Yii;

/**
 * This is the model class for table "{{%catalog_product_entity_varchar}}".
 *
 * @property int $value_id Value ID
 * @property int $attribute_id Attribute ID
 * @property int $store_id Store ID
 * @property int $entity_id Entity ID
 * @property string $value Value
 *
 * @property Store $store
 * @property EavAttribute $attribute0
 * @property CatalogProductEntity $entity
 */
class CatalogProductEntityVarchar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%catalog_product_entity_varchar}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['attribute_id', 'store_id', 'entity_id'], 'integer'],
            [['value'], 'string', 'max' => 255],
            [['entity_id', 'attribute_id', 'store_id'], 'unique', 'targetAttribute' => ['entity_id', 'attribute_id', 'store_id']],
            [['store_id'], 'exist', 'skipOnError' => true, 'targetClass' => Store::className(), 'targetAttribute' => ['store_id' => 'store_id']],
            [['attribute_id'], 'exist', 'skipOnError' => true, 'targetClass' => EavAttribute::className(), 'targetAttribute' => ['attribute_id' => 'attribute_id']],
            [['entity_id'], 'exist', 'skipOnError' => true, 'targetClass' => CatalogProductEntity::className(), 'targetAttribute' => ['entity_id' => 'entity_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'value_id' => Yii::t('app', 'Value ID'),
            'attribute_id' => Yii::t('app', 'Attribute ID'),
            'store_id' => Yii::t('app', 'Store ID'),
            'entity_id' => Yii::t('app', 'Entity ID'),
            'value' => Yii::t('app', 'Value'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStore()
    {
        return $this->hasOne(Store::className(), ['store_id' => 'store_id']);
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
    public function getEntity()
    {
        return $this->hasOne(CatalogProductEntity::className(), ['entity_id' => 'entity_id']);
    }
}
