<?php
namespace app\modules\shop\models\Repositories;

use app\modules\shop\models\CatalogProductEntity;
use app\modules\shop\models\EavAttribute;
use yii\data\Pagination;
use yii\db\ActiveRecord;
use yii\db\Query;

abstract class AbstractRepository
{
    /**
     * The model to execute queries on
     *
     * @var array
     */
    protected $_joinTables = [];
    /**
     * The model to execute queries on
     *
     * @var array
     */
    protected $_selectQueries = [];

    /**
     * The model to execute queries on
     *
     * @var array
     */
    protected $_whereQueries = [];
    /**
     * The model to execute queries on
     *
     * @var string
     */
    protected $_query;
    /**
     * The model to execute queries on
     *
     * @var ActiveRecord
     */
    protected $model;

    /**
     * The attribute to select
     *
     * @var array
     */
    protected $_selectAttributes = [];

    /**
     * The attribute to select
     *
     * @var array
     */
    protected $_filterAttributes = [];

    /**
     * The attribute to select
     *
     * @var array
     */
    protected $_attributes = [];

    /**
     * The attribute to select
     *
     * @var array
     */
    protected $_staticAttributes = [];
    /**
     * Create a new repository instance
     *
     * @param ActiveRecord $activeRecord
     */
    public function __construct(ActiveRecord $activeRecord)
    {
        $this->model = $activeRecord;
    }

    /**
     * Get a new instance of the model
     *
     * @return ActiveRecord
     */
    public function getNew()
    {
        return $this->model->instantiate($row = null);
    }

    public function addAttributeToSelect($attribute){
        if(is_string($attribute)) {
            $this->_selectAttributes[$attribute] = $attribute;
        } elseif (is_array($attribute)){
            $this->_selectAttributes = $attribute;
        } else {
            $this->_selectAttributes = func_get_args();
        }
        return $this;
    }

    public function getAttributeToSelect(){
        return $this->_selectAttributes;
    }


    public function addFilterAttribute($attribute,$condition,$value,$type= 'and'){
        if(!in_array($attribute,$this->getAttributeToSelect())){
            $this->addAttributeToSelect($attribute);
        }
        $this->_filterAttributes[$attribute]=[$attribute,$condition,$value,$type];
        return $this;
    }

    public function getFilterAttribute(){
        return $this->_filterAttributes;
    }
    /**
     * Set Json output Responses
     *
     * @var \Yii::$app->response->format = 'json';
     *
     */
    public function setJson()
    {
        \Yii::$app->response->format = 'json';
    }

    /**
     * Set XML output Responses
     *
     * @var \Yii::$app->response->format = 'xml';
     *
     */
    public function setXml()
    {
        \Yii::$app->response->format = 'xml';
    }


    public function setQuery($rawSql){
        $this->_query = $rawSql;
    }
    public function getQuery(){
        return $this->_query;
    }
    private function _processAttributes(){
        $attributes = array_merge($this->getAttributeToSelect(),$this->model->getDefaultAttributes());
        $uniqueAttributes = [];
        foreach ($attributes as $attribute) {
            $uniqueAttributes[$attribute]= $attribute;
        }
        $this->addAttributeToSelect($uniqueAttributes);
        return $this;
    }
    private function _query(){
        $this->_processAttributes();
        $whereSql = null;
        $selectQueries =[];
        $joinTables =[];
        $whereQueries =[];
        $attributes = $this->getAttributeToSelect();
        foreach ($attributes as $attribute) {
            $attributeInstance = $this->getAttribute($attribute);

            if(!$attributeInstance || $attributeInstance->getBackendType() == 'static'){
                $selectQueries[$attribute]= " e.$attribute ";
                continue;
            }
            $attributeCode = $attributeInstance->getAttributeCode();
            $selectQueries[$attributeCode]= " $attributeCode.value as $attributeCode ";
            $attributeValueTable = 'catalog_product_entity_'.$attributeInstance->getBackendType();
            $joinTables[$attributeCode] = "
                LEFT JOIN 
                    $attributeValueTable $attributeCode 
                    ON e.entity_id = $attributeCode.entity_id
                AND $attributeCode.attribute_id =
                (
                   SELECT 
                        attribute_id
                   FROM 
                        eav_attribute
                   WHERE 
                        attribute_code = '$attributeCode' AND entity_type_id = 4
                )
            ";
        }
        $filterAttributes = $this->getFilterAttribute();

        foreach ($filterAttributes as $index => $filterAttribute) {
            $attribute = $filterAttribute[0];
            $condition = $filterAttribute[1];
            $value = $filterAttribute[2];
            $joinType = $filterAttribute[3];
            $attributeInstance = $this->getAttribute($attribute);
            if(!$attributeInstance || $attributeInstance->getBackendType() == 'static'){
                $whereQueries[$attribute]= " $joinType ( e.$attribute $condition '$value' ) ";
            } else {
                $whereQueries[$attribute] = " $joinType (  $attribute.value $condition '$value' ) ";
            }
        }

        $rawSql = "SELECT  {{SELECT}} FROM catalog_product_entity e {{JOIN}} WHERE 1=1 {{WHERE}}";


        $rawSql = str_replace('{{SELECT}}',implode(', ',$selectQueries),$rawSql);
        $rawSql = str_replace('{{JOIN}}',implode(' ',$joinTables),$rawSql);
        $rawSql = str_replace('{{WHERE}}',implode(' ',$whereQueries),$rawSql);


        $this->setQuery($rawSql) ;
        return \yii::$app->getDb()->createCommand($this->getQuery());
    }

