<?php


namespace Sheets\API;


use Sheets\Utils;

class Routes
{
    private static $routes = [
        '404' => ''
    ];
    public static function getRoute(string $request, array $params = []){
        if (self::routeExists($request)){
            return self::$routes[$request];
        }
        return self::$routes['404'] = Utils::$NOTFOUND;
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