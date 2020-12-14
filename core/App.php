<?php

namespace FUTAPP\core;
use Exception;
use FUTAPP\CORE\DATABASE\QueryBuilder;


class App
{
    private static $container=[];

    public static function bind(string $key, $value):void
    {
        static::$container[$key]=$value;
    }

    public static function get(string $key)
    {
        if(!array_key_exists($key, self::$container)){
            throw new Exception("No se ha encontrado la clave $key en el contenedor");
        }
        return static::$container[$key];
    }

    public static function getRepository(string $repositoryName) : QueryBuilder
    {
        if (!isset(static::$container['repository']))
            static::$container['repository'] = [];

        if (!isset(static::$container['repository'][$repositoryName]))
            static::$container['repository'][$repositoryName] = new $repositoryName();

        return static::$container['repository'][$repositoryName];
    }

}