<?php

namespace App\Http\Controllers;

use App\Models\SettingModel;
use Core\Loader\ControllerLoader;

class UsersText extends ControllerLoader


{
    private SettingModel $usersTextModel;
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->usersTextModel = new SettingModel();
    }
    public function save()
    {
        $id = 1;
        $text = $this->usersTextModel->getText();
        print_r($text);
    }
}