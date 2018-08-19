<?php

namespace Alive2212\LaravelDialNumber\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelDialNumber extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'LaravelDialNumber';
    }
}
