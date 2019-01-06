<?php

namespace app\modules\shop\models;

use Yii;

/**
 * This is the model class for table "{{%eav_attribute_option}}".
 *
 * @property int $option_id Option Id
 * @property int $attribute_id Attribute Id
 * @property int $sort_order Sort Order
 *
 * @property EavAttribute $attribute0
 * @property EavAttributeOptionValue[] $eavAttributeOptionValues
 */
class EavAttributeOption extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%eav_attribute_option}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['attribute_id', 'sort_order'], 'integer'],
            [['attribute_id'], 'exist', 'skipOnError' => true, 'targetClass' => EavAttribute::className(), 'targetAttribute' => ['attribute_id' => 'attribute_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'option_id' => Yii::t('shop', 'Option Id'),
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
    public function getEavAttributeOptionValues()
    {
        return $this->hasMany(EavAttributeOptionValue::className(), ['option_id' => 'option_id']);
    }
}
