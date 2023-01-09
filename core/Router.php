<?php

namespace App\core;

use Exception;

class Router
{
    protected $routes = [
        'get' => [],
        'post' => []
    ];


    public static function load($file)
    {
        $router = new static;
        require $file;
        return $router;
    }


    public function get($uri, $controller)
    {
        $this->routes['get'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['post'][$uri] = $controller;
    }


    /**
     * @throws Exception
     */
    public function direct($uri, $requestType)
    {

        if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );
        } else {
            throw new Exception('No route define for this url');
        }
    }

    protected function callAction($controller, $action)
    {
        $controller = "App\\controllers\\{$controller}";
        $controller=new $controller;

        if (!method_exists($controller, $action)) {
            throw new Exception(
                "{$controller} does not respond to the {$action} action"
            );
        }
        return $controller->$action();

    }
}