<?php
namespace app\modules\shop\models\Repositories\Product;

use app\modules\shop\models\CatalogProductEntity as Product;

interface ProductInterface
{
    /**
     * Get list Product with search
     *
     * @param $s
     *
     * @return mixed
     */
    public function find($s);

    /**
     * Get a Product
     *
     * @param $id
     *
     * @return mixed
     */
    public function findById($id);

    /**
     * Store a new Product
     *
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data);

    /**
     * Update a Product
     *
     * @param Product $product
     * @param          $data  array []
     *
     * @return mixed
     */
    public function update(Product $product, array $data);

    /**
     * Delete a Product
     *
     * @param $id
     *
     * @return mixed
     */
    public function destroy($id);

    /**
     * Get the input form from Product
     *
     * @return mixed
     */
    public function getCreationForm();
}