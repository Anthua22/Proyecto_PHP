<?php
namespace FUTAPP\app\helpers;

class Utils
{
    public static function isOpcionMenuActiva(string $opcionMenu) : bool
    {
        $resultado = strpos($_SERVER['REQUEST_URI'], $opcionMenu) !== false;
        if ($resultado === false && $opcionMenu === 'index')
            $resultado = $_SERVER['REQUEST_URI'] === '/';
        return $resultado;
    }

    public static function isOpcionMenuActivaInArray(array $opcionesMenu) : bool
    {
        foreach ($opcionesMenu as $opcionMenu) {
            if (self::isOpcionMenuActiva($opcionMenu) === true)
                return true;
        }

        return false;
    }
}