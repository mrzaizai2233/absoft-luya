<?php

namespace app\modules\shop\models;

use app\modules\shop\common\helpers\EavAttributeHelper;
use app\modules\shop\helpers\AttributeHelper;
use Yii;
use yii\db\Exception;

/**
 * This is the model class for table "{{%catalog_product_entity}}".
 *
 * @property int $entity_id Entity ID
 * @property int $attribute_set_id Attribute Set ID
 * @property string $type_id Type ID
 * @property string $sku SKU
 * @property int $has_options Has Options
 * @property int $required_options Required Options
 * @property EavAttribute[] $_eavAttributes Required Options
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

    const DEFAULT_ATTRIBUTES = [ 'entity_id' , 'attribute_set_id' , 'type_id' , 'created_at' , 'updated_at' , 'sku' ];

    const DEFUALT_ATTRIBUTE_SET = 1;

    private $_data = [];

    private $_eav_attributes = [];

    /**
     * Setter/Getter underscore transformation cache
     *
     *
     */

    private $_eavAttributes = [];

    /**
     * Entity attribute values per backend table to delete
     *
     * @var array
     */
    protected $_attributeValuesToDelete = [];

    /**
     * Entity attribute values per backend table to save
     *
     * @var array
     */
    protected $_attributeValuesToSave = [];


    private $_entityTable = 'catalog_product_entity';

    /**
     * Setter/Getter underscore transformation cache
     *
     * @var array
     */
    protected static $_underscoreCache = [];

    public function setData($key, $value=null){
        if ($key === (array)$key) {
            $this->_data = $key;
        } else {
            $this->_data[$key] = $value;
        }
        return $this;
    }

    /**
     * Add data to the object.
     *
     * Retains previous data in the object.
     *
     * @param array $arr
     * @return $this
     */
    public function addData(array $arr)
    {
        foreach ($arr as $index => $value) {
            $this->setData($index, $value);
        }
        return $this;
    }

    public function getData($key ='',$index=null){
        if($key===''){
            return $this->_data;
        }
        return $this->_getData($key);
    }

    private function _getData($key){
        if(isset($this->_data[$key])){
            return $this->_data[$key];
        }
        return null;
    }

    /**
     * Unset data from the object.
     *
     * @param null|string|array $key
     * @return $this
     */
    public function unsetData($key = null)
    {
        if ($key === null) {
            $this->setData([]);
        } elseif (is_string($key)) {
            if (isset($this->_data[$key]) || array_key_exists($key, $this->_data)) {
                unset($this->_data[$key]);
            }
        } elseif ($key === (array)$key) {
            foreach ($key as $element) {
                $this->unsetData($element);
            }
        }
        return $this;
    }

    /**
     * Set object data with calling setter method
     *
     * @param string $key
     * @param mixed $args
     * @return $this
     */
    public function setDataUsingMethod($key, $args = [])
    {
        $method = 'set' . str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
        $this->{$method}($args);
        return $this;
    }

    /**
     * Get object data by key with calling getter method
     *
     * @param string $key
     * @param mixed $args
     * @return mixed
     */
    public function getDataUsingMethod($key, $args = null)
    {
        $method = 'get' . str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
        return $this->{$method}($args);
    }

    /**
     * Set/Get attribute wrapper
     *
     * @param   string $method
     * @param   array $args
     * @return  mixed
     * @throws \luya\Exception
     */
    public function __call($method, $args)
    {
        switch (substr($method, 0, 3)) {
            case 'get':

                $key = $this->_underscore(substr($method, 3));
                $index = isset($args[0]) ? $args[0] : null;
                return $this->getData($key, $index);
            case 'set':

                $key = $this->_underscore(substr($method, 3));
                $value = isset($args[0]) ? $args[0] : null;
                return $this->setData($key, $value);
            case 'uns':
                $key = $this->_underscore(substr($method, 3));
                return $this->unsetData($key);
            case 'has':
                $key = $this->_underscore(substr($method, 3));
                return isset($this->_data[$key]);
        }
        throw new \luya\Exception(
            new Yii::$app->t('Invalid method %1::%2', [get_class($this), $method])
        );
    }

    /**
     * Converts field names for setters and getters
     *
     * $this->setMyField($value) === $this->setData('my_field', $value)
     * Uses cache to eliminate unnecessary preg_replace
     *
     * @param string $name
     * @return string
     */
    protected function _underscore($name)
    {
        if (isset(self::$_underscoreCache[$name])) {
            return self::$_underscoreCache[$name];
        }
        $result = strtolower(trim(preg_replace('/([A-Z]|[0-9]+)/', "_$1", $name), '_'));
        self::$_underscoreCache[$name] = $result;
        return $result;
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return "{{%catalog_product_entity}}";
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'attribute_set_id' , 'has_options' , 'required_options' ] , 'integer' ] ,
            [ [ 'created_at' , 'updated_at' ] , 'safe' ] ,
            [ [ 'type_id' ] , 'string' , 'max' => 32 ] ,
            [ [ 'sku' ] , 'string' , 'max' => 64 ] ,
            [ [ 'attribute_set_id' ] , 'exist' , 'skipOnError' => true , 'targetClass' => EavAttributeSet::className() , 'targetAttribute' => [ 'attribute_set_id' => 'attribute_set_id' ] ] ,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels ()
    {
        return [
            'entity_id' => Yii::t( 'app' , 'Entity ID' ) ,
            'attribute_set_id' => Yii::t( 'app' , 'Attribute Set ID' ) ,
            'type_id' => Yii::t( 'app' , 'Type ID' ) ,
            'sku' => Yii::t( 'app' , 'SKU' ) ,
            'has_options' => Yii::t( 'app' , 'Has Options' ) ,
            'required_options' => Yii::t( 'app' , 'Required Options' ) ,
            'created_at' => Yii::t( 'app' , 'Creation Time' ) ,
            'updated_at' => Yii::t( 'app' , 'Update Time' ) ,
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributeSet ()
    {
        return $this->hasOne( EavAttributeSet::className() , [ 'attribute_set_id' => 'attribute_set_id' ] );
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogProductEntityDatetimes ()
    {
        return $this->hasMany( CatalogProductEntityDatetime::className() , [ 'entity_id' => 'entity_id' ] );
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogProductEntityDecimals ()
    {
        return $this->hasMany( CatalogProductEntityDecimal::className() , [ 'entity_id' => 'entity_id' ] );
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogProductEntityTexts ()
    {
        return $this->hasMany( CatalogProductEntityText::className() , [ 'entity_id' => 'entity_id' ] );
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogProductEntityVarchars ()
    {
        return $this->hasMany( CatalogProductEntityVarchar::className() , [ 'entity_id' => 'entity_id' ] );
    }



    public function afterSave ( $insert , $changedAttributes )
    {
        $this->loadAllAttributes();
        if($insert){
            $this->saveEavAttributes();
        } else {
            $this->updateEavAttributes();
        }
        parent::afterSave( $insert , $changedAttributes ); // TODO: Change the autogenerated stub
    }

    public function saveEavAttributes(){

        $datas = $this->getData();
        foreach ($datas as $code => $value) {
            $attribute = $this->getEavAttributeByCode($code);
            $tableName = $this->getEntityTable().'_'.$attribute->backend_type;
            $this->_insertAttributeValue($tableName,$attribute->attribute_id,$value);
        }
    }

    public function updateEavAttributes(){
        $datas = $this->getData();
        foreach ($datas as $code => $value) {
            $this->_updateAttributeValue($code,$value);
        }
    }

    private function _insertAttributeValue($tableName,$attribute_id,$value){
            Yii::$app->getDb()->createCommand()->insert($tableName, [
                'attribute_id' => $attribute_id,
                'entity_id' => $this->entity_id,
                'store_id' => $this->getStoreId(),
                'value' => $value
            ])->execute();
    }
    private function _updateAttributeValue($code,$value){
        $attribute = $this->getEavAttributeByCode($code);
        $tableName = $this->getEntityTable().'_'.$attribute->backend_type;

        $attribute_id = $attribute->attribute_id;
        $result = (new \yii\db\Query())->select(['*'])
            ->from( $tableName )
            ->where([
                'attribute_id' => $attribute_id ,
                'entity_id' => $this->entity_id,
                'store_id' => $this->getStoreId()
            ])->one();
        if($result){
            Yii::$app->getDb()->createCommand()->update($tableName,['value'=>$value],[
                'entity_id'=>$this->entity_id,
                'attribute_id'=>$attribute_id
            ])->execute();
        } else {
            $this->_insertAttributeValue($tableName,$attribute_id,$value);
        }
    }



    public function loadAllAttributes(){
        $query  = EavAttribute::find()
            ->leftJoin('eav_attribute_set','eav_attribute_set.entity_type_id = eav_attribute.entity_type_id')
            ->where(['eav_attribute.entity_type_id'=>self::EAV_ENTITY_TYPE_ID]);
        if($this->attribute_set_id){
            $query->andWhere(['eav_attribute_set.attribute_set_id'=>$this->attribute_set_id]);
        }
        $attributes = $query->all();
        foreach ($attributes as $code => $attribute) {
            $this->addEavAttribute($attribute);
        }
        return $this;
    }

    public function getEntityTable(){
        return $this->_entityTable;
    }

    public function getStoreId(){
        if($this->getData('store_id')){
            return $this->getData('store_id');
        }
        return Store::DEFAULT_STORE_ID;
    }



    public function getEntityId(){
        return $this->entity_id;
    }

    public function getEavAttributeByCode($code){
        if(isset($this->_eavAttributes[$code])){
            return $this->_eavAttributes[$code];
        }
        return $this->getEavAttribute($code);
    }
    /**
     * @param EavAttribute $attribute
     * @return $this
     */
    public function addEavAttribute($attribute){
        $attribute->setEntity($this);
        $attributeCode = $attribute->getAttributeCode();
        $this->_eavAttributes[$attributeCode]= $attribute;
        return $this;
    }

    public function getEavAttribute($code){
        if(is_numeric($code)){
            $attributeInstance = EavAttribute::findOne(['attribute_id'=>$code,'attribute_type_id'=>self::EAV_ENTITY_TYPE_ID]);
        } else {
            $attributeInstance = EavAttribute::findOne(['attribute_code'=>$code,'attribute_type_id'=>self::EAV_ENTITY_TYPE_ID]);
        }
        if(empty($attributeInstance)){
            return null;
        }
        $this->addEavAttribute($attributeInstance);
        return $attributeInstance;
    }

}

