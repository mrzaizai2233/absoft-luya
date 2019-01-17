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
        $this->_selectAttributes[]=$attribute;
        return $this;
    }

    public function getAttributeToSelect(){
        return $this->_selectAttributes;
    }


    public function addFilterAttribute($attribute,$value){
        $this->_filterAttributes[$attribute]=$value;
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
        $i = 0;

        foreach ($attribute_codes as $attribute_code) {
            $attributeInstance = EavAttribute::findOne(['attribute_code'=>$attribute_code]);
            $this->_attributes[$attributeInstance->getAttributeCode()]= $attributeInstance;
            if($attributeInstance->getBackendType()==='static'){
                continue;
            }
            $joinTable = $entity_table.'_'.$attributeInstance->getBackendType();


            if(!isset($this->_joinTables[$joinTable])){

                $query->join('left join',$joinTable, 'catalog_product_entity.entity_id = '.$joinTable.'.entity_id')
                    ->join('inner join','eav_attribute'.' as a'.$i, 'a'.$i.'.attribute_id = '.$joinTable.'.attribute_id');
                $this->_joinTables[$joinTable] = $joinTable;
            }
            $i++;
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
            $i++;
        }
        echo $rawSql.'group by attribute_code,catalog_product_entity.entity_id';
        $models =  \Yii::$app->getDb()->createCommand($rawSql)->queryAll();
        $productCollection = [];

        var_dump($models);
        die;
        return $models;
    }

    public function builQueryConddition($attribute_code,$value,$type = ' = ',$value_table){

    }
}