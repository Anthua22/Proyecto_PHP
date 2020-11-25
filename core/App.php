<?php

namespace FUTAPP\core;

use Exception;

class App
{
    private static $container=[];

    public static function bind(string $key, $value):void
    {
        self::$container[$key]=$value;
    }

    public static function get(string $key)
    {
        if(!array_key_exists($key, self::$container)){
            throw new Exception("No se ha encontrado la clave $key en el contenedor");
        }
        return self::$container[$key];
    }
}