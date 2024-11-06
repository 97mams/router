<?php

namespace App\Route;

use Exception;

class Router
{

    private $routes = [];
    private $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function get(string $path, callable $callable)
    {
        $route = new Route($path, $callable);
        $this->routes['GET'][] = $route;
    }

    public function post(string $path, callable $callable)
    {
        $route = new Route($path, $callable);
        $this->routes['POST'][] = $route;
    }

    public function run()
    {
        if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
            throw new \Exception('REQUEST_METHOD does not exist');
        }
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->match($this->url)) {
                return $route->call();
            }
        }
        throw new Exception("No matching routes");
    }
}