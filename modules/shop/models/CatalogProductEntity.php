<?php

namespace app\modules\shop\models;

use Yii;

/**
 * This is the model class for table "{{%catalog_product_entity}}".
 *
 * @property int $entity_id Entity ID
 * @property int $attribute_set_id Attribute Set ID
 * @property string $type_id Type ID
 * @property string $sku SKU
 * @property int $has_options Has Options
 * @property int $required_options Required Options
 * @property string $created_at Creation Time
 * @property string $updated_at Update Time
 *
 * @property EavAttributeSet $attributeSet
 * @property CatalogProductEntityDatetime[] $catalogProductEntityDatetimes
 * @property CatalogProductEntityDecimal[] $catalogProductEntityDecimals
 * @property CatalogProductEntityText[] $catalogProductEntityTexts
 * @property CatalogProductEntityVarchar[] $catalogProductEntityVarchars
 */
class CatalogProductEntity extends \yii\db\ActiveRecord
{
    const SKU_CODE = 'sku';

    const EAV_ENTITY_TYPE_ID = 4;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%catalog_product_entity}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['attribute_set_id', 'has_options', 'required_options'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['type_id'], 'string', 'max' => 32],
            [['sku'], 'string', 'max' => 64],
            [['attribute_set_id'], 'exist', 'skipOnError' => true, 'targetClass' => EavAttributeSet::className(), 'targetAttribute' => ['attribute_set_id' => 'attribute_set_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'entity_id' => Yii::t('shop', 'Entity ID'),
            'attribute_set_id' => Yii::t('shop', 'Attribute Set ID'),
            'type_id' => Yii::t('shop', 'Type ID'),
            'sku' => Yii::t('shop', 'SKU'),
            'has_options' => Yii::t('shop', 'Has Options'),
            'required_options' => Yii::t('shop', 'Required Options'),
            'created_at' => Yii::t('shop', 'Creation Time'),
            'updated_at' => Yii::t('shop', 'Update Time'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributeSet()
    {
        return $this->hasOne(EavAttributeSet::className(), ['attribute_set_id' => 'attribute_set_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogProductEntityDatetimes()
    {
        return $this->hasMany(CatalogProductEntityDatetime::className(), ['entity_id' => 'entity_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogProductEntityDecimals()
    {
        return $this->hasMany(CatalogProductEntityDecimal::className(), ['entity_id' => 'entity_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogProductEntityTexts()
    {
        return $this->hasMany(CatalogProductEntityText::className(), ['entity_id' => 'entity_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogProductEntityVarchars()
    {
        return $this->hasMany(CatalogProductEntityVarchar::className(), ['entity_id' => 'entity_id']);
    }

    public function getAllEavAttributes(){
        $eavEnityAttribute = EavEntityAttribute::find()
            ->select([])
            ->leftJoin('eav_attribute_set','eav_attribute_set.attribute_set_id = eav_entity_attribute.attribute_set_id')
            ->leftJoin('eav_attribute_group','eav_attribute_group.attribute_group_id = eav_entity_attribute.attribute_group_id')
            ->leftJoin('eav_attribute','eav_attribute.attribute_id = eav_entity_attribute.attribute_id')->all();

    }
}
