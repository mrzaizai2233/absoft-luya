<?php

namespace app\modules\shop\models;

use Yii;

/**
 * This is the model class for table "{{%eav_attribute_group}}".
 *
 * @property int $attribute_group_id Attribute Group Id
 * @property int $attribute_set_id Attribute Set Id
 * @property string $attribute_group_name Attribute Group Name
 * @property int $sort_order Sort Order
 * @property int $default_id Default Id
 * @property string $attribute_group_code Attribute Group Code
 * @property string $tab_group_code Tab Group Code
 *
 * @property EavAttributeSet $attributeSet
 * @property EavEntityAttribute[] $eavEntityAttributes
 * @property EavAttribute[] $attributes0
 */
class EavAttributeGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%eav_attribute_group}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['attribute_set_id', 'sort_order', 'default_id'], 'integer'],
            [['attribute_group_code'], 'required'],
            [['attribute_group_name', 'attribute_group_code', 'tab_group_code'], 'string', 'max' => 255],
            [['attribute_set_id', 'attribute_group_code'], 'unique', 'targetAttribute' => ['attribute_set_id', 'attribute_group_code']],
            [['attribute_set_id', 'attribute_group_name'], 'unique', 'targetAttribute' => ['attribute_set_id', 'attribute_group_name']],
            [['attribute_set_id'], 'exist', 'skipOnError' => true, 'targetClass' => EavAttributeSet::className(), 'targetAttribute' => ['attribute_set_id' => 'attribute_set_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'attribute_group_id' => Yii::t('shop', 'Attribute Group Id'),
            'attribute_set_id' => Yii::t('shop', 'Attribute Set Id'),
            'attribute_group_name' => Yii::t('shop', 'Attribute Group Name'),
            'sort_order' => Yii::t('shop', 'Sort Order'),
            'default_id' => Yii::t('shop', 'Default Id'),
            'attribute_group_code' => Yii::t('shop', 'Attribute Group Code'),
            'tab_group_code' => Yii::t('shop', 'Tab Group Code'),
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
    public function getEavEntityAttributes()
    {
        return $this->hasMany(EavEntityAttribute::className(), ['attribute_group_id' => 'attribute_group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributes0()
    {
        return $this->hasMany(EavAttribute::className(), ['attribute_id' => 'attribute_id'])->viaTable('{{%eav_entity_attribute}}', ['attribute_group_id' => 'attribute_group_id']);
    }
}
