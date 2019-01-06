<?php

namespace app\modules\shop\models;

use Yii;

/**
 * This is the model class for table "{{%store}}".
 *
 * @property int $store_id Store Id
 * @property string $code Code
 * @property int $website_id Website Id
 * @property int $group_id Group Id
 * @property string $name Store Name
 * @property int $sort_order Store Sort Order
 * @property int $is_active Store Activity
 *
 * @property CatalogProductEntityText[] $catalogProductEntityTexts
 * @property EavAttributeLabel[] $eavAttributeLabels
 * @property EavAttributeOptionValue[] $eavAttributeOptionValues
 */
class Store extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%store}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['website_id', 'group_id', 'sort_order', 'is_active'], 'integer'],
            [['name'], 'required'],
            [['code'], 'string', 'max' => 32],
            [['name'], 'string', 'max' => 255],
            [['code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'store_id' => Yii::t('shop', 'Store Id'),
            'code' => Yii::t('shop', 'Code'),
            'website_id' => Yii::t('shop', 'Website Id'),
            'group_id' => Yii::t('shop', 'Group Id'),
            'name' => Yii::t('shop', 'Store Name'),
            'sort_order' => Yii::t('shop', 'Store Sort Order'),
            'is_active' => Yii::t('shop', 'Store Activity'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogProductEntityTexts()
    {
        return $this->hasMany(CatalogProductEntityText::className(), ['store_id' => 'store_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEavAttributeLabels()
    {
        return $this->hasMany(EavAttributeLabel::className(), ['store_id' => 'store_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEavAttributeOptionValues()
    {
        return $this->hasMany(EavAttributeOptionValue::className(), ['store_id' => 'store_id']);
    }
}
