<?php

class Router {
    protected $routes = [];

    public function addRoute($method, $path, $controller, $action) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'action' => $action
        ];
    }

    public function dispatch() {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        foreach ($this->routes as $route) {
            if ($route['method'] == $requestMethod && $route['path'] == $requestPath) {
                $controller = new $route['controller'];
                $action = $route['action'];
                $controller->$action();
                return;
            }
        }

        // Route not found
        header("Location: " .BASE_URL."/404");
    }
}
