<?php

namespace Alura\Cursos\Middleware;

class Route {

    public static $PROTECTED;
    public static $UNPROTECTED;

    public static function protected(array $routes):void
    {
        self::$PROTECTED = $routes;
    }

    public static function unprotected(array $routes):void
    {
        self::$UNPROTECTED = $routes;
    }

    public static function getAll():array
    {
        return array_merge(self::$UNPROTECTED, self::$PROTECTED);
    }


}