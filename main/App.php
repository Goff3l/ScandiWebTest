<?php

namespace App\Main;

use Exception;

class App
{

    protected static $container = [];

    public static function bind($key, $value)
    {
        static::$container[$key] = $value;
    }

    public static function get($key)
    {

        if (array_key_exists($key, static::$container)) {
            return static::$container[$key];
        } else {
            new Exception("No data of {$key}.");
        }
    }
}
