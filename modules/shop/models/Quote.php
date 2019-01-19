<?php

namespace app\modules\shop\models;

use Yii;

/**
 * This is the model class for table "{{%quote}}".
 *
 * @property int $entity_id Entity Id
 * @property int $store_id Store Id
 * @property string $created_at Created At
 * @property string $updated_at
 * @property string $converted_at Converted At
 * @property int $is_active Is Active
 * @property int $is_virtual Is Virtual
 * @property int $is_multi_shipping Is Multi Shipping
 * @property int $items_count Items Count
 * @property string $items_qty Items Qty
 * @property int $orig_order_id Orig Order Id
 * @property string $store_to_base_rate Store To Base Rate
 * @property string $store_to_quote_rate Store To Quote Rate
 * @property string $base_currency_code Base Currency Code
 * @property string $store_currency_code Store Currency Code
 * @property string $quote_currency_code Quote Currency Code
 * @property string $grand_total Grand Total
 * @property string $base_grand_total Base Grand Total
 * @property string $checkout_method Checkout Method
 * @property int $customer_id Customer Id
 * @property int $customer_tax_class_id Customer Tax Class Id
 * @property int $customer_group_id Customer Group Id
 * @property string $customer_email Customer Email
 * @property string $customer_prefix Customer Prefix
 * @property string $customer_firstname Customer Firstname
 * @property string $customer_middlename Customer Middlename
 * @property string $customer_lastname Customer Lastname
 * @property string $customer_suffix Customer Suffix
 * @property string $customer_dob Customer Dob
 * @property string $customer_note Customer Note
 * @property int $customer_note_notify Customer Note Notify
 * @property int $customer_is_guest Customer Is Guest
 * @property string $remote_ip Remote Ip
 * @property string $applied_rule_ids Applied Rule Ids
 * @property string $reserved_order_id Reserved Order Id
 * @property string $password_hash Password Hash
 * @property string $coupon_code Coupon Code
 * @property string $global_currency_code Global Currency Code
 * @property string $base_to_global_rate Base To Global Rate
 * @property string $base_to_quote_rate Base To Quote Rate
 * @property string $customer_taxvat Customer Taxvat
 * @property string $customer_gender Customer Gender
 * @property string $subtotal Subtotal
 * @property string $base_subtotal Base Subtotal
 * @property string $subtotal_with_discount Subtotal With Discount
 * @property string $base_subtotal_with_discount Base Subtotal With Discount
 * @property int $is_changed Is Changed
 * @property int $trigger_recollect Trigger Recollect
 * @property string $ext_shipping_info Ext Shipping Info
 * @property int $is_persistent Is Quote Persistent
 * @property int $gift_message_id Gift Message Id
 *
 * @property Store $store
 */
