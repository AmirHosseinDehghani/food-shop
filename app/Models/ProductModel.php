<?php

namespace App\Models;


use Core\Loader\Model;

class ProductModel extends Model
{
    private $products;

    public function __construct()
    {

        $this->products = self::db()->from('products');
    }

    public function getProduct()
    {
        return $this->products->all();
    }

    public function delete(int $productId)
    {
        return $this->products->where('id', $productId)->delete();
    }
    public function deleteAll()
    {
        return $this->products->delete();
    }

    public function getProductById(int $productId)
    {
        return $this->products->where('id', $productId)->first();
    }
    public function getProductByName(string $product)
    {
        return $this->products->where('name', $product)->first();
    }

    public function getProductsByUserid($userId = null)
    {
        return $this->products->where('user_id', $userId)->all();
    }

    public function save(array $data, int $user_id)
    {
        $data['user_id'] = $user_id;
        return $this->products->insert($data);
    }

    public function updateProductById(int $productId, array $productData)
    {

        $data = [];
        $query = null;

        foreach ($productData as $index => $value) {
            $data[':' . $index] = $value;
            $query .= $index . ' = :' . $index . ',';
        }
        $query = substr($query, 0, -1);
        $this->products->exec("UPDATE products SET $query WHERE id = $productId", $data);
    }

}