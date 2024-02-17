<?php

namespace App\Models;


use Core\Loader\Model;

class SettingModel extends Model
{
    private $setting;

    public function __construct()
    {

        $this->setting = self::db()->from('settings');
    }

    public function getSetting()
    {
        return $this->setting->all();
    }
}