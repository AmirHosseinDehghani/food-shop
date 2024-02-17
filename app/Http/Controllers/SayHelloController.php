<?php

namespace App\Http\Controllers;

use Core\Helpers\DatabaseHelper;
use Core\Loader\ControllerLoader;
use App\Models;




class SayHelloController extends ControllerLoader
{
    public function sayHello()
    {

        User::users();

      // print_r( DatabaseHelper::loadModel('User')->getUsers());


    }
}