    public function load($id){
        return $this->addFilterAttribute('entity_id','=',$id)->one();
    }

    public function one(){

        $data = $this->_query()->queryOne();
        $this->model->attributes = $data;
        $this->model->setData($data);
        return $this->model;
    }

    public function all(){

        $datas = $this->_query()->queryAll();
        $models = [];
        foreach ($datas as $data) {
            $model = $this->getNew();
            $model->entity_id = $data['entity_id'];
            $model->attributes = $data;
            $model->setData($data);
            $models[] = $model;
        }
        return $models;
    }

    private function _buildJoinQuery($attribute){
        $attributeInstance = $this->getAttribute($attribute);
        $attributeCode = $attributeInstance->getAttributeCode();
        $attributeValueTable = 'catalog_product_entity_'.$attributeInstance->getBackendType();
        $joinSql = "
            LEFT JOIN 
                $attributeValueTable $attributeCode 
                ON e.entity_id = $attributeCode.entity_id
            AND $attributeCode.attribute_id =
            (
               SELECT 
                    attribute_id
               FROM 
                    eav_attribute
               WHERE 
                    attribute_code = '$attributeCode' AND entity_type_id = 4
            )
        ";
        return $joinSql;
    }

    /**
     * @return $this
     */
    public function buildSelectQuery(){
        $attributes = $this->getAttributeToSelect();
        foreach ($attributes as $attribute) {
            $attributeInstance = $this->getAttribute($attribute);

            if(!$attributeInstance || $attributeInstance->getBackendType() == 'static'){
                $this->_selectQueries[]= " e.$attribute ";
                continue;
            }
            $attributeCode = $attributeInstance->getAttributeCode();
            $this->_selectQueries[]= " $attributeCode.value as $attributeCode ";
            $this->_buildJoinQuery($attributeInstance);
        }
        return $this;
    }

    public function buildWhereQuery(){
        $filterAttributes = $this->getFilterAttribute();

        foreach ($filterAttributes as $index => $filterAttribute) {
            $attribute = $filterAttribute[0];
            $condition = $filterAttribute[1];
            $value = $filterAttribute[2];
            $joinType = $filterAttribute[3];
            $attributeInstance = $this->getAttribute($attribute);
            if(!$attributeInstance || $attributeInstance->getBackendType() == 'static'){
                $this->_whereQueries[$attribute]= " $joinType ( e.$attribute $condition '$value' ) ";
            } else {
                $this->_whereQueries[$attribute] = " $joinType (  $attribute.value $condition '$value' ) ";
            }
        }
    }

    /**
     * @param string|integer|EavAttribute $attribute
     * @return EavAttribute
     */
    public function getAttribute($attribute){
        if($attribute instanceof EavAttribute){
          $this->addAttribute($attribute);
          return $attribute;
        } elseif(isset($this->_attributes[$attribute])){
            return $this->_attributes[$attribute];
        } else {
            return $this->loadAttribute($attribute);
        }
    }
    /**
     * @param string|integer|EavAttribute $attribute
     * @return EavAttribute
     */
    public function loadAttribute($attribute){

        $attributeInstance = null;
        if($attribute instanceof EavAttribute){
            $attributeInstance =  $attribute;
        } elseif(is_string($attribute)) {
            $attributeInstance = EavAttribute::findOne(['attribute_code'=>$attribute]);
        } else {
            $attributeInstance = EavAttribute::findOne(['attribute_id'=>$attribute]);
        }
        if($attributeInstance){
            $this->addAttribute($attributeInstance);
        }
        return $attributeInstance;
    }

    /**
     * @param EavAttribute $attribute
     * @return $this
     */
    public function addAttribute($attribute){
        $attribute_code = $attribute->getAttributeCode();
        $this->_attributes[$attribute_code]= $attribute;
        return $this;
    }
}