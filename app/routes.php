<?php

namespace App;

class Routes {
    protected static $routes = [];

    public static function add($method, $route, $controller) {
        self::$routes[] = [
            'method' => $method,
            'route' => $route,
            'controller' => $controller
        ];
    }

    public static function getRoutes() {
        return self::$routes;
    }
}
