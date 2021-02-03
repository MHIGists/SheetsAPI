<?php


namespace Sheets\API;


class Routes
{
    private static $routes = [
        '404' => __DIR__ . '\\404.php'
    ];
    public static function getRoute(string $request, array $params = []){
        if (self::routeExists($request)){
            return self::$routes[$request];
        }
        return self::$routes['404'];
    }
    public static function addRoute(string $request, string $route){
        self::$routes[$request] = $route;
    }
    public static function routeExists(string $request){
        return (isset(self::$routes[$request]) && !empty(self::$routes[$request]));
    }
    public static function getRoutes(){
        return self::$routes;
}
}