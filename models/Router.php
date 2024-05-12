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

            // Check if the environment is Heroku
            $isHeroku = getenv('HEROKU_APP') ? true : false;

            if ($isHeroku) {
                // Adjust base URL for Heroku
                $baseUrl = getenv('BASE_URL') ?: '/';
            } else {
                // Adjust base URL for local environment
                $baseUrl = BASE_URL;
            }

        foreach ($this->routes as $route) {

                // Adjust route path for Heroku
                $routePath = $baseUrl . $route['path'];

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
