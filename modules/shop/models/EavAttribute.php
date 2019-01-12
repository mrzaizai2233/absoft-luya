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
 * @property CatalogProductEntity $_entity Note
 *
 * @property CatalogProductEntityText[] $catalogProductEntityTexts
 * @property EavAttributeLabel[] $eavAttributeLabels
 * @property EavAttributeOption[] $eavAttributeOptions
 * @property EavEntityAttribute[] $eavEntityAttributes
 * @property EavAttributeGroup[] $attributeGroups
 */
class EavAttribute extends \yii\db\ActiveRecord
{

    private $_options = [];

    protected $_entity;
    /**
     * {@inheritdoc}
     */
    public static function tableName ()
    {
        return '{{%eav_attribute}}';
    }

    public static function getEntityAttributeByCodes ( $entity_type , $code = [] )
    {
        self::find()
            ->where( [ 'in' , 'eav_attribute.attribute_code' , $code ] )
            ->andWhere( [ 'eav_attribute.entity_type_id' => $entity_type ] )
            ->all();
    }

    /**
     * {@inheritdoc}
     */
    public function rules ()
    {
        return [
            [ [ 'entity_type_id' , 'is_required' , 'is_user_defined' , 'is_unique' ] , 'integer' ] ,
            [ [ 'attribute_code' ] , 'required' ] ,
            [ [ 'default_value' ] , 'string' ] ,
            [ [ 'attribute_code' , 'attribute_model' , 'backend_model' , 'backend_table' , 'frontend_model' , 'frontend_label' , 'frontend_class' , 'source_model' , 'note' ] , 'string' , 'max' => 255 ] ,
            [ [ 'backend_type' ] , 'string' , 'max' => 8 ] ,
            [ [ 'frontend_input' ] , 'string' , 'max' => 50 ] ,
            [ [ 'entity_type_id' , 'attribute_code' ] , 'unique' , 'targetAttribute' => [ 'entity_type_id' , 'attribute_code' ] ] ,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels ()
    {
        return [
            'attribute_id' => Yii::t( 'app' , 'Attribute Id' ) ,
            'entity_type_id' => Yii::t( 'app' , 'Entity Type Id' ) ,
            'attribute_code' => Yii::t( 'app' , 'Attribute Code' ) ,
            'attribute_model' => Yii::t( 'app' , 'Attribute Model' ) ,
            'backend_model' => Yii::t( 'app' , 'Backend Model' ) ,
            'backend_type' => Yii::t( 'app' , 'Backend Type' ) ,
            'backend_table' => Yii::t( 'app' , 'Backend Table' ) ,
            'frontend_model' => Yii::t( 'app' , 'Frontend Model' ) ,
            'frontend_input' => Yii::t( 'app' , 'Frontend Input' ) ,
            'frontend_label' => Yii::t( 'app' , 'Frontend Label' ) ,
            'frontend_class' => Yii::t( 'app' , 'Frontend Class' ) ,
            'source_model' => Yii::t( 'app' , 'Source Model' ) ,
            'is_required' => Yii::t( 'app' , 'Defines Is Required' ) ,
            'is_user_defined' => Yii::t( 'app' , 'Defines Is User Defined' ) ,
            'default_value' => Yii::t( 'app' , 'Default Value' ) ,
            'is_unique' => Yii::t( 'app' , 'Defines Is Unique' ) ,
            'note' => Yii::t( 'app' , 'Note' ) ,
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogProductEntityTexts ()
    {
        return $this->hasMany( CatalogProductEntityText::className() , [ 'attribute_id' => 'attribute_id' ] );
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEavAttributeLabels ()
    {
        return $this->hasMany( EavAttributeLabel::className() , [ 'attribute_id' => 'attribute_id' ] );
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEavAttributeOptions ()
    {
        return $this->hasMany( EavAttributeOption::className() , [ 'attribute_id' => 'attribute_id' ] );
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEavEntityAttributes ()
    {
        return $this->hasMany( EavEntityAttribute::className() , [ 'attribute_id' => 'attribute_id' ] );
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributeGroups ()
    {
        return $this->hasMany( EavAttributeGroup::className() , [ 'attribute_group_id' => 'attribute_group_id' ] )->viaTable( '{{%eav_entity_attribute}}' , [ 'attribute_id' => 'attribute_id' ] );
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntityType ()
    {
        return $this->hasOne( EavEntityType::className() , [ 'entity_type_id' => 'entity_type_id' ] );
    }

    public function setEntity($object){
        $this->_entity= $object;
        return $this;
    }

    public function getEntity(){
        return $this->_entity;
    }


    public function getAttributeCode(){
        return $this->attribute_code;
    }

    public function getBackendType(){
        return $this->backend_type;
    }

    public function getAttributeId(){
        return $this->attribute_id;
    }

    public function saveAttributeValue ($store_id = null, $value)
    {
        $entity = $this->getEntity();
        $store_id = $store_id ? $store_id : $entity->getStoreId();
        /** @var EavEntityType $entityType */
        $tableName = $entity->getEntityTable() . '_' . $this->backend_type;
        Yii::$app->getDb()->createCommand()->insert( $tableName , [
            'attribute_id' => $this->attribute_id ,
            'entity_id' => $entity->getEntityId() ,
            'store_id' => $store_id,
            'value' => $value
        ] )->execute();
    }


    public function getEavAttributeByAttributeSet ( $attribute_set_id )
    {
        return $this::find()
            ->select( '*' )
            ->innerJoin( 'eav_attribute_set' , 'eav_attribute_set.attribute_set_id = eav_entity_attribute.attribute_set_id' )
            ->innerJoin( 'eav_attribute_group' , 'eav_attribute_group.attribute_group_id = eav_entity_attribute.attribute_group_id' )
            ->innerJoin( 'eav_attribute' , 'eav_attribute.attribute_id = eav_entity_attribute.attribute_id' )
            ->where( 'eav_attribute_set.attribute_set_id = :sid' , [ ':sid' => $attribute_set_id ] )
            ->all();
    }

    /**
     * @param CatalogProductEntity $object
     * @return array|bool|null
     */
    public function getArrayValue ($object = null )
    {
        $entity_id = $object->getEntityId();
        if (!$entity_id || $this->getBackendType() == 'static') {
            return null;
        }

        $store_id = $object->getStoreId() ? $object->getStoreId() : Store::DEFAULT_STORE_ID;
        if ($store_id)
            $entityTable = $object->getEntityTable();
        $tableName = $entityTable . '_' . $this->getBackendType();
        return (new \yii\db\Query())->select( '*' )->from( $tableName )
            ->where([
                'attribute_id' => $this->getAttributeId() ,
                'entity_id' => $entity_id ,
                'store_id' => $store_id
            ])
            ->one();
    }

    /**
     * @param CatalogProductEntity $object
     * @return array|bool|null
     */
    public function getValue($object= null){
        $value = $this->getArrayValue($object);
        return $value['value']? $value['value']:'';
    }

    public function getOptions ()
    {
        $options = [];
        $this->_initOptions();
        foreach ($this->_options as $option) {
            $options[$option['option_id']] =$option['value'];
        }
        return $options;
    }

    public function setOptions ()
    {
    }

    private function _initOptions ( $store_id = null )
    {
        $store_id = $store_id ? $store_id : Store::DEFAULT_STORE_ID;
        $this->_options = (new \yii\db\Query())->select( ['eav_attribute_option.*,eav_attribute_option_value.value'])
            ->from( 'eav_attribute_option' )
            ->leftJoin('eav_attribute_option_value','eav_attribute_option.option_id = eav_attribute_option_value.option_id')
            ->where( [
                'attribute_id' => $this->attribute_id ,
                'store_id' => $store_id
            ] )
            ->all();
    }

}
