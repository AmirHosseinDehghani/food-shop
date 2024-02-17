<?php

namespace Core\Loader;

use Jenssegers\Blade\Blade;

class ControllerLoader
{
    public function view()
    {
        return new Blade('views', 'cache');
    }
}