class Quote extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%quote}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['store_id', 'is_active', 'is_virtual', 'is_multi_shipping', 'items_count', 'orig_order_id', 'customer_id', 'customer_tax_class_id', 'customer_group_id', 'customer_note_notify', 'customer_is_guest', 'is_changed', 'trigger_recollect', 'is_persistent', 'gift_message_id'], 'integer'],
            [['created_at', 'updated_at', 'converted_at', 'customer_dob'], 'safe'],
            [['items_qty', 'store_to_base_rate', 'store_to_quote_rate', 'grand_total', 'base_grand_total', 'base_to_global_rate', 'base_to_quote_rate', 'subtotal', 'base_subtotal', 'subtotal_with_discount', 'base_subtotal_with_discount'], 'number'],
            [['ext_shipping_info'], 'string'],
            [['base_currency_code', 'store_currency_code', 'quote_currency_code', 'checkout_method', 'customer_email', 'customer_firstname', 'customer_lastname', 'customer_note', 'applied_rule_ids', 'password_hash', 'coupon_code', 'global_currency_code', 'customer_taxvat', 'customer_gender'], 'string', 'max' => 255],
            [['customer_prefix', 'customer_middlename', 'customer_suffix'], 'string', 'max' => 40],
            [['remote_ip'], 'string', 'max' => 32],
            [['reserved_order_id'], 'string', 'max' => 64],
            [['store_id'], 'exist', 'skipOnError' => true, 'targetClass' => Store::className(), 'targetAttribute' => ['store_id' => 'store_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'entity_id' => Yii::t('shop', 'Entity Id'),
            'store_id' => Yii::t('shop', 'Store Id'),
            'created_at' => Yii::t('shop', 'Created At'),
            'updated_at' => Yii::t('shop', 'Updated At'),
            'converted_at' => Yii::t('shop', 'Converted At'),
            'is_active' => Yii::t('shop', 'Is Active'),
            'is_virtual' => Yii::t('shop', 'Is Virtual'),
            'is_multi_shipping' => Yii::t('shop', 'Is Multi Shipping'),
            'items_count' => Yii::t('shop', 'Items Count'),
            'items_qty' => Yii::t('shop', 'Items Qty'),
            'orig_order_id' => Yii::t('shop', 'Orig Order Id'),
            'store_to_base_rate' => Yii::t('shop', 'Store To Base Rate'),
            'store_to_quote_rate' => Yii::t('shop', 'Store To Quote Rate'),
            'base_currency_code' => Yii::t('shop', 'Base Currency Code'),
            'store_currency_code' => Yii::t('shop', 'Store Currency Code'),
            'quote_currency_code' => Yii::t('shop', 'Quote Currency Code'),
            'grand_total' => Yii::t('shop', 'Grand Total'),
            'base_grand_total' => Yii::t('shop', 'Base Grand Total'),
            'checkout_method' => Yii::t('shop', 'Checkout Method'),
            'customer_id' => Yii::t('shop', 'Customer Id'),
            'customer_tax_class_id' => Yii::t('shop', 'Customer Tax Class Id'),
            'customer_group_id' => Yii::t('shop', 'Customer Group Id'),
            'customer_email' => Yii::t('shop', 'Customer Email'),
            'customer_prefix' => Yii::t('shop', 'Customer Prefix'),
            'customer_firstname' => Yii::t('shop', 'Customer Firstname'),
            'customer_middlename' => Yii::t('shop', 'Customer Middlename'),
            'customer_lastname' => Yii::t('shop', 'Customer Lastname'),
            'customer_suffix' => Yii::t('shop', 'Customer Suffix'),
            'customer_dob' => Yii::t('shop', 'Customer Dob'),
            'customer_note' => Yii::t('shop', 'Customer Note'),
            'customer_note_notify' => Yii::t('shop', 'Customer Note Notify'),
            'customer_is_guest' => Yii::t('shop', 'Customer Is Guest'),
            'remote_ip' => Yii::t('shop', 'Remote Ip'),
            'applied_rule_ids' => Yii::t('shop', 'Applied Rule Ids'),
            'reserved_order_id' => Yii::t('shop', 'Reserved Order Id'),
            'password_hash' => Yii::t('shop', 'Password Hash'),
            'coupon_code' => Yii::t('shop', 'Coupon Code'),
            'global_currency_code' => Yii::t('shop', 'Global Currency Code'),
            'base_to_global_rate' => Yii::t('shop', 'Base To Global Rate'),
            'base_to_quote_rate' => Yii::t('shop', 'Base To Quote Rate'),
            'customer_taxvat' => Yii::t('shop', 'Customer Taxvat'),
            'customer_gender' => Yii::t('shop', 'Customer Gender'),
            'subtotal' => Yii::t('shop', 'Subtotal'),
            'base_subtotal' => Yii::t('shop', 'Base Subtotal'),
            'subtotal_with_discount' => Yii::t('shop', 'Subtotal With Discount'),
            'base_subtotal_with_discount' => Yii::t('shop', 'Base Subtotal With Discount'),
            'is_changed' => Yii::t('shop', 'Is Changed'),
            'trigger_recollect' => Yii::t('shop', 'Trigger Recollect'),
            'ext_shipping_info' => Yii::t('shop', 'Ext Shipping Info'),
            'is_persistent' => Yii::t('shop', 'Is Quote Persistent'),
            'gift_message_id' => Yii::t('shop', 'Gift Message Id'),
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
     * {@inheritdoc}
     * @return \app\modules\shop\models\querys\QuoteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\shop\models\querys\QuoteQuery(get_called_class());
    }
}
