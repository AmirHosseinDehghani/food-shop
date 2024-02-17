<?php

namespace App\Models;

use Core\Loader\Model;

class UserModel extends Model
{
    public function __construct()
    {
        $this->user = self::db()->from('users');
    }

    public function getUsers()
    {
        return $this->user->all();
    }

    public function getUserById(int $userId)
    {
        return $this->user->where('id', $userId)->first();
    }
    public function getUserByType(string $type)
    {
        return $this->user->where('type', $type)->all();
    }

    public function getUserByEmail(string $email)
    {
        return $this->user->where('email', $email)->first();
    }

    public function save(array $data)
    {
        return $this->user->insert($data);
    }

    public function updateUser(int $userId, array $userData)
    {
        $data = [];
        $query = null;

        foreach ($userData as $index => $value) {
            $data[':' . $index] = $value;
            $query .= $index . ' = :' . $index . ',';
        }
        $query = substr($query, 0, -1);
        $this->user->exec("UPDATE users SET $query WHERE id = $userId", $data);
    }
    public function delete(int $userId)
    {
        return $this->user->where('id', $userId)->delete();
    }

}