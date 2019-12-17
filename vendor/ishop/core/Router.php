<?php


namespace ishop;


class Router
{
    protected static $routes;
    protected static $route;

    public static function add($pattern, $route = [])
    {
        self::$routes[$pattern] = $route;
    }

    public static function dispatch($url)
    {
        $url = self::removeGetFromQuery($url);
        if(self::matchRoutes($url)) {
            $controller = 'app\controllers\\' . self::$route['controller'] . 'Controller';
            if(class_exists($controller)) {
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if(method_exists($controller, $action)) {
                    $controllerObject = new $controller(self::$route);
                    $controllerObject->$action();
                    $controllerObject->getView();
                } else {
                    throw new \Exception("Такого метода не существует");
                }
            } else {
                throw new \Exception("Такого контроллера не существует", 404);
            }
        } else {
            throw new \Exception("Неверный адресс", 404);
        }
    }

    protected static function matchRoutes($url)
    {
        foreach(self::$routes as $pattern => $route) {
            if(preg_match("#$pattern#", $url, $matches)) {
                foreach($matches as $k => $v) {
                    if(is_string($k)) {
                        $route[$k] = $v;
                    }
                }
                if(!isset($route['prefix'])) {
                    $route['prefix'] = '';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    public static function getRoutes()
    {
        return self::$routes;
    }

    public static function getRoute()
    {
        return self::$route;
    }

    private static function upperCamelCase($str)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $str)));
    }

    private static function lowerCamelCase($str)
    {
        return lcfirst(self::upperCamelCase($str));
    }

    private static function removeGetFromQuery($url)
    {
        if($url) {
            $params = explode('&', $url, 2);
            if(false === strpos($params[0], '=')) {
                return rtrim($params[0], '/');
            } else {
                return '';
            }
        }
    }
}