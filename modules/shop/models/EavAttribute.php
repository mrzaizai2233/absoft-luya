<?php

namespace app\modules\shop\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\db\Query;

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

    public $options = [];

    private $_options = [];

    private $_newOptions = [];

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
    public function getOptions ()
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

    public function getOptionsData ()
    {
        $this->_options ? $this->_options : $this->_initOptions();
        return $this->_options;
    }

    public function setOptions ($options)
    {
        $this->_options = $options;
    }

    public function setNewOptions($options){
        $this->_newOptions= $options;
    }

    public function getNewOptions(){
        return $this->_newOptions;
    }
    private function _initOptions ( $store_id = null )
    {
        $this->_options = (new \yii\db\Query())->select('*')
            ->from('eav_attribute_option' )
            ->where([
                'attribute_id' => $this->attribute_id
            ])
            ->all();
    }

    public function afterFind ()
    {
        if($this->frontend_input== 'select' || 'multiselect'){
            $this->_initOptions();
            $this->options = $this->_options;
        }
        parent::afterFind(); // TODO: Change the autogenerated stub
    }

    public function beforeSave ( $insert )
    {
        if($insert){
            $backend_type = null;
            switch ($this->frontend_input){
                case 'text':
                    $backend_type = 'varchar';
                    break;
                case 'textarea':
                    $backend_type = 'text';
                    break;
                case  'date':
                    $backend_type = 'datetime';
                    break;
                case 'select':
                    $backend_type = 'int';
                    break;
                case 'multiselect':
                    $backend_type = 'varchar';
                    break;
                default:
                    $backend_type = 'varchar';
                    break;
            }
            $this->backend_type = $backend_type;
        }

        return parent::beforeSave( $insert ); // TODO: Change the autogenerated stub
    }

    public function afterSave ( $insert , $changedAttributes )
    {
        if($this->frontend_input == 'select' || $this->frontend_input == 'multiselect') {
            (new Query())->createCommand()->delete('eav_attribute_option',[
                'attribute_id'=>$this->attribute_id
            ])->execute();

            foreach ($this->getOptionsData() as $option) {
                (new Query())->createCommand()->insert('eav_attribute_option',[
                    'attribute_id'=>$this->attribute_id,
                    'sort_order'=>$option['sort_order'],
                    'value'=>$option['value']
                ])->execute();
            }
        }
        parent::afterSave( $insert , $changedAttributes ); // TODO: Change the autogenerated stub
    }

    public function afterDelete ()
    {
        EavAttributeOption::deleteAll(['attribute_id'=>$this->attribute_id]);
        parent::afterDelete(); // TODO: Change the autogenerated stub
    }
}
