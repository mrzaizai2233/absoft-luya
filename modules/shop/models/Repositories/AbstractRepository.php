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
        if(strpos($attribute,',')!==false){
            $this->_selectAttributes = explode(',',$attribute);
        } elseif(strpos($attribute,',')===false) {
            $this->_selectAttributes[] = $attribute;
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
        if(array_search($attribute,$this->getAttributeToSelect())){
            $this->addAttributeToSelect($attribute);
        }
        $this->_filterAttributes[]=[$attribute,$condition,$value,$type];
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
    private function _prossAttributes(){
        $attributes = array_merge($this->getAttributeToSelect(),$this->model->getDefaultAttributes());
        $uniqueAttributes = [];
        foreach ($attributes as $attribute) {
            $uniqueAttributes[$attribute]= $attribute;
        }
        return $uniqueAttributes;
    }
    private function _query(){
        $attributes = $this->_prossAttributes();

        $filterAttributes = $this->getFilterAttribute();

        $whereSql = null;
        $rawSql = "SELECT  {{SELECT}} FROM catalog_product_entity e {{JOIN}}";
        foreach ($attributes as $attribute) {
            $this->_buildSelectQuery($attribute);
        }

        $rawSql = str_replace('{{SELECT}}',implode(', ',$this->_selectQueries),$rawSql);
        $rawSql = str_replace('{{JOIN}}',implode(' ',$this->_joinTables),$rawSql);

        $rawSql = "SELECT * FROM ($rawSql) main {{WHERE}}";
        $filterSql = "";
        foreach ($filterAttributes as $index => $filterAttribute) {
            if($index==0){
                $filterSql .= " WHERE ". $this->_buildWhereQuery($filterAttribute[0],$filterAttribute[1],$filterAttribute[2]);
            } else {
                $filterSql .= " ".$filterAttribute[3]." ". $this->_buildWhereQuery($filterAttribute[0],$filterAttribute[1],$filterAttribute[2]);
            }
        }

        $rawSql = str_replace('{{WHERE}}',$filterSql,$rawSql);
        $this->setQuery($rawSql) ;
    }

    public function load($id){
        return $this->addFilterAttribute('entity_id','=',$id)->one();
    }

    public function one(){

        $this->_query();
        $data = \yii::$app->getDb()->createCommand($this->getQuery())->queryOne();
        $this->model->attributes = $data;
        $this->model->setData($data);
        return $this->model;
    }

    public function all(){
        $this->_query();
        $datas = \yii::$app->getDb()->createCommand($this->getQuery())->queryAll();
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
        return $this->_joinTables[$attributeCode] = $joinSql;
    }

    private function _buildSelectQuery($attribute){
        $attributeInstance = $this->getAttribute($attribute);
        if(!$attributeInstance || $attributeInstance->getBackendType() == 'static'){
            $this->_selectQueries[]= " e.$attribute ";
            return $this;
        }
        $attributeCode = $attributeInstance->getAttributeCode();
        $this->_selectQueries[]= " $attributeCode.value as $attributeCode ";
        $this->_buildJoinQuery($attributeInstance);
        return $this;
    }

    private function _buildWhereQuery($attribute,$condition = '=',$value){
        if ($condition == 'in') {
            $whereSql = " $attribute $condition in ($value) ";
        } else {
            $whereSql = " $attribute $condition '$value' ";
        }
        return $whereSql;
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