<?php

namespace App\Main;

use Exception;

class Router
{

    protected $routes = [
        'GET' => [],
        'POST' => []

    ];


    public static function load($file)
    {

        $router = new static;

        require $file;

        return $router;
    }

    public function direct($uri, $requestType)
    {
        if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->callMethod(...$this->routes[$requestType][$uri]);
        }

        throw new Exception('No route defined.');
    }


    public function get($uri, $controller)
    {

        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {

        $this->routes['POST'][$uri] = $controller;
    }


    protected function callMethod($controller, $method)
    {
        $controller = "App\Controllers\\{$controller}";
        $controller = new $controller;

        if (!method_exists($controller, $method)) {
            throw new Exception("{$method} action can not be performed!");
        }

        return $controller->$method();
    }
}
