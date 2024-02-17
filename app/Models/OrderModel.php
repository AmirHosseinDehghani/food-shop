<?php

namespace App\Models;

use Core\Loader\Model;

class OrderModel extends Model
{
    private $order;

    public function __construct()
    {
        $this->order = self::db()->from('odrers');
    }

    public function save(array $data, int $userId)
    {
        $data['user_id'] = $userId;
        return $this->order->insert($data);
    }

    public function getOrders()
    {

        return  $this->order->all();
    }

    public function getOrderByUserId($userId)
    {
        return $this->order->where('user_id', $userId)->all();
    }
    public function getOrderById($id)
    {
        return $this->order->where('id', $id)->all();
    }
    public function delete(int $orderId)
    {
        return $this->order->where('id', $orderId)->delete();
    }
    public function updateOrderById(int $id, array $pay)
    {

        $data = [];
        $query = null;

        foreach ($pay as $index => $value) {
            $data[':' . $index] = $value;
            $query .= $index . ' = :' . $index . ',';
        }
        $query = substr($query, 0, -1);
        $this->order->exec("UPDATE odrers SET $query WHERE id = $id", $data);
    }
}