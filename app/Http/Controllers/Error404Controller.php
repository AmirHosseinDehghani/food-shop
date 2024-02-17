<?php

namespace App\Http\Controllers;

use Core\Loader\ControllerLoader;

class Error404Controller extends ControllerLoader
{
    public function error404()
    {
    echo $this->view()->make('panel/docs/errors/404')->render();
    }
}