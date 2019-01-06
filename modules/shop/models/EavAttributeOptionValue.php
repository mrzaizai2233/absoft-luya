<?php

namespace app\modules\shop\models;

use Yii;

/**
 * This is the model class for table "{{%eav_attribute_option_value}}".
 *
 * @property int $value_id Value Id
 * @property int $option_id Option Id
 * @property int $store_id Store Id
 * @property string $value Value
 *
 * @property Store $store
 * @property EavAttributeOption $option
 */
class EavAttributeOptionValue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%eav_attribute_option_value}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['option_id', 'store_id'], 'integer'],
            [['value'], 'string', 'max' => 255],
            [['store_id'], 'exist', 'skipOnError' => true, 'targetClass' => Store::className(), 'targetAttribute' => ['store_id' => 'store_id']],
            [['option_id'], 'exist', 'skipOnError' => true, 'targetClass' => EavAttributeOption::className(), 'targetAttribute' => ['option_id' => 'option_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'value_id' => Yii::t('shop', 'Value Id'),
            'option_id' => Yii::t('shop', 'Option Id'),
            'store_id' => Yii::t('shop', 'Store Id'),
            'value' => Yii::t('shop', 'Value'),
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
    public function getOption()
    {
        return $this->hasOne(EavAttributeOption::className(), ['option_id' => 'option_id']);
    }
}
