<?php

namespace app\modules\shop\models;

use Yii;

/**
 * This is the model class for table "{{%eav_attribute}}".
 *
 * @property int $attribute_id Attribute Id
 * @property int $entity_type_id Entity Type Id
 * @property string $attribute_code Attribute Code
 * @property string $attribute_model Attribute Model
 * @property string $backend_model Backend Model
 * @property string $backend_type Backend Type
 * @property string $backend_table Backend Table
 * @property string $frontend_model Frontend Model
 * @property string $frontend_input Frontend Input
 * @property string $frontend_label Frontend Label
 * @property string $frontend_class Frontend Class
 * @property string $source_model Source Model
 * @property int $is_required Defines Is Required
 * @property int $is_user_defined Defines Is User Defined
 * @property string $default_value Default Value
 * @property int $is_unique Defines Is Unique
 * @property string $note Note
 *
 * @property CatalogProductEntityText[] $catalogProductEntityTexts
 * @property EavAttributeLabel[] $eavAttributeLabels
 * @property EavAttributeOption[] $eavAttributeOptions
 * @property EavEntityAttribute[] $eavEntityAttributes
 * @property EavAttributeGroup[] $attributeGroups
 */
class EavAttribute extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%eav_attribute}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['entity_type_id', 'is_required', 'is_user_defined', 'is_unique'], 'integer'],
            [['attribute_code'], 'required'],
            [['default_value'], 'string'],
            [['attribute_code', 'attribute_model', 'backend_model', 'backend_table', 'frontend_model', 'frontend_label', 'frontend_class', 'source_model', 'note'], 'string', 'max' => 255],
            [['backend_type'], 'string', 'max' => 8],
            [['frontend_input'], 'string', 'max' => 50],
            [['entity_type_id', 'attribute_code'], 'unique', 'targetAttribute' => ['entity_type_id', 'attribute_code']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'attribute_id' => Yii::t('shop', 'Attribute Id'),
            'entity_type_id' => Yii::t('shop', 'Entity Type Id'),
            'attribute_code' => Yii::t('shop', 'Attribute Code'),
            'attribute_model' => Yii::t('shop', 'Attribute Model'),
            'backend_model' => Yii::t('shop', 'Backend Model'),
            'backend_type' => Yii::t('shop', 'Backend Type'),
            'backend_table' => Yii::t('shop', 'Backend Table'),
            'frontend_model' => Yii::t('shop', 'Frontend Model'),
            'frontend_input' => Yii::t('shop', 'Frontend Input'),
            'frontend_label' => Yii::t('shop', 'Frontend Label'),
            'frontend_class' => Yii::t('shop', 'Frontend Class'),
            'source_model' => Yii::t('shop', 'Source Model'),
            'is_required' => Yii::t('shop', 'Defines Is Required'),
            'is_user_defined' => Yii::t('shop', 'Defines Is User Defined'),
            'default_value' => Yii::t('shop', 'Default Value'),
            'is_unique' => Yii::t('shop', 'Defines Is Unique'),
            'note' => Yii::t('shop', 'Note'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogProductEntityTexts()
    {
        return $this->hasMany(CatalogProductEntityText::className(), ['attribute_id' => 'attribute_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEavAttributeLabels()
    {
        return $this->hasMany(EavAttributeLabel::className(), ['attribute_id' => 'attribute_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEavAttributeOptions()
    {
        return $this->hasMany(EavAttributeOption::className(), ['attribute_id' => 'attribute_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEavEntityAttributes()
    {
        return $this->hasMany(EavEntityAttribute::className(), ['attribute_id' => 'attribute_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributeGroups()
    {
        return $this->hasMany(EavAttributeGroup::className(), ['attribute_group_id' => 'attribute_group_id'])->viaTable('{{%eav_entity_attribute}}', ['attribute_id' => 'attribute_id']);
    }
}
