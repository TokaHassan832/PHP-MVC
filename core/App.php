<?php
// that app is like a container of many things
namespace App\core;

class App
{
    protected static $registry = [];

    public static function bind($key, $value)
    {
        static::$registry[$key] = $value;
    }

    public static function get($key)
    {
        if (!array_key_exists($key, static::$registry)) {
            throw new Exception('No {$key} is bound in the container');
        }
        return static::$registry[$key];
    }
}