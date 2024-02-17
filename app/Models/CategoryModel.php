<?php

namespace App\Models;


use Core\Loader\Model;

class CategoryModel extends Model
{
    private $category;

    public function __construct()
    {

        $this->category = self::db()->from('categories');
    }

    public function getCategories()
    {
        return $this->category->all();
    }

    public function delete(int $categoryId)
    {
        return $this->category->where('id', $categoryId)->delete();
    }
    public function deleteAll()
    {
        return $this->category->delete();
    }

    public function getCategoryById(int $categoryId)
    {
        return $this->category->where('id', $categoryId)->first();
    }

    public function getCategoryByUserid( $userId = null)
    {
        return $this->category->where('user_id', $userId)->all();
    }
    public function getCategoryByName( string $name = null)
    {
        return $this->category->where('name', $name)->all();
    }

    public function save(array $data,)
    {
        return $this->category->insert($data);
    }

    public function updateCategoryById(int $categoryId, array $categoryData)
    {
        $data = [];
        $query = null;

        foreach ($categoryData as $index => $value) {
            $data[':' . $index] = $value;
            $query .= $index . ' = :' . $index . ',';
        }
        $query = substr($query, 0, -1);
        $this->category->exec("UPDATE categories SET $query WHERE id = $categoryId", $data);


    }


}