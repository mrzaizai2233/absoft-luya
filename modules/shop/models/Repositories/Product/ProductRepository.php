<?php
namespace app\modules\shop\models\Repositories\Product;

use app\modules\shop\models\Repositories\AbstractRepository;
use app\modules\shop\models\CatalogProductEntity as Product;
use app\EmpApp\Services\Forms\Employee\EmployeeCreateForm;

class ProductRepository extends AbstractRepository implements ProductInterface
{
    /**
     * Create an Instance CatalogProductEntity Model
     *
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->model = $product;
        parent::__construct($product);
    }

    /**
     * Get list Repositories with search
     *
     * @param $s
     *
     * @return array
     */
    public function find($s)
    {
        return $this->runQuery($this->model->find()->andFilterWhere(
            ['like', 'firs_name', $s]
        ));
    }

    /**
     * Get a Repositories
     *
     * @param $id
     *
     * @return Product $product
     * @throws \HttpException
     */
    public function findById($id)
    {
        $product = $this->model->findOne($id);
        if ($product === null) {
            throw new \HttpException(404, "Record does not exist!");
        }

        return $product;
    }

    /**
     * Store a new Repositories
     *
     * @param array $data
     *
     * @return string
     */
    public function create(array $data)
    {
        $product = $this->getNew();
//
//        $product->first_name = e($data['first_name']);
//        $product->last_name = e($data['last_name']);
//        $product->bird_date = e($data['bird_date']);
//        $product->gender = e($data['gender']);
//        $product->hire_date = e($data['hire_date']);
        $product->save();

        return $product;
    }

    /**
     * Update a Repositories
     *
     * @param Product $product
     * @param array    $data
     *
     * @return Product
     * @throws \Exception
     */
    public function update(Product $product, array $data)
    {
        $product->first_name = e($data['first_name']);
        $product->last_name = e($data['last_name']);
        $product->bird_date = e($data['bird_date']);
        $product->gender = e($data['gender']);
        $product->hire_date = e($data['hire_date']);
        $product->update();

        return $product;
    }

    /**
     * Delete a Repositories
     *
     * @param $id
     *
     * @return string
     * @throws \HttpException
     */
    public function destroy($id)
    {
        $product = $this->findById($id);

        if ($product === null) {
            throw new \HttpException(404, "Record does not exist or has been deleted!");
        }

        $product->delete();

        return 'The Record is successfully deleted';
    }

    /**
     * Get the input form from Repositories
     *
     * @return EmployeeCreateForm
     */
    public function getCreationForm()
    {
        return new EmployeeCreateForm($this->model);
    }
}