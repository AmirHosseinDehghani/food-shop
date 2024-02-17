<?php

namespace App\Models;


use Core\Loader\Model;

class UsersTextModel extends Model
{
    private $text;

    public function __construct()
    {

        $this->text = self::db()->from('user_texts');
    }

    public function getText()
    {
        return $this->text->all();
    }

    public function delete(int $textId)
    {
        return $this->text->where('id', $textId)->delete();
    }
    public function deleteAll()
    {
        return $this->text->delete();
    }

    public function getTextById(int $textId)
    {
        return $this->text->where('id', $textId)->first();
    }

    public function getTextByUserid( $userId = null)
    {
        return $this->text->where('user_id', $userId)->all();
    }

    public function save(array $data)
    {
        return $this->text->insert($data);
    }
}