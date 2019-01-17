<?php
namespace app\modules\shop\models\Repositories;

use app\modules\shop\models\CatalogProductEntity;
use app\modules\shop\models\EavAttribute;
use yii\data\Pagination;
use yii\db\ActiveRecord;
use yii\db\Query;

abstract class AbstractRepository
{

    protected $_joinTables = [];

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

    /**
     * Set up pagination and data Model
     *
     *
     * @return array
     */
    public function runQuery()
    {
        $entity_table = 'catalog_product_entity';
        $query = new Query();
        $query->from($entity_table);
        $attribute_codes = array_merge_recursive($this->getAttributeToSelect(),array_keys($this->getFilterAttribute()));

        foreach ($attribute_codes as $attribute_code) {
            $attributeInstance = EavAttribute::findOne(['attribute_code'=>$attribute_code]);
            $this->_attributes[$attributeInstance->getAttributeCode()]= $attributeInstance;
            if($attributeInstance->getBackendType()==='static'){
                continue;
            }
            $joinTable = $entity_table.'_'.$attributeInstance->getBackendType();


            if(!isset($this->_joinTables[$joinTable])){

                $query->join('left join',$joinTable, 'catalog_product_entity.entity_id = '.$joinTable.'.entity_id')
                    ->join('inner join','eav_attribute', 'eav_attribute.attribute_id = '.$joinTable.'.attribute_id');
                $this->_joinTables[$joinTable] = $joinTable;
            }
        }
        $rawSql = $query->createCommand()->rawSql ;
        $i = 0;
        foreach ($this->_filterAttributes as $code => $value) {
            $value_table = $entity_table.'_'.$this->_attributes[$code]->getBackendType();
            if($i==0){
                $rawSql .= " where catalog_product_entity.entity_id IN 
                (
                    SELECT entity_id 
                        FROM 
                    eav_attribute LEFT JOIN $value_table ON eav_attribute.attribute_id = $value_table.attribute_id WHERE attribute_code = '$code' and value {$value['type']} '{$value['value']}'
                ) ";
            } else {
                $rawSql .= " and catalog_product_entity.entity_id IN 
                (
                    SELECT entity_id 
                        FROM 
                    eav_attribute LEFT JOIN $value_table ON eav_attribute.attribute_id = $value_table.attribute_id WHERE attribute_code = '$code' and value {$value['type']} '{$value['value']}'
                ) ";
            }
        }
        echo($rawSql);
        die;

        $models =  $query->createCommand($rawSql)->queryAll();
        $productCollection = [];

        var_dump($models);
        die;
        return $models;
    }

    public function query(){
        $attributes = $this->getAttributeToSelect();
        $filterAttributes = $this->getFilterAttribute();

        $selectSql = null;
        $joinSql = null;
        $rawSql = "SELECT e.* , {{SELECT}} FROM catalog_product_entity e {{JOIN}}";
        $i=0;
        foreach ($attributes as $attribute) {
            if($i== count($attributes)-1){
                $selectSql .= " $attribute.value as $attribute ";
            } else {
                $selectSql .= " $attribute.value as $attribute , ";
            }

            $joinSql .= $this->buildJoinQuery($attribute);

            $i++;
        }

        $rawSql = str_replace('{{SELECT}}',$selectSql,$rawSql);
        $rawSql = str_replace('{{JOIN}}',$joinSql,$rawSql);


        $rawFilterSql = "SELECT * FROM ($rawSql) main {{WHERE}}";
        $filterSql = "";
        foreach ($filterAttributes as $index => $filterAttribute) {
            if($index==0){
                $filterSql .= " WHERE ". $this->buildWhereQuery($filterAttribute[0],$filterAttribute[1],$filterAttribute[2]);
            } else {
                $filterSql .= " ".$filterAttribute[3]." ". $this->buildWhereQuery($filterAttribute[0],$filterAttribute[1],$filterAttribute[2]);
            }
        }

        $rawFilterSql = str_replace('{{WHERE}}',$filterSql,$rawFilterSql);

        $result = \yii::$app->getDb()->createCommand($rawFilterSql)->queryAll();

        var_dump($result);
        die;
    }
    public function buildJoinQuery($attribute){
        $attributeInstance = $this->getAttribute($attribute);
        $attributeCode = $attributeInstance->getAttributeCode();
        $attributeValueTable = 'catalog_product_entity_'.$attributeInstance->getBackendType();
        $joinSql = "
            LEFT JOIN 
                $attributeValueTable $attributeCode 
                ON e.entity_id = $attributeCode.entity_id
            AND $attributeCode.attribute_id =
            (
               SELECT attribute_id
               FROM eav_attribute
               WHERE attribute_code = '$attributeCode' AND entity_type_id = (SELECT entity_type_id
               FROM eav_entity_type
               WHERE entity_type_code = 'catalog_product')
            )
        ";
        return $joinSql;
    }

    public function buildWhereQuery($attribute,$condition = '=',$value){
        if ($condition == 'like') {
            $whereSql = " $attribute $condition '%$value%' ";
        } elseif ($condition == 'in') {
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
        $attributeInstance = null;
        if($attribute instanceof EavAttribute){
            $attributeInstance =  $attribute;
        } elseif(is_string($attribute)) {
            $attributeInstance = EavAttribute::findOne(['attribute_code'=>$attribute]);
        } else {
            $attributeInstance = EavAttribute::findOne(['attribute_id'=>$attribute]);
        }
        $this->addAttribute($attributeInstance);
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