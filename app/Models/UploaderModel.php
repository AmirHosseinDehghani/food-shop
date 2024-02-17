<?php

namespace App\Models;

use Core\Loader\Model;

class UploaderModel extends Model
{
    private object $model;

    public function __construct()
    {
        $this->model = self::db()->from('user_files');
    }

    /**
     * @return mixed
     */
    public function getUsers(): mixed
    {
        return $this->model->all();
    }

    /**
     * @param int $userId
     * @return mixed
     */
    public function getUserFiles(int $userId): mixed
    {
        return $this->model->where('user_id', $userId)->all();
    }

    /**
     * @param int $userId
     * @param int $fileId
     * @return mixed
     */
    public function getUserFileById(int $userId, int $fileId): mixed
    {
        if ($fileId == 0){
            return null;
        }
        else{
            return $this->model->where('user_id', $userId)->where('id',$fileId)->first();
        }
    }


    /**
     * @param array $data
     * @return mixed
     */
    public function save(array $data): mixed
    {
        return $this->model->insert($data);
    }

    /**
     * @param int $userId
     * @param array $userData
     * @return void
     */
    public function updateUserFile(int $userId, array $userData): void
    {
        $data = [];
        $query = null;

        foreach ($userData as $index => $value) {
            $data[':' . $index] = $value;
            $query .= $index . ' = :' . $index . ',';
        }
        $query = substr($query, 0, -1);
        $this->model->exec("UPDATE user_Files SET $query WHERE id = $userId", $data);
    }

    /**
     * @param int $userId
     * @param int $fileId
     * @return mixed
     */
    public function deleteUserFile(int $userId , int $fileId): mixed
    {
        return $this->model->where('id', $fileId)->where('user_id',$userId)->delete();
    }

}