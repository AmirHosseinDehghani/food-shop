<?php

namespace Core\Helpers;


class DatabaseHelper
{
    /**
     * @param $name
     * @param $index
     * @return array|null
     */
    public static function config($name, $index): array|null
    {

        $file = "configs/$name.php";
        if (file_exists($file)) {

            $config = include $file;
            return $config[$index];

        }
        return null;
    }

    public static function loadModel($name)
    {
        $file = "app/Models/$name.php";
        if (file_exists($file)) {
            $name = "App\\Models\\$name";
            return new $name();

        }
        return null;
    }
}