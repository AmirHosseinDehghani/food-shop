<?php

namespace App\Http\Controllers;

use Core\Helpers\GeneralHelper;
use Core\Loader\ControllerLoader;

class HomePageController extends ControllerLoader
{
    public function homeForm()
    {
    $this->view()->make('/panel/home-page/front')->render();
    }